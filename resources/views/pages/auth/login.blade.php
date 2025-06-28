<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- Google Fonts
  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- morrisjs CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar/fullcalendar.print.min.css') }}">
    <!-- forms CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/form/all-type-forms.css') }}">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- modernizr JS
  ============================================ -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <style>
        body {
            background: url('{{ asset('assets/img/bg-login.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .error-pagewrap {
            background: rgba(0, 0, 0, 0.5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <div class="error-pagewrap">
        <div class="error-page-int">

            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <div class="text-center m-b-md custom-login" style="color: white !important;">
                            <h3>Sistem Informasi Manajemen Karyawan</h3>
                            <p>Masukkan Email dan Password dengan benar!</p>
                        </div>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="text" placeholder="example@gmail.com" required
                                    value="{{ old('email') }}" name="email" id="email" class="form-control">
                                @error('email')
                                    <span class="help-block small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" placeholder="******" required name="password" id="password"
                                    class="form-control">
                                @error('password')
                                    <span class="help-block small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Masuk</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="text-center login-footer">
                <p>Copyright © 2025. <span style="color: blue"> SIMK</span></p>
            </div>
        </div>
    </div>
    <!-- jquery
  ============================================ -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
  ============================================ -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
  ============================================ -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- price-slider JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
  ============================================ -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
  ============================================ -->
    <script src="{{ asset('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
  ============================================ -->
    <script src="{{ asset('assets/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- tab JS
  ============================================ -->
    <script src="{{ asset('assets/js/tab.js') }}"></script>
    <!-- icheck JS
  ============================================ -->
    <script src="{{ asset('assets/js/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/js/icheck/icheck-active.js') }}"></script>
    <!-- plugins JS
  ============================================ -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- main JS
  ============================================ -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <!-- tawk chat JS
  ============================================ -->
    <script src="{{ asset('assets/js/tawk-chat.js') }}"></script> --}}
</body>

</html>
