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

 {{-- style css --}}
 <link rel="stylesheet" href="/css/login.css">
 <div class="container h-150">
     <div class="row d-flex justify-content-center align-items-center h-100">
         <div class="col-10 col-md-4 col-lg-6 col-xl-4">
                 
             <div class="card text-dark" style="border-radius: 1rem;">
                 <div class="card-body p-4">

                     <div class="mb-md-2 mt-md-2 pb-2">

                         <h4 class="fw-bold mb-4 text-center">Login Admin Bawaslu</h4>

                         <form action="/login" method="POST">
                             @csrf
                             <label class="form-label form-dark" for="username">Username</label>
                             <input type="text" name="username" class="form-control" id="username" />


                             <label class="form-label form-dark" for="password">Password</label>
                             <input type="password" name="password" id="password" class="form-control" />


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

 {{-- @endsection --}}
