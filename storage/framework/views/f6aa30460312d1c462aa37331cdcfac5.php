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

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- HERO -->

<div
    style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:60px;
    "
>

    <!-- LEFT -->

    <div>

        <div
            style="
                color:#8b5cf6;
                font-size:20px;
                font-weight:700;
                letter-spacing:2px;
                margin-bottom:18px;
                text-transform:uppercase;
            "
        >
            OmniAI Nexus
        </div>

        <h1
            style="
                font-size:46px;
                font-weight:900;
                line-height:1.1;
                margin-bottom:20px;
            "
        >
            Welcome back,<br>
            <?php echo e(auth()->user()->name); ?> 👋
        </h1>

        <div
            style="
                color:#94a3b8;
                font-size:22px;
            "
        >
            Your AI-powered business command center.
        </div>

    </div>


    <!-- RIGHT BUTTONS -->

    <div
        style="
            display:flex;
            gap:18px;
            align-items:center;
        "
    >

        <a
            href="/admin/a-i-studio"
            style="
                background:linear-gradient(90deg,#8b5cf6,#6366f1);
                color:white;
                padding:16px 30px;
                border-radius:999px;
                font-weight:700;
                text-decoration:none;
                box-shadow:0 0 30px rgba(139,92,246,.35);
            "
        >
            ✨ AI Insights
        </a>


        <a
            href="/admin/campaigns/create"
            style="
                background:rgba(255,255,255,.03);
                color:white;
                border:1px solid rgba(255,255,255,.08);
                padding:16px 30px;
                border-radius:999px;
                font-weight:700;
                text-decoration:none;
            "
        >
            + New Campaign
        </a>

    </div>

</div>

<!-- KPI -->

<div
    style="
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:24px;
        margin-bottom:40px;
    "
>

    <div class="omni-stat-card">

        <div style="color:#94a3b8;">
            Revenue
        </div>

        <div
            style="
                font-size:14px;
                font-weight:;
                margin-top:10px;
            "
        >
            $<?php echo e(number_format($this->revenue,2)); ?>

        </div>

    </div>


    <div class="omni-stat-card">

        <div style="color:#94a3b8;">
            Leads
        </div>

        <div
            style="
                font-size:14px;
                font-weight:500;
                margin-top:10px;
            "
        >
            <?php echo e($this->leadsCount); ?>

        </div>

    </div>


    <div class="omni-stat-card">

        <div style="color:#94a3b8;">
            Campaigns
        </div>

        <div
            style="
                font-size:14px;
                font-weight:500;
                margin-top:10px;
            "
        >
            <?php echo e($this->campaignsCount); ?>

        </div>

    </div>


    <div class="omni-stat-card">

        <div style="color:#94a3b8;">
            AI Generations
        </div>

        <div
            style="
                font-size:14px;
                font-weight:500;
                margin-top:10px;
            "
        >
            <?php echo e($this->aiCount); ?>

        </div>

    </div>

</div>
<!-- NEXUS AI CENTER -->

<div class="nexus-center">

    <!-- LEFT -->
    <div class="social-side social-left">

        <!-- Instagram -->
        <div class="social-node">

            <div class="social-card">
                <i class="fa-brands fa-instagram social-icon"></i>
            </div>

            <div class="social-info">

                <div class="social-title">
                    Instagram
                </div>

                <div class="social-subtitle">
                    Engagement
                </div>

                <div class="social-value">
                    <?php echo e(number_format($this->instagramFollowers)); ?>

                </div>

            </div>

        </div>


        <!-- TikTok -->
        <div class="social-node">

            <div class="social-card">
                <i class="fa-brands fa-tiktok social-icon"></i>
            </div>

            <div class="social-info">

                <div class="social-title">
                    TikTok
                </div>

                <div class="social-subtitle">
                    Engagement
                </div>

                <div class="social-value">
                    <?php echo e(number_format($this->tikTokFollowers)); ?>

                </div>

            </div>

        </div>


        <!-- YouTube -->
        <div class="social-node">

            <div class="social-card">
                <i class="fa-brands fa-youtube social-icon"></i>
            </div>

            <div class="social-info">

                <div class="social-title">
                    YouTube
                </div>

                <div class="social-subtitle">
                    Views
                </div>

                <div class="social-value">
                    <?php echo e(number_format($this->youtubeFollowers)); ?>

                </div>

            </div>

        </div>

    </div>


    <!-- CENTER -->
    <div class="brain-center">

        <img
            src="<?php echo e(asset('images/brain.png')); ?>"
            class="brain-image"
            alt="Omni AI Brain"
        >

        <div class="brain-title">
            Omni AI
        </div>

        <div class="brain-subtitle">
            Your All-In-One AI Marketing Brain
        </div>

    </div>


   <!-- RIGHT -->
<div class="social-side social-right">

    <!-- Facebook -->
    <div class="social-node social-node-right">

        <div class="social-info">

            <div class="social-title">
                Facebook
            </div>

            <div class="social-subtitle">
                Engagement
            </div>

            <div class="social-value">
                <?php echo e(number_format($this->facebookFollowers)); ?>

            </div>

        </div>

        <div class="social-card">
            <i class="fa-brands fa-facebook-f social-icon"></i>
        </div>

    </div>


    <!-- X -->
    <div class="social-node social-node-right">

        <div class="social-info">

            <div class="social-title">
                X
            </div>

            <div class="social-subtitle">
                Engagement
            </div>

            <div class="social-value">
                <?php echo e(number_format($this->xFollowers)); ?>

            </div>

        </div>

        <div class="social-card">
            <i class="fa-brands fa-x-twitter social-icon"></i>
        </div>

    </div>


    <!-- LinkedIn -->
    <div class="social-node social-node-right">

        <div class="social-info">

            <div class="social-title">
                LinkedIn
            </div>

            <div class="social-subtitle">
                Engagement
            </div>

            <div class="social-value">
                <?php echo e(number_format($this->linkedinFollowers)); ?>

            </div>

        </div>

        <div class="social-card">
            <i class="fa-brands fa-linkedin-in social-icon"></i>
        </div>

    </div>

</div> 

</div> 
 <!-- BOTTOM DASHBOARD -->

<div
    style="
        display:grid;
        grid-template-columns:repeat(3,minmax(0,1fr));
        gap:30px;
        margin-top:60px;
        align-items:start;
    "
>

   <!-- AI RECOMMENDATIONS -->

<div class="dashboard-card">

    <div
        style="
            font-size:26px;
            font-weight:700;
            margin-bottom:30px;
        "
    >
        AI Recommendations
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->recommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>

        <div
            style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                padding:18px 0;
                border-bottom:1px solid rgba(255,255,255,.06);
            "
        >

            <div
                style="
                    display:flex;
                    gap:15px;
                    align-items:flex-start;
                "
            >

                <div
                    style="
                        width:42px;
                        height:42px;
                        min-width:42px;
                        border-radius:12px;
                        background:rgba(139,92,246,.15);
                        display:flex;
                        justify-content:center;
                        align-items:center;
                    "
                >
                    <?php echo e($item['icon']); ?>

                </div>


                <div>

                    <div
                        style="
                            font-weight:600;
                            color:white;
                        "
                    >
                        <?php echo e($item['title']); ?>

                    </div>

                    <div
                        style="
                            color:#94a3b8;
                            font-size:14px;
                            margin-top:4px;
                        "
                    >
                        <?php echo e($item['subtitle']); ?>

                    </div>

                </div>

            </div>


            <div
                style="
                    font-size:22px;
                    color:#94a3b8;
                "
            >
                →
            </div>

        </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

</div>
<!-- TOP PERFORMING CONTENT -->

<div class="dashboard-card" style="margin-top:40px;">

    <div
        style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        "
    >

        <div
            style="
                font-size:28px;
                font-weight:700;
            "
        >
            Top Performing Content
        </div>

        <div
            style="
                color:#8b5cf6;
                font-weight:600;
                cursor:pointer;
            "
        >
            View All
        </div>

    </div>


    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->topPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>

        <div
            style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                padding:20px 0;
                border-bottom:1px solid rgba(255,255,255,.05);
            "
        >

            <div style="display:flex;gap:18px;align-items:center;">

                <!-- Thumbnail -->
                <div
                    style="
                        width:70px;
                        height:70px;
                        border-radius:16px;
                        background:linear-gradient(
                            135deg,
                            rgba(139,92,246,.2),
                            rgba(6,182,212,.15)
                        );
                    "
                ></div>


                <div>

                    <div
                        style="
                            font-size:20px;
                            font-weight:700;
                            margin-bottom:6px;
                        "
                    >
                        <?php echo e($post->platform); ?>

                    </div>

                    <div style="color:#94a3b8;">
                        <?php echo e(\Illuminate\Support\Str::limit($post->content,50)); ?>

                    </div>

                </div>

            </div>


            <div
                style="
                    color:#10b981;
                    font-weight:700;
                "
            >
                +24%
            </div>

        </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

</div>

    <!-- ANALYTICS -->
<div class="dashboard-card">

    <div
        style="
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            margin-bottom:30px;
        "
    >

        <div>

            <div class="dashboard-label">
                ANALYTICS
            </div>

            <h2 class="dashboard-title">
                Analytics Overview
            </h2>

        </div>

        <div
            style="
                color:#8b5cf6;
                font-weight:700;
                font-size:24px;
            "
        >
            Last 30 Days
        </div>

    </div>


    <!-- GRAPH -->

<div
    style="
        height:260px;
        border-radius:24px;
        padding:25px;
        background:
        linear-gradient(
            180deg,
            rgba(139,92,246,.10),
            rgba(6,182,212,.03)
        );
        position:relative;
        overflow:hidden;
    "
>

    <!-- Grid -->
    <div
        style="
            position:absolute;
            inset:0;
            opacity:.08;
            background-image:
            linear-gradient(rgba(255,255,255,.2) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,.2) 1px, transparent 1px);

            background-size:40px 40px;
        "
    ></div>


    <!-- Fake Chart -->
    <svg
        width="100%"
        height="100%"
        viewBox="0 0 800 250"
        preserveAspectRatio="none"
        style="position:relative;z-index:2;"
    >

        <defs>

            <linearGradient id="chartLine" x1="0" y1="0" x2="1" y2="0">

                <stop offset="0%" stop-color="#8b5cf6"/>

                <stop offset="100%" stop-color="#06b6d4"/>

            </linearGradient>

        </defs>


        <path
            d="
            M0 180
            C100 170,150 90,250 110
            S400 190,500 140
            S650 80,800 40
            "
            fill="none"
            stroke="url(#chartLine)"
            stroke-width="4"
        />

    </svg>

</div>


    <!-- STATS -->

<div
    style="
        display:flex;
        gap:15px;
        margin-top:40px;
        flex-wrap:wrap;
    "
>

    <!-- Revenue -->
    <div
        class="omni-stat-card"
        style="
            flex:1;
            min-width:150px;
        "
    >

        <div style="color:#94a3b8;">
            Revenue
        </div>

        <div
            style="
                font-size:22px;
                font-weight:800;
                margin-top:15px;
                line-height:1.4;
            "
        >
            AED <?php echo e(number_format($this->revenue,0)); ?>

        </div>

    </div>


    <!-- Leads -->
    <div
        class="omni-stat-card"
        style="
            flex:1;
            min-width:120px;
        "
    >

        <div style="color:#94a3b8;">
            Total Leads
        </div>

        <div
            style="
                font-size:28px;
                font-weight:800;
                margin-top:15px;
            "
        >
            <?php echo e(number_format($this->leadsCount)); ?>

        </div>

    </div>


    <!-- Campaigns -->
    <div
        class="omni-stat-card"
        style="
            flex:1;
            min-width:120px;
        "
    >

        <div style="color:#94a3b8;">
            Active Campaigns
        </div>

        <div
            style="
                font-size:28px;
                font-weight:800;
                margin-top:15px;
            "
        >
            <?php echo e(number_format($this->campaignsCount)); ?>

        </div>

    </div>

</div>

</div>   

</div>   


<!-- AI TOOLS -->

<div
    style="
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:20px;
        margin-top:50px;
    "
>

    <!-- AI Content -->
    <div class="dashboard-card">

        <div style="font-size:18px;margin-bottom:18px;">
            ✍️
        </div>

        <div
            style="
                font-size:20px;
                font-weight:700;
                margin-bottom:12px;
            "
        >
            AI Content Generator
        </div>

        <div
            style="
                color:#94a3b8;
                font-size:14px;
                margin-bottom:25px;
            "
        >
            Generate engaging content for social media.
        </div>

        <a
            href="/admin/a-i-studio"
            class="fi-btn fi-btn-color-primary"
            style="width:100%;justify-content:center;"
        >
            Create Content
        </a>

    </div>


    <!-- AI Ads -->
    <div class="dashboard-card">

        <div style="font-size:18px;margin-bottom:18px;">
            📢
        </div>

        <div
            style="
                font-size:20px;
                font-weight:700;
                margin-bottom:12px;
            "
        >
            AI Ad Generator
        </div>

        <div
            style="
                color:#94a3b8;
                font-size:14px;
                margin-bottom:25px;
            "
        >
            Create high-converting advertisements.
        </div>

        <a
            href="/admin/campaigns"
            class="fi-btn fi-btn-color-primary"
            style="width:100%;justify-content:center;"
        >
            Generate Ad
        </a>

    </div>


    <!-- AI Email -->
    <div class="dashboard-card">

        <div style="font-size:18px;margin-bottom:18px;">
            📧
        </div>

        <div
            style="
                font-size:20px;
                font-weight:700;
                margin-bottom:12px;
            "
        >
            AI Email Writer
        </div>

        <div
            style="
                color:#94a3b8;
                font-size:14px;
                margin-bottom:25px;
            "
        >
            Write professional emails instantly.
        </div>

        <a
            href="/admin/a-i-studio"
            class="fi-btn fi-btn-color-primary"
            style="width:100%;justify-content:center;"
        >
            Write Email
        </a>

    </div>


    <!-- AI Video -->
    <div class="dashboard-card">

        <div style="font-size:18px;margin-bottom:18px;">
            🎬
        </div>

        <div
            style="
                font-size:20px;
                font-weight:700;
                margin-bottom:12px;
            "
        >
            AI Video Creator
        </div>

        <div
            style="
                color:#94a3b8;
                font-size:14px;
                margin-bottom:25px;
            "
        >
            Turn ideas into video scripts.
        </div>

        <a
            href="/admin/a-i-studio"
            class="fi-btn fi-btn-color-primary"
            style="width:100%;justify-content:center;"
        >
            Create Video
        </a>

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
<?php /**PATH C:\Projects\omniainexus\resources\views/filament/admin/pages/dashboard.blade.php ENDPATH**/ ?>