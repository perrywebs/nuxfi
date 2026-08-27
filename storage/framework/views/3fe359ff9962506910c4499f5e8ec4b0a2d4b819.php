    <!-- Modern Mobile Navigation with Glassmorphism -->
    <link href="https://unpkg.com/lucide@latest" rel="stylesheet">

    <div class="fixed bottom-0 w-full z-30 md:hidden" x-data="{ fabOpen: false }" x-cloak>
        <!-- Bottom Navigation Bar with Glassmorphism -->
        <div
            class="flex justify-between items-center bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg px-6 py-4 shadow-[0_-8px_30px_rgba(0,0,0,0.12)] relative border-t border-gray-200/20 dark:border-gray-700/20">

            <a href="<?php echo e(route('deposits')); ?>" class="group flex flex-col items-center relative">
                <div
                    class="p-2 rounded-xl transition-all duration-300 ease-out
                  <?php echo e(request()->routeIs('deposits')
                      ? 'bg-blue-500/10 dark:bg-blue-400/10 scale-110'
                      : 'hover:bg-gray-100 dark:hover:bg-gray-800'); ?>">
                    <i data-lucide="banknote"
                        class="w-6 h-6
           <?php echo e(request()->routeIs('deposits')
               ? 'text-blue-600 dark:text-blue-400'
               : 'text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-400'); ?>

           transition-colors duration-300"></i>
                </div>
                <span
                    class="text-xs font-medium mt-1
            <?php echo e(request()->routeIs('deposits')
                ? 'text-blue-600 dark:text-blue-400'
                : 'text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-400'); ?>

            transition-colors duration-300">Deposit</span>
            </a>

            <a href="<?php echo e(route('profile')); ?>" class="group flex flex-col items-center relative">
                <div
                    class="p-2 rounded-xl transition-all duration-300 ease-out
                  <?php echo e(request()->routeIs('profile')
                      ? 'bg-blue-500/10 dark:bg-blue-400/10 scale-110'
                      : 'hover:bg-gray-100 dark:hover:bg-gray-800'); ?>">
                    <i data-lucide="user"
                        class="w-6 h-6
           <?php echo e(request()->routeIs('profile')
               ? 'text-blue-600 dark:text-blue-400'
               : 'text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-400'); ?>

           transition-colors duration-300"></i>
                </div>
                <span
                    class="text-xs font-medium mt-1
            <?php echo e(request()->routeIs('profile')
                ? 'text-blue-600 dark:text-blue-400'
                : 'text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-400'); ?>

            transition-colors duration-300">Profile</span>
            </a>

<!-- Center Floating Action Button (FAB) -->
<button @click="fabOpen = !fabOpen"
    class="absolute -top-7 left-1/2 transform -translate-x-1/2
           bg-gradient-to-r from-blue-600 to-indigo-600 text-white
           w-14 h-14 rounded-full flex items-center justify-center
           shadow-[0_8px_30px_rgba(59,130,246,0.5)]
           border-4 border-white dark:border-gray-900
           hover:scale-110 hover:shadow-[0_8px_35px_rgba(59,130,246,0.6)]
           active:scale-95
           transition-all duration-300 ease-out group">

    <!-- Crown Icon with subtle tilt and scale when active -->
    <i data-lucide="crown" 
       class="w-6 h-6 transition-transform duration-300 ease-in-out group-hover:scale-110"
       :class="{ 'rotate-12 scale-110': fabOpen }"></i>

    <!-- Dynamic Glow / Pulse Effect -->
    <span class="absolute w-full h-full rounded-full bg-blue-500 opacity-20 pointer-events-none"
          :class="{ 'animate-ping': !fabOpen, 'animate-pulse bg-amber-400 opacity-40': fabOpen }"></span>
</button>

            <!-- Nav Link Example -->
            <a href="<?php echo e(route('creditcard')); ?>"
                class="flex flex-col items-center justify-center text-gray-500 hover:text-blue-600 transition-colors">
                <i data-lucide="credit-card" class="w-6 h-6"></i>
                <span class="text-xs mt-1">Cards</span>
            </a>


            <a href="<?php echo e(route('dashboard')); ?>"
                class="flex flex-col items-center
          <?php echo e(request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-500'); ?> hover:text-blue-600">
                <i data-lucide="home" class="w-6 h-6 transition-colors duration-200"></i>
                <span class="text-xs mt-1">Home</span>
            </a>
        </div>

        <!-- Modern FAB Overlay Menu -->
        <div x-show="fabOpen" @click.away="fabOpen = false"
            class="fixed inset-0 bg-gray-900/70 backdrop-blur-sm z-40 flex items-center justify-center p-4"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>

            <!-- Menu Card -->
            <div
                class="bg-gray-900 p-6 rounded-2xl
                shadow-[0_8px_30px_rgba(0,0,0,0.3)]
                space-y-4 w-72 max-w-full
                border border-gray-700
                transform transition-all duration-300
                animate-slideUp">

                <!-- Quick Actions Grid -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <a href="<?php echo e(route('mplans')); ?>"
                        class="flex flex-col items-center p-4 rounded-xl
                  bg-gray-800 border border-gray-700
                  hover:bg-gray-700 hover:shadow-lg hover:scale-105 transition-all duration-300
                  group">
                        <i data-lucide="trending-up"
                            class="w-6 h-6 mb-2 text-blue-400
                                              group-hover:scale-110 transition-transform duration-300"></i>
                        <span class="text-sm font-medium text-gray-200">Invest</span>
                    </a>

                    <a href="<?php echo e(route('withdrawalsdeposits')); ?>"
                        class="flex flex-col items-center p-4 rounded-xl
                  bg-gray-800 border border-gray-700
                  hover:bg-gray-700 hover:shadow-lg hover:scale-105 transition-all duration-300
                  group">
                        <i data-lucide="wallet"
                            class="w-6 h-6 mb-2 text-green-400
                                       group-hover:scale-110 transition-transform duration-300"></i>
                        <span class="text-sm font-medium text-gray-200">Withdraw</span>
                    </a>
                </div>

                <!-- Menu Links -->
                <div class="space-y-2">

                    <a href="/dashboard/copy-trading"
                        class="flex items-center p-3 rounded-lg text-gray-100
                          hover:bg-gray-800
                          transition-colors duration-200 group">
                        <i data-lucide="refresh-ccw"
                            class="w-5 h-5 mr-3 text-purple-400
                                             group-hover:rotate-180 transition-transform duration-500"></i>
                        <span class="font-medium">Copy Trading</span>
                    </a>

                    <a href="/dashboard/referuser"
                        class="flex items-center p-3 rounded-lg text-gray-100
                          hover:bg-gray-800
                          transition-colors duration-200 group">
                        <i data-lucide="users"
                            class="w-5 h-5 mr-3 text-orange-400
                                      group-hover:scale-110 transition-transform duration-300"></i>
                        <span class="font-medium">Refer Friends</span>
                        <span
                            class="ml-auto text-xs font-bold text-orange-400">+<?php echo e($settings->referral_commission); ?>%</span>
                    </a>

                    <a href="<?php echo e(route('support')); ?>"
                        class="flex items-center p-3 rounded-lg text-gray-100
                                               hover:bg-gray-800
                                               transition-colors duration-200 group">
                        <i data-lucide="life-buoy"
                            class="w-5 h-5 mr-3 text-cyan-400
                                           group-hover:scale-110 transition-transform duration-300"></i>
                        <span class="font-medium">Support</span>
                    </a>

                    <a href="/dashboard/top-earners"
                        class="flex items-center p-3 rounded-lg text-gray-100
                          hover:bg-gray-800
                          transition-colors duration-200 group">
                        <i data-lucide="newspaper"
                            class="w-5 h-5 mr-3 text-indigo-400
                                          group-hover:scale-110 transition-transform duration-300"></i>
                        <span class="font-medium">Top Earners</span>
                    </a>
                </div>

                <!-- Close Button -->
                <button @click="fabOpen = false"
                    class="absolute top-2 right-2 p-2 rounded-full
                     text-gray-400 hover:text-gray-200
                     hover:bg-gray-800
                     transition-colors duration-200">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <style>
            @keyframes  slideUp {
                from {
                    opacity: 0;
                    transform: scale(0.95) translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: scale(1) translateY(0);
                }
            }

            .animate-slideUp {
                animation: slideUp 0.3s ease-out forwards;
            }
        </style>
    </div>

    <!-- Script for Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Initialize Lucide icons
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });

        // Re-initialize icons when Alpine renders new content
        document.addEventListener('alpine:init', () => {
            Alpine.nextTick(() => {
                lucide.createIcons();
            });
        });
    </script>

    <style>
        @keyframes  fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<?php /**PATH C:\xampp\htdocs\nuxfi\resources\views/layouts/mobile-bottom-nav.blade.php ENDPATH**/ ?>