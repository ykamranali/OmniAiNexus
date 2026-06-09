<x-filament-panels::page>

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
                Marketing Hub
            </div>

            <h1
                style="
                    font-size:34px;
                    font-weight:800;
                    margin-top:6px;
                "
            >
                Content Calendar
            </h1>

        </div>

        <div
            style="
                color:#10b981;
                font-weight:700;
            "
        >
            Scheduled Content
        </div>

    </div>

    <div
        style="
            display:flex;
            flex-direction:column;
            gap:16px;
        "
    >

        @forelse($posts as $post)

            <div
                style="
                    background:#0f172a;
                    border-radius:18px;
                    padding:18px;
                    border:1px solid rgba(255,255,255,.05);
                "
            >

                <div
                    style="
                        display:flex;
                        justify-content:space-between;
                        align-items:flex-start;
                    "
                >

                    <div style="flex:1;">

                        <div
                            style="
                                font-size:15px;
                                font-weight:700;
                                margin-bottom:6px;
                            "
                        >
                            {{ $post['platform'] }}
                        </div>

                        <div
                            style="
                                color:#cbd5e1;
                                line-height:1.6;
                            "
                        >
                            {{ \Illuminate\Support\Str::limit($post['content'], 120) }}
                        </div>

                    </div>

                    <div
                        style="
                            text-align:right;
                            min-width:180px;
                        "
                    >

                        <div
                            style="
                                color:#94a3b8;
                                font-size:13px;
                            "
                        >
                            Schedule
                        </div>

                        <div
                            style="
                                margin-top:4px;
                                font-weight:600;
                            "
                        >
                            {{ $post['scheduled_at'] ?? 'Not Scheduled' }}
                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div
                style="
                    background:#0f172a;
                    border-radius:18px;
                    padding:50px;
                    text-align:center;
                    color:#94a3b8;
                "
            >
                No social posts found.
                <br><br>
                Create a Social Post and schedule it to see it here.
            </div>

        @endforelse

    </div>

</div>

</x-filament-panels::page>
