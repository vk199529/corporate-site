<!DOCTYPE html>
<html>
<head>

<title>{{ $page->meta_title ?? $page->title ?? 'Website' }}</title>


<meta name="description"
      content="{{ $page->meta_description ?? '' }}">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
{!! optional($setting)->header_script !!}

</head>

<body>

@include('layouts.header')

<div class="container mt-4">
@yield('content')
</div>

@include('layouts.footer')
{!! optional($setting)->footer_script !!}
</body>
</html>