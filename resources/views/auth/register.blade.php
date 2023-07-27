@extends('layouts.main')
@section('contens')
<section class="vh-100 sign-up">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Sign Up</h3>
                        <form action="" method="post" class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="fname" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="lname" placeholder="Last Name">
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control" id="email" placeholder="Email Address">
                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="row mt-2">
                                <div class="col justify-content-end">
                                    <a href="/login">Already Have account?</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection