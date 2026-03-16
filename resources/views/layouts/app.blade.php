<!DOCTYPE html>
<html>
<head>

<title>Corporate Website</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
.top-bar{
background:#f5f5f5;
padding:6px 0;
font-size:14px;
}

.top-bar a{
color:#007bff;
text-decoration:none;
}

.navbar-nav .nav-link{
font-weight:500;
padding:20px 15px;
}

.dropdown-menu{
border-radius:0;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.navbar .dropdown:hover .dropdown-menu{
display:block;
margin-top:0;
}
.footer-area{
background:#1fa3d1;
color:#fff;
padding:60px 0;
}

.footer-area h4{
margin-bottom:20px;
font-weight:600;
}

.footer-links{
list-style:none;
padding:0;
}

.footer-links li{
margin-bottom:10px;
}

.footer-links a{
color:#fff;
text-decoration:none;
}

.footer-news img{
border-radius:4px;
}

.footer-bottom{
background:#111;
padding:20px 0;
color:#fff;
}
</style>
</head>

<body>

@include('layouts.header')

<div class="container mt-4">
@yield('content')
</div>

@include('layouts.footer')

</body>
</html>