@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-10">

    {{-- LOOP ALL BLOCKS --}}
    @foreach($page->content ?? [] as $block)

    {{-- ================= VIDEO SECTION ================= --}}
    @if($block['type'] === 'video')

    <div class="mb-12">
        <video class="w-full rounded-xl shadow-lg" autoplay muted loop playsinline>
            <source src="{{ asset('storage/' . $block['data']['video']) }}" type="video/mp4">
        </video>
    </div>

    @endif


    {{-- ================= WHAT WE DO ================= --}}
    @if($block['type'] === 'what_we_do')

    <div class="mb-16">

        <p class="text-sm text-gray-500 uppercase mb-2">
            {{ $block['data']['subtitle'] }}
        </p>

        <h2 class="text-3xl font-bold mb-4">
            {{ $block['data']['title'] }}
        </h2>

        <p class="text-gray-600 mb-8">
            {{ $block['data']['description'] }}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach($block['data']['items'] as $item)

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                {{-- IMAGE --}}
                @if(!empty($item['image']))
                <img src="{{ asset('storage/' . $item['image']) }}" class="w-16 h-16 mb-4">
                @endif

                {{-- TITLE --}}
                <h3 class="text-xl font-semibold mb-2">
                    {{ $item['title'] }}
                </h3>

                {{-- DESC --}}
                <p class="text-gray-600 mb-4">
                    {{ $item['description'] }}
                </p>

                {{-- LINK --}}
                @if(!empty($item['link']))
                <a href="{{ $item['link'] }}" class="text-blue-600 font-medium">
                    Learn More →
                </a>
                @endif

            </div>

            @endforeach

        </div>

    </div>

    @endif

    @endforeach

</div>

@endsection