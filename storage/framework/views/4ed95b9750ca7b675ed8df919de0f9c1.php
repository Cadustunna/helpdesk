<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="p-6 space-y-6">

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-500">Open Tickets</p>
                <p class="text-2xl font-bold"><?php echo e($openTickets); ?></p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-500">In Progress</p>
                <p class="text-2xl font-bold"><?php echo e($inProgressTickets); ?></p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-500">Resolved</p>
                <p class="text-2xl font-bold"><?php echo e($resolvedTickets); ?></p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <p class="text-sm text-gray-500">My Tickets</p>
                <p class="text-2xl font-bold"><?php echo e($tickets->count()); ?></p>
            </div>
        </div>

        <!-- Recent Tickets -->
        <div class="bg-white rounded shadow">
            <div class="p-4 border-b font-semibold">
                Recent Tickets
            </div>

            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">S/N</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Created</th>
                    </tr>
                </thead>

                <?php
                    $i = 0;
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $i++;
                ?>
                <tbody>
                    <tr class="border-t w-full text-center">
                            <td class="text-start p-3"><?php echo e($i); ?></td>
                            <td><?php echo e($ticket->title); ?></td>
                            <td><?php echo e($ticket->category); ?></td>
                            <td><?php echo e($ticket->priority); ?></td>
                            <td><?php echo e($ticket->status); ?></td>
                            <td><?php echo e($ticket->created_at); ?></td>
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </table>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Felixson Adumeta\Desktop\helpdesk\resources\views/dashboard.blade.php ENDPATH**/ ?>