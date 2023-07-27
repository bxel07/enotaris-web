<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css" />

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
            <span>Zulfian Nafis</span>
            <img src="{{ asset('images/right-arrow.png') }}" alt="arrow" class="sidebar__toggle">
        </div>
        <nav>
            <ul class="sidebar__navmenu">
                <li>
                    <a href="#">
                        <img src="{{ asset('images/dashboard.png') }}" alt="dashboard" class="sidebar__iconnav">
                        <span>Dashboard</span>
                    </a>

                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('images/printer.png') }}" alt="printer" class="sidebar__iconnav">
                        <span>Cetak Dokumen</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('images/log.png') }}" alt="log" class="sidebar__iconnav">
                        <span>Log</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('images/folder.png') }}" alt="folder" class="sidebar__iconnav">
                        <span>Folder</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                    <div class="dasboard__datadesc"><span>15</span> <span>New doc</span></div>
                    <div class="dasboard__dataicon">
                        <img src="{{ asset('images/add.png') }}" alt="add" class="dasboard__icondata">
                    </div>
                </div>
                <div class="dasboard__dataproc">
                    <div class="dasboard__datadesc"><span>30</span> <span>On Progress</span></div>
                    <div class="dasboard__dataicon">
                        <img src="{{ asset('images/Document.png') }}" alt="document" class="dasboard__icondata">
                    </div>
                </div>
                <div class="dasboard__datacomp">
                    <div class="dasboard__datadesc"><span>10</span> <span>Complete</span></div>
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
            <div class="dasboard__button_and_search">
                <button><a href="{{route("notaris.create")}}">Tambah Dokumen</a></button>
                <div class="d-flex search">
                    <input class="form-control me 2" type="search" placeholder="search">
                    </input>
                    <button class="search-button" type="send">Search</button>
                </div>
            </div>
            <div class="dasboard__table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Lamongan</td>
                        <td class="failed-status fw-bold">FAILED</td>
                        <td class="">
                            <a class="a-edit" href=""><img src="{{ asset('images/edit.png') }}" alt="edit"
                                                           class="dasboard-icon"></a>
                            <a href="" class="a-delete"><img src="{{ asset('images/delete.png') }}" alt="delete"
                                                             class="dasboard-icon"></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Surabaya</td>
                        <td class="progress-status">ON PROGRESS</td>
                        <td class="">
                            <a class="a-edit" href=""><img src="{{ asset('images/edit.png') }}" alt="edit"
                                                           class="dasboard-icon"></a>
                            <a href="" class="a-delete"><img src="{{ asset('images/delete.png') }}" alt="delete"
                                                             class="dasboard-icon"></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td class="succes-status">SUCCESS</td>
                        <td class="">
                            <a class="a-edit" href=""><img src="{{ asset('images/edit.png') }}" alt="edit"
                                                           class="dasboard-icon"></a>
                            <a href="" class="a-delete"><img src="{{ asset('images/delete.png') }}" alt="delete"
                                                             class="dasboard-icon"></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>
</div>
<script src="/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
