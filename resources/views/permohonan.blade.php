@extends('dashboard.layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>

    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 py-5">
            <div class="col-12 col-md-4 col-lg-6 col-xl-12">
                <h5>Permohonan Informasi</h5>

                <div class="card mt-4" style="border-radius: 1rem">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form action="/permohonan/buat" method="post" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-group d-none d-sm-block"> --}}
                                    <input type="hidden" class="form-control" name="user_id" value="0">
                                  {{-- </div> --}}
                                <div class=" mb-3">
                                    <strong><label for="rincian">Rincian Informasi Yang Dibutuhkan</label></strong>
                                    <textarea class="form-control " id="rincian" rows="3" name="rincian" required></textarea>
                                </div>
                                <div class=" mb-3">
                                    <strong><label for="tujuan">Tujuan Penggunaan Informasi</label></strong>
                                    <textarea class="form-control " id="tujuan" rows="3" name="tujuan" required></textarea>

                                </div>
                                <div class=" mb-3">
                                    <strong><label for="memperoleh_informasi">Cara Memperoleh Informasi</label></strong>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Melihat" id="melihat"
                                            name="memperoleh_informasi">
                                        <label class="form-check-label" for="melihat">
                                            Melihat
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Membaca" id="membaca"
                                            name="memperoleh_informasi">
                                        <label class="form-check-label" for="membaca">
                                            Membaca
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Mendengarkan"
                                            id="mendengarkan" name="memperoleh_informasi">
                                        <label class="form-check-label" for="mendengarkan">
                                            Mendengarkan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Mecatat" id="mencatat"
                                            name="memperoleh_informasi">
                                        <label class="form-check-label" for="mencatat">
                                            Mencatat
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Mendapatkan Salinan Hardcopy" id="hardcopy"
                                            name="memperoleh_informasi">
                                        <label class="form-check-label" for="hardcopy">
                                            Mendapatkan Salinan Hardcopy
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Mendapatkan Salinan Softcopy" id="softcopy"
                                            name="memperoleh_informasi">
                                        <label class="form-check-label" for="softcopy">
                                            Mendapatkan Salinan Softcopy
                                        </label>
                                        @error('memperoleh_informasi')
                                            <label class="alert"
                                                style="float: right; margin-right:45px; margin-top:-15px; color:red;">Anda Belum
                                                Memilih Apapun</label>
                                            <br />
                                        @enderror
                                    </div>
                                </div>


                                <div class=" mb-3">
                                    <strong><label for="mendapat_salinan">Cara Mendapatkan Salinan
                                            Informasi</label></strong>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Langsung" id="langsung"
                                            name="mendapat_salinan">
                                        <label class="form-check-label" for="langsung">
                                            Mengambil Langsung
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Kurir" id="kurir"
                                            name="mendapat_salinan">
                                        <label class="form-check-label" for="kurir">
                                            Kurir
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Pos" id="pos"
                                            name="mendapat_salinan">
                                        <label class="form-check-label" for="pos">
                                            Pos
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Fasimili" id="faksimili"
                                            name="mendapat_salinan">
                                        <label class="form-check-label" for="faksimili">
                                            Faksimili
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Email" id="Email"
                                            name="mendapat_salinan">
                                        <label class="form-check-label" for="Email">
                                            Email
                                        </label>
                                        @error('mendapat_salinan')
                                            <label class="alert"
                                                style="float: right; margin-right:45px; margin-top:-15px; color:red;">Anda
                                                Belum Memilih Apapun</label>
                                            <br />
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 px-2">
                                    <div class="card-body">

                                        {{-- <form method="POST" action="{{ route('signaturepad.upload') }}"> --}}

                                        <div class="col-md-10">
                                            <strong><label for="ttd">Tanda Tangan</label></strong>

                                            <div id="sig"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button id="clear" class="btn btn-danger btn-sm">Hapus</button>
                                                    <textarea id="signature64" name="ttd" style="display: none" required></textarea>
                                                </div>
                                                {{-- <div class="">
                                                <button class="btn btn-success btn-sm">Simpan</button>
                                            </div> --}}
                                            </div>
                                        </div>



                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class=" mt-3 text-end ">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
@endsection
