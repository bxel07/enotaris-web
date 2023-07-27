@extends('layouts.main')
@section('contents')
<section class="vh-100 sign-in">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Log In</h3>
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email"
                                    class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                    placeholder="Email address" />
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    placeholder="Password" />
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col mb-4">
                                    <a href="/register">Didn't Have account?</a>
                                </div>
                                <div class="col mb-4">
                                    <a href="/forget-password">Forget Password?</a>
                                </div>
                            </div>
                            <button class="btn btn-warning btn-lg btn-block" type="submit">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection