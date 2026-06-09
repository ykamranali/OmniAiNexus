<x-filament-panels::page>

<div
    style="
        background:linear-gradient(
            135deg,
            rgba(99,102,241,.20),
            rgba(139,92,246,.15)
        );
        border-radius:28px;
        padding:32px;
        border:1px solid rgba(139,92,246,.20);
    "
>

    <h1
        style="
            font-size:36px;
            font-weight:800;
            margin-bottom:10px;
        "
    >
        OmniAI Assistant
    </h1>

    <p
        style="
            color:#94a3b8;
            margin-bottom:30px;
        "
    >
        Your AI business copilot for CRM, Sales, Marketing and Analytics.
    </p>

    <textarea
        wire:model="question"
        rows="5"
        style="
            width:100%;
            padding:16px;
            border-radius:16px;
            background:#111827;
            border:1px solid rgba(255,255,255,.08);
        "
        placeholder="Ask OmniAI anything..."
    ></textarea>

    <div style="margin-top:20px;">

        <x-filament::button
            wire:click="ask"
            color="primary"
        >
            Ask OmniAI
        </x-filament::button>

    </div>

    @if($answer)

        <div
            style="
                margin-top:30px;
                background:#111827;
                border-radius:20px;
                padding:24px;
                border:1px solid rgba(255,255,255,.06);
            "
        >

            <h3
                style="
                    font-size:20px;
                    font-weight:700;
                    margin-bottom:15px;
                "
            >
                AI Response
            </h3>

            <div style="white-space:pre-wrap;">
                {{ $answer }}
            </div>

        </div>

    @endif

</div>

</x-filament-panels::page>
