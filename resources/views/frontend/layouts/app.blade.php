<!DOCTYPE html>

<html lang="en-us"><head>
  <meta charset="utf-8">
  <title> Home | BlogSite </title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="This is meta description">

  <!-- plugins -->
  
  <link rel="stylesheet" href="{{asset('frontend/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}" media="screen">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('frontend/images/favicon.png')}}" type="image/x-icon">

  <meta property="og:title" content="Reader Personal Blog" />
  <meta property="og:description" content="This is meta description" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="" />
  <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
<body>

<!-- navigation -->
@include('frontend.layouts.header')
<!-- /navigation -->

@yield('content')

@include('frontend.layouts.footer')

 <!-- JS Plugins -->
 <script src="{{  asset('frontend/plugins/jQuery/jquery.min.js')}}"></script>

<script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{  asset('frontend/plugins/slick/slick.min.js')}}"></script>

<script src=" {{ asset('frontend/plugins/instafeed/instafeed.min.js')}}"></script>


<!-- Main Script -->
<script src="{{  asset('frontend/js/script.js')}}"></script></body>
</html>