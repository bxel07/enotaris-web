<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Doc Preview Pengajuan CV</title>
    <link rel="stylesheet" href="{{asset('css/formstyle.css')}}" />
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
</head>


<body>
<section class="vh-200 doc">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8">
                <div class="card shadow-2-strong">
                    <div class="card-body p-5 text-center">
                        <form action="{{route('pengajuan_data.update', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Data Pengaju -->
                            <div class="card-title mb-5">
                                <h3 class="text-center">Yang Mengajukan Pembuatan Akta CV</h3>
                            </div>

                            <div class="row g-3 align-items-center">
                                <div class="col-4">
                                    <label for="id_customer" id="nama_pemohoncv1" class="col-form-label">ID_Customer</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="id_customer " name="id_customer" value="{{$data->id_customer}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="nama" id="pemohon_ttl1"
                                           class="col-form-label">Nama</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="email" id="pemohon_ttl1"
                                           class="col-form-label">Email</label>
                                </div>
                                <div class="col-6">
                                    <input type="email" class="form-control" name="email" value="{{$data->email}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="alamat" id="pemohon_ttl1"
                                           class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="Telepon" id="pemohon_ttl1"
                                           class="col-form-label">Telepon</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="telepon" value="{{$data->telepon}}">
                                </div>
                            </div>


                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="kategori perusahaan" id="pemohon_ttl1"
                                           class="col-form-label">Kategori Perusahaan</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="kategori_perusahaan" value="{{$data->kategori_perusahaan}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="jenis pengajuan" id="pemohon_ttl1"
                                           class="col-form-label">Jenis Pengajuan</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="jenis_pengajuan" value="{{$data->jenis_pengajuan}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3 mb-5">
                                <div class="col-4">
                                    <label for="status" id="pemohon_ttl1"
                                           class="col-form-label">Status</label>
                                </div>
                                <div class="col-6">
                                    <select class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Select Status" value="{{$data->status}}">
                                        <option value="onprogress" {{ old('status') == 'inprogress' ? 'selected' : '' }}>on Progress</option>
                                        <option value="valid" {{ old('status') == 'valid' ? 'selected' : '' }}>Valid</option>
                                        <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                                    </select>
                                </div>
                            </div>
                            <!-- End Data Pengaju -->

                            <!-- data pendiri 1 start-->
                            <div class="card-title mb-5">
                                <h3 class="text-center">Data Pemohon</h3>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-4">
                                    <label for="nama_pemohoncv1" id="nama_pemohoncv1"
                                           class="col-form-label">Nama</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="nama1" name="nama1" value="{{$data->pemohon[0]['nama1']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="pemohon_ttl1" id="pemohon_ttl1" name="pemohon_ttl1"
                                           class="col-form-label">Tempat, tgl
                                        lahir</label>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control"  name="tmp_lahir1" value="{{$data->pemohon[0]['tmp_lahir1']}}">
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control"  name="Tgl_lahir1" value="{{$data->pemohon[0]['Tgl_lahir1']}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="pekerjaan" id="pekerjaan"
                                           class="col-form-label">Pekerjaan</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="pekerjaan_pemohon_cv1" name="pekerjaan1" value="{{$data->pemohon[0]['pekerjaan1']}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="alamat" id="alamat"
                                           class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="alamat_pemohon_cv1"
                                           name="alamat1" value="{{$data->pemohon[0]['alamat1']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="ktp" id="ktp"
                                           class="col-form-label">No KTP</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="ktp_pemohon_cv1"
                                           name="no_ktp1" value="{{$data->pemohon[0]['no_ktp1']}}">
                                </div>
                            </div>
                            <!-- data pendiri 1 end -->

                            <!-- data pendiri 2 start -->
                            <div class="row g-3 mt-5 align-items-center">
                                <div class="col-4">
                                    <label for="nama_pemohoncv1" id="nama_pemohoncv1"
                                           class="col-form-label">Nama</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="nama1"
                                           name="nama2" value="{{$data->pemohon[0]['nama2']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="pemohon_ttl1" id="pemohon_ttl1" name="pemohon_ttl1"
                                           class="col-form-label">Tempat, tgl
                                        lahir</label>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control"  name="tmp_lahir2" value="{{$data->pemohon[0]['tmp_lahir2']}}">
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control"  name="Tgl_lahir2" value="{{$data->pemohon[0]['Tgl_lahir2']}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="pekerjaan" id="pekerjaan"
                                           class="col-form-label">Pekerjaan</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="pekerjaan_pemohon_cv1" name="pekerjaan2" value="{{$data->pemohon[0]['pekerjaan2']}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="alamat" id="alamat"
                                           class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="alamat_pemohon_cv2"
                                           name="alamat2" value="{{$data->pemohon[0]['alamat2']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="ktp" id="ktp"
                                           class="col-form-label">No KTP</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="ktp_pemohon_cv1"
                                           name="no_ktp2" value="{{$data->pemohon[0]['no_ktp2']}}">
                                </div>
                            </div>
                            <!-- data pendiri 2 end -->

                            <!-- data pendiri 3 start -->
                            <div class="row g-3 mt-5 align-items-center">
                                <div class="col-4">
                                    <label for="nama_pemohoncv1" id="nama_pemohoncv1"
                                           class="col-form-label">Nama</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="nama1"
                                           name="nama3" value="{{$data->pemohon[0]['nama3']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="pemohon_ttl1" id="pemohon_ttl1" name="pemohon_ttl1"
                                           class="col-form-label">Tempat, tgl
                                        lahir</label>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control"  name="tmp_lahir3" value="{{$data->pemohon[0]['tmp_lahir3']}}">
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control"  name="Tgl_lahir3" value="{{$data->pemohon[0]['Tgl_lahir3']}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="pekerjaan" id="pekerjaan"
                                           class="col-form-label">Pekerjaan</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="pekerjaan_pemohon_cv1" name="pekerjaan3" value="{{$data->pemohon[0]['pekerjaan3']}}">
                                </div>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="alamat" id="alamat"
                                           class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="alamat_pemohon_cv3"
                                           name="alamat3" value="{{$data->pemohon[0]['alamat3']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="ktp" id="ktp"
                                           class="col-form-label">No KTP</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="ktp_pemohon_cv1"
                                           name="no_ktp3" value="{{$data->pemohon[0]['no_ktp3']}}">
                                </div>
                            </div>
                            <!-- data pendiri 3 end -->

                            <!-- pemberi kuasa start -->
                            <div class="card-title mt-5">
                                <h3 class="text-center">Pemberi Kuasa</h3>
                            </div>
                            <div class="row g-3 align-items-center mt-3">
                                <div class="col-4">
                                    <label for="pemilik_kuasa" id="pemilik_kuasa" name="pemilik_kuasa"
                                           class="col-form-label">Pemilik Kuasa</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="pemilik_kuasa" name="pemilik_kuasa" value="{{$data->pemberi_kuasa[0]['pemilik_kuasa']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="ttl_pemilik_kuasa" id="ttl_pemilik_kuasa" name="ttl_pemilik_kuasa"
                                           class="col-form-label">Tempat tgl lahir</label>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control"  name="tempat_lahir_pemilik_kuasa" value="{{$data->pemberi_kuasa[0]['tempat_lahir_pemilik_kuasa']}}">
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control"  name="tgl_lahir_pemilik_kuasa" value="{{$data->pemberi_kuasa[0]['tgl_lahir_pemilik_kuasa']}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="alamat_pemilik_kuasa" id="alamat_pemilik_kuasa"
                                           name="alamat_pemilik_kuasa" class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="alamat_pemilik_kuasa"
                                           name="alamat_pemilik_kuasa" value="{{$data->pemberi_kuasa[0]['alamat_pemilik_kuasa']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="ktp_pemilik_kuasa" id="ktp_pemilik_kuasa" name="ktp_pemilik_kuasa"
                                           class="col-form-label">No KTP</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="ktp_pemilik_kuasa"
                                           name="no_ktp_pemilik_kuasa" value="{{$data->pemberi_kuasa[0]['no_ktp_pemilik_kuasa']}}">
                                </div>
                            </div>
                            <!-- pemberi kuasa end -->

                            <!-- data cv start -->
                            <div class="card-title mt-5">
                                <h3>Data CV</h3>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="nama_cv" id="nama_cv"  class="col-form-label">Nama
                                        CV</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="nama_cv" name="nama_cv" value="{{$data->data_cv[0]['nama_cv']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="alamat_cv" id="alamat_cv"
                                           class="col-form-label">Alamat
                                        CV</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="alamat_cv" name="alamat_cv" value="{{$data->data_cv[0]['alamat_cv']}}" >
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="bidang_usaha_cv" id="bidang_usaha_cv"
                                           class="col-form-label">Bidang Usaha (KBLI)</label>
                                </div>
                                <div class="col-6">
                                    <select name="bidang_usaha[]" id="jenis_cv" multiple>
                                        <option value="teknologi">Teknologi</option>
                                        <option value="jasa">Jasa</option>
                                        <option value="asuransi">Asuransi</option>
                                        <option value="kesehatan">Kesehatan</option>
                                        <option value="ekspor impor">Ekspor Impor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="modal" id="modal"  class="col-form-label">Modal</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="modal" name="modal"
                                           placeholder="Rp. " value="{{$data->data_cv[0]['modal']}}">
                                </div>
                            </div>
                            <div class="card-title mt-5">
                                <h3>Susunan Pengurus</h3>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="persero_aktif" id="persero_aktif"
                                           class="col-form-label">Persero Aktif</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="persero_aktif" name="persero_aktif" value="{{$data->data_cv[0]['persero_aktif']}}">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="persero_pasif" id="persero_pasif"
                                           class="col-form-label">Persero Pasif</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="persero_pasif" name="persero_pasif" value="{{$data->data_cv[0]['persero_pasif']}}">
                                </div>
                            </div>

                            <!-- data cv end -->

                            <!--Dokumen Administrasi-->
                            <div class="card-title mt-5">
                                <h3 class="text-center">Dokumen Administrasi</h3>
                            </div>

                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="ktp" id="ktp"
                                           class="col-form-label">KTP</label>
                                </div>
                                <div class="col-6">
                                    <input type="file" class="form-control" id="persero_pasif" name="ktp">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3">
                                <div class="col-4">
                                    <label for="npwp" id="npwp"
                                           class="col-form-label">NPWP</label>
                                </div>
                                <div class="col-6">
                                    <input type="file" class="form-control" id="persero_pasif" name="npwp">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center pt-3 mb-3">
                                <div class="col-4">
                                    <label for="kk" id="kk"
                                           class="col-form-label">Kartu Keluarga</label>
                                </div>
                                <div class="col-6">
                                    <input type="file" class="form-control" id="persero_pasif" name="kk">
                                </div>
                            </div>

                            <!--End Dokumen Administrasi-->
                            <button class="btn btn-warning btn-lg btn-block" type="submit">
                                Submit
                            </button>
                            <button class="btn btn-info btn-lg btn-block" type="reset">
                                Reset
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('jenis_cv', {
        rounded: true,    // default true
        shadow: true,      // default false
        placeholder: 'Search',  // default Search...
        onChange: function (values) {
            console.log(values)
        }
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
