<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- title of site -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <script type="text/javascript">
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}",
            {{--jsPermissions: {!! auth()->check()?auth()->user()->jsPermissions():null !!}--}}
        }
    </script>

@include('partials.style')
</head>

<body class="home-2">




<!-- Layout wrapper -->
@inertia
<!-- / Layout wrapper -->

@include('partials.scripts')
<!-- Js section ends  -->
</body>

</html>
