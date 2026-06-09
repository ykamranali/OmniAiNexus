<x-filament-widgets::widget>

<div
    style="
        background:
            linear-gradient(
                135deg,
                rgba(139,92,246,.15),
                rgba(6,182,212,.08)
            );

        border-radius:24px;
        padding:28px;
        border:1px solid rgba(139,92,246,.15);
        height:100%;
    "
>

    <div
        style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        "
    >

        <div>

            <h2
                style="
                    font-size:24px;
                    font-weight:800;
                    margin:0;
                "
            >
                AI Command Center
            </h2>

            <div
                style="
                    color:#94a3b8;
                    margin-top:6px;
                "
            >
                Real-time platform intelligence
            </div>

        </div>

        <div
            style="
                font-size:42px;
            "
        >
            🧠
        </div>

    </div>

    <div
        style="
            text-align:center;
            margin-bottom:30px;
        "
    >

        <div
            style="
                width:140px;
                height:140px;
                margin:auto;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                background:
                    radial-gradient(
                        circle,
                        rgba(139,92,246,.30),
                        rgba(6,182,212,.10)
                    );

                border:3px solid rgba(139,92,246,.25);
            "
        >

            <div>

                <div
                    style="
                        font-size:54px;
                        font-weight:800;
                        color:white;
                        line-height:1;
                    "
                >
                    {{ $score }}
                </div>

                <div
                    style="
                        font-size:12px;
                        color:#94a3b8;
                        margin-top:6px;
                    "
                >
                    AI SCORE
                </div>

            </div>

        </div>

    </div>

    <div
        style="
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:15px;
        "
    >

        <div
            style="
                background:rgba(255,255,255,.04);
                padding:18px;
                border-radius:16px;
            "
        >
            <div style="color:#94a3b8;">
                Leads
            </div>

            <div
                style="
                    font-size:28px;
                    font-weight:800;
                "
            >
                {{ $leads }}
            </div>
        </div>

        <div
            style="
                background:rgba(255,255,255,.04);
                padding:18px;
                border-radius:16px;
            "
        >
            <div style="color:#94a3b8;">
                Tasks
            </div>

            <div
                style="
                    font-size:28px;
                    font-weight:800;
                "
            >
                {{ $tasks }}
            </div>
        </div>

        <div
            style="
                background:rgba(255,255,255,.04);
                padding:18px;
                border-radius:16px;
            "
        >
            <div style="color:#94a3b8;">
                AI Content
            </div>

            <div
                style="
                    font-size:28px;
                    font-weight:800;
                "
            >
                {{ $aiContent }}
            </div>
        </div>

        <div
            style="
                background:rgba(255,255,255,.04);
                padding:18px;
                border-radius:16px;
            "
        >
            <div style="color:#94a3b8;">
                Won Deals
            </div>

            <div
                style="
                    font-size:28px;
                    font-weight:800;
                    color:#10b981;
                "
            >
                {{ $wonDeals }}
            </div>
        </div>

    </div>

    <div
        style="
            margin-top:24px;
        "
    >

        <div
            style="
                display:flex;
                justify-content:space-between;
                margin-bottom:8px;
                color:#94a3b8;
                font-size:13px;
            "
        >
            <span>System Performance</span>
            <span>{{ $score }}%</span>
        </div>

        <div
            style="
                height:10px;
                border-radius:999px;
                background:rgba(255,255,255,.06);
                overflow:hidden;
            "
        >
            <div
                style="
                    width:{{ $score }}%;
                    height:100%;
                    background:
                        linear-gradient(
                            90deg,
                            #8b5cf6,
                            #06b6d4
                        );
                "
            ></div>
        </div>

    </div>

</div>

</x-filament-widgets::widget>
