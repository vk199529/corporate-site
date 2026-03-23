@extends('layouts.app')

@section('content')



    {{-- LOOP ALL BLOCKS --}}
    @foreach($page->content ?? [] as $block)

    {{-- ================= VIDEO SECTION ================= --}}
    @if($block['type'] === 'video')

        <div class="mb-12">
            <video class="w-full " autoplay muted loop playsinline>
                <source src="{{ asset('storage/' . $block['data']['video']) }}" type="video/mp4">
            </video>
        </div>

    @endif


    {{-- ================= WHAT WE DO ================= --}}
    @if($block['type'] === 'what_we_do')

    <div class="mb-16 align-center what-we-do-section center-class">
<div class="container mx-auto px-4 py-10">
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

                    <h3 class="text-xl font-semibold mb-2">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-gray-600 mb-4">
                        {{ $item['description'] }}
                    </p>

     
                </a>

            </div>
            @endforeach
        </div>
    </div>
    </div>
    @endif


    {{-- ================= WHO WE SERVE ================= --}}
    @if($block['type'] === 'who_we_serve')

        <section class="py-8 bg-white who-we-serve center-class">
            <div class="container mx-auto  py-1">
            <div class="max-w-7xl mx-auto px-4">

                {{-- Subtitle --}}
                <h4 class="text-sm text-gray-500 uppercase mb-2 subtitle-s">
                    {{ $block['data']['subtitle'] ?? '' }}
                </h4>

                {{-- Title --}}
                 <h2 class="text-3xl font-bold mb-4 main-tilte">
                    {{ $block['data']['title'] ?? '' }}
                </h2>

                {{-- Description --}}
                <p class="text-gray-600 mb-10  text-center">
                    {{ $block['data']['description'] ?? '' }}
                </p>

                {{-- Cards --}}
                <div class="grid md:grid-cols-4 gap-6">

    @foreach ($block['data']['items'] as $item)

        <div class="service-card perspective">

            <div class="card-inner">

                {{-- FRONT --}}
                <div class="card-front">

                    <img 
                        src="{{ asset('storage/' . $item['image']) }}" 
                        class="w-full h-64 object-cover"
                    >

                    <div class="overlay"></div>

                    <div class="absolute inset-0 flex items-center justify-center">
                        <h3 class="text-white text-lg font-semibold text-center px-4">
                            {{ $item['title'] }}
                        </h3>
                    </div>

                </div>

                {{-- BACK --}}
                <div class="card-back">
                    <p class="text-sm text-center">
                        {{ $item['description'] ?? '' }}
                    </p>
                </div>

            </div>

        </div>

    @endforeach
</div>
</div>

            </div>
        </section>

    @endif

    @endforeach

{{-- ================= OUR RESULTS ================= --}}

<section class="py-5 text-center our-results center-class">
    <div class="container mx-auto  py-1">
        <h4 class="text-sm text-gray-500 uppercase mb-2 subtitle-s">
            OUR RESULTS
        </h4>
        <h2 class="text-3xl font-bold mb-4 main-tilte">
            Expert guidance for global businesses <br>Over
        </h2>

        <h5 class="fw-bold text-info">
            $<span id="counter">0</span> Million USD
        </h5>

        <p class="text-muted">
            Annual Earnings Audited For Our Clients
        </p>

        <hr class="mt-4" style="color:#6ec1e4;">

    </div>
</section>


{{-- ================= WHY CRICHTONMULLINGS & ASSOCIATES  ================= --}}

<section class="py-5 bg-white why-crichtonmullings">
   <div class="container mx-auto  py-1">

        <div class="row align-items-center">

            <!-- LEFT CONTENT -->
            <div class="col-lg-6 mb-4 mb-lg-0">

                <h4 class="text-sm text-gray-500 uppercase mb-2 subtitle-s">
                    WHY CRICHTONMULLINGS & ASSOCIATES
                </h4>

                <h2 class="text-3xl font-bold mb-4 main-tilte">
                    Your Success <br> Is Our Mission
                </h2>

                <p class="text-muted mt-3">
                    Our priority is to help our clients to achieve financial success through profit-generating business strategies, stress-free tax planning strategies and time-saving technological advancements. By becoming a client, you will be one step closer to achieving your mission!
                </p>

                <a href="#" class="btn btn-primary mt-3 lats-chat">
                    Let's Chat
                </a>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-lg-6 text-center">

                <img src="https://i0.wp.com/crichtonmullings.com/wp-content/uploads/2023/04/The-1-Audit-Firm-for-the-Junior-Market-of-the-Jamaica-Stock-Exchange.png?resize=800%2C450&ssl=1"
                     class="img-fluid rounded shadow"
                     alt="About Image">

            </div>

        </div>

    </div>
</section>
@endsection