<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KIN | Admin @yield('title')</title>

     <link rel="shortcut icon" type="image/x-icon" href="" />

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('styles')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                {{-- <img src="images/img.jpg" alt="..." class="img-circle profile_img"> --}}
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            @include('shared.sidebar')

            {{-- Start of Content --}}
            <section class="content">
            <div class="right_col" role="main">
              {{--   <ol class="breadcrumb">
                  <li class="active"><a href="{{ route('users.index') }}">@yield('title')</a></li>
                </ol> --}}
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>@yield('title')</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                @if (Session::has('toast'))
                <div class="alert alert-{{ session('status') }} alert-dismissible fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> {{ ucfirst(session('status')) }}!</h4>
                  {!! session('toast') !!}
                </div>
                @endif
              @yield('content')
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </section>
            {{-- End of Content --}}

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            KIN &copy; 2017
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    {{-- Scripts --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/nprogress.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/smartresize.js') }}"></script>

    @stack('scripts')

  </body>
</html>