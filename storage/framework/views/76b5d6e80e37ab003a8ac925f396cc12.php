<?php if (isset($component)) { $__componentOriginal166a02a7c5ef5a9331faf66fa665c256 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.page.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">

        
        <div class="bg-gray-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                New (<?php echo e($this->newDeals->count()); ?>)
            </h2>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->newDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('filament.admin.resources.deals.view', $deal)); ?>"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold">
                        <?php echo e($deal->title); ?>

                    </div>

                    <div class="text-sm text-green-600">
                        AED <?php echo e(number_format($deal->amount, 2)); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: <?php echo e($deal->lead?->name ?? 'No Lead'); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Close: <?php echo e($deal->expected_close_date?->format('d M Y') ?? 'N/A'); ?>

                    </div>

                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div class="bg-blue-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Qualified (<?php echo e($this->qualifiedDeals->count()); ?>)
            </h2>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->qualifiedDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('filament.admin.resources.deals.view', $deal)); ?>"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold"><?php echo e($deal->title); ?></div>

                    <div class="text-sm text-green-600">
                        AED <?php echo e(number_format($deal->amount, 2)); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: <?php echo e($deal->lead?->name ?? 'No Lead'); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Close: <?php echo e($deal->expected_close_date?->format('d M Y') ?? 'N/A'); ?>

                    </div>

                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div class="bg-yellow-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Proposal (<?php echo e($this->proposalDeals->count()); ?>)
            </h2>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->proposalDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('filament.admin.resources.deals.view', $deal)); ?>"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold"><?php echo e($deal->title); ?></div>

                    <div class="text-sm text-green-600">
                        AED <?php echo e(number_format($deal->amount, 2)); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: <?php echo e($deal->lead?->name ?? 'No Lead'); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Close: <?php echo e($deal->expected_close_date?->format('d M Y') ?? 'N/A'); ?>

                    </div>

                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div class="bg-purple-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Negotiation (<?php echo e($this->negotiationDeals->count()); ?>)
            </h2>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->negotiationDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('filament.admin.resources.deals.view', $deal)); ?>"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold"><?php echo e($deal->title); ?></div>

                    <div class="text-sm text-green-600">
                        AED <?php echo e(number_format($deal->amount, 2)); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: <?php echo e($deal->lead?->name ?? 'No Lead'); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Close: <?php echo e($deal->expected_close_date?->format('d M Y') ?? 'N/A'); ?>

                    </div>

                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div class="bg-green-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Won (<?php echo e($this->wonDeals->count()); ?>)
            </h2>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->wonDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('filament.admin.resources.deals.view', $deal)); ?>"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold"><?php echo e($deal->title); ?></div>

                    <div class="text-sm text-green-600">
                        AED <?php echo e(number_format($deal->amount, 2)); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: <?php echo e($deal->lead?->name ?? 'No Lead'); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Close: <?php echo e($deal->expected_close_date?->format('d M Y') ?? 'N/A'); ?>

                    </div>

                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div class="bg-red-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Lost (<?php echo e($this->lostDeals->count()); ?>)
            </h2>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->lostDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('filament.admin.resources.deals.view', $deal)); ?>"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold"><?php echo e($deal->title); ?></div>

                    <div class="text-sm text-green-600">
                        AED <?php echo e(number_format($deal->amount, 2)); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: <?php echo e($deal->lead?->name ?? 'No Lead'); ?>

                    </div>

                    <div class="text-xs text-gray-500">
                        Close: <?php echo e($deal->expected_close_date?->format('d M Y') ?? 'N/A'); ?>

                    </div>

                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $attributes = $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $component = $__componentOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php /**PATH C:\Projects\omniainexus\resources\views/filament/admin/pages/deal-pipeline.blade.php ENDPATH**/ ?>