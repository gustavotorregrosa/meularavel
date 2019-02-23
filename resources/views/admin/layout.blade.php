<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('custom-assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('custom-assets/admin/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('custom-assets/admin/libs/css/style.css') }}">

    <title>@yield('titulo')</title>
</head>

<body>

    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">@yield('titulo')</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gustavo Torregrosa
                                &nbsp;&nbsp;&nbsp;  <i class="fas fa-power-off mr-2"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        @component('admin.sidebar')
        @endcomponent

        <div class="dashboard-wrapper">
        <br>
            @yield('conteudo')
            @component('admin.mensagens')
            @endcomponent
            @component('admin.erros')
            @endcomponent
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('custom-assets/admin/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('custom-assets/admin/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('custom-assets/admin/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('custom-assets/admin/libs/js/main-js.js') }}"></script>

    <script src="{{ asset('custom-assets/admin/libs/js/principal.js') }}"></script>

</body>

</html>
