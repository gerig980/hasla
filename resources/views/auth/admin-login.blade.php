<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Login-Dashboard | Klaudio Fashion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('backend/assets/images/klaudio-fashion-favIcon.png') }}">

    <!-- Layout config Js -->
    <script src="{{URL::asset('backend/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{URL::asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{URL::asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{URL::asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{URL::asset('backend/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .auth-bg-cover {
             background: linear-gradient(45deg, #405189 50%, #0ab39c);
        }
    </style>
</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                @if($errors->any())
                <div class="row">
                    <div class="col-8 offset-2">
                        <div class="alert alert-danger" style="margin-top: 30px;">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @if(Session::has('error_message'))
                <div class="row">
                    <div class="col-8 offset-2">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                        {{Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                   </div>
                    <?php Session::forget('error_message') ?>
                    </div>
                </div>
                @endif
                @if(Session::has('success_message'))
                <div class="row">
                    <div class="col-8 offset-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                       {{Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                   </div>
                   <?php Session::forget('success_message') ?>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="#" class="d-block">
                                                    <img src="/images/Klaudio-Fashion-Logo-White.png" alt="" width="200">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Mirësevini !</h5>
                                            <p class="text-muted">Logohu për të vazhduar tek Klaudio Fashion Panel.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form method="POST" action="{{ route('admin.login.submit') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Adresa e Emailit</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="auth-remember-check">Më mbaj mend</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Logohu</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>document.write(new Date().getFullYear())</script> Klaudio Fashion. Crafted with <i class="mdi mdi-heart text-danger"></i> by BigMediaExpert
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{URL::asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{URL::asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{URL::asset('backend/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{URL::asset('backend/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{URL::asset('backend/assets/js/plugins.js')}}"></script>

    <!-- password-addon init -->
    <script src="{{URL::asset('backend/assets/js/pages/password-addon.init.js')}}"></script>
</body>

</html>