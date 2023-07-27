@extends('layouts.main')
@section('content')
    <section class="vh-100" style="background:#f48f00 ">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="background-color: #ffe3bd; border-radius: 1rem ">
              <div class="card-body p-5 text-center">
                <h3 class="mb-5">Forget Password</h3>
                <div class="row g-3">
                    <form action="{{ route('reset.password.post') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="col-12">
                            <input type="email" name="email" id="email_address" class="form-control form-control-lg" placeholder="Email address" required autofocus />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-12 mt-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter new password" required autofocus />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="col-12 mt-3">
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm new password" required autofocus/>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <button class="btn btn-warning btn-lg btn-block mt-3" type="submit">Set New Password</button>
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
