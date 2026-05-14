@extends('layouts.app')

@section('content')

<section class="container mx-auto py-12">

@foreach($page->content ?? [] as $block)

    {{-- HERO --}}
    @if(($block['type'] ?? '') === 'hero')
        <section class="hero-section mb-12">
            <div class="hero-bg"
                 style="background-image: url('{{ asset('storage/' . $block['data']['image']) }}');">

                <div class="hero-overlay"></div>

                <div class="hero-content text-center py-20">
                    @if(!empty($block['data']['title']))
                        <h1 class="hero-title text-4xl font-bold">
                            {{ $block['data']['title'] }}
                        </h1>
                    @endif
                </div>

            </div>
        </section>
    @endif


    {{-- COMMON SERVICE DETAIL --}}
    @if(($block['type'] ?? '') === 'service_detail')

        <section class="service-detail-section mb-16">

            {{-- Subtitle --}}
            @if(!empty($block['data']['subtitle']))
                <p class="text-center text-sm uppercase tracking-widest mb-2">
                    {{ $block['data']['subtitle'] }}
                </p>
            @endif

            {{-- Title --}}
            @if(!empty($block['data']['title']))
                <h2 class="text-center text-4xl font-bold mb-8">
                    {{ $block['data']['title'] }}
                </h2>
            @endif

            <div class="grid md:grid-cols-2 gap-10 items-start">

                {{-- LEFT IMAGE / VIDEO --}}
                <div>

                    @if(!empty($block['data']['video_url']))
                        <iframe width="100%" height="315"
                            src="{{ $block['data']['video_url'] }}"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>

                    @elseif(!empty($block['data']['image']))
                        <img src="{{ asset('storage/' . $block['data']['image']) }}"
                             alt="{{ $block['data']['title'] ?? '' }}"
                             class="w-full rounded-lg shadow">
                    @endif

                </div>

                {{-- RIGHT CONTENT --}}
                <div>

                    @if(!empty($block['data']['intro']))
                        <p class="mb-4">
                            {!! nl2br(e($block['data']['intro'])) !!}
                        </p>
                    @endif

                    @if(!empty($block['data']['content']))
                        <div class="mb-6">
                            {!! nl2br(e($block['data']['content'])) !!}
                        </div>
                    @endif

                </div>

            </div>

            {{-- FEATURES --}}
            @if(!empty($block['data']['features']))
                <div class="mt-10">
                    <ul class="list-disc pl-6 space-y-2">
                        @foreach($block['data']['features'] as $feature)
                            @if(!empty($feature['point']))
                                <li>{{ $feature['point'] }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- EXTRA SECTIONS --}}
            @if(!empty($block['data']['sections']))
                <div class="mt-16 space-y-12">

                    @foreach($block['data']['sections'] as $section)

                        <div class="text-center max-w-4xl mx-auto">

                            @if(!empty($section['heading']))
                                <h3 class="text-2xl font-semibold mb-4">
                                    {{ $section['heading'] }}
                                </h3>
                            @endif

                            @if(!empty($section['description']))
                                {!! $section['description'] !!}
                            @endif

                            @if(!empty($section['image']))
                                <img src="{{ asset('storage/' . $section['image']) }}"
                                     class="mx-auto rounded-lg shadow mt-4"
                                     alt="">
                            @endif

                        </div>

                    @endforeach

                </div>
            @endif

        </section>

    @endif

@endforeach

</section>

@endsection