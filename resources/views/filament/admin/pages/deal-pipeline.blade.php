<x-filament-panels::page>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">

        {{-- New --}}
        <div class="bg-gray-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                New ({{ $this->newDeals->count() }})
            </h2>

            @foreach ($this->newDeals as $deal)
                <a href="{{ route('filament.admin.resources.deals.view', $deal) }}"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold">
                        {{ $deal->title }}
                    </div>

                    <div class="text-sm text-green-600">
                        AED {{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: {{ $deal->lead?->name ?? 'No Lead' }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Close: {{ $deal->expected_close_date?->format('d M Y') ?? 'N/A' }}
                    </div>

                </a>
            @endforeach
        </div>

        {{-- Qualified --}}
        <div class="bg-blue-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Qualified ({{ $this->qualifiedDeals->count() }})
            </h2>

            @foreach ($this->qualifiedDeals as $deal)
                <a href="{{ route('filament.admin.resources.deals.view', $deal) }}"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold">{{ $deal->title }}</div>

                    <div class="text-sm text-green-600">
                        AED {{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: {{ $deal->lead?->name ?? 'No Lead' }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Close: {{ $deal->expected_close_date?->format('d M Y') ?? 'N/A' }}
                    </div>

                </a>
            @endforeach
        </div>

        {{-- Proposal --}}
        <div class="bg-yellow-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Proposal ({{ $this->proposalDeals->count() }})
            </h2>

            @foreach ($this->proposalDeals as $deal)
                <a href="{{ route('filament.admin.resources.deals.view', $deal) }}"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold">{{ $deal->title }}</div>

                    <div class="text-sm text-green-600">
                        AED {{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: {{ $deal->lead?->name ?? 'No Lead' }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Close: {{ $deal->expected_close_date?->format('d M Y') ?? 'N/A' }}
                    </div>

                </a>
            @endforeach
        </div>

        {{-- Negotiation --}}
        <div class="bg-purple-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Negotiation ({{ $this->negotiationDeals->count() }})
            </h2>

            @foreach ($this->negotiationDeals as $deal)
                <a href="{{ route('filament.admin.resources.deals.view', $deal) }}"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold">{{ $deal->title }}</div>

                    <div class="text-sm text-green-600">
                        AED {{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: {{ $deal->lead?->name ?? 'No Lead' }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Close: {{ $deal->expected_close_date?->format('d M Y') ?? 'N/A' }}
                    </div>

                </a>
            @endforeach
        </div>

        {{-- Won --}}
        <div class="bg-green-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Won ({{ $this->wonDeals->count() }})
            </h2>

            @foreach ($this->wonDeals as $deal)
                <a href="{{ route('filament.admin.resources.deals.view', $deal) }}"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold">{{ $deal->title }}</div>

                    <div class="text-sm text-green-600">
                        AED {{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: {{ $deal->lead?->name ?? 'No Lead' }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Close: {{ $deal->expected_close_date?->format('d M Y') ?? 'N/A' }}
                    </div>

                </a>
            @endforeach
        </div>

        {{-- Lost --}}
        <div class="bg-red-100 rounded-xl p-4 min-h-[500px]">
            <h2 class="font-bold text-lg mb-4">
                Lost ({{ $this->lostDeals->count() }})
            </h2>

            @foreach ($this->lostDeals as $deal)
                <a href="{{ route('filament.admin.resources.deals.view', $deal) }}"
                   class="block bg-white rounded-lg p-3 mb-3 shadow hover:shadow-lg transition">

                    <div class="font-semibold">{{ $deal->title }}</div>

                    <div class="text-sm text-green-600">
                        AED {{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Lead: {{ $deal->lead?->name ?? 'No Lead' }}
                    </div>

                    <div class="text-xs text-gray-500">
                        Close: {{ $deal->expected_close_date?->format('d M Y') ?? 'N/A' }}
                    </div>

                </a>
            @endforeach
        </div>

    </div>

</x-filament-panels::page>
