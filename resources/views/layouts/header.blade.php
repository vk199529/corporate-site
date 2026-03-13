<header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="/">Company</a>

<ul class="navbar-nav">

@foreach($menus as $menu)

<li class="nav-item dropdown">

<a class="nav-link dropdown-toggle"
   href="{{ url($menu->url) }}"
   data-bs-toggle="dropdown">

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

</ul>

</div>

</nav>

</header>