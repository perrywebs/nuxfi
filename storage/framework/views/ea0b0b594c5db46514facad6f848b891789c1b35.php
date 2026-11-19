/*
 * Compound interest calculator engine + UI.
 *
 * The calculation model mirrors the Pulse Markets calculator:
 *  - "month" mode treats the entered rate as a monthly return.
 *  - "year" mode converts the entered annual return to its monthly equivalent:
 *      r = (1 + annual / 100) ^ (1 / 12) - 1
 *  - Each month's gain is balance * r.
 *  - A selected share of each month's gain may be withdrawn. The performance fee
 *    applies only to the withdrawn slice; the remainder is paid to the customer.
 *  - Recurring contributions are added after the month's gain/withdrawal.
 */
(function (global) {
    'use strict';

    var DEFAULTS = {
        principal: 5000,
        rate: 27.6,
        months: 12,
        unit: 'mo',
        contribution: 0,
        period: 'month',
        takePct: 0,
        feePct: 30
    };

    // A month is the calculator's compounding period, so a week/day horizon is
    // converted to its equivalent fraction of an average Gregorian month.
    var DAYS_PER_MONTH = 30.436875;
    var MAX_MONTHS = 600;
    var MONTHS_PER_UNIT = {
        mo: 1,
        wk: 7 / DAYS_PER_MONTH,
        day: 1 / DAYS_PER_MONTH
    };
    var UNIT_META = {
        mo: { short: 'mo', prose: 'mo', singular: 'month', plural: 'months' },
        wk: { short: 'wk', prose: 'wk', singular: 'week', plural: 'weeks' },
        day: { short: 'day', prose: 'days', singular: 'day', plural: 'days' }
    };

    function normalizeUnit(value) {
        return value === 'wk' || value === 'day' ? value : 'mo';
    }

    function formatDuration(value) {
        if (!Number.isFinite(value)) {
            return '\u2014';
        }
        return String(Math.round(value * 100) / 100);
    }

    function finiteNumber(value, fallback) {
        var parsed = typeof value === 'number' ? value : parseFloat(value);
        return Number.isFinite(parsed) ? parsed : fallback;
    }

    function clamp(value, min, max) {
        return Math.min(max, Math.max(min, value));
    }

    function formatMoney(value) {
        if (!Number.isFinite(value)) {
            return '\u2014';
        }
        return '$' + Math.round(value).toLocaleString('en-US');
    }

    function formatMoney2(value) {
        if (!Number.isFinite(value)) {
            return '\u2014';
        }
        return '$' + Number(value || 0).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function formatAxisMoney(value) {
        if (!Number.isFinite(value)) {
            return '$0';
        }
        var absolute = Math.abs(value);
        if (absolute >= 1000000) {
            return '$' + (value / 1000000).toFixed(1) + 'M';
        }
        if (absolute >= 1000) {
            return '$' + Math.round(value / 1000) + 'k';
        }
        return '$' + Math.round(value);
    }

    function formatPercent(value, decimals) {
        if (!Number.isFinite(value)) {
            return '\u2014';
        }
        return value.toFixed(typeof decimals === 'number' ? decimals : 0) + '%';
    }

    function round2(value) {
        if (!Number.isFinite(value)) {
            return value;
        }
        return Math.round(value * 100) / 100;
    }

    /**
     * Run the projection. This function is deliberately DOM-free so it can be
     * unit-tested in Node and reused by any future server-side projection.
     */
    function calculate(options) {
        options = options || {};
        var principal = Math.max(0, finiteNumber(options.principal, DEFAULTS.principal));
        var rateInput = clamp(finiteNumber(options.rate, DEFAULTS.rate), 0, 1000);
        // Always bound the loop here as well as in the UI so a pasted or
        // programmatic value can never freeze the page.
        var months = clamp(finiteNumber(options.months, DEFAULTS.months), 0, MAX_MONTHS);
        var contribution = Math.max(0, finiteNumber(options.contribution, DEFAULTS.contribution));
        var period = options.period === 'year' ? 'year' : 'month';
        var takePct = clamp(finiteNumber(options.takePct, DEFAULTS.takePct), 0, 100);
        var feePct = clamp(finiteNumber(options.feePct, DEFAULTS.feePct), 0, 100);

        // Support fractional month horizons from the week/day unit selector while
        // keeping whole-month projections byte-for-byte identical to before.
        var fullMonths = Math.floor(months);
        var remainder = months - fullMonths;
        if (remainder < 0.001) {
            remainder = 0;
        } else if (remainder > 0.999) {
            fullMonths += 1;
            remainder = 0;
        }
        months = fullMonths + remainder;

        var monthlyRate = period === 'year'
            ? Math.pow(1 + rateInput / 100, 1 / 12) - 1
            : rateInput / 100;

        var rows = [{
            m: 0,
            label: 'Start',
            balance: round2(principal),
            principal: principal,
            interest: 0,
            gain: 0,
            paidOut: 0,
            fee: 0,
            cashTotal: 0
        }];

        var balance = principal;
        var cashTotal = 0;
        var feeTotal = 0;
        var gainTotal = 0;

        for (var month = 1; month <= fullMonths; month += 1) {
            var gain = balance * monthlyRate;
            var withdrawn = gain * (takePct / 100);
            var fee = withdrawn * (feePct / 100);
            var paidOut = withdrawn - fee;

            balance = balance + gain - withdrawn + contribution;
            cashTotal += paidOut;
            feeTotal += fee;
            gainTotal += gain;

            var principalToDate = principal + contribution * month;
            rows.push({
                m: month,
                label: 'M' + month,
                balance: round2(balance),
                principal: round2(principalToDate),
                interest: round2(balance - principalToDate),
                gain: round2(gain),
                paidOut: round2(paidOut),
                fee: round2(fee),
                cashTotal: round2(cashTotal)
            });
        }

        if (remainder > 0) {
            var partialGain = balance * monthlyRate * remainder;
            var partialWithdrawn = partialGain * (takePct / 100);
            var partialFee = partialWithdrawn * (feePct / 100);
            var partialPaidOut = partialWithdrawn - partialFee;

            // A recurring contribution is made at the end of a full month, so a
            // partial month grows the existing balance but adds no new deposit.
            balance = balance + partialGain - partialWithdrawn;
            cashTotal += partialPaidOut;
            feeTotal += partialFee;
            gainTotal += partialGain;

            var partialPrincipal = principal + contribution * fullMonths;
            rows.push({
                m: fullMonths + 1,
                label: 'M' + (fullMonths + 1) + '*',
                balance: round2(balance),
                principal: round2(partialPrincipal),
                interest: round2(balance - partialPrincipal),
                gain: round2(partialGain),
                paidOut: round2(partialPaidOut),
                fee: round2(partialFee),
                cashTotal: round2(cashTotal),
                partial: true
            });
        }

        var final = balance;
        var principalTotal = principal + contribution * fullMonths;
        var interestTotal = takePct > 0
            ? final + cashTotal - principalTotal
            : final - principalTotal;
        var growthPct = principalTotal > 0 ? (interestTotal / principalTotal) * 100 : 0;
        var multiple = principalTotal > 0 ? (final + cashTotal) / principalTotal : 0;
        // Simple interest for a fair comparison: the starting principal earns a
        // flat return for the whole horizon, while each contribution earns it
        // only for the months it is actually invested.
        var simpleBalance = principal * (1 + monthlyRate * months);
        for (var simpleMonth = 1; simpleMonth <= fullMonths; simpleMonth += 1) {
            simpleBalance += contribution * (1 + monthlyRate * (months - simpleMonth));
        }
        var compoundAdds = final - simpleBalance;
        var annualized = (Math.pow(1 + monthlyRate, 12) - 1) * 100;

        var allIn = principal;
        for (var allInMonth = 1; allInMonth <= fullMonths; allInMonth += 1) {
            allIn = allIn * (1 + monthlyRate) + contribution;
        }
        if (remainder > 0) {
            allIn = allIn * (1 + monthlyRate * remainder);
        }

        return {
            rows: rows,
            final: final,
            principalTotal: principalTotal,
            interestTotal: interestTotal,
            growthPct: growthPct,
            multiple: multiple,
            simpleBalance: simpleBalance,
            compoundAdds: compoundAdds,
            annualized: annualized,
            monthlyRate: monthlyRate,
            cashTotal: cashTotal,
            feeTotal: feeTotal,
            gainTotal: gainTotal,
            allIn: allIn,
            avgMonthlyCash: months > 0 ? cashTotal / months : 0,
            lastMonthCash: rows.length ? rows[rows.length - 1].paidOut : 0,
            principal: principal,
            rateInput: rateInput,
            months: months,
            contribution: contribution,
            period: period,
            takePct: takePct,
            feePct: feePct,
            valid: [final, principalTotal, interestTotal, growthPct, multiple, annualized, simpleBalance, compoundAdds, allIn].every(Number.isFinite)
        };
    }

    function niceTicks(maxValue) {
        if (!Number.isFinite(maxValue) || maxValue <= 0) {
            return [0, 1];
        }

        var rough = maxValue / 4;
        var power = Math.pow(10, Math.floor(Math.log10(rough)));
        var normalized = rough / power;
        var step;

        if (normalized <= 1) {
            step = 1;
        } else if (normalized <= 2) {
            step = 2;
        } else if (normalized <= 2.5) {
            step = 2.5;
        } else if (normalized <= 5) {
            step = 5;
        } else {
            step = 10;
        }

        step *= power;
        var top = Math.ceil(maxValue / step) * step;
        var ticks = [];
        for (var value = 0; value <= top + step / 1000; value += step) {
            ticks.push(value);
        }
        if (ticks.length < 2) {
            ticks.push(step);
        }
        return ticks;
    }

    function monoPath(points) {
        if (points.length === 0) {
            return '';
        }
        if (points.length === 1) {
            return 'M' + points[0].x + ' ' + points[0].y;
        }
        if (points.length === 2) {
            return 'M' + points[0].x + ' ' + points[0].y + 'L' + points[1].x + ' ' + points[1].y;
        }

        var dx = [];
        var slope = [];
        var tangent = [];
        var i;

        for (i = 1; i < points.length; i += 1) {
            dx[i] = points[i].x - points[i - 1].x;
            slope[i] = dx[i] === 0 ? 0 : (points[i].y - points[i - 1].y) / dx[i];
        }

        tangent[0] = slope[1];
        tangent[points.length - 1] = slope[points.length - 1];

        for (i = 1; i < points.length - 1; i += 1) {
            if (slope[i] * slope[i + 1] <= 0) {
                tangent[i] = 0;
            } else {
                var w1 = 2 * dx[i + 1] + dx[i];
                var w2 = dx[i + 1] + 2 * dx[i];
                tangent[i] = (w1 + w2) / (w1 / slope[i] + w2 / slope[i + 1]);
            }
        }

        var path = 'M' + points[0].x + ' ' + points[0].y;
        for (i = 0; i < points.length - 1; i += 1) {
            var third = dx[i + 1] / 3;
            var c1x = points[i].x + third;
            var c1y = points[i].y + tangent[i] * third;
            var c2x = points[i + 1].x - third;
            var c2y = points[i + 1].y - tangent[i + 1] * third;
            path += 'C' + c1x + ' ' + c1y + ' ' + c2x + ' ' + c2y + ' ' + points[i + 1].x + ' ' + points[i + 1].y;
        }
        return path;
    }

    function barPath(x, y, width, height) {
        var radius = Math.min(4, width / 2, height);
        if (height <= 0) {
            return '';
        }
        if (height <= radius) {
            return 'M' + x + ' ' + (y + height) + 'h' + width + 'v-' + height + 'h-' + width + 'z';
        }
        return 'M' + x + ' ' + (y + radius) +
            'Q' + x + ' ' + y + ' ' + (x + radius) + ' ' + y +
            'h' + (width - radius * 2) +
            'Q' + (x + width) + ' ' + y + ' ' + (x + width) + ' ' + (y + radius) +
            'v' + (height - radius) + 'h-' + width + 'z';
    }

    function init(root) {
        if (!root || root.dataset.ciInitialized === '1') {
            return;
        }
        root.dataset.ciInitialized = '1';

        var byId = function (id) {
            return root.querySelector('#' + id);
        };

        var state = {
            principal: DEFAULTS.principal,
            rate: DEFAULTS.rate,
            months: DEFAULTS.months,
            unit: DEFAULTS.unit,
            contribution: DEFAULTS.contribution,
            period: DEFAULTS.period,
            takePct: DEFAULTS.takePct,
            feePct: DEFAULTS.feePct
        };

        var el = {
            principal: byId('ci-principal'),
            rate: byId('ci-rate'),
            months: byId('ci-months'),
            unit: byId('ci-unit'),
            unitLabel: byId('ci-unit-label'),
            contribution: byId('ci-contribution'),
            fee: byId('ci-fee'),
            finalLabel: byId('ci-final-label'),
            finalValue: byId('ci-final'),
            interestLine: byId('ci-interest-line'),
            interestValue: byId('ci-interest'),
            cashLine: byId('ci-cash-line'),
            cashTotal: byId('ci-cash-total'),
            totalValue: byId('ci-total-value'),
            growth: byId('ci-growth'),
            multiple: byId('ci-multiple'),
            stat2Label: byId('ci-stat2-label'),
            stat2Value: byId('ci-stat2-value'),
            stat2Sub: byId('ci-stat2-sub'),
            principalTotal: byId('ci-principal-total'),
            rateLabel: byId('ci-rate-label'),
            rateValue: byId('ci-rate-value'),
            rateKind: byId('ci-rate-kind'),
            apyInline: byId('ci-apy-inline'),
            withdrawResults: byId('ci-withdraw-results'),
            cashToYou: byId('ci-cash-to-you'),
            stillInvested: byId('ci-still-invested'),
            feeOnWithdrawals: byId('ci-fee-on-withdrawals'),
            allIn: byId('ci-all-in'),
            feeLabel: byId('ci-fee-label'),
            withdrawalExplanation: byId('ci-withdrawal-explanation'),
            chart: byId('ci-chart'),
            chartSvg: byId('ci-chart-svg'),
            chartTooltip: byId('ci-chart-tooltip'),
            legendCash: byId('ci-legend-cash'),
            simpleNote: byId('ci-simple-note'),
            compoundAdds: byId('ci-compound-adds'),
            simpleBalance: byId('ci-simple-balance'),
            tableMeta: byId('ci-table-meta'),
            tableFirst: byId('ci-table-first'),
            tableSecond: byId('ci-table-second')
        };

        var periodButtons = root.querySelectorAll('[data-period]');
        var takeButtons = root.querySelectorAll('[data-take]');
        var quickButtons = root.querySelectorAll('[data-quick]');
        var chartModel = null;
        var resizeFrame = null;
        var syncedDurationValue = null;

        function setText(node, value) {
            if (node) {
                node.textContent = value;
            }
        }

        function setHidden(node, hidden) {
            if (node) {
                node.classList.toggle('hidden', hidden);
            }
        }

        function formatRate(value) {
            if (!Number.isFinite(value)) {
                return '\u2014';
            }
            return Number.isInteger(value) ? String(value) : String(Math.round(value * 100) / 100);
        }

        function sanitizeDecimal(value) {
            var cleaned = String(value == null ? '' : value).replace(/[^0-9.]/g, '');
            var parts = cleaned.split('.');
            if (parts.length > 2) {
                cleaned = parts.shift() + '.' + parts.join('');
            }
            return cleaned;
        }

        function unitFactor() {
            return MONTHS_PER_UNIT[state.unit] || 1;
        }

        function durationShort() {
            var value = formatDuration(state.months / unitFactor());
            var meta = UNIT_META[state.unit];
            return value + ' ' + (value === '1' ? meta.singular : meta.prose);
        }

        function durationText() {
            var value = formatDuration(state.months / unitFactor());
            var meta = UNIT_META[state.unit];
            return value + ' ' + (value === '1' ? meta.singular : meta.plural);
        }

        function updateUnitUi() {
            if (el.unit) {
                el.unit.value = state.unit;
            }
            if (el.unitLabel) {
                el.unitLabel.textContent = UNIT_META[state.unit].short;
            }
            if (el.months) {
                el.months.setAttribute('aria-label', 'Time horizon in ' + UNIT_META[state.unit].plural);
            }
        }

        function syncDurationInput() {
            var display = formatDuration(state.months / unitFactor());
            if (el.months) {
                el.months.value = display;
            }
            syncedDurationValue = display;
        }

        function updateSummary(result) {
            var take = result.takePct;
            setText(el.finalLabel, (take > 0 ? 'Still invested after' : 'Projected final balance \u00b7') + ' ' + durationShort());
            setText(el.finalValue, formatMoney(result.final));

            if (take > 0) {
                setHidden(el.interestLine, true);
                setHidden(el.cashLine, false);
                setText(el.cashTotal, formatMoney(result.cashTotal));
                setText(el.totalValue, formatMoney(result.final + result.cashTotal));
            } else {
                setHidden(el.interestLine, false);
                setHidden(el.cashLine, true);
                setText(el.interestValue, formatMoney(result.interestTotal));
            }

            setText(el.growth, '+' + formatPercent(result.growthPct, 0));
            setText(el.multiple, Number.isFinite(result.multiple) ? result.multiple.toFixed(2) + '\u00d7' : '\u2014');

            if (take > 0) {
                setText(el.stat2Label, 'Paid out / month');
                setText(el.stat2Value, formatMoney(result.avgMonthlyCash));
                setText(el.stat2Sub, 'last month ' + formatMoney(result.lastMonthCash));
            } else {
                setText(el.stat2Label, 'Effective APY');
                setText(el.stat2Value, formatPercent(result.annualized, 0));
                setText(el.stat2Sub, 'per year');
            }

            setText(el.principalTotal, formatMoney(result.principalTotal));
            setText(el.rateValue, formatRate(result.rateInput) + '%');
            setText(el.rateKind, result.period === 'year' ? 'annual' : 'monthly');
            setText(el.apyInline, formatPercent(result.annualized, 2));
            setText(el.rateLabel, result.period === 'year' ? 'Annual return' : 'Monthly return');
        }

        function updateWithdrawPanel(result) {
            var take = result.takePct;
            setHidden(el.withdrawResults, take <= 0);
            setHidden(el.withdrawalExplanation, take <= 0);
            if (take <= 0) {
                return;
            }

            setText(el.cashToYou, formatMoney(result.cashTotal));
            setText(el.stillInvested, formatMoney(result.final));
            setText(el.feeOnWithdrawals, formatMoney(result.feeTotal));
            setText(el.allIn, formatMoney(result.allIn));
            setText(el.feeLabel, 'Fee on withdrawals (' + formatRate(result.feePct) + '%)');

            if (el.withdrawalExplanation) {
                el.withdrawalExplanation.innerHTML =
                    '<b class="text-white/80">How it works:</b> each month the fund\'s profit is split. ' +
                    formatRate(take) + '% of it is taken out; the ' + formatRate(result.feePct) +
                    '% performance fee is charged on that slice only, and the rest lands in your wallet. The other ' +
                    formatRate(100 - take) + '% stays in and compounds. Taking profit out gives you income now, but the money left invested grows more slowly \u2014 keeping it all in would end at ' +
                    '<b class="text-white/80">' + formatMoney(result.allIn) + '</b> instead of ' +
                    formatMoney(result.final) + ' invested plus ' + formatMoney(result.cashTotal) + ' paid out.';
            }
        }

        function updateTable(result) {
            var take = result.takePct;
            var rows = result.rows.filter(function (row) {
                return row.m > 0;
            });

            setText(el.tableMeta,
                durationText() + ' \u00b7 ' + formatRate(result.rateInput) + '% / ' +
                (result.period === 'year' ? 'yr' : 'mo') +
                (result.contribution > 0 ? ' \u00b7 +' + formatMoney(result.contribution) + '/mo' : ''));

            var header = take > 0
                ? ['Month', 'Balance', 'Paid to you', 'Total paid']
                : ['Month', 'Balance', 'Principal', 'Interest'];

            function pane(container, paneRows) {
                if (!container) {
                    return;
                }
                if (paneRows.length === 0) {
                    container.innerHTML = '';
                    return;
                }

                var html = '<div class="grid grid-cols-4 gap-2 pb-2 mb-1 border-b border-white/[0.08] text-[10px] uppercase tracking-wider text-white/40 font-semibold">';
                header.forEach(function (label, index) {
                    html += '<span class="' + (index === 0 ? '' : 'text-right') + '">' + label + '</span>';
                });
                html += '</div>';

                paneRows.forEach(function (row) {
                    html += '<div class="grid grid-cols-4 gap-2 py-1.5 border-b border-white/[0.04] text-[12px] tabular-nums">' +
                        '<span class="text-white/60 font-medium">Month ' + row.m + (row.partial ? ' <span class="text-white/35">(part)</span>' : '') + '</span>' +
                        '<span class="text-right font-bold text-white">' + formatMoney(row.balance) + '</span>';

                    if (take > 0) {
                        html += '<span class="text-right font-semibold text-emerald-300">+' + formatMoney2(row.paidOut) + '</span>' +
                            '<span class="text-right text-white/60">' + formatMoney(row.cashTotal) + '</span>';
                    } else {
                        html += '<span class="text-right text-white/45">' + formatMoney(row.principal) + '</span>' +
                            '<span class="text-right font-semibold text-cyan-300">+' + formatMoney(row.interest) + '</span>';
                    }

                    html += '</div>';
                });
                container.innerHTML = html;
            }

            var half = Math.ceil(rows.length / 2);
            pane(el.tableFirst, rows.slice(0, half));
            pane(el.tableSecond, rows.slice(half));
        }

        function updateChart(result) {
            if (!el.chartSvg) {
                return;
            }

            var width = Math.max(260, Math.round(el.chart.clientWidth || 695));
            var height = 300;
            var left = 50;
            var right = 8;
            var top = 8;
            var bottom = 30;
            var plotWidth = width - left - right;
            var plotHeight = height - top - bottom;
            var rows = result.rows;
            var take = result.takePct;
            var max = 0;

            rows.forEach(function (row) {
                [row.gain, row.balance, take > 0 ? row.cashTotal : 0].forEach(function (value) {
                    if (Number.isFinite(value) && value > max) {
                        max = value;
                    }
                });
            });

            var ticks = niceTicks(max);
            var topValue = ticks[ticks.length - 1] || 1;
            var band = plotWidth / rows.length;

            var x = function (index) {
                return left + band * (index + 0.5);
            };
            var y = function (value) {
                if (!Number.isFinite(value)) {
                    return top + plotHeight;
                }
                return top + plotHeight - (value / topValue) * plotHeight;
            };

            chartModel = {
                rows: rows,
                band: band,
                left: left,
                top: top,
                plotHeight: plotHeight,
                topValue: topValue,
                take: take
            };

            var svg = '<svg class="recharts-surface" width="100%" height="' + height + '" viewBox="0 0 ' + width + ' ' + height + '" role="img" aria-label="Projected growth chart">';
            svg += '<title>Projected growth</title><desc>Bar chart of each month\'s gain with a line for the running balance.</desc>';
            svg += '<defs><linearGradient id="ccBar" x1="0" y1="0" x2="0" y2="1">' +
                '<stop offset="0%" stop-color="#67e8f9"></stop><stop offset="100%" stop-color="#0891b2"></stop>' +
                '</linearGradient></defs>';

            ticks.forEach(function (tick) {
                var tickY = y(tick);
                svg += '<line stroke-dasharray="3 3" stroke="rgba(255,255,255,0.05)" fill="none" x1="' + left + '" y1="' + tickY + '" x2="' + (left + plotWidth) + '" y2="' + tickY + '"></line>';
                svg += '<text x="' + (left - 8) + '" y="' + (tickY + 3) + '" text-anchor="end" fill="rgba(255,255,255,0.4)" font-size="10">' + formatAxisMoney(tick) + '</text>';
            });

            var maximumLabels = Math.max(2, Math.floor(plotWidth / 42));
            var labelStep = Math.max(1, Math.ceil(rows.length / maximumLabels));
            rows.forEach(function (row, index) {
                if (index % labelStep === 0 || index === rows.length - 1) {
                    svg += '<text x="' + x(index) + '" y="' + (height - 8) + '" text-anchor="middle" fill="rgba(255,255,255,0.4)" font-size="10">' + row.label + '</text>';
                }
            });

            rows.forEach(function (row, index) {
                if (row.gain > 0 && Number.isFinite(row.gain)) {
                    var barWidth = Math.min(42, band * 0.8);
                    var barX = x(index) - barWidth / 2;
                    var barY = y(row.gain);
                    var barHeight = top + plotHeight - barY;
                    svg += '<path d="' + barPath(barX, barY, barWidth, barHeight) + '" fill="url(#ccBar)"></path>';
                }
            });

            function linePathFor(key, color) {
                var segments = [];
                var current = [];
                rows.forEach(function (row, index) {
                    var value = row[key];
                    if (Number.isFinite(value)) {
                        current.push({ x: x(index), y: y(value) });
                    } else if (current.length) {
                        segments.push(current);
                        current = [];
                    }
                });
                if (current.length) {
                    segments.push(current);
                }
                return segments.map(function (segment) {
                    return '<path d="' + monoPath(segment) + '" fill="none" stroke="' + color + '" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>';
                }).join('');
            }

            svg += linePathFor('balance', '#a78bfa');
            if (take > 0) {
                svg += linePathFor('cashTotal', '#34d399');
            }
            svg += '</svg>';
            el.chartSvg.innerHTML = svg;

            setHidden(el.legendCash, take <= 0);
            setHidden(el.simpleNote, take > 0);
            if (take <= 0) {
                setText(el.compoundAdds, formatMoney(result.compoundAdds));
                setText(el.simpleBalance, formatMoney(result.simpleBalance));
            }
        }

        function syncControls(result) {
            periodButtons.forEach(function (button) {
                var active = button.dataset.period === result.period;
                button.setAttribute('aria-pressed', active ? 'true' : 'false');
                button.style.background = active ? 'linear-gradient(90deg, #22d3ee, #818cf8)' : '';
                button.style.color = active ? '#06121a' : '';
            });

            takeButtons.forEach(function (button) {
                var active = Number(button.dataset.take) === result.takePct;
                button.classList.toggle('ci-take-active', active);
                button.setAttribute('aria-pressed', active ? 'true' : 'false');
            });

            quickButtons.forEach(function (button) {
                var active = Number(button.dataset.quick) === result.principal;
                button.classList.toggle('ci-pill-active', active);
                button.setAttribute('aria-pressed', active ? 'true' : 'false');
            });
        }

        function render() {
            var result = calculate(state);
            updateSummary(result);
            updateWithdrawPanel(result);
            updateTable(result);
            updateChart(result);
            syncControls(result);

            var durationRow = el.months ? el.months.closest('.ci-duration-row') : null;
            if (durationRow) {
                var durationLong = el.months.value.length >= 3;
                durationRow.classList.toggle('ci-duration-long', durationLong);
                el.months.style.minWidth = '';
                if (durationLong) {
                    el.months.style.minWidth = Math.ceil(el.months.scrollWidth) + 'px';
                }
            }
        }

        function bindTextInput(input, options) {
            if (!input) {
                return;
            }

            input.addEventListener('input', function () {
                var filtered = options.decimals ? sanitizeDecimal(input.value) : input.value.replace(/[^0-9]/g, '');
                input.value = filtered;
                var parsed = options.decimals ? parseFloat(filtered) : parseInt(filtered, 10);
                // An empty or partially typed value is treated as zero so the
                // projections update on every keystroke without ever showing NaN.
                state[options.key] = Number.isFinite(parsed) ? clamp(parsed, options.min, options.max) : options.min;
                render();
            });

            input.addEventListener('blur', function () {
                var parsed = options.decimals ? parseFloat(input.value) : parseInt(input.value, 10);
                var value = Number.isFinite(parsed) ? parsed : options.min;
                value = clamp(value, options.min, options.max);
                state[options.key] = value;
                input.value = String(value);
                render();
            });
        }

        function bindDurationInput(input) {
            if (!input) {
                return;
            }

            input.addEventListener('input', function () {
                var filtered = sanitizeDecimal(input.value);
                input.value = filtered;
                syncedDurationValue = null;
                var parsed = parseFloat(filtered);
                var value = Number.isFinite(parsed) ? parsed : 0;
                state.months = clamp(value, 0, MAX_MONTHS / unitFactor()) * unitFactor();
                render();
            });

            input.addEventListener('blur', function () {
                if (input.value === syncedDurationValue) {
                    syncDurationInput();
                    render();
                    return;
                }

                var parsed = parseFloat(input.value);
                var value = Number.isFinite(parsed) ? parsed : 0;
                value = clamp(value, 0, MAX_MONTHS / unitFactor());
                var display = formatDuration(value);
                state.months = parseFloat(display) * unitFactor();
                input.value = display;
                syncedDurationValue = display;
                render();
            });
        }

        bindTextInput(el.principal, { key: 'principal', decimals: true, min: 0, max: 100000000 });
        bindTextInput(el.rate, { key: 'rate', decimals: true, min: 0, max: 1000 });
        bindDurationInput(el.months);
        bindTextInput(el.contribution, { key: 'contribution', decimals: true, min: 0, max: 100000000 });

        if (el.unit) {
            el.unit.addEventListener('change', function () {
                state.unit = normalizeUnit(el.unit.value);
                syncDurationInput();
                updateUnitUi();
                render();
            });
        }

        if (el.fee) {
            el.fee.addEventListener('input', function () {
                var filtered = sanitizeDecimal(el.fee.value);
                el.fee.value = filtered;
                var parsed = parseFloat(filtered);
                state.feePct = Number.isFinite(parsed) ? clamp(parsed, 0, 100) : 0;
                render();
            });
            el.fee.addEventListener('blur', function () {
                var parsed = parseFloat(el.fee.value);
                state.feePct = Number.isFinite(parsed) ? clamp(parsed, 0, 100) : 0;
                el.fee.value = String(state.feePct);
                render();
            });
        }

        periodButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                state.period = button.dataset.period === 'year' ? 'year' : 'month';
                render();
            });
        });

        takeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                state.takePct = Number(button.dataset.take);
                render();
            });
        });

        quickButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                state.principal = Number(button.dataset.quick);
                if (el.principal) {
                    el.principal.value = String(state.principal);
                }
                render();
            });
        });

        if (el.chart) {
            el.chart.addEventListener('pointermove', function (event) {
                if (!chartModel || !el.chartTooltip) {
                    return;
                }
                var rect = el.chart.getBoundingClientRect();
                var px = event.clientX - rect.left;
                var index = Math.floor((px - chartModel.left) / chartModel.band + 0.5);
                index = clamp(index, 0, chartModel.rows.length - 1);
                var row = chartModel.rows[index];

                var label = row.m === 0 ? 'Today' : 'Month ' + row.m + (row.partial ? ' (partial)' : '');
                var html = '<div class="text-[11px] font-semibold text-white/80">' + label + '</div>' +
                    '<div class="mt-1 space-y-0.5 text-[11px]">' +
                    '<div class="flex items-center justify-between gap-4"><span class="text-white/50">This month\'s gain</span><span class="font-semibold text-white tabular-nums">' + formatMoney2(row.gain) + '</span></div>' +
                    '<div class="flex items-center justify-between gap-4"><span class="text-white/50">Running balance</span><span class="font-semibold text-white tabular-nums">' + formatMoney2(row.balance) + '</span></div>';

                if (chartModel.take > 0) {
                    html += '<div class="flex items-center justify-between gap-4"><span class="text-white/50">Paid out to you (total)</span><span class="font-semibold text-white tabular-nums">' + formatMoney2(row.cashTotal) + '</span></div>';
                }
                html += '</div>';

                el.chartTooltip.innerHTML = html;
                el.chartTooltip.style.display = 'block';

                var tooltipWidth = el.chartTooltip.offsetWidth;
                var tooltipHeight = el.chartTooltip.offsetHeight;
                var tooltipLeft = px + 14;
                if (tooltipLeft + tooltipWidth > rect.width) {
                    tooltipLeft = px - tooltipWidth - 14;
                }
                tooltipLeft = Math.max(0, tooltipLeft);

                var pointY = chartModel.top + chartModel.plotHeight - (row.balance / chartModel.topValue) * chartModel.plotHeight;
                var tooltipTop = clamp(pointY - tooltipHeight / 2, 0, rect.height - tooltipHeight);
                el.chartTooltip.style.left = tooltipLeft + 'px';
                el.chartTooltip.style.top = tooltipTop + 'px';
            });

            el.chart.addEventListener('pointerleave', function () {
                if (el.chartTooltip) {
                    el.chartTooltip.style.display = 'none';
                }
            });
        }

        function scheduleRender() {
            if (resizeFrame !== null) {
                return;
            }
            resizeFrame = global.requestAnimationFrame(function () {
                resizeFrame = null;
                render();
            });
        }

        if (typeof global.ResizeObserver !== 'undefined' && el.chart) {
            new global.ResizeObserver(scheduleRender).observe(el.chart);
        } else {
            global.addEventListener('resize', scheduleRender);
        }

        updateUnitUi();
        syncDurationInput();
        render();
    }

    var api = {
        calculate: calculate,
        init: init,
        formatMoney: formatMoney,
        formatMoney2: formatMoney2,
        formatAxisMoney: formatAxisMoney,
        niceTicks: niceTicks,
        defaults: DEFAULTS
    };

    if (typeof module !== 'undefined' && module.exports) {
        module.exports = api;
    }

    global.CompoundInterest = api;

    function boot() {
        var roots = document.querySelectorAll('[data-compound-calculator]');
        for (var i = 0; i < roots.length; i += 1) {
            init(roots[i]);
        }
    }

    if (typeof document !== 'undefined') {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', boot);
        } else {
            boot();
        }
    }
}(typeof window !== 'undefined' ? window : this));
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views\user\partials\compound-interest-script.blade.php ENDPATH**/ ?>