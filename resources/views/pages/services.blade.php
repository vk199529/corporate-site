@extends('layouts.app')

@section('content')

{{-- ✅ HERO ALWAYS TOP --}}
@foreach($page->content ?? [] as $block)
    @if(($block['type'] ?? '') === 'hero')

        <section class="hero-section">
            <div class="hero-bg"
                 style="background-image: url('{{ asset('storage/' . $block['data']['image']) }}');">

                <div class="hero-overlay"></div>

                <div class="hero-content text-center">
                    <h1 class="hero-title">
                        {{ $block['data']['title'] }}
                    </h1>
                </div>

            </div>
        </section>

    @endif
@endforeach


{{-- ✅ REST OF SECTIONS --}}
@foreach($page->content ?? [] as $block)

    @if(($block['type'] ?? '') === 'services')

        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 text-center">

                <p class="text-blue-500 text-sm font-semibold uppercase mb-2">
                    {{ $block['data']['subtitle'] ?? '' }}
                </p>

                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    {{ $block['data']['title'] ?? '' }}
                </h2>

                <p class="text-gray-600 max-w-3xl mx-auto mb-12">
                    {{ $block['data']['description'] ?? '' }}
                </p>

                <div class="grid md:grid-cols-3 gap-8">

                    @foreach($block['data']['members'] ?? [] as $item)

                        <div class="bg-white border rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition duration-300">

                            <div class="overflow-hidden">
                                <img 
                                    src="{{ asset('storage/' . $item['image']) }}"
                                    class="w-full h-48 object-cover transition duration-500 hover:scale-105"
                                >
                            </div>

                            <div class="p-5 text-left">

                                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                                    {{ $item['name'] ?? '' }}
                                </h3>

                                <p class="text-sm text-gray-600 mb-4">
                                    {{ $item['designation'] ?? '' }}
                                </p>

                                @if(!empty($item['bio']))
                                    <ul class="text-sm text-gray-600 space-y-1 mb-4">
                                        @foreach(explode(',', $item['bio']) as $point)
                                            <li>• {{ trim($point) }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if(!empty($item['link']))
                                    <a href="{{ url($item['link']) }}" 
                                       class="text-blue-600 text-sm font-medium hover:underline">
                                        Learn More →
                                    </a>
                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>
        </section>

    @endif

@endforeach

@endsection