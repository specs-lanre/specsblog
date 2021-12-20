<!Doctype html >
<html>
<head>
<title>
Specs Blog - Home
</title>
<meta name="charset" content="utf-8">
<meta name="viewport" content="width='device-width',
initial-scale=1.0">

<link rel="stylesheet" 
href="{{ asset('css/responsive-navmenu.css')}}">

 <!-- THE LINE BELOW IS RESPONSIBLE FOR THE BOOTSTRAP--> 
<link rel="stylesheet" 
href="{{ asset('bootstrap-502dist/css/bootstrap.min.css') }}">
<script src="{{ asset('bootstrap-502dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<!--add font awesome cdn here  -->
<link rel="stylesheet" 
href="{{ asset('fontawesome-free-5-15-4-web/css/all.css') }}">
</head>

<body>
<!--this is the main row-->
<section  class="nav">
<!-- -->
<nav class="">
<label for="mchk">
<span class="nav-item-menubar">
<i class="fa fa-bars"></i>
</span>
</label>
<input type="checkbox" id="mchk"
class="mchkinput"
>
<span class="logo">
Specs Blog
</span>
<!--this is the nav item containers -->

<span class="nav-item-case">
<span class="nav-item-link">
<a href="home/">
<i class="fa fa-home"></i>Home
</a>
</span>
<span class="nav-item-link">
<a href="topics">
<i class="fa fa-th-list"></i>Topics
</a>
</span>


<span class="nav-item-link">
<a href="loginuser">
<i class="fas fa-sign-out-alt"></i>

Login
</a>
</span>

<span class="nav-item-link">
<a href="registeruser">
<i class="fas fa-user-plus"></i>
Sign up
</a>
</span>

<span class="nav-item-link">
<a href="userlogout">
<i class="fas fa-sign-out-alt"></i>
Log out
</a>
</span>
</span>
<h4>  Home  </h4>
</section><!--END NAV BAR-->

@yield('content')

<!--footer goes here-->
</body>
</html>