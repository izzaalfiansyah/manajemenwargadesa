<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    @include('layouts._main.css')
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">    
                        @if ($errors->any())
                            <x-alert type="danger">
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </x-alert>
                        @endif
                        @if (Session::has('notif'))
                            {!! Session::get('notif') !!}
                        @endif

                        <div class="auth-form-light shadow-sm text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('/') }}images/logo.svg" alt="logo">
                            </div>
                            <h4>Login</h4>
                            <h6 class="fw-light">Masukkan data anda untuk memulai sesi.</h6>
                            <form class="pt-3" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <input type="text" name="username" autocomplete="off" class="form-control form-control-lg" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" autocomplete="off" class="form-control form-control-lg" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                                </div>
                                {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts._main.js')
</body>

</html>
