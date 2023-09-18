<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
    <title>
        @lang('app.Login')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('front') }}/assets/images/favicon.ico">

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('back') }}/assets/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="{{ asset('back') }}/assets/libs/owl.carousel/assets/owl.theme.default.min.css">

    <!-- Bootstrap Css -->
    <link href="{{ asset('back') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('back') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('back') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=IBM+Plex+Sans+Arabic:wght@200&display=swap" rel="stylesheet">

    <style>
        .auth-full-bg .bg-overlay{
            background-image: url("{{ url('back/images/settings/login7.jpg') }}");
            /* background-image: none; */
            /* background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center; */
        }
        *{
            font-family: Cairo;
        }
        input[type='email']::placeholder{   
            text-align: right; 
        }
    </style>

</head>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-8">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-50 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center"  style="margin-top: 140px;">
                                                <h4 class="mb-3">
                                                    <span> أكاديمية </span> <span style="color: rgb(85 110 232);border: 1px solid rgb(85 110 232);padding: 3px;margin: 0px 5px;font-weight: bold;"> اديوستديج </span>
                                                    {{-- <span style="color: rgb(85 110 232);border: 1px solid rgb(85 110 232);padding: 3px 0px 3px 3px;margin: 0px 5px;"> R-Plus </span> For Software --}}
                                                </h4>
                                                
                                                @if (session()->has('error_auth'))
                                                    <h4 class="alert alert-danger text-center text-bold" style="margin: 7px auto;color: #ffffff;background-color: #eb243f;border-color: #eb243f;" role="alert">
                                                        {{ session()->get('error_auth') }}            
                                                    </h4>
                                                @endif

                                                @if (session()->has('error_email_or_password'))
                                                    <h5 style="color: #fff;background: #eb243f;border-color: #eb243f;font-weight: bold;" class="alert alert-warning">
                                                        {{ session()->get('error_email_or_password') }}
                                                        {{ session()->forget('error_email_or_password') }}
                                                    </h5>
                                                @endif

                                                @if (count($errors) > 0)
                                                    @foreach ($errors->all() as $error)
                                                        <h5 class="alert alert-danger" style="margin: 7px auto;color: #ffffff;background-color: #e79da7;border-color: #e79da7;">
                                                            {{ $error }}                                                            
                                                        </h5>
                                                    @endforeach
                                                @endif
                                            
                                                <div dir="ltr">
                                                    <div>
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4" style="color:#FFF;background: #788def;padding: 10px;opacity: .7;">
                                                                    {{-- @lang('app.please  enter your correct email and password to login work style application') --}}
                                                                    قم بإدخال <strong> البريد الإلكتروني والرقم السري الصحيح </strong> للدخول إلي لوحة التحكم
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4" style="direction: rtl;">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5">
                                    <a href="index.html" class="d-block auth-logo">
                                        <img src="{{ url('front') }}/assets/images/logo/logo.png" alt="" height="60" class="auth-logo-dark">
                                        <img src="{{ url('front') }}/assets/images/logo/logo.png" alt="" height="60" class="auth-logo-light">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div class="mt-4">
                                        <form action="{{ url('admin/login_post') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">@lang('app.email')</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="يرجي ادخال البريد الإلكتروني" value="{{ old('email') }}">
                                            </div>

                                            <div class="mb-3">
                                                {{-- <div class="float-end">
                                                    <a href="{{ url('admin/forget_password') }}" class="text-danger">@lang('app.Forgot password')</a>
                                                </div> --}}
                                                <label class="form-label">@lang('app.password')</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" name="password" id="email" placeholder="يرجي ادخال الرقم السري" type="text" aria-label="Password" aria-describedby="password-addon">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                <label class="form-check-label" for="remember-check">
                                                    تذكرني
                                                </label>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">تسجيل دخول</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">
                                        جميع الحقوق محفوظة أكاديمية إيديوستيج
                                        © {{ date('Y') }} 
                                        <i class="mdi mdi-heart text-danger"></i>
                                        <br>
                                        <a href="https://www.linkedin.com/in/farid-negm" target="_blank" style="font-size: 14px;">By. Farid Negm</a> 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('back') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('back') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('back') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('back') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('back') }}/assets/libs/node-waves/waves.min.js"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('back') }}/assets/libs/owl.carousel/owl.carousel.min.js"></script>

    <!-- auth-2-carousel init -->
    <script src="{{ asset('back') }}/assets/js/pages/auth-2-carousel.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('back') }}/assets/js/app.js"></script>

</body>
</html>
