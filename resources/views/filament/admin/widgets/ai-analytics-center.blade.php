<x-filament-widgets::widget>

<div style="
    background:
        linear-gradient(
            135deg,
            rgba(99,102,241,.25),
            rgba(139,92,246,.18)
        );

    border-radius:28px;
    padding:40px;
    border:1px solid rgba(139,92,246,.25);
    overflow:hidden;
">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
    ">

        <div>

            <div style="
                color:#94a3b8;
                font-size:14px;
                margin-bottom:8px;
                text-transform:uppercase;
                letter-spacing:1px;
            ">
                Executive Command Center
            </div>

            <h1 style="
                font-size:44px;
                font-weight:900;
                margin:0;
            ">
                OmniAI Nexus
            </h1>

            <div style="
                color:#94a3b8;
                margin-top:10px;
                font-size:15px;
            ">
                AI Powered CRM • Marketing • Automation • Analytics
            </div>

        </div>

        <div style="
            font-size:72px;
            opacity:.9;
        ">
            🧠
        </div>

    </div>

    <!-- KPI CARDS -->

    <div style="
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:20px;
        margin-bottom:25px;
    ">

        <div class="fi-section p-4">
            <div style="color:#94a3b8;">Active Leads</div>
            <div style="font-size:38px;font-weight:800;">
                {{ $leads }}
            </div>
        </div>

        <div class="fi-section p-4">
            <div style="color:#94a3b8;">Open Deals</div>
            <div style="font-size:38px;font-weight:800;">
                {{ $deals }}
            </div>
        </div>

        <div class="fi-section p-4">
            <div style="color:#94a3b8;">AI Content</div>
            <div style="font-size:38px;font-weight:800;">
                {{ $aiContent }}
            </div>
        </div>

        <div class="fi-section p-4">
            <div style="color:#94a3b8;">System Status</div>
            <div style="
                font-size:24px;
                font-weight:800;
                color:#10b981;
            ">
                Online
            </div>
        </div>

    </div>

    <!-- QUICK ACTIONS -->

    <!-- QUICK ACTIONS -->

<div style="
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:15px;
">

    <a
        href="/admin/leads/create"
        style="
            text-decoration:none;
            color:inherit;
        "
    >
        <div class="fi-section p-4" style="text-align:center;">
            <div style="font-size:28px;">👤</div>
            <div style="margin-top:10px;font-weight:700;">
                New Lead
            </div>
        </div>
    </a>

    <a
        href="/admin/deals/create"
        style="
            text-decoration:none;
            color:inherit;
        "
    >
        <div class="fi-section p-4" style="text-align:center;">
            <div style="font-size:28px;">💼</div>
            <div style="margin-top:10px;font-weight:700;">
                New Deal
            </div>
        </div>
    </a>

    <a
        href="/admin/ai-studio"
        style="
            text-decoration:none;
            color:inherit;
        "
    >
        <div class="fi-section p-4" style="text-align:center;">
            <div style="font-size:28px;">🤖</div>
            <div style="margin-top:10px;font-weight:700;">
                Generate Content
            </div>
        </div>
    </a>

    <a
        href="/admin/social-posts/create"
        style="
            text-decoration:none;
            color:inherit;
        "
    >
        <div class="fi-section p-4" style="text-align:center;">
            <div style="font-size:28px;">📢</div>
            <div style="margin-top:10px;font-weight:700;">
                Create Campaign
            </div>
        </div>
    </a>

</div>

</x-filament-widgets::widget>
