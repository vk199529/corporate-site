@extends('layouts.app')

@section('content')

<section class="container py-8 text-center">

<h1 class="text-xl font-bold" >{{ $page->title }}</h1>

<div class="about-content">

{!! $page->content !!}

</div>

</section>
{{-- ================= OURE Team ================= --}}

<section class="py-5 bg-light our-team">
  <div class="container mx-auto  py-1 text-center">

        <!-- Top Heading -->
         <h4 class="text-sm text-gray-500 uppercase mb-2 subtitle-s">
            MEET CRICHTONMULLINGS & ASSOCIATES
        </h4>

        <h2 class="text-3xl font-bold mb-4 main-tilte">
            Your partners for global financial success
        </h2>

        <p class="text-muted mb-5">
            Founded in 2001, CrichtonMullings & Associates is led by a team of seasoned accountants, auditors, and finance professionals.
        </p>

        <!-- Team Grid -->
        <div class="row g-4">

            <!-- CARD 1 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Rohan Crichton | CPA, CA, MAcc</h6>
                        <small class="text-muted d-block mb-2">Senior Partner</small>
                        <p class="small text-muted">
                            Mr. Crichton has served on the founding partner of Crichton Mullings and Associates since 2001.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Leary Mullings | CPA, FCCA</h6>
                        <small class="text-muted d-block mb-2">Senior Partner</small>
                        <p class="small text-muted">
                            Mr. Mullings has been a founding partner since 2001 and leads the audit division.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Cyril Thompson | CPA, CA</h6>
                        <small class="text-muted d-block mb-2">Partner</small>
                        <p class="small text-muted">
                            Mr. Thompson has been a partner since 2011 and is a Certified Public Accountant.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Glenford McLeish | CA</h6>
                        <small class="text-muted d-block mb-2">Manager</small>
                        <p class="small text-muted">
                            Mr. McLeish has been a principal at Crichton Mullings and Associates since 2001.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CARD 5 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Devon Johnson</h6>
                        <small class="text-muted d-block mb-2">Head of IT</small>
                        <p class="small text-muted">
                            Mr. Johnson has been leading IT operations and development at the firm.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CARD 6 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Darshan Doodh | CA</h6>
                        <small class="text-muted d-block mb-2">Senior Manager</small>
                        <p class="small text-muted">
                            Mr. Darshan has been a manager since 2011 with expertise in auditing.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection