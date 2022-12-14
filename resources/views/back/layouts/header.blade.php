<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('back/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/vendors/base/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('back/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('back/css/style.css')}}">
  <link rel="shortcut icon" href="{{asset('back/images/favicon.png')}}" />
  @yield('css')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="{{route('admin.index')}}"></a>
          <a class="navbar-brand brand-logo-mini" href="{{route('admin.index')}}"></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png')}}" alt="profile"/>
              <span class="nav-profile-name">{{auth()->user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{route('admin.password')}}">
                <i class="mdi mdi-settings text-primary"></i>
                ??ifreyi de??i??tir
              </a>
              <a class="dropdown-item" href="{{route('admin.logout')}}">
                <i class="mdi mdi-logout text-primary"></i>
                ????k???? yap
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{Request::segment(2) == '' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.index')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Anasayfa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-folder menu-icon"></i>
              <span class="menu-title ml-3">Sayfalar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.slaytlar.index')}}">Anasayfa</a></li>
              </ul>
            </div>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.kampus.index')}}">Kamp??s</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{Route::is('admin.ekibimiz.index') || Route::is('admin.ekibimiz.create') || Route::is('admin.ekibimiz.edit') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.ekibimiz.index')}}">
              <i class="mdi menu-icon mdi-account-multiple"></i>
              <span class="menu-title">Ekibimiz</span>
            </a>
          </li>
          <li class="nav-item {{Request::segment(2) == 'haberler' ? 'active' : ''}} ">
            <a class="nav-link" href="{{route('admin.haberler.index')}}">
              <i class="mdi mdi-newspaper menu-icon"></i>
              <span class="menu-title">Haberler</span>
            </a>
          </li>
          <li class="nav-item {{Request::segment(2) == 'egitimler' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.egitimler.index')}}">
              <i class="mdi mdi-grease-pencil menu-icon"></i>
              <span class="menu-title">E??itimler</span>
            </a>
          </li>
          <li class="nav-item {{Request::segment(2) == 'atolye' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.atolye.index')}}">
              <i class="mdi mdi-book-open-variant menu-icon"></i>
              <span class="menu-title">At??lye</span>
            </a>
          </li>

          <li class="nav-item {{Request::segment(2) == 'blog' ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.blog.index')}}">
              <i class="mdi mdi-blogger menu-icon"></i>
              <span class="menu-title">Blog</span>
            </a>
          </li>

          {{-- <li class="nav-item {{Request::segment(2) == 'blog' ? 'active' : ''}}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-blog" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-blogger menu-icon"></i>
              <span class="menu-title ml-3">Blog</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.blog.category')}}">Kategoriler</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.blog.index')}}">Makaleler</a></li>
              </ul>
            </div>
          </li> --}}
          <li class="nav-item {{Route::is('admin.ayarlar.index') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.ayarlar.index')}}">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Ayarlar</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">