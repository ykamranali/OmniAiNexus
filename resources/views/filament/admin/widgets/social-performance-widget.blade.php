<x-filament-widgets::widget>

<div
    style="
        background:
            linear-gradient(
                135deg,
                rgba(139,92,246,.12),
                rgba(6,182,212,.06)
            );

        border-radius:24px;
        padding:30px;
        border:1px solid rgba(139,92,246,.18);
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
                Social Performance Center
            </h2>

            <div
                style="
                    color:#94a3b8;
                    margin-top:6px;
                "
            >
                Social media growth and publishing overview
            </div>

        </div>

        <div
            style="
                font-size:48px;
            "
        >
            🚀
        </div>

    </div>

    <div
        style="
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        "
    >

        <div
            style="
                background:rgba(255,255,255,.04);
                border-radius:18px;
                padding:24px;
                text-align:center;
            "
        >
            <div
                style="
                    color:#94a3b8;
                    margin-bottom:10px;
                "
            >
                Connected Accounts
            </div>

            <div
                style="
                    font-size:42px;
                    font-weight:800;
                    color:#8b5cf6;
                "
            >
                {{ $accounts }}
            </div>
        </div>

        <div
            style="
                background:rgba(255,255,255,.04);
                border-radius:18px;
                padding:24px;
                text-align:center;
            "
        >
            <div
                style="
                    color:#94a3b8;
                    margin-bottom:10px;
                "
            >
                Total Posts
            </div>

            <div
                style="
                    font-size:42px;
                    font-weight:800;
                    color:#06b6d4;
                "
            >
                {{ $posts }}
            </div>
        </div>

        <div
            style="
                background:rgba(255,255,255,.04);
                border-radius:18px;
                padding:24px;
                text-align:center;
            "
        >
            <div
                style="
                    color:#94a3b8;
                    margin-bottom:10px;
                "
            >
                Published Content
            </div>

            <div
                style="
                    font-size:42px;
                    font-weight:800;
                    color:#10b981;
                "
            >
                {{ $published }}
            </div>
        </div>

    </div>

</div>

</x-filament-widgets::widget>
