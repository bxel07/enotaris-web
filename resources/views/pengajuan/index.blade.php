<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>CRUD Notaris</title>

</head>
<body>
<div class="container mt-3">
    <a href="{{ route('pengajuan.create') }}" class="btn btn-md btn-success mb-3"> Tambah Data</a>
    <table class="table">
        <thead>
        <th> # </th>
        <th> ID_Customer </th>
        <th> Nama </th>
        <th> Alamat </th>
        <th> Email </th>
        <th> Telepon </th>
        <th> Jenis Perusahaan </th>
        <th> Jenis Pengajuan </th>
        <th> &nbsp; &nbsp; &nbsp; Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $id = 1;?>
        @forelse ($posts as $post)
            <tr>
                <td><?= $id++;?></td>
                <td>{{ $post->id_customer  }}</td>
                <td>{{ $post->nama }}</td>
                <td>{!! $post->alamat !!}</td>
                <td>{!! $post->email !!}</td>
                <td>{!! $post->telepon !!}</td>
                <td>{!! $post->jenis_perusahaan !!}</td>
                <td>{!! $post->jenis_pengajuan !!}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengajuan.destroy', $post->id) }}" method="POST">
                        {{--                        <a href="{{ route('pengajuan.show', $post->id) }}" class="btn btn-sm btn-dark">Preview</a>--}}
                        <a href="{{ route('pengajuan.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>

        @empty
            <div class="alert alert-danger">
                Data Customer belum Tersedia.
            </div>
        @endforelse
        </tbody>
    </table>
</div>
<br>
<br>
<div class="container mt-3">
    <table class="table">
        <thead>
        <th>#</th>
        <th> ID_Customer </th>
        <th> Nama </th>
        <th>KTP</th>
        <th>NPWP</th>
        <th>Sertifikat Tanah</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $id = 1;?>
        @forelse ($posts as $post)
            <tr>
                <td><?= $id++;?></td>
                <td>{{ $post->id_customer  }}</td>
                <td>{{ $post->nama }}</td>
                <td>{{ $post->ktp }}</td>
                <td>{!! $post->npwp !!}</td>
                <td>{!! $post->sertifikattanah !!}</td>
                <td>{!! $post->status !!}</td>
                <td>
                        <a href="{{ route('pengajuan.editdokumen', ['id' => $post->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                </td>

            </tr>

        @empty
            <div class="alert alert-danger">
                Data Dokumen belum Tersedia.
            </div>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
