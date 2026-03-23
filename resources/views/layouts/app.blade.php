<!DOCTYPE html>
<html>
<head>

<title>
{{ $page->meta_title ?? $page->title ?? 'Website' }}

</title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description"
      content="{{ $page->meta_description ?? '' }}">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.tailwindcss.com"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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