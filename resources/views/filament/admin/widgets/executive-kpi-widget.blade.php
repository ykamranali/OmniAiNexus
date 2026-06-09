<x-filament-widgets::widget>

<div
    style="
        background:linear-gradient(
            135deg,
            rgba(99,102,241,.20),
            rgba(139,92,246,.15)
        );
        border:1px solid rgba(139,92,246,.20);
        border-radius:28px;
        padding:32px;
        overflow:hidden;
    "
>

    <div
        style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        "
    >

        <div>
            <div
                style="
                    color:#94a3b8;
                    font-size:13px;
                    letter-spacing:1px;
                    text-transform:uppercase;
                "
            >
                Business Performance
            </div>

            <div
                style="
                    font-size:30px;
                    font-weight:800;
                    margin-top:6px;
                "
            >
                Executive KPI Overview
            </div>
        </div>

        <div
            style="
                padding:10px 18px;
                background:rgba(16,185,129,.15);
                border:1px solid rgba(16,185,129,.25);
                border-radius:999px;
                color:#10b981;
                font-weight:700;
            "
        >
            ● Live Data
        </div>

    </div>

    <div
        style="
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:30px;
        "
    >

        <div>
            <div
                style="
                    font-size:42px;
                    font-weight:900;
                    color:#10b981;
                "
            >
                AED {{ $revenue }}
            </div>

            <div style="color:#94a3b8;">
                Revenue Generated
            </div>
        </div>

        <div>
            <div
                style="
                    font-size:42px;
                    font-weight:900;
                    color:#60a5fa;
                "
            >
                AED {{ $pipeline }}
            </div>

            <div style="color:#94a3b8;">
                Pipeline Value
            </div>
        </div>

        <div>
            <div
                style="
                    font-size:42px;
                    font-weight:900;
                    color:#a78bfa;
                "
            >
                {{ $wonDeals }}
            </div>

            <div style="color:#94a3b8;">
                Won Deals
            </div>
        </div>

        <div>
            <div
                style="
                    font-size:42px;
                    font-weight:900;
                    color:#f59e0b;
                "
            >
                {{ $conversionRate }}%
            </div>

            <div style="color:#94a3b8;">
                Conversion Rate
            </div>
        </div>

    </div>

    <div
        style="
            margin-top:28px;
            height:6px;
            background:rgba(255,255,255,.05);
            border-radius:999px;
            overflow:hidden;
        "
    >
        <div
            style="
                width:78%;
                height:100%;
                background:linear-gradient(
                    90deg,
                    #06b6d4,
                    #8b5cf6
                );
            "
        ></div>
    </div>

</div>

</x-filament-widgets::widget>
