<header>


@if(request()->is('/'))
<div class="top-bar">

    <div class="container d-flex justify-content-between">

        <a href="#">Beneficial Owner Information</a>
        <a href="#">Get FIRPTA Refund</a>

    </div>

</div>
@endif



<nav class="navbar navbar-expand-lg bg-white shadow-sm">

<div class="container">

<!-- LOGO -->
@php
    $setting = \App\Models\Setting::first();
@endphp

@if($setting)

    <a href="{{ url('/') }}" style="display:flex; align-items:center; gap:10px; text-decoration:none;">

        @if($setting->logo)
            <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" style="height:50px;">
        @endif

        <!-- <span style="font-weight:bold; font-size:18px; color:#000;">
            {{ $setting->site_name }}
        </span> -->

    </a>
@endif
<!-- MENU -->

<ul class="navbar-nav ms-auto align-items-center">

@foreach($menus as $menu)

<li class="nav-item {{ $menu->children->count() ? 'dropdown' : '' }}">

<a class="nav-link {{ $menu->children->count() ? 'dropdown-toggle' : '' }}"
   href="{{ url($menu->url) }}">

{{ $menu->title }}

</a>

@if($menu->children->count())

<ul class="dropdown-menu">

@foreach($menu->children as $child)

<li>
<a class="dropdown-item" href="{{ url($child->url) }}">
{{ $child->title }}
</a>
</li>

@endforeach

</ul>

@endif

</li>

@endforeach

<!-- SEARCH ICON -->

<li class="nav-item ms-3">

<a href="#">
<i class="bi bi-search"></i>
</a>

</li>

</ul>

</div>

</nav>

</header>