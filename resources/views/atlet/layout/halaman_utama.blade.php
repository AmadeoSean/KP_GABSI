<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Atlet</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href={{ asset("css/styles.css") }} rel="stylesheet" />
        {{-- <link href={{ asset("css/notes.css") }} rel="stylesheet" /> --}}
        {{-- tabel --}}
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
        {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" /> --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" /> --}}
        {{-- <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/r-2.5.0/datatables.min.css" rel="stylesheet"> --}}
        <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet">
        
 
        

        {{-- icon --}}
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        @yield('style')
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
           <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-md-2 me-lg-0 ms-lg-2" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href={{ url(request()->path()) }}><img src={{ asset('img/dummy-logo-2b.png')}} width="130px" height="100px" alt=""></a>
           
            <!-- Navbar Search-->
            {{-- @if(Route::is('atlet-profile'))
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            @else
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            @endif --}}

           
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-md-2 me-lg-3 ">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#!">Settings</a></li>
                      <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                      <li><hr class="dropdown-divider" /></li>
                      <li><form method="POST" action="{{ route('logout') }}">@csrf<button class="dropdown-item" type="submit">{{ _('Log out') }}</button></form></li>
                  </ul>
              </li>
          </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-secondary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <div class="border border-dark border-opacity-25">
                                <a class="nav-link {{Request::is('atlet') || Request::is('atlet/latihan/*')?'active':''}}" href={{ url('atlet') }}>
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                            </div >
                            <div class="border border-dark border-top-0 border-opacity-25">
                                <a class="nav-link {{Request::is('atlet/daftar_atlet')?'active':''}}" href={{ url('atlet/daftar_atlet') }}>
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Daftar Atlet
                                </a>
                            </div>
                            <div class="border border-dark border-top-0 border-opacity-25">
                                <a class="nav-link {{Request::is('atlet/daftar_kejuaraan')?'active':''}}" href={{ url('atlet/daftar_kejuaraan') }}>
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Daftar Kejuaraan
                                </a>  
                            </div>  
                            <div class="border border-dark border-top-0 border-opacity-25">
                                <a class="nav-link {{Request::is('atlet/daftar_prestasi') || Request::is('atlet/daftar_prestasi/*')?'active':''}}" href={{ url('atlet/daftar_prestasi') }}>
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Daftar Prestasi
                                </a>  
                            </div>  
                            <div class="border border-dark border-top-0 border-opacity-25">
                                <a class="nav-link {{Request::is('atlet/profile')?'active':''}}" href={{ url('atlet/profile') }}>
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Profile
                                </a>  
                            </div> 
            
 
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" >
                <main>
                    <div class="container-fluid pt-4 pe-3 ps-3">
                         @yield('konten')  
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        
                    </div>
                </footer>
            </div>
        </div>
       
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/r-2.5.0/datatables.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src={{ asset("js/scripts.js") }}></script>
        @yield('javascript')
    </body>
</html>
