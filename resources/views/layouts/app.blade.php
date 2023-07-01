<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{$title ?? ''}} | {{config('app.name')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href={{ asset('assets/img/favicon.png') }} />
    <link href="{{asset('assets/vendor/datatables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/notify/notify.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
{{--    @vite('resources/sass/app.scss')--}}
    @stack('styles')
    <!-- Scripts -->
</head>

<body class="nav-fixed">
<x-navbar />
<div id="layoutSidenav">
    <x-sidebar />
    <div id="layoutSidenav_content">
        <main>
            @if (isset($header))
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-xl px-4">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                {{ $header }}
                            </div>
                        </div>
                    </div>
                </header>
            @endif
            <!-- Main page content-->
            <div class="container-xl px-4 mt-4">
                {{ $slot }}
            </div>
        </main>
        <x-footer />
    </div>
</div>
<script src={{ asset('assets/vendor/jquery/jquery.min.js') }}></script>
<script src="{{asset('dist/js/bootstrap.bundle.js')}}" crossorigin="anonymous">
</script>
<script src="{{asset('assets/vendor/datatables/datatables.min.js')}}"></script>
<script src={{ asset('js/scripts.js') }}></script>
<script src="{{asset('assets/notify/notify.min.js')}}"></script>
<script src="{{asset('assets/sweet-alert/sweet-alert.min.js')}}"></script>
@stack('scripts')
</body>

</html>
