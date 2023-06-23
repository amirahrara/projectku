@extends('dashboard.layouts.main')

@section('content')

    <div class="container">
      
        <div class="col-md-15 mt-4">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="row">
                <div class="col-md-5">
                    <h4>Monitoring Layanan Informasi</h4>
                </div>
                <div class="col-md-7">
                    <div class="text-end">
                        <a href="/permohonan" class="btn btn-success btn-md">Ajukan Permohonan</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row d-flex align-items-center justify-content-center ">
            
                <style>
                    .card-header{
                        background-color: rgb(253, 99, 57);
                        color: white;
                    }
                    .card-body{
                        background-color: rgb(255, 230, 209);
                    }
                    
                </style>

                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header" >
                             <b>Cari Berdasarkan</b>
                        </div>
                        <div class="card-body">
                            {{-- <h4 class="card-title">Cari Berdasarkan</h4> --}}

                                <form>
                                    <div class="form-group row mb-1">

                                        <label for="nik" class="col-sm-2 col-form-label"><b>NIK</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="nik"
                                                value="{{ auth()->user()->nik }}">

                                        </div>
                                    </div>
                                    <div class="form-group row mb-1">
                                        <label for="nama" class="col-sm-2 col-form-label"><b>Nama</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="nama"
                                                value="{{ auth()->user()->nama }}">

                                        </div>
                                    </div>
                                    <div class="form-group row mb-1">
                                        <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="email"
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-1">
                                        <label for="no_telp" class="col-sm-2 col-form-label"><b>No.Telpon</b></label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="no_telp"
                                                value="{{ auth()->user()->no_telp }}">
                                        </div>
                                    </div>
                                </form>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-12  mt-4">
                    {{-- <div class="card">
                      <div class="card-body">
             --}}
                        <div class="table-responsive pt-3">
                          <table class="table table-bordered">
                            <thead style="background-color: rgb(248, 86, 41)" >
                                <tr>
                                    <th scope="col" style="color: white; text-align:center">No.</th>
                                    <th scope="col" style="color: white; text-align:center" style="width: 12%">Tanggal</th>
                                    <th scope="col" style="color: white; text-align:center">Rincian Informasi Yang Dibutuhkan</th>
                                    {{-- <th scope="col" style="color: white; text-align:center">nama</th> --}}
                                    <th scope="col" style="color: white; text-align:center">Tujuan Penggunaan Informasi</th>
        
                                    <th scope="col" style="color: white; text-align:center">Cara Memperoleh Informasi</th>
                                    <th scope="col" style="color: white; text-align:center">Cara Mendapatkan Salinan Informasi</th>
                                    <th scope="col" style="color: white; text-align:center">Status</th>
                                    <th scope="col" style="color: white; text-align:center">Unduh</th>
                                    {{-- <th scope="col">Hapus</th> --}}
                                </tr>
                            </thead>
                            <tbody>
        
                                @if (!$datauser->isEmpty())
                                    @foreach ($datauser as $item)
                                        <tr >
                                            <th scope="row" style="text-align: center">{{ $loop->iteration }}</th>
                                            <td style="text-align: center">{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                                            <td style="text-align: center">{{ $item->rincian }}</td>
                                            {{-- <td>{{ $item->user->nama }}</td>                                     --}}
                                            <td style="text-align: center">{{ $item->tujuan }}</td>
                                            <td style="text-align: center">{{ $item->memperoleh_informasi }}</td>
                                            <td style="text-align: center">{{ $item->mendapat_salinan }}</td>
                                            {{-- <td>{{ $item->ttd }}</td> --}}
                                            <td style="text-align: center">
                                                @if($item->status == 'Ditolak')
                                                <a href="" style="cursor:default" class="btn btn-danger btn-sm"
                                                data-toggle="modal" data-target="#myModal">{{ $item->status }}</a>
                                                @elseif($item->status == '')
                                                @else
                                                {{ $item->status }}
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                @if ($item->status == 'Ditolak')
                                                    <p>Data Kosong</p>
                                                @elseif($item->status == '')
                                                    <p>Data Kosong</p>
                                                @else
                                                    {{-- {{ $item->status }} --}}
                                                    <a href="/cetakpdf/{{ $item->id }}" class="btn btn-primary btn-sm"
                                                        target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                                            </td>
                                    @endif
                                    {{-- <td><a href="#" class="btn btn-danger"><i class="fa fa-trash-o" style="font-size:20px" aria-hidden="true"></i></a></td> --}}
        
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" >
                                        <div align="center">
        
                                            Data Kosong
                                        </div>
                                    </td>
                                </tr>
                    </div>
                    @endif
        
                    </tbody>
                          </table>
                        </div>
                      {{-- </div>
                    </div> --}}
                  </div>
                

                


            </div>
        </div>
@endsection
<!-- Modal -->
{{-- @foreach ($datauser as $item) --}}
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Alasan ditolak</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <h4>{{ $item->alasan }}</h4>
                        {{-- <p><b>lebakcyber.net</b></p> --}}
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   {{-- @endforeach --}}
