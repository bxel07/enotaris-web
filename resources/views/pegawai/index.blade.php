@extends('layouts.main')
@section('contents')
    <div class="container">
        <h2>Selamat Datang Pegawai</h2>
        <form action="/logout" method="post">
            @csrf
            <button class="btn btn-primary" type="submit">Logout</button>
        </form>
    </div>
@endsection
