@extends('layouts.main')
@section('content')
<section class="vh-100 sign-in">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Forget Password</h3>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <div class="row g-3">
                            <form action="{{ route('forget.password.post') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        placeholder="Email address" required autofocus />
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-warning btn-lg btn-block mt-3" type="submit">Send
                                        Verification Link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
