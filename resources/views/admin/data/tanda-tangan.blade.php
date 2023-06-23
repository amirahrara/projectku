@extends('admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-lg-6 grid-margin stretch-card">


                {{-- @if ($validasiTtd == null)
                    <h4>Data sudah ada</h4>
                @else --}}

                @if (empty(Auth::user()->tanda_tangan))
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tanda Tangan</h4>
                        
                        <form method="POST" action="/create-tanda-tangan" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="tanda_tangan">Upload file tanda tangan anda disini</label>
                                    <input type="file" name="tanda_tangan" class="form-control-file" required>
                                    @error('tanda_tangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </form>
                @else
                <h4>Data sudah ada</h4>
                    {{-- @endif --}}
                @endif

            </div>
        </div>
    @endsection
