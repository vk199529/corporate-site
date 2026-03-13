<!DOCTYPE html>
<html>
<head>

<title>Corporate Website</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

@include('layouts.header')

<div class="container mt-4">
@yield('content')
</div>

@include('layouts.footer')

</body>
</html>