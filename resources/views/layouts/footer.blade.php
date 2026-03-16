<footer class="footer-area">

<div class="container">
<div class="row">

{{-- Column 1 Office Info --}}
<div class="col-lg-3 col-md-6">

<p><strong>Florida Office:</strong> (954) 862-2250</p>
<p><strong>Jamaica Office:</strong> (876) 946-1274</p>
<p><strong>Atlanta Office:</strong> (770) 320-7786</p>

<div class="social-icons mt-3">
<a href="#"><i class="fab fa-google"></i></a>
<a href="#"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-linkedin"></i></a>
<a href="#"><i class="fab fa-youtube"></i></a>
<a href="#"><i class="fab fa-tiktok"></i></a>
</div>

</div>

{{-- Column 2 Services Menu --}}
<div class="col-lg-3 col-md-6">

<h4>Our Services</h4>

@php
$servicesMenu = \App\Models\Menu::where('location','footer-services')->first();
$services = $servicesMenu ? $servicesMenu->items()->orderBy('order')->get() : [];
@endphp

<ul class="footer-links">
@foreach($services as $item)

<li>
<a href="{{ url($item->url) }}">
{{ $item->title }}
</a>
</li>

@endforeach
</ul>

</div>

{{-- Column 3 About Menu --}}
<div class="col-lg-3 col-md-6">

<h4>About Us</h4>

@php
$aboutMenu = \App\Models\Menu::where('location','footer-about')->first();
$aboutItems = $aboutMenu ? $aboutMenu->items()->orderBy('order')->get() : [];
@endphp

<ul class="footer-links">
@foreach($aboutItems as $item)

<li>
<a href="{{ url($item->url) }}">
{{ $item->title }}
</a>
</li>
@endforeach
</ul>

</div>

{{-- Column 4 News --}}
<div class="col-lg-3 col-md-6">

<h4>Our News</h4>

</div>

</div>
</div>


{{-- Bottom Bar --}}
<div class="footer-bottom">

<div class="container d-flex justify-content-between">

<p>
Copyright © {{ date('Y') }} CrichtonMullings & Associates. All Rights Reserved.
</p>

<p>
<a href="/privacy-policy">Privacy Policy</a> |
<a href="/terms">Terms & Conditions</a>
</p>

</div>

</div>

</footer>