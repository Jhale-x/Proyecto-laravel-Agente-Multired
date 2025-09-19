<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/argon-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
            <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">            
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="{{ url('/home') }}">
                    <img src="{{ asset('assets/img/logo-ct.png') }}" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-1 font-weight-bold">Agente MultiRed</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">
                            <div class="icon icon-shape icon-sm borde-wr-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/users') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/customers') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-circle-08 text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Cliente</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-collection text-info text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">About</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main-content position-relative border-radius-lg ">
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3">
                    <a class="navbar-brand fw-bold" href="#">Agente <span class="text-primary">MultiRed</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><a class="opacity-5 text-white" href="{{ url('/home') }}">Home</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><a class="opacity-5 text-white" href="{{ url('/users') }}">Usuarios</a></li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><a class="opacity-5 text-white" href="{{ url('/customers') }}">Cliente</a></li>
                        </ol>
                    </nav>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ol class="navbar-nav ms-auto breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 margin-left-auto text-decoration-none color-inherit">                     
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                                <a class="opacity-5 text-white" href="#">
                                    <span class="nav-link-text ms-1">
                                        {{ 
                                            (session('user.nombre') ?? session('user.usuario') ?? 'Invitado')
                                            . (session('user.apellido') ? ' ' . session('user.apellido') : '')
                                            . (session('user.rol') ? ' (' . session('user.rol') . ')' : '')
                                        }}
                                    </span>
                                </a>
                            </li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                                <a class="opacity-5 text-white" href="#">
                                    @php
                                        $foto = session('user.foto') ?? null;
                                        $default = asset('vistas/img/usuarios/default/perfil.png');
                                        $src = $foto ? asset($foto) : $default;
                                    @endphp
                                    <img src="{{ $src }}" alt="Perfil" class="user-image rounded-circle" style="width:32px; height:32px; object-fit:cover;">
                                </a>
                            </li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><a class="opacity-5 text-white" href="{{ route('logout') }}">Logout</a></li>
                        </ol>
                    </div>
                </div>
            </nav>
            <div class="container-fluid py-4">
                @yield('content')
            </div>
            <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                 <b>Versión</b> 1.0.0 <br>
                Copyright &copy; <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="#" class="font-weight-bold" target="_blank">Sistema de Ventas</a>
                . Todos los derechos reservados.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </main>

    <!-- Argon JS y Bootstrap -->
    <script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard.min.js') }}"></script>
</body>
</html>