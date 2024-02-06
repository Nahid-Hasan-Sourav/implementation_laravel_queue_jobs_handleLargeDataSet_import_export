<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- ajax meta token start here --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- ajax meta token start here --}}




    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('admin.includes.style')
    
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
   <!-- sl-sideleft -->
    @include('admin.includes.leftsidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->

    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">Jane<span class="hidden-md-down"> Doe</span></span>
              <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
              <img src="{{asset('/')}}admin/assets/img/img9.jpg" alt="..." class="wd-32 rounded-circle">

            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
          
                <li onclick="document.getElementById('logOutBtn').submit()">
                  <a href="#"><i class="icon ion-power"></i> Sign Out</a>
              </li>

              <form action="{{ route('user.logout') }}" method="POST" id="logOutBtn">
                  @csrf
              </form>

              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
       
      </div><!-- sl-header-right -->
    </div>
 
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Dashboard </span>
      </nav>

      <div class="sl-pagebody">

       <div>
        @yield('body')
       </div>

      </div>
    </div>

    @include('admin.includes.scripts')
    @stack('scripts')
  </body>
</html>
