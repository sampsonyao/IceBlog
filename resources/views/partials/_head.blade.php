<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>IceBlog @yield('title')</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="{{ URL::asset('favicon.png') }}">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  <!-- page level plugin styles -->
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/dist/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('styles/roboto.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('styles/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('styles/panel.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('styles/feather.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('styles/animate.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('styles/urban.css') }}">
   @yield('stylesheets')
  <!-- endbuild -->

</head>
