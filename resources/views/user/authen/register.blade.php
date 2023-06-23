{{-- @extends('layouts.beranda') --}}
<head>
    <title>DAFTAR AKUN</title>
</head>
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{-- <link rel="stylesheet" href="/css/style.css"> --}}
<link rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
      crossorigin="anonymous">
<link rel="stylesheet" 
      href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" 
      integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" 
      crossorigin="anonymous">
<style>
    .card{
        background: rgba(253, 162, 76, 0.945);
    }
    @media only screen and (max-width:700px){
    .card{
        width: 100%;
        height: 120%;
        
    }
   
}
</style>


<div class="container h-150">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-8 offset-xl-7">

            <center><img class="mb-5" src="/img/logo.png" alt="bawaslu" width="200"></center>
            <div class="card text-dark" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    <div class="mb-md-2 mt-md-3 pb-2">

                        <h4 class="fw-bold mb-4 text-center">Daftar Akun</h4>
                        <form action="/register/user" method="post">
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6 mb-3">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" required value="{{ old('nik') }}">
                                    @error('nik')
                                     <div class="invalid-feedback">
                                     {{ $message }}   
                                    </div>   
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" required value="{{ old('nama') }}">
                                    @error('nama')
                                     <div class="invalid-feedback">
                                     {{ $message }}   
                                    </div>   
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{ old('email') }}">
                                    @error('email')
                                     <div class="invalid-feedback">
                                     {{ $message }}   
                                    </div>   
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="no_telp">No.Telpon</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" required value="{{ old('no_telp') }}">
                                    </div>
                                    {{-- <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">+62</div>
                                        </div> --}}
                                        
                                    @error('no_telp')
                                     <div class="invalid-feedback">
                                     {{ $message }}   
                                    </div>   
                                    @enderror
                                      {{-- </div> --}}
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="alamat">Alamat (sesuai KTP)</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" required value="{{ old('alamat') }}">
                                    @error('alamat')
                                     <div class="invalid-feedback">
                                     {{ $message }}   
                                    </div>   
                                    @enderror
                                </div>
                               
                                <div class="col-md-6 mb-3">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" required value="{{ old('pekerjaan') }}">
                                    @error('pekerjaan')
                                     <div class="invalid-feedback">
                                     {{ $message }}   
                                    </div>   
                                    @enderror
                                </div>
                                
                                {{-- <style>
                                    body{
                                        padding:100px 0;
                                        background-color:#efefef
                                    }
                                    a, a:hover{
                                        color:#333
                                    }
                                </style> --}}
                                <div class=" col-md-6 mb-3">
                                    <label for="foto_ktp" class="form-label">Upload foto KTP anda disini</label>
                                    <input class="form-control" type="file" id="foto_ktp" name="foto_ktp">
                                    @error('foto_ktp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                  </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password">Kata Sandi</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  id="password" data-toogle="password" required value="{{ old('password') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" onclick="password_show_hide();">
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                                <i class="fas fa-eye" id="show_eye"></i>
                                              </span>
                                          </div>
                                        @error('password')
                                     <div class="invalid-feedback">
                                     {{ $message }}   
                                    </div>   
                                    @enderror
                                    </div>
                                </div>
                                
                                <div class="text-center"> 
                                    <button type="submit" class="btn btn-outline-dark">Daftar</button>
                                </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>

</div>
<script src="/js/hidenpsw.js">
</script>
<script>
    // prevent deleting +62
    document.getElementById("no_telp").addEventListener("keydown", function(event) {
        // allow numbers and backspace
        if ((event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 8) {
            // allow backspace if not deleting +62
            if (event.keyCode === 8 && caretStart !== 0) {
                event.preventDefault();
            }
        } else {
            event.preventDefault();
        }
    });
</script>

{{-- <script>
    function allowBackspace(event) {
        var keyCode = event.keyCode || event.which;
        var inputElement = event.target;
        var startSelection = inputElement.selectionStart;
        var endSelection = inputElement.selectionEnd;

        if (keyCode === 8 && startSelection === endSelection && startSelection <= 3) {
            event.preventDefault();
        }
    }
</script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous">
</script>
<script  src="/path/to/bootstrap-show-password.js"></script> --}}
{{-- <script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script> --}}