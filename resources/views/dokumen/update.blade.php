<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('dokumen.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">KTP</label>
                                <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" value="{{ old('ktp') }}" placeholder="Masukkan File KTP">

                                <!-- error message untuk title -->
                                @error('ktp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NPWP</label>
                                <input type="file" class="form-control @error('npwp') is-invalid @enderror" name="npwp" value="{{ old('npwp') }}" placeholder="Masukkan File NPWP">

                                <!-- error message untuk title -->
                                @error('npwp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Sertifikat Tanah</label>
                                <input type="file" class="form-control @error('sertifikattanah') is-invalid @enderror" name="sertifikattanah" value="{{ old('sertifikattanah') }}" placeholder="Masukkan Alamat Email">

                                <!-- error message untuk title -->
                                @error('sertifikattanah')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
