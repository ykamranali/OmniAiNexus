<x-filament-widgets::widget>

<div style="display:flex;flex-direction:column;gap:24px;">

    {{-- HERO --}}

    <div
        style="
            background:linear-gradient(135deg,#7c3aed,#6366f1,#0ea5e9);
            border-radius:28px;
            padding:48px;
            color:white;
            position:relative;
            overflow:hidden;
            box-shadow:0 20px 60px rgba(124,58,237,.25);
        "
    >

        <div
            style="
                position:absolute;
                top:-80px;
                right:-80px;
                width:250px;
                height:250px;
                border-radius:999px;
                background:rgba(255,255,255,.08);
            "
        ></div>

        <div
            style="
                position:absolute;
                bottom:-100px;
                left:-100px;
                width:300px;
                height:300px;
                border-radius:999px;
                background:rgba(255,255,255,.05);
            "
        ></div>

        <div
            style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                position:relative;
                z-index:2;
            "
        >

            <div>

                <div
                    style="
                        text-transform:uppercase;
                        letter-spacing:2px;
                        opacity:.8;
                        font-size:13px;
                    "
                >
                    AI Marketing Intelligence Platform
                </div>

                <h1
                    style="
                        font-size:56px;
                        font-weight:900;
                        line-height:1.05;
                        margin-top:12px;
                        margin-bottom:0;
                    "
                >
                    OmniAI Nexus
                </h1>

                <div
                    style="
                        margin-top:12px;
                        font-size:18px;
                        opacity:.95;
                    "
                >
                    Your All-In-One AI Growth Operating System
                </div>

                <div
                    style="
                        margin-top:18px;
                        opacity:.85;
                        font-size:15px;
                    "
                >
                    CRM • AI Content • Social Media • Analytics • Automation
                </div>

            </div>

            <div>

                <div
                    style="
                        background:rgba(255,255,255,.12);
                        backdrop-filter:blur(10px);
                        border-radius:20px;
                        padding:20px 28px;
                        text-align:center;
                        min-width:180px;
                    "
                >
                    <div style="font-size:13px;">
                        Conversion Rate
                    </div>

                    <div
                        style="
                            font-size:36px;
                            font-weight:800;
                            margin-top:6px;
                        "
                    >
                        {{ $conversionRate }}%
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- KPI ROW --}}

    <div
        style="
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:20px;
        "
    >

        <div class="fi-section p-6">
            <div style="color:#94a3b8;">Won Revenue</div>
            <div style="font-size:32px;font-weight:800;margin-top:8px;">
                AED {{ number_format($revenue, 0) }}
            </div>
        </div>

        <div class="fi-section p-6">
            <div style="color:#94a3b8;">Pipeline Value</div>
            <div style="font-size:32px;font-weight:800;margin-top:8px;">
                AED {{ number_format($pipeline, 0) }}
            </div>
        </div>

        <div class="fi-section p-6">
            <div style="color:#94a3b8;">Active Leads</div>
            <div style="font-size:32px;font-weight:800;margin-top:8px;">
                {{ $leads }}
            </div>
        </div>

        <div class="fi-section p-6">
            <div style="color:#94a3b8;">Open Tasks</div>
            <div style="font-size:32px;font-weight:800;margin-top:8px;">
                {{ $tasks }}
            </div>
        </div>

    </div>

    {{-- AI CENTER + HEALTH SCORE --}}

    <div
        style="
            display:grid;
            grid-template-columns:2fr 1fr;
            gap:20px;
        "
    >

        <div class="fi-section p-6">

            <h2
                style="
                    font-size:22px;
                    font-weight:700;
                    margin-bottom:20px;
                "
            >
                AI Intelligence Center
            </h2>

            <div
                style="
                    display:grid;
                    grid-template-columns:repeat(2,1fr);
                    gap:16px;
                "
            >

                <div style="padding:18px;border-radius:16px;background:rgba(139,92,246,.08);">
                    <div style="color:#94a3b8;">AI Generations</div>
                    <div style="font-size:34px;font-weight:700;color:#8b5cf6;">
                        {{ $aiGenerations }}
                    </div>
                </div>

                <div style="padding:18px;border-radius:16px;background:rgba(59,130,246,.08);">
                    <div style="color:#94a3b8;">Social Accounts</div>
                    <div style="font-size:34px;font-weight:700;color:#3b82f6;">
                        {{ $socialAccounts }}
                    </div>
                </div>

                <div style="padding:18px;border-radius:16px;background:rgba(16,185,129,.08);">
                    <div style="color:#94a3b8;">Published Posts</div>
                    <div style="font-size:34px;font-weight:700;color:#10b981;">
                        {{ $publishedPosts ?? 0 }}
                    </div>
                </div>

                <div style="padding:18px;border-radius:16px;background:rgba(245,158,11,.08);">
                    <div style="color:#94a3b8;">Scheduled Posts</div>
                    <div style="font-size:34px;font-weight:700;color:#f59e0b;">
                        {{ $scheduledPosts ?? 0 }}
                    </div>
                </div>

            </div>

        </div>

        <div class="fi-section p-6">

            <h2
                style="
                    font-size:22px;
                    font-weight:700;
                    margin-bottom:20px;
                "
            >
                AI Health Score
            </h2>

            <div
                style="
                    text-align:center;
                    padding:20px;
                "
            >

                <div
                    style="
                        font-size:72px;
                        font-weight:900;
                        color:#8b5cf6;
                    "
                >
                    {{ $healthScore ?? 0 }}
                </div>

                <div style="color:#94a3b8;">
                    Platform Health
                </div>

                <div
                    style="
                        margin-top:18px;
                        height:10px;
                        border-radius:999px;
                        background:#1e293b;
                        overflow:hidden;
                    "
                >
                    <div
                        style="
                            width:{{ $healthScore ?? 0 }}%;
                            height:100%;
                            background:linear-gradient(90deg,#8b5cf6,#06b6d4);
                        "
                    ></div>
                </div>

            </div>

        </div>

    </div>

    {{-- RECENT DEALS --}}

    <div class="fi-section p-6">

        <h2
            style="
                font-size:22px;
                font-weight:700;
                margin-bottom:20px;
            "
        >
            Recent Deals
        </h2>

        <table style="width:100%;">

            <thead>
                <tr>
                    <th align="left">Deal</th>
                    <th align="left">Stage</th>
                    <th align="left">Amount</th>
                </tr>
            </thead>

            <tbody>

            @foreach($recentDeals as $deal)

                <tr>
                    <td style="padding:12px 0;">
                        {{ $deal->title }}
                    </td>

                    <td>
                        {{ $deal->stage }}
                    </td>

                    <td>
                        AED {{ number_format($deal->amount, 2) }}
                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-filament-widgets::widget>
