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
                        <form action="{{route( 'pengajuan.store' )}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Customer_ID</label>
                                <input type="number" class="form-control @error('id_customer') is-invalid @enderror" name="id_customer" value="{{ old('id_customer') }}" placeholder="Masukkan nomor customer Customer">

                                <!-- error message untuk title -->
                                @error('id_customer')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Customer">

                                <!-- error message untuk title -->
                                @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat Customer">

                                <!-- error message untuk title -->
                                @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Alamat Email">

                                <!-- error message untuk title -->
                                @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Telepon</label>
                                <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" placeholder="Masukkan Alamat Email">

                                <!-- error message untuk title -->
                                @error('telepon')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Perusahaan</label>
                                <input type="text" class="form-control @error('jenis_perusahaan') is-invalid @enderror" name="jenis_perusahaan" value="{{ old('jenis_perusahaan') }}" placeholder="Masukkan jenis perusahaan">

                                <!-- error message untuk title -->
                                @error('jenis_perusahaan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Pengajuan</label>
                                <input type="text" class="form-control @error('jenis_pengajuan') is-invalid @enderror" name="jenis_pengajuan" value="{{ old('jenis_perusahaan') }}" placeholder="Masukkan jenis pengajuan">

                                <!-- error message untuk title -->
                                @error('jenis_pengajuan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

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

                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Select Status">
                                    <option value="inprogress" {{ old('status') == 'inprogress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="valid" {{ old('status') == 'valid' ? 'selected' : '' }}>Valid</option>
                                    <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>

                                <!-- error message for status -->
                                @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
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
