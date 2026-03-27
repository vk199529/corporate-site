@extends('layouts.app')

@section('content')

<section class="container py-8 text-center">
    <h1 class="text-xl font-bold">{{ $page->title }}</h1>
</section>

{{-- LOOP ALL BLOCKS --}}
@foreach($page->content ?? [] as $block)

    {{-- ================= TEAM SECTION ================= --}}
    @if($block['type'] === 'team')

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 text-center">

            {{-- Subtitle --}}
            <p class="text-blue-500 text-sm font-semibold uppercase mb-2">
                {{ $block['data']['subtitle'] ?? '' }}
            </p>

            {{-- Title --}}
            <h2 class="text-3xl font-bold mb-4">
                {{ $block['data']['title'] ?? '' }}
            </h2>

            {{-- Description --}}
            <p class="text-gray-600 max-w-3xl mx-auto mb-10">
                {{ $block['data']['description'] ?? '' }}
            </p>

            {{-- Grid --}}
            <div class="grid md:grid-cols-3 gap-6">

                @foreach($block['data']['members'] ?? [] as $member)

                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 p-4">

                        {{-- Image --}}
                        <div class="overflow-hidden rounded-lg mb-4">
                            <img 
                                src="{{ asset('storage/' . $member['image']) }}"
                                class="w-full h-64 object-cover transition duration-500 hover:scale-105"
                            >
                        </div>

                        {{-- Name --}}
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $member['name'] }}
                        </h3>

                        {{-- Designation --}}
                        <p class="text-blue-500 text-sm font-medium mb-2">
                            {{ $member['designation'] ?? '' }}
                        </p>

                        {{-- Bio --}}
                        <p class="text-gray-600 text-sm">
                            {{ $member['bio'] ?? '' }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>
    </section>

    @endif

@endforeach

@endsection