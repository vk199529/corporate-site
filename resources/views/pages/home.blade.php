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

    <div class="mb-16 what-we-do-section">

        <h4 class="text-sm text-gray-500 uppercase mb-2 subtitle-s">
            {{ $block['data']['subtitle'] }}
        </h4>

        <h2 class="text-3xl font-bold mb-4 main-tilte">
            {{ $block['data']['title'] }}
        </h2>

        <p class="text-gray-600 mb-8">
            {{ $block['data']['description'] }}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-2">

            @foreach($block['data']['items'] as $item)

            <div class="bg-white rounded-xl  transition box-ss">
            <a href="{{ $item['link'] }}">
                {{-- IMAGE --}}
                @if(!empty($item['image']))
                <img src="{{ asset('storage/' . $item['image']) }}" class="image-size-c">
                @endif

                {{-- TITLE --}}
                <h3 class="text-xl font-semibold mb-2">
                    {{ $item['title'] }}
                </h3>

                {{-- DESC --}}
                <p class="text-gray-600 mb-4">
                    {{ $item['description'] }}
                </p>

     
                </a>

            </div>

            @endforeach

        </div>

    </div>

    @endif

    @endforeach

</div>

@endsection