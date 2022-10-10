<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | {{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <link rel="shortcut icon" href="{{ asset('vendors/assets/images/favicon.ico') }}">
        <link href="{{ asset('vendors/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendors/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <div class="card-header pt-3 pb-3 text-center bg-primary">
                                <a>
                                    <span>
                                        {{-- <img src="{{ asset('vendors/assets/images/logo.png') }}" alt="" height="18"> --}}
                                        <h1 style="color:white">{{env('APP_NAME')}}</h1>
                                    </span>
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter Your Phone Number and Password to Access Admin Panel.</p>
                                </div>
                                @error('not_verify')
                                    <div class="text-center w-75 m-auto">
                                        <span style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                                <form method="POST" action="{{ route('vendor.login.submit') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="number" id="phone" value="{{ old('phone') }}" name="phone" required="Enter Your Phone" placeholder="Enter your phone">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-alt">
            {{date('Y')}} - {{date('Y',strtotime('+1 years'))}} © {{env('APP_NAME')}}
        </footer>

        <script src="{{ asset('vendors/js/vendor.min.js') }}"></script>
        <script src="{{ asset('vendors/js/app.min.js') }}"></script>

    </body>

</html>
