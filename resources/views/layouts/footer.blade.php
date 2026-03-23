<footer class="footer-area">

<div class="container">
<div class="row">

{{-- Column 1 Office Info --}}
<div class="col-lg-3 col-md-6">

<p><strong>Florida Office:</strong> <a href="tel:19548622250"> (954) 862-2250</a></p>
<p><strong>Jamaica Office:</strong> <a href="tel:18769461274"> (876) 946-1274</a></p>
<p><strong>Atlanta Office:</strong> <a href="tel:17703207786"> (770) 320-7786</a></p>

<div class="social-icons mt-3">
<a href="https://goo.gl/maps/Vvd6nXabp8LZY3di7" target="_black"><i class="fab fa-google"></i></a>
<a href="https://www.facebook.com/CrichtonMullingsJA" target="_black"><i class="fab fa-facebook"></i></a>
<a href="https://www.linkedin.com/company/89613046" target="_black"><i class="fab fa-linkedin"></i></a>
<a href="https://www.youtube.com/channel/UCbB15nMDcMgdAdSHdmfPKMw" target="_black"><i class="fab fa-youtube"></i></a>
<a href="https://www.tiktok.com/@crichtonmullings" target="_black"><i class="fab fa-tiktok"></i></a>
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

@php
$blogs = \App\Models\Blog::latest()->take(3)->get();
@endphp

<div class="footer-news">

@foreach($blogs as $blog)

<div class="d-flex align-items-start mb-3">

  
    <div style="width:60px; height:60px; margin-right:10px;">
        <img 
            src="{{ asset('storage/'.$blog->image) }}" 
            alt="{{ $blog->title }}"
            style="width:100%; height:100%; object-fit:cover; border-radius:4px;"
        >
    </div>

 
    <div>
        <a href="{{ url('blog/'.$blog->slug) }}" style="color:#fff; font-size:14px; text-decoration:none;">
            {{ \Illuminate\Support\Str::limit($blog->title, 70) }}
        </a>
    </div>

</div>

@endforeach

</div>

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
<script>
function toggleSearch() {
    let box = document.getElementById('searchBox');
    box.style.display = box.style.display === 'none' ? 'block' : 'none';
}

document.addEventListener("DOMContentLoaded", function () {

    const toggleBtn = document.querySelector(".navbar-toggler");
    const menu = document.getElementById("mainNavbar");

    toggleBtn.addEventListener("click", function (e) {
        e.preventDefault();
        menu.classList.toggle("active");
    });

});
</script>