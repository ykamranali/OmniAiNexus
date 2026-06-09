<x-filament-panels::page>

<div
    style="
        background:linear-gradient(
            135deg,
            rgba(99,102,241,.20),
            rgba(139,92,246,.12)
        );
        border-radius:24px;
        padding:32px;
        border:1px solid rgba(139,92,246,.20);
        margin-bottom:24px;
    "
>
    <div>
        <div style="color:#94a3b8;font-size:14px;">
            OmniAI Nexus
        </div>

        <h1 style="
            font-size:38px;
            font-weight:800;
            margin-top:8px;
        ">
            AI Marketing Studio
        </h1>

        <div style="
            color:#94a3b8;
            margin-top:10px;
        ">
            Generate AI-powered social content for your campaigns.
        </div>
    </div>
</div>

<div
    style="
        display:grid;
        grid-template-columns:2fr 1fr;
        gap:24px;
    "
>

    <div class="fi-section p-6">

        <h2 style="
            font-size:22px;
            font-weight:700;
            margin-bottom:20px;
        ">
            Content Generator
        </h2>

        <div style="
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:16px;
        ">

            <div>
                <label>Campaign</label>

                <select
                    wire:model="campaignId"
                    class="fi-input"
                    style="width:100%;"
                >
                    <option value="">
                        Select Campaign
                    </option>

                    @foreach($this->campaigns as $campaign)
                        <option value="{{ $campaign->id }}">
                            {{ $campaign->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label>Platform</label>

                <select
                    wire:model="platform"
                    class="fi-input"
                    style="width:100%;"
                >
                    <option value="LinkedIn">LinkedIn</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Twitter/X">Twitter/X</option>
                    <option value="TikTok">TikTok</option>
                    <option value="YouTube">YouTube</option>
                </select>
            </div>

            <div>
                <label>Topic</label>

                <input
                    wire:model="topic"
                    type="text"
                    class="fi-input"
                    style="width:100%;"
                    placeholder="AI Automation"
                >
            </div>

            <div>
                <label>Tone</label>

                <select
                    wire:model="tone"
                    class="fi-input"
                    style="width:100%;"
                >
                    <option value="Professional">
                        Professional
                    </option>

                    <option value="Friendly">
                        Friendly
                    </option>

                    <option value="Technical">
                        Technical
                    </option>

                    <option value="Corporate">
                        Corporate
                    </option>
                </select>
            </div>

        </div>

        <div
    style="
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:16px;
        margin-top:24px;
    "
>

<div
    style="
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
        margin-top:24px;
    "
>

<div>

    <label
        style="
            display:block;
            margin-bottom:10px;
            font-weight:600;
        "
    >
        Upload Image
    </label>

    <input
        type="file"
        wire:model="image"
        style="
            width:100%;
            padding:14px;
            background:#0f172a;
            border:1px solid rgba(255,255,255,.08);
            border-radius:16px;
            color:white;
        "
    >

</div>

<div>

    <label
        style="
            display:block;
            margin-bottom:10px;
            font-weight:600;
        "
    >
        Schedule Date
    </label>

    <input
        type="datetime-local"
        wire:model="scheduledAt"
        style="
            width:100%;
            padding:14px;
            background:#0f172a;
            border:1px solid rgba(255,255,255,.08);
            border-radius:16px;
            color:white;
        "
    >

</div>

</div>

<div
    style="
        display:flex;
        gap:14px;
        flex-wrap:wrap;
        margin-top:30px;
    "
>

<button
    wire:click="generateContent"
    style="
        background:linear-gradient(
            135deg,
            #8b5cf6,
            #6366f1
        );
        color:white;
        border:none;
        padding:14px 28px;
        border-radius:16px;
        font-weight:700;
        cursor:pointer;
        box-shadow:
            0 10px 25px rgba(139,92,246,.35);
    "
>
    ✨ Generate AI Content
</button>


<button
    wire:click="saveAsDraft"
    style="
        background:linear-gradient(
            135deg,
            #10b981,
            #059669
        );
        color:white;
        border:none;
        padding:14px 28px;
        border-radius:16px;
        font-weight:700;
        cursor:pointer;
        box-shadow:
            0 10px 25px rgba(16,185,129,.35);
    "
>
    💾 Save Draft
</button>


<button
    wire:click="clearContent"
    style="
        background:linear-gradient(
            135deg,
            #475569,
            #334155
        );
        color:white;
        border:none;
        padding:14px 28px;
        border-radius:16px;
        font-weight:700;
        cursor:pointer;
    "
>
    🗑 Clear
</button>

</div>

</div>

    </div>

    <div class="fi-section p-6">

        <h2 style="
            font-size:22px;
            font-weight:700;
            margin-bottom:20px;
        ">
            AI Insights
        </h2>

        <div style="
            display:flex;
            flex-direction:column;
            gap:12px;
        ">

            <div class="fi-section p-3">
                AI Automation
            </div>

            <div class="fi-section p-3">
                Digital Transformation
            </div>

            <div class="fi-section p-3">
                CRM Growth
            </div>

            <div class="fi-section p-3">
                Generative AI
            </div>

            <div class="fi-section p-3">
                Customer Experience
            </div>

        </div>

    </div>

</div>

<div
    class="fi-section p-6"
    style="margin-top:24px;"
>

    <h2 style="
        font-size:22px;
        font-weight:700;
        margin-bottom:20px;
    ">
        Generated Content
    </h2>

    @if($generatedContent)
    @if($image)

<div style="margin-bottom:20px;">

    <img
        src="{{ $image->temporaryUrl() }}"
        style="
            max-width:300px;
            border-radius:16px;
        "
    >

</div>

@endif


        <div
            style="
                white-space:pre-wrap;
                line-height:1.8;
                padding:24px;
                background:rgba(99,102,241,.06);
                border-radius:16px;
            "
        >
            {{ $generatedContent }}
        </div>

    @else

        <div style="
            color:#94a3b8;
            text-align:center;
            padding:60px;
        ">
            AI generated content will appear here.
        </div>

    @endif

</div>

</x-filament-panels::page>
