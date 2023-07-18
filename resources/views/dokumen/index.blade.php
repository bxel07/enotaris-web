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
    <a href="{{route("dokumen.create")}}" class="btn btn-md btn-success mb-3"> Tambah Data</a>
    <table class="table">
        <thead>
            <th>#</th>
            <th>KTP</th>
            <th>NPWP</th>
            <th>Sertifikat Tanah</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $id = 1;?>
        @forelse ($posts as $post)
            <tr>
                <td><?= $id++;?></td>

                <td>{{ $post->ktp }}</td>
                <td>{!! $post->npwp !!}</td>
                <td>{!! $post->sertifikattanah !!}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dokumen.destroy', $post->id) }}" method="POST">
                        <a href="{{ route('dokumen.show', $post->id) }}" class="btn btn-sm btn-dark">Preview</a>
                        <a href="{{ route('dokumen.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>

        @empty
            <div class="alert alert-danger">
                Data Post belum Tersedia.
            </div>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
