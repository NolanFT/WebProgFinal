<header class="tb-header-fixed">
    <div class="tb-container">

        
        <div class="d-flex align-items-center mb-2" style="gap: 0.6rem;">
            <a href="<?php echo e(url('/')); ?>" class="d-inline-flex align-items-center" style="gap:0.5rem;">
                <img
                    src="<?php echo e(asset('images/the_boys_logo.jpg')); ?>"
                    alt="The Boys Logo"
                    style="height:42px;width:auto;border-radius:0.4rem;object-fit:cover;background:#0f172a;"
                >
            </a>
        </div>

        <div class="d-flex flex-wrap align-items-center justify-content-between" style="gap:0.75rem;">

            
            <div class="d-flex flex-grow-1 align-items-center" style="gap:0.5rem;max-width:620px;min-width:260px;">

                
                <form action="<?php echo e(url('/')); ?>" method="GET" class="d-flex flex-grow-1" style="gap:0.4rem;">
                    <?php if(request('category')): ?>
                        <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                    <?php endif; ?>

                    <input
                        type="text"
                        name="q"
                        value="<?php echo e(request('q')); ?>"
                        class="tb-input-rounded flex-grow-1"
                        placeholder="Search for products..."
                        style="padding-left:1rem;"
                    >

                    <button type="submit" class="tb-btn-primary d-inline-flex align-items-center">
                        <img
                            src="<?php echo e(asset('images/search_icon.png')); ?>"
                            alt="Search"
                            style="height:15px;width:15px;opacity:0.9;margin-right:0.3rem;"
                        >
                    </button>
                </form>


                
                <div class="dropdown">
                    <button
                        type="button"
                        class="tb-pill-link dropdown-toggle d-inline-flex align-items-center"
                        id="filterDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        style="border:1px solid rgba(148,163,184,0.5);white-space:nowrap;"
                    >
                        <img
                            src="<?php echo e(asset('images/filter_icon.png')); ?>"
                            alt="Filter"
                            style="height:16px;width:16px;opacity:0.85;margin-right:0.35rem;"
                        >
                        Categories
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                        
                        <?php
                            // Preserve q but remove category
                            $clearCategoryUrl = request('q')
                                ? url('/?q=' . urlencode(request('q')))
                                : url('/');
                        ?>

                        <?php if(request('category')): ?>
                            <li>
                                <a class="dropdown-item text-danger fw-semibold" href="<?php echo e($clearCategoryUrl); ?>">
                                    Clear
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                        <?php endif; ?>
                        <?php $__currentLoopData = $recentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // Preserve search query when clicking categories
                                $queryString = request('q') ? '&q=' . urlencode(request('q')) : '';
                            ?>

                            <li>
                                <a class="dropdown-item"
                                href="<?php echo e(url('/?category=' . $cat['id'] . $queryString)); ?>">
                                    <?php echo e(ucfirst($cat['name'])); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            
            <nav class="d-flex flex-wrap align-items-center justify-content-end" style="gap:0.4rem;">

                <a href="<?php echo e(route('home')); ?>" class="tb-pill-link d-inline-flex align-items-center" style="gap:0.35rem;">
                    <img src="<?php echo e(asset('images/home_icon.jpg')); ?>" alt="Home" style="height:16px;width:16px;opacity:0.85;">
                    Home
                </a>

                <a href="<?php echo e(route('cart')); ?>" class="tb-pill-link d-inline-flex align-items-center" style="gap:0.35rem;">
                    <img src="<?php echo e(asset('images/cart_icon.png')); ?>" alt="Cart" style="height:16px;width:16px;opacity:0.85;">
                    Cart
                </a>

                <a href="<?php echo e(route('account')); ?>" class="tb-pill-link d-inline-flex align-items-center" style="gap:0.35rem;">
                    <img src="<?php echo e(asset('images/account_icon.jpg')); ?>" alt="Account" style="height:16px;width:16px;opacity:0.85;">
                    Account
                </a>

            </nav>
        </div>
    </div>
</header><?php /**PATH D:\Abraham Folder\WebProg\testproject\resources\views/layouts/header.blade.php ENDPATH**/ ?>