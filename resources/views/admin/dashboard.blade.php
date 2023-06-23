@extends('admin.layout.main')

@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Selamat Datang, {{ Auth()->user()->nama_lengkap }}</h3>
                </div>
                <div class=" col-md-12 ">
                    <div class="card mt-4">
                        <img src="img/admin.png" >
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
