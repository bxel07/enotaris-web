<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />

    <title>CRUD Notaris</title>

</head>

<body>
    <div class="container">
        <aside class="sidebar close">
            <div class="sidebar__title">
                <h4>Notaris <span>Digital</span></h4>
            </div>

            <div class="sidebar__user">
                <img src="{{ asset('images/user2.png') }}" alt="user" class="user">
                <div class="sidebar__userrole">
                    <span>admin</span>
                    <span class="sidebar__username">{{ auth()->user()->firstname }}</span>
                </div>
                 <img src="{{ asset('images/right-arrow.png') }}" alt="arrow" class="sidebar__toggle">
            </div>
            <nav>
                <ul class="sidebar__navmenu">
                    <li>
                        <a href="{{route("pegawai.index")}}">
                            <img src="{{ asset('images/dashboard.png') }}" alt="dashboard" class="sidebar__iconnav">
                            <span>Dashboard</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{route("pegawai.generateshow")}}">
                            <img src="{{ asset('images/printer.png') }}" alt="printer" class="sidebar__iconnav">
                            <span>Cetak Dokumen</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("pegawai.log")}}">
                            <img src="{{ asset('images/log.png') }}" alt="log" class="sidebar__iconnav">
                            <span>Log</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("pegawai.file")}}">
                            <img src="{{ asset('images/folder.png') }}" alt="folder" class="sidebar__iconnav">
                            <span>Folder</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="logout">
                            <img src="{{ asset('images/logout.png') }}" alt="logout" class="sidebar__iconnav">
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="dasboard">
            <div class="dasboard__info">
                <h2>Dasboard</h2>
                <div class="dasboard__data">
                    <div class="dasboard__datadoc">
                        <div class="dasboard__datadesc"><span>{{$result["jumlah"]}}</span> <span>New doc</span></div>
                        <div class="dasboard__dataicon">
                            <img src="{{ asset('images/add.png') }}" alt="add" class="dasboard__icondata">
                        </div>
                    </div>
                    <div class="dasboard__dataproc">
                        <div class="dasboard__datadesc"><span>{{$result["inprogress"]}}</span> <span>On Progress</span></div>
                        <div class="dasboard__dataicon">
                            <img src="{{ asset('images/Document.png') }}" alt="document" class="dasboard__icondata">
                        </div>
                    </div>
                    <div class="dasboard__datacomp">
                        <div class="dasboard__datadesc"><span>{{$result["valid"]}}</span> <span>Complete</span></div>
                        <div class="dasboard__dataicon">
                            <img src="{{ asset('images/file.png') }}" alt="file" class="dasboard__icondata">
                        </div>
                    </div>
                </div>
            </div>

            <div class="dasboard__document">
                <div class="dasboard__judul">
                    <h2>Data Dokumen</h2>
                </div>
                <div class="dasboard__search">
                    <form action="{{route('pegawai.index')}}" method="get" class="d-flex search">
{{--                        @csrf--}}
                        <input class="form-control me 2" type="search" placeholder="search" name="customer_id">

                        <button class="search-button" type="submit">Search</button>
                    </form>
                </div>
                <div class="dasboard__table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id_Customer</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $id = 1;?>
                        @if (isset($datacustomer) && count($datacustomer) > 0)
                            @foreach ($datacustomer as $data)
                                <tr>
                                    <td><?= $id++;?></td>
                                    <td>{{ $data->id_customer }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{!! $data->alamat !!}</td>
                                    <td>{!! $data->status !!}</td>
                                </tr>
                            @endforeach
                        @else
                            @if (isset($posts) && count($posts) > 0)
                                @foreach ($posts as $post)
                                    <tr>
                                        <td><?= $id++;?></td>
                                        <td>{{ $post->id_customer }}</td>
                                        <td>{{ $post->nama }}</td>
                                        <td>{!! $post->alamat !!}</td>
                                        <td>{!! $post->status !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Data Customer belum Tersedia.</td>
                                </tr>
                            @endif
                        @endif
                        </tbody>
                    </table>
                    @if(isset($posts) && count($posts) > 0)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                @if ($posts->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="page-link" href="{{ $posts->previousPageUrl() }}" tabindex="-1">Previous</a>
                                    </li>
                                @endif

                                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                    @if ($page == $posts->currentPage())
                                        <li class="active">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li>
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($posts->hasMorePages())
                                    <li>
                                        <a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a>
                                    </li>
                                @else
                                    <li class="disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif

                </div>
            </div>
        </main>
    </div>
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const csrfToken = '{{ csrf_token() }}';
    </script>
</body>

</html>
