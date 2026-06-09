<x-filament-widgets::widget>

<div
    style="
        background:#111827;
        border-radius:24px;
        padding:28px;
        border:1px solid rgba(255,255,255,.06);
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

            <div
                style="
                    color:#94a3b8;
                    font-size:13px;
                    text-transform:uppercase;
                    letter-spacing:1px;
                "
            >
                Live Activity
            </div>

            <h2
                style="
                    font-size:28px;
                    font-weight:800;
                    margin-top:6px;
                "
            >
                Activity Timeline
            </h2>

        </div>

        <div
            style="
                color:#10b981;
                font-size:14px;
                font-weight:700;
            "
        >
            ● Live
        </div>

    </div>

    <div style="display:flex;flex-direction:column;gap:14px;">

        @forelse($this->getActivities() as $activity)

            <div
                style="
                    display:flex;
                    gap:18px;
                    align-items:flex-start;
                    padding:18px;
                    border-radius:18px;
                    background:rgba(99,102,241,.05);
                    border:1px solid rgba(99,102,241,.10);
                "
            >

                <div
                    style="
                        width:42px;
                        height:42px;
                        border-radius:999px;
                        background:linear-gradient(
                            135deg,
                            #8b5cf6,
                            #6366f1
                        );
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:18px;
                        flex-shrink:0;
                    "
                >
                    ⚡
                </div>

                <div style="flex:1;">

                    <div
                        style="
                            font-size:15px;
                            font-weight:700;
                            margin-bottom:4px;
                        "
                    >
                        {{ $activity->description }}
                    </div>

                    <div
                        style="
                            color:#94a3b8;
                            font-size:13px;
                        "
                    >
                        {{ $activity->created_at->diffForHumans() }}
                    </div>

                </div>

            </div>

        @empty

            <div
                style="
                    padding:40px;
                    text-align:center;
                    color:#94a3b8;
                "
            >
                No activity available yet.
            </div>

        @endforelse

    </div>

</div>

</x-filament-widgets::widget>
