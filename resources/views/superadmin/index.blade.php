@extends('layouts.main')

@section('contents')
    <div class="container">
        <h2>Selamat Datang Superadmin</h2>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
@endsection
