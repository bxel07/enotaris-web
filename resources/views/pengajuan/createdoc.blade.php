<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>input data | Notaris Digital</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="section__backbutton">
            <a href="/pengajuan"><img src="{{ asset('images/left-arrow.png') }}" alt="back" class="back-button"></a>
        </div>
        <div class="card_form">
            <h3>Pilih Dokumen</h3>
            <div class="form">
                <div class="form_doc">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="masukkan nama">
                </div>
                <div class="form_doc">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="masukkan alamat">
                </div>
                <div class="form_file">
                    <label for="exampleFormControlInput1" class="form-label">Akta</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
                <div class="form_file">
                    <label for="exampleFormControlInput1" class="form-label">Setifikat</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
                <div class="form_file">
                    <label for="exampleFormControlInput1" class="form-label">Surat Izin</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                </div>
                <div class="card__formbutton">
                    <button><a class="link-website" href="/notaris">OK</a></button>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>

</html>
