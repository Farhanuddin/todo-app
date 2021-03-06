<html>
    <head>
        
        <title>Laravel/Vue.js - @yield('title')</title>

        <!-- CSRF Stuff -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
       	<!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" type="text/css" >

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" >

        <!-- Custom CSS -->
		<link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" >
    </head>
    <body>