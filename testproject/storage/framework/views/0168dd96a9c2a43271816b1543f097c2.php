<?php $__env->startSection('title', 'The Boys – Home'); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="mb-4">
        <div class="tb-card p-4 p-md-4" style="
            background: radial-gradient(circle at top left, var(--tb-yellow) 0, var(--tb-blue) 45%, var(--tb-black) 100%);
            color: #f9fafb;
            border: none;
        ">
            <div class="row align-items-end gy-3">
                <div class="col-md-8">
                    <span class="badge rounded-pill" style="background:#facc15;color:#111827;font-size:0.7rem;letter-spacing:0.08em;">
                        ELECTRONICS & TOYS MARKETPLACE
                    </span>
                    <h1 class="mt-2 mb-2" style="font-size:1.6rem;font-weight:600;">
                        Welcome to The Boys
                    </h1>
                    <p class="mb-0" style="font-size:0.9rem;max-width:420px;">
                        Browse electronics and toys in a clean.
                    </p>
                </div>
            </div>
        </div>
    </section>

    
    <section class="mb-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-2" style="gap:0.5rem;">
            <h2 class="mb-0" style="font-size:1rem;font-weight:600;">Categories</h2>

            <div class="d-flex flex-wrap" style="gap:0.5rem;">

                <?php
                    $isAllActive = !$categoryId;
                ?>

                
                <a
                    href="<?php echo e(url('/').($query ? '?q='.urlencode($query) : '')); ?>"
                    class="tb-pill-link"
                    style="
                        background: <?php echo e($isAllActive ? 'var(--tb-blue)' : 'rgba(15,23,42,0.06)'); ?>;
                        color: <?php echo e($isAllActive ? '#f9fafb' : '#111827'); ?>;
                        font-size:0.8rem;
                        padding:0.4rem 0.9rem;
                    "
                >
                    All
                </a>

                
                <?php $__currentLoopData = $recentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isActive = $categoryId === $cat['id'];
                        $catUrl = url('/?category='.$cat['id'].($query ? '&q='.urlencode($query) : ''));
                    ?>

                    <a
                        href="<?php echo e($catUrl); ?>"
                        class="tb-pill-link"
                        style="
                            background: <?php echo e($isActive ? 'var(--tb-blue)' : 'rgba(15,23,42,0.06)'); ?>;
                            color: <?php echo e($isActive ? '#f9fafb' : '#111827'); ?>;
                            font-size:0.8rem;
                            padding:0.4rem 0.9rem;
                        "
                    >
                        <?php echo e(ucfirst($cat['name'])); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php if($categoryId || $query): ?>
            <div style="font-size:0.8rem;color:var(--tb-gray-text);">
                <?php if($categoryId): ?>
                    <span>
                        Filter:
                        <strong><?php echo e(ucfirst($categoryNames[$categoryId] ?? 'Unknown')); ?></strong>
                    </span>
                <?php endif; ?>
                <?php if($categoryId && $query): ?>
                    <span> · </span>
                <?php endif; ?>
                <?php if($query): ?>
                    <span>Search: <strong><?php echo e($query); ?></strong></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>

    
    <section>
        <?php if($products->isEmpty()): ?>
            <div class="tb-card p-4">
                <p class="mb-0" style="font-size:0.9rem;color:var(--tb-gray-text);">
                    No products found for this filter/search.
                </p>
            </div>
        <?php else: ?>
            <div class="row g-3">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="tb-card h-100 overflow-hidden">

                            
                            <a href="<?php echo e(url('/products/'.$product['id'])); ?>" class="ratio ratio-4x3 d-block">
                                <img
                                    src="<?php echo e($product['image']); ?>"
                                    alt="<?php echo e($product['name']); ?>"
                                    class="w-100 h-100"
                                    style="object-fit:cover;"
                                >
                            </a>

                            <div class="p-2 p-md-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <?php
                                        $catId = $product['category_id'];
                                        $catUrl = url('/?category='.$catId.($query ? '&q='.urlencode($query) : ''));
                                        $catLabel = ucfirst($categoryNames[$catId] ?? 'Unknown');
                                    ?>

                                    
                                    <a
                                        href="<?php echo e($catUrl); ?>"
                                        class="badge rounded-pill"
                                        style="background:#facc15;color:#111827;font-size:0.7rem;text-decoration:none;cursor:pointer;"
                                    >
                                        <?php echo e($catLabel); ?>

                                    </a>
                                </div>

                                
                                <h3 class="mb-1" style="font-size:0.9rem;font-weight:600;">
                                    <a href="<?php echo e(url('/products/'.$product['id'])); ?>" style="color:inherit;text-decoration:none;">
                                        <?php echo e($product['name']); ?>

                                    </a>
                                </h3>

                                <p class="mb-2" style="font-size:0.9rem;font-weight:600;color:var(--tb-blue);">
                                    Rp<?php echo e(number_format($product['price'], 0, ',', '.')); ?>

                                </p>

                                <div class="d-flex gap-2">
                                    <button class="tb-btn-primary flex-fill">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Abraham Folder\WebProg\testproject\resources\views/home.blade.php ENDPATH**/ ?>