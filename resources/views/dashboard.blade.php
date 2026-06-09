<x-filament-panels::page>
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
            {{ auth()->user()->name }} 👋
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
            ${{ number_format($this->revenue,2) }}
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
            {{ $this->leadsCount }}
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
            {{ $this->campaignsCount }}
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
            {{ $this->aiCount }}
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
                    {{ number_format($this->instagramFollowers) }}
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
                    {{ number_format($this->tikTokFollowers) }}
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
                    {{ number_format($this->youtubeFollowers) }}
                </div>

            </div>

        </div>

    </div>


    <!-- CENTER -->
    <div class="brain-center">

        <img
            src="{{ asset('images/brain.png') }}"
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
                {{ number_format($this->facebookFollowers) }}
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
                {{ number_format($this->xFollowers) }}
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
                {{ number_format($this->linkedinFollowers) }}
            </div>

        </div>

        <div class="social-card">
            <i class="fa-brands fa-linkedin-in social-icon"></i>
        </div>

    </div>

</div> {{-- END social-right --}}

</div> {{-- END nexus-center --}}
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


    <!-- Recommendation 1 -->

    <div
        style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 0;
            border-bottom:1px solid rgba(255,255,255,.06);
        "
    >

        <div style="display:flex;gap:15px;align-items:flex-start;">

            <div
                style="
                    width:42px;
                    height:42px;
                    border-radius:12px;
                    background:rgba(59,130,246,.15);
                    display:flex;
                    justify-content:center;
                    align-items:center;
                "
            >
                🎵
            </div>

            <div>

                <div style="font-weight:600;">
                    Increase budget on TikTok
                </div>

                <div
                    style="
                        color:#94a3b8;
                        font-size:14px;
                        margin-top:4px;
                    "
                >
                    Potential Reach +32%
                </div>

            </div>

        </div>

        <div style="font-size:22px;color:#94a3b8;">
            →
        </div>

    </div>


    <!-- Recommendation 2 -->

    <div
        style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 0;
            border-bottom:1px solid rgba(255,255,255,.06);
        "
    >

        <div style="display:flex;gap:15px;align-items:flex-start;">

            <div
                style="
                    width:42px;
                    height:42px;
                    border-radius:12px;
                    background:rgba(139,92,246,.15);
                    display:flex;
                    justify-content:center;
                    align-items:center;
                "
            >
                ⏰
            </div>

            <div>

                <div style="font-weight:600;">
                    Best posting time
                </div>

                <div
                    style="
                        color:#94a3b8;
                        font-size:14px;
                        margin-top:4px;
                    "
                >
                    Today, 7:00 PM
                </div>

            </div>

        </div>

        <div style="font-size:22px;color:#94a3b8;">
            →
        </div>

    </div>


    <!-- Recommendation 3 -->

    <div
        style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 0;
            border-bottom:1px solid rgba(255,255,255,.06);
        "
    >

        <div style="display:flex;gap:15px;align-items:flex-start;">

            <div
                style="
                    width:42px;
                    height:42px;
                    border-radius:12px;
                    background:rgba(245,158,11,.15);
                    display:flex;
                    justify-content:center;
                    align-items:center;
                "
            >
                📹
            </div>

            <div>

                <div style="font-weight:600;">
                    Create more reels content
                </div>

                <div
                    style="
                        color:#94a3b8;
                        font-size:14px;
                        margin-top:4px;
                    "
                >
                    Engagement +25%
                </div>

            </div>

        </div>

        <div style="font-size:22px;color:#94a3b8;">
            →
        </div>

    </div>


    <!-- Recommendation 4 -->

    <div
        style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 0;
        "
    >

        <div style="display:flex;gap:15px;align-items:flex-start;">

            <div
                style="
                    width:42px;
                    height:42px;
                    border-radius:12px;
                    background:rgba(249,115,22,.15);
                    display:flex;
                    justify-content:center;
                    align-items:center;
                "
            >
                👥
            </div>

            <div>

                <div style="font-weight:600;">
                    Target similar audience
                </div>

                <div
                    style="
                        color:#94a3b8;
                        font-size:14px;
                        margin-top:4px;
                    "
                >
                    Lookalike 2.4%
                </div>

            </div>

        </div>

        <div style="font-size:22px;color:#94a3b8;">
            →
        </div>

    </div>

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


    @foreach($this->topPosts as $post)

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
                        {{ $post->platform }}
                    </div>

                    <div style="color:#94a3b8;">
                        {{ \Illuminate\Support\Str::limit($post->content,50) }}
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

    @endforeach

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
            background:
            linear-gradient(
                180deg,
                rgba(139,92,246,.12),
                rgba(6,182,212,.03)
            );

            display:flex;
            justify-content:center;
            align-items:center;

            color:#94a3b8;
            text-align:center;
            padding:20px;
        "
    >

        Revenue Growth • Lead Conversion • Campaign Performance

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
            AED {{ number_format($this->revenue,0) }}
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
            {{ number_format($this->leadsCount) }}
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
            {{ number_format($this->campaignsCount) }}
        </div>

    </div>

</div>

</div>   {{-- END ANALYTICS CARD --}}

</div>   {{-- END BOTTOM DASHBOARD --}}


<!-- AI TOOLS -->

<div
    style="
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:20px;
        margin-top:50px;
        width:100%;
    "
>

    <div class="omni-stat-card" style="padding:35px;">
        <div style="font-size:28px;margin-bottom:20px;">✍️</div>

        <div style="font-size:22px;font-weight:700;">
            AI Content Generator
        </div>

        <div style="color:#94a3b8;margin-top:15px;">
            Generate engaging social media content.
        </div>
    </div>


    <div class="omni-stat-card" style="padding:35px;">
        <div style="font-size:28px;margin-bottom:20px;">📢</div>

        <div style="font-size:22px;font-weight:700;">
            AI Ad Generator
        </div>

        <div style="color:#94a3b8;margin-top:15px;">
            Create high-converting advertisements.
        </div>
    </div>


    <div class="omni-stat-card" style="padding:35px;">
        <div style="font-size:28px;margin-bottom:20px;">📧</div>

        <div style="font-size:22px;font-weight:700;">
            AI Email Writer
        </div>

        <div style="color:#94a3b8;margin-top:15px;">
            Generate professional emails instantly.
        </div>
    </div>


    <div class="omni-stat-card" style="padding:35px;">
        <div style="font-size:28px;margin-bottom:20px;">🎬</div>

        <div style="font-size:22px;font-weight:700;">
            AI Video Creator
        </div>

        <div style="color:#94a3b8;margin-top:15px;">
            Turn ideas into video scripts.
        </div>
    </div>

</div>

</x-filament-panels::page>
