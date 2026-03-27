@extends('layouts.app')

@section('content')

<section class="container py-8 text-center">

<h1 class="text-xl font-bold">{{ $page->title }}</h1>

<div class="contact-content">

{!! $page->content !!}

</div>

</section>

{{-- ================= contact-section ================= --}}

<section class="contact-section py-5">
  <div class="container mx-auto">

    <!-- Top Heading -->
    <div class="text-center mb-4">
      <p class="small text-muted mb-1">
        Fill out our contact form below to get in touch with us anytime.
      </p>
      <p class="text-muted">
        We are glad to discuss your business goals and solutions to any obstacles your amazing business may be facing.
      </p>
    </div>

    <div class="row ">

      <!-- LEFT FORM -->
      <div class="col-lg-6 pt-4 ">
        <h5 class="fw-bold mb-2">
          Do you have a question or need business advice?
        </h5>
        <p class="text-muted mb-4">
          Please complete and submit the form below. A member of our team will get in touch with you.
        </p>

        <form>
          <div class="row mb-3 py-9">
            <div class="col-md-6">
              <label>First Name *</label>
              <input type="text" class="form-control" placeholder="First Name">
              <small class="text-danger">First Name is required</small>
            </div>

            <div class="col-md-6">
              <label>Last Name *</label>
              <input type="text" class="form-control" placeholder="Last Name">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label>Phone</label>
              <input type="text" class="form-control" placeholder="Phone">
            </div>

            <div class="col-md-6">
              <label>Email *</label>
              <input type="email" class="form-control" placeholder="Email">
            </div>
          </div>

          <div class="mb-3">
            <label>Leave Us A Message</label>
            <textarea class="form-control" rows="3" placeholder="Leave Us A Message"></textarea>
          </div>

          <button class="btn submit-btn px-5">Submit</button>
        </form>
      </div>

      <!-- RIGHT CONTACT INFO -->
      <div class="col-lg-6 mt-4 mt-lg-0">

        <div class="contact-box">
          <h6 class="fw-bold">Florida</h6>
          <p>📞 954-862-2250</p>
          <p>📠 954-862-2251</p>
          <p>✉️ admin-us@crichtonmullings.com</p>
        </div>

        <div class="contact-box mt-4">
          <h6 class="fw-bold">Jamaica</h6>
          <p>📞 876-946-1274</p>
          <p>📠 876-978-0877</p>
          <p>✉️ admin@crichtonmullings.com</p>
        </div>

        <div class="contact-box mt-4">
          <h6 class="fw-bold">Atlanta</h6>
          <p>📞 770-320-7786</p>
          <p>📠 770-320-7787</p>
          <p>✉️ admin-us@crichtonmullings.com</p>
        </div>

      </div>

    </div>
  </div>
</section>


{{-- ================= Location-section ================= --}}

<section class="location-section py-5">
  <div class="container">

    <!-- TABS -->
    <ul class="nav nav-tabs justify-content-center custom-tabs" id="locationTabs">
      
      <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#florida">
          <h5>Florida</h5>
          <small>3350 SW 148th Ave, Suite 203<br>Miramar, FL 33027</small>
        </button>
      </li>

      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#jamaica">
          <h5>Jamaica</h5>
          <small>Suite 27B, 80 Lady Musgrave Road,<br>Kingston 6</small>
        </button>
      </li>

      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#atlanta">
          <h5>Atlanta</h5>
          <small>903 Pavilion Ct, Suite B,<br>Atlanta, GA 30253</small>
        </button>
      </li>

    </ul>

    <!-- TAB CONTENT -->
    <div class="tab-content mt-3">

      <!-- Florida -->
      <div class="tab-pane fade show active" id="florida">
        <iframe src="https://maps.google.com/maps?q=3350 SW 148th Ave Miramar FL&t=&z=13&ie=UTF8&iwloc=&output=embed"
          width="100%" height="350" style="border:0;"></iframe>
      </div>

      <!-- Jamaica -->
      <div class="tab-pane fade" id="jamaica">
        <iframe src="https://maps.google.com/maps?q=80 Lady Musgrave Road Kingston Jamaica&t=&z=13&ie=UTF8&iwloc=&output=embed"
          width="100%" height="350" style="border:0;"></iframe>
      </div>

      <!-- Atlanta -->
      <div class="tab-pane fade" id="atlanta">
        <iframe src="https://maps.google.com/maps?q=903 Pavilion Ct Atlanta GA&t=&z=13&ie=UTF8&iwloc=&output=embed"
          width="100%" height="350" style="border:0;"></iframe>
      </div>

    </div>

  </div>
</section>
@endsection