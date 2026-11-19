@extends('layouts.admin-dash')
@section('title', 'Manage Users')
@section('content')
<div x-data="{ showAddUser: false, showTrading: false, showTopup: false }">

    {{-- Page Header --}}
    <x-admin.page-header title="{{ $settings->site_name ?? 'Site' }} Users" subtitle="Manage all registered users">
        <x-slot name="actions">
            <div class="flex items-center gap-2">
                <a href="{{ route('emailservices') }}" class="inline-flex items-center gap-1.5 bg-surface-alt text-content hover:bg-surface-alt/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-border">
                    Send Message
                </a>
                <button type="button" @click="showAddUser = true" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                    New User
                </button>
            </div>
        </x-slot>
    </x-admin.page-header>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="mt-4 p-3 bg-success/10 border border-success/30 text-success rounded-lg text-sm">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="mt-4 p-3 bg-danger/10 border border-danger/30 text-danger rounded-lg text-sm">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="mt-4 p-3 bg-danger/10 border border-danger/30 text-danger rounded-lg text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Filters (GET form) --}}
    <form method="GET" action="{{ route('manageusers') }}" class="mt-6 mb-4 flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-3">
        <div class="relative max-w-sm w-full">
            <input type="search" name="q" value="{{ $search }}" placeholder="Search by ID, name, username or email..."
                class="w-full pl-3 pr-4 py-2 bg-surface-card border border-border rounded-lg text-sm text-content placeholder:text-content-muted focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" />
        </div>

        <select name="per_page" class="bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            @foreach ([10, 20, 50, 100, 200] as $opt)
                <option value="{{ $opt }}" @selected($perPage == $opt)>{{ $opt }} per page</option>
            @endforeach
        </select>

        <select name="orderby" class="bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            <option value="id"          @selected($orderby === 'id')>Sort by ID</option>
            <option value="name"        @selected($orderby === 'name')>Sort by Name</option>
            <option value="email"       @selected($orderby === 'email')>Sort by Email</option>
            <option value="created_at"  @selected($orderby === 'created_at')>Sort by Sign up date</option>
        </select>

        <select name="direction" class="bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            <option value="desc" @selected($direction === 'desc')>Descending</option>
            <option value="asc"  @selected($direction === 'asc')>Ascending</option>
        </select>

        <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
            Apply
        </button>

        @if ($search !== '' || $orderby !== 'id' || $direction !== 'desc' || $perPage !== 10)
            <a href="{{ route('manageusers') }}" class="inline-flex items-center text-sm text-content-muted hover:text-content underline">Reset</a>
        @endif
    </form>

    {{-- Bulk Action Form (wraps the table so checkboxes submit with it) --}}
    <form id="bulkForm" method="POST" action="{{ route('users.bulkAction') }}" onsubmit="return confirmBulk();">
        @csrf
        <input type="hidden" name="bulk_action" id="bulk_action_input" value="Delete">

        <div class="mb-3 flex flex-wrap items-center gap-2">
            <span class="text-xs text-content-muted">With selected:</span>
            <button type="button" onclick="submitBulk('Activate')" class="inline-flex items-center gap-1.5 bg-success/10 text-success hover:bg-success/20 border border-success/30 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Activate</button>
            <button type="button" onclick="submitBulk('Deactivate')" class="inline-flex items-center gap-1.5 bg-warning/10 text-warning hover:bg-warning/20 border border-warning/30 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Deactivate</button>
            <button type="button" onclick="submitBulk('Delete')" class="inline-flex items-center gap-1.5 bg-danger text-content-inverse hover:bg-danger/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Delete</button>
            <button type="button" onclick="submitBulk('Clear')" class="inline-flex items-center gap-1.5 bg-warning text-content-inverse hover:bg-warning/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Clear Account</button>
            <button type="button" @click="showTrading = true" class="inline-flex items-center gap-1.5 bg-info text-content-inverse hover:bg-info/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Add ROI</button>
            <button type="button" @click="showTopup = true" class="inline-flex items-center gap-1.5 bg-info text-content-inverse hover:bg-info/80 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">Topup</button>
        </div>

        <x-admin.table-card>
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-surface-alt text-left">
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider whitespace-nowrap">
                            <input type="checkbox" id="selectPage" onclick="toggleAll(this)" class="rounded border-border text-primary focus:ring-primary/30" />
                        </th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Client Name</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Username</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Email</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Phone</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Status</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Registered</th>
                        <th class="px-4 py-3 font-medium text-content-muted uppercase text-xs tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($users as $user)
                        <tr class="hover:bg-surface-alt/50 transition-colors">
                            <td class="px-4 py-3 align-middle">
                                <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="row-check rounded border-border text-primary focus:ring-primary/30" />
                            </td>
                            <td class="px-4 py-3 text-content font-medium">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-content-secondary">{{ $user->username }}</td>
                            <td class="px-4 py-3 text-content-secondary">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-content-secondary">{{ $user->phone }}</td>
                            <td class="px-4 py-3">
                                @if ($user->isActive())
                                    <x-admin.badge type="success">Active</x-admin.badge>
                                @else
                                    <x-admin.badge type="danger">Inactive</x-admin.badge>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-content-secondary whitespace-nowrap">{{ optional($user->created_at)->diffForHumans() }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('viewuser', $user->id) }}" class="inline-flex items-center gap-1.5 bg-secondary text-secondary-foreground hover:bg-secondary-hover rounded-lg px-3 py-1.5 text-xs font-medium transition-colors">
                                        Manage
                                    </a>
                                    @if ($user->isActive())
                                        <a href="{{ route('user.deactivate', $user->id) }}"
                                            onclick="return confirmStatus(event, 'deactivate', '{{ addslashes($user->name) }}', '{{ route('user.deactivate', $user->id) }}')"
                                            class="inline-flex items-center gap-1.5 bg-warning/10 text-warning hover:bg-warning/20 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-warning/30">
                                            Deactivate
                                        </a>
                                    @else
                                        <a href="{{ route('user.activate', $user->id) }}"
                                            onclick="return confirmStatus(event, 'activate', '{{ addslashes($user->name) }}', '{{ route('user.activate', $user->id) }}')"
                                            class="inline-flex items-center gap-1.5 bg-success/10 text-success hover:bg-success/20 rounded-lg px-3 py-1.5 text-xs font-medium transition-colors border border-success/30">
                                            Activate
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-8 text-center text-content-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-admin.table-card>

        <div class="mt-4">
            @if ($users->hasPages())
                <nav class="flex items-center justify-between flex-wrap gap-3" role="navigation" aria-label="Pagination">
                    <p class="text-xs text-content-muted">
                        Showing <span class="font-medium text-content">{{ $users->firstItem() ?? 0 }}</span>
                        to <span class="font-medium text-content">{{ $users->lastItem() ?? 0 }}</span>
                        of <span class="font-medium text-content">{{ $users->total() }}</span> users
                    </p>

                    <ul class="inline-flex items-center gap-1">
                        {{-- Prev --}}
                        @if ($users->onFirstPage())
                            <li>
                                <span class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content-muted opacity-50 cursor-not-allowed">Prev</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $users->previousPageUrl() }}" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content hover:bg-surface-alt transition-colors">Prev</a>
                            </li>
                        @endif

                        {{-- Page numbers --}}
                        @foreach ($users->getUrlRange(max(1, $users->currentPage() - 3), min($users->lastPage(), $users->currentPage() + 3)) as $page => $url)
                            @if ($page == $users->currentPage())
                                <li>
                                    <span class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-primary bg-primary text-primary-foreground font-medium">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content hover:bg-surface-alt transition-colors">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($users->hasMorePages())
                            <li>
                                <a href="{{ $users->nextPageUrl() }}" class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content hover:bg-surface-alt transition-colors">Next</a>
                            </li>
                        @else
                            <li>
                                <span class="inline-flex items-center px-3 py-1.5 text-xs rounded-lg border border-border bg-surface-card text-content-muted opacity-50 cursor-not-allowed">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @else
                <p class="text-xs text-content-muted">Showing {{ $users->count() }} of {{ $users->total() }} users</p>
            @endif
        </div>

        <input type="hidden" name="plan"        id="bulk_plan">
        <input type="hidden" name="datecreated" id="bulk_datecreated">
        <input type="hidden" name="topamount"   id="bulk_topamount">
        <input type="hidden" name="topcolumn"   id="bulk_topcolumn">
        <input type="hidden" name="toptype"     id="bulk_toptype">
    </form>

    {{-- ═══════════════════════ ADD USER MODAL ═══════════════════════ --}}
    <div x-show="showAddUser" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div x-show="showAddUser" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="showAddUser = false"></div>
        <div x-show="showAddUser" x-transition class="relative w-full max-w-lg bg-surface-card rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content">Add User</h3>
                <button type="button" @click="showAddUser = false" class="text-content-muted hover:text-content transition-colors">&times;</button>
            </div>
            <div class="px-6 py-5">
                <form method="POST" action="{{ route('createuser') }}">
                    @csrf
                    <x-admin.form-group label="Username" class="mb-4" required>
                        <input type="text" name="username" value="{{ old('username') }}" required
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    </x-admin.form-group>
                    <x-admin.form-group label="Fullname" class="mb-4" required>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    </x-admin.form-group>
                    <x-admin.form-group label="Email" class="mb-4" required>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    </x-admin.form-group>
                    <x-admin.form-group label="Password" class="mb-4" required>
                        <input type="text" name="password" required
                            class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    </x-admin.form-group>
                    <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                        Add User
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════ ADD ROI MODAL ═══════════════════════ --}}
    <div x-show="showTrading" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div x-show="showTrading" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="showTrading = false"></div>
        <div x-show="showTrading" x-transition class="relative w-full max-w-lg bg-surface-card rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content">Add ROI to Selected Users</h3>
                <button type="button" @click="showTrading = false" class="text-content-muted hover:text-content transition-colors">&times;</button>
            </div>
            <div class="px-6 py-5">
                <x-admin.form-group label="Select Investment Plan" class="mb-4" required>
                    <select id="modal_plan" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                        <option value="" selected disabled>Select Plan</option>
                        @foreach ($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                        @endforeach
                    </select>
                </x-admin.form-group>
                <x-admin.form-group label="Date" class="mb-4" required>
                    <input type="date" id="modal_datecreated" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                </x-admin.form-group>
                <p class="text-xs text-content-muted mb-4">
                    The system will calculate ROI based on users' invested amount and the topup amount in the selected plan settings.
                    <strong class="text-content-secondary">The plan must use % as its topup-type, otherwise calculations will be wrong.</strong>
                </p>
                <button type="button" onclick="submitRoi()" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                    Add History
                </button>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════ TOPUP MODAL ═══════════════════════ --}}
    <div x-show="showTopup" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
        <div x-show="showTopup" x-transition.opacity class="absolute inset-0 bg-surface-overlay/60" @click="showTopup = false"></div>
        <div x-show="showTopup" x-transition class="relative w-full max-w-lg bg-surface-card rounded-2xl shadow-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-border flex items-center justify-between">
                <h3 class="text-lg font-semibold text-content">Credit/Debit Accounts</h3>
                <button type="button" @click="showTopup = false" class="text-content-muted hover:text-content transition-colors">&times;</button>
            </div>
            <div class="px-6 py-5">
                <x-admin.form-group label="Amount" class="mb-4" required>
                    <input type="number" step="any" id="modal_topamount" placeholder="Enter amount"
                        class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                </x-admin.form-group>
                <x-admin.form-group label="Select where to Credit/Debit" class="mb-4" required>
                    <select id="modal_topcolumn" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                        <option value="" selected disabled>Select Column</option>
                        <option value="Bonus">Bonus</option>
                        <option value="balance">Account Balance</option>
                    </select>
                </x-admin.form-group>
                <x-admin.form-group label="Credit to add, Debit to subtract" class="mb-4" required>
                    <select id="modal_toptype" class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary" required>
                        <option value="">Select type</option>
                        <option value="Credit">Credit</option>
                        <option value="Debit">Debit</option>
                    </select>
                </x-admin.form-group>
                <button type="button" onclick="submitTopup()" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleAll(source) {
        document.querySelectorAll('.row-check').forEach(cb => cb.checked = source.checked);
    }

    function hasSelection() {
        const selected = document.querySelectorAll('.row-check:checked').length;
        if (selected === 0) {
            alert('Please select at least one user.');
            return false;
        }
        return true;
    }

    function submitBulk(action) {
        if (!hasSelection()) return;
        document.getElementById('bulk_action_input').value = action;

        if (window.Swal) {
            const messages = {
                Delete: { title: 'Delete selected users?', text: 'This permanently removes the accounts and their records. This cannot be undone.', icon: 'error', confirm: 'Yes, delete' },
                Clear: { title: 'Clear selected accounts?', text: 'Balances will be reset and deposits/withdrawals removed.', icon: 'warning', confirm: 'Yes, clear' },
                Activate: { title: 'Activate selected users?', text: 'These users will be able to sign in again.', icon: 'question', confirm: 'Yes, activate' },
                Deactivate: { title: 'Deactivate selected users?', text: 'These users will be signed out and blocked from signing in. Their data is kept.', icon: 'warning', confirm: 'Yes, deactivate' }
            };
            const message = messages[action];
            if (message) {
                Swal.fire({
                    title: message.title,
                    text: message.text,
                    icon: message.icon,
                    showCancelButton: true,
                    confirmButtonColor: action === 'Delete' ? 'rgb(220,38,38)' : 'rgb(14,165,233)',
                    confirmButtonText: message.confirm
                }).then(function (result) {
                    if (result.isConfirmed) {
                        document.getElementById('bulkForm').submit();
                    }
                });
                return;
            }
        }

        document.getElementById('bulkForm').submit();
    }

    function confirmBulk() {
        const action = document.getElementById('bulk_action_input').value;
        if (action === 'Delete') {
            return confirm('Permanently delete the selected users? This cannot be undone.');
        }
        if (action === 'Clear') {
            return confirm('Clear balances and remove deposits/withdrawals for the selected users?');
        }
        if (action === 'Deactivate') {
            return confirm('Deactivate the selected users? They will be signed out and blocked from signing in.');
        }
        return true;
    }

    function confirmStatus(event, action, name, url) {
        event.preventDefault();
        const isDeactivate = action === 'deactivate';
        const go = function () { window.location.href = url; };

        if (!window.Swal) {
            if (confirm((isDeactivate ? 'Deactivate ' : 'Activate ') + name + '?')) go();
            return false;
        }

        Swal.fire({
            title: (isDeactivate ? 'Deactivate ' : 'Activate ') + name + '?',
            text: isDeactivate
                ? 'The account keeps all of its data but the user will be signed out and blocked from logging in.'
                : 'The user will be able to sign in again immediately.',
            icon: isDeactivate ? 'warning' : 'question',
            showCancelButton: true,
            confirmButtonColor: isDeactivate ? 'rgb(217,119,6)' : 'rgb(22,163,74)',
            confirmButtonText: isDeactivate ? 'Yes, deactivate' : 'Yes, activate'
        }).then(function (result) {
            if (result.isConfirmed) go();
        });

        return false;
    }

    function submitRoi() {
        if (!hasSelection()) return;
        const plan = document.getElementById('modal_plan').value;
        const date = document.getElementById('modal_datecreated').value;
        if (!plan || !date) { alert('Plan and date are required.'); return; }
        document.getElementById('bulk_plan').value = plan;
        document.getElementById('bulk_datecreated').value = date;
        document.getElementById('bulk_action_input').value = 'AddRoi';
        document.getElementById('bulkForm').submit();
    }

    function submitTopup() {
        if (!hasSelection()) return;
        const amount = document.getElementById('modal_topamount').value;
        const column = document.getElementById('modal_topcolumn').value;
        const type   = document.getElementById('modal_toptype').value;
        if (!amount || !column || !type) { alert('All topup fields are required.'); return; }
        document.getElementById('bulk_topamount').value = amount;
        document.getElementById('bulk_topcolumn').value = column;
        document.getElementById('bulk_toptype').value = type;
        document.getElementById('bulk_action_input').value = 'Topup';
        document.getElementById('bulkForm').submit();
    }
</script>
@endsection
