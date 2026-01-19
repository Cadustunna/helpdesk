<nav class="bg-gray-900 text-white">
    <div class="mx-auto max-w-7xl px-4 flex h-16 items-center">

        <!-- Logo -->
        <a wire:navigate href="<?php echo e(route('dashboard')); ?>" class="flex items-center">
            <div class="flex h-8 w-8 items-center justify-center rounded-md bg-gray-700">
                <?php if (isset($component)) { $__componentOriginal159d6670770cb479b1921cea6416c26c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal159d6670770cb479b1921cea6416c26c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-logo-icon','data' => ['class' => 'h-5 w-5 text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-logo-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $attributes = $__attributesOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__attributesOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $component = $__componentOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__componentOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
            </div>
        </a>

        <!-- Center -->
        <div class="mx-auto hidden md:flex space-x-6">
            <a wire:navigate href="<?php echo e(route('dashboard')); ?>" class="hover:text-gray-300">Dashboard</a>
            <a wire:navigate href="<?php echo e(route('tickets.index')); ?>" class="hover:text-gray-300">Tickets</a>
            <a wire:navigate href="<?php echo e(route('tickets.create')); ?>" class="hover:text-gray-300">Create Ticket</a>
        </div>

        <!-- Search -->
        <div class="flex items-center space-x-2">
            <input type="text"
                placeholder="Search"
                class="rounded-md bg-gray-800 px-3 py-1 text-sm text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button
                wire:click='"search'
                class="rounded-md bg-blue-600 px-4 py-1 text-sm hover:bg-blue-700">
                Search
            </button>
        </div>

        <!-- Right -->
        <div class="ml-auto flex items-center space-x-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                <!-- Profile Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button
                        @click="open = !open"
                        class="flex items-center space-x-2 hover:text-gray-300"
                    >
                        <span><?php echo e(auth()->user()->name); ?></span>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293
                                  a1 1 0 111.414 1.414l-4 4a1 1 0
                                  01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition
                        class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg"
                    >
                        <a href="#"
                           class="block px-4 py-2 hover:bg-gray-100">
                            Profile
                        </a>

                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button
                                type="submit"
                                class="w-full text-left px-4 py-2 hover:bg-gray-100"
                            >
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>

            <?php else: ?>
                <!-- Guest Links -->
                <a href="<?php echo e(route('login')); ?>" class="hover:text-gray-300">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="hover:text-gray-300">Register</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</nav>
<?php /**PATH C:\Users\Felixson Adumeta\Desktop\helpdesk\resources\views/components/navbar.blade.php ENDPATH**/ ?>