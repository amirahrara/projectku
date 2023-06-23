 {{-- @extends('layouts.beranda')

@section('container') --}}
 {{-- login boostrap --}}
 <!-- Font Awesome -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
 <!-- MDB -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     
<link rel="stylesheet" 
      href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" 
      integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" 
      crossorigin="anonymous">
     
     
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 {{-- style css --}}

 <link rel="stylesheet" href="/css/style.css">
 <div class="container">
     <div class="row d-flex justify-content-center align-items-center h-100">
        
         <div class="col-10 col-md-4 col-lg-6 col-xl-4">
            
            @if (session()->has('berhasil'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('berhasil') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

            @if (session()->has('gagal'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <center><img class="mb-5" src="/img/logo.png" alt="bawaslu" width="200"></center>
             <div class="card text-dark" style="border-radius: 1rem;">
                <div class="mb-md-2 mt-md-2 pb-2">
                    
                 <div class="card-body">    

                         <h4 class="fw-bold mb-4 text-center">Login Admin</h4>
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label form-dark" for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error ('username') is-invalid @enderror" autofocus required value="{{ old('username') }}"/>
                            @error('username')
                                     <div class="invalid-feedback">
                                     {{ $message }}   
                                    </div>   
                                    @enderror
                            </div>
                            
                            <div class="form-group mt-3">
                                <label class="form-label form-dark" for="kata_sandi">Kata Sandi</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" data-toogle="password" class="form-control" required/>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="password_show_hide();">
                                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                            <i class="fas fa-eye" id="show_eye"></i>
                                          </span>
                                      </div>
                                </div>
                            </div>
                            
                            <br>
                            <center>
                                <button type="submit" class="btn btn-outline-dark">Masuk</button>
                            </center>
   
                           
   
                            
                        </form>
                        
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
<script src="/js/hidenpsw.js"></script>
 

 {{-- @endsection --}}
