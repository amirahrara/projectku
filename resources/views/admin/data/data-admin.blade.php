@extends('admin.layout.main')

@section('content')
    <div class="content-wrapper">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col">
                                <p class="card-title">Data Admin Web Bawaslu</p>
                            </div>
                            <div class="col">
                                <button style="float: right" type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#modal-create" id="btn-create-supplier"><i class="ti-plus"></i>
                                    Tambah
                                    Data</button>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table dataTable no-footer" role="grid">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                                <th>Action</th>
                                                {{-- <th>Petugas Penerima</th>
                                            <th>Status</th>
                                            <th>Lihat Data</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="ajaxModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading"></h5>
                    <button type="button" class="close modelClose" data-dismiss="modal" aria-label="Close">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                        <button type="button" class="close modelClose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="supplierForm" name="supplierForm" class="form-horizontal">
                        <input type="hidden" class="supplier_id" name="supplier_id" id="supplier_id">


                        <div class="form-group">
                            <label class="control-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_lengkap"></div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">username</label>
                            <input type="text" class="form-control" id="username" name="username">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <select class="form-control" name="jabatan" id="jabatan">
                                <option selected disabled>Pilih Jabatan</option>
                                {{-- <option value="manager" id="jabatan">manajer</option>
                                <option value="Subbag pengawasan dan Humas" id="jabatan">Subbag pengawasan dan Humas
                                </option> --}}
                                <option value="Pembina" id="jabatan">Pembina</option>
                                <option value="Atasan PPID" id="jabatan">Atasan PPID</option>
                                <option value="Tim Pertimbangan PPID" id="jabatan">Tim Pertimbangan PPID</option>
                                <option value="PPID" id="jabatan">PPID</option>
                                <option value="Petugas Pelayanan Informasi" id="jabatan">Petugas Pelayanan Informasi
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="role_id">Hak Akses</label>
                            <select class="form-control" name="role_id" id="role_id">
                                <option selected disabled>Pilih Akses</option>
                                <option value="superadmin" id="role_id">Superadmin</option>
                                <option value="admin" id="role_id">Admin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kata Sandi</label>
                            <input type="text" class="form-control" id="password" name="password">
                            <label >*Kata sandi minimal 6 karakter</label>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                        </div>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary " id="modelClose"
                        data-dismiss="modal">TUTUP</button> --}}
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">SIMPAN</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div id="DeleteArticleModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Konfirmasi</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus akun tersebut?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ya_button" id="ya_button" class="btn btn-danger">Ya</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal" id="DeleteArticleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Yakin ingin menghapus data?</h4>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="SubmitDeleteArticleForm">Ya</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


@push('script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
@endpush
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Rendering Table
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data-admin.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'action',
                    name: 'action'
                },
                // {   data: 'Actions',
                //     name: 'Actions',
                //     orderable:false,
                //     serachable:false,
                //     sClass:'text-center'
                // },
            ]
        });


        // Create New Supplier.
        $('#btn-create-supplier').click(function() {
            $('#saveBtn').val("create-supplier");
            $('#user_id').val('');
            $('#supplierForm').trigger("reset");
            $('#modelHeading').html("TAMBAH DATA ADMIN BARU");
            $('#ajaxModel').modal('show');
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Mengirim..');
            var formData = $('#supplierForm').serialize();

            $.ajax({
                url: "{{ route('data-admin.store') }}",
                // method: 'post',
                data: {
                    id: $('#user_id').val(),
                    nama_lengkap: $('#nama_lengkap').val(),
                    username: $('#username').val(),
                    jabatan: $('#jabatan').val(),
                    email: $('#email').val(),
                    role_id: $('#role_id').val(),
                    password: $('#password').val(),
                },
                // data: $('#supplierForm').serialize(),
                type: "POST",
                dataType: 'json',

                success: function(response) {
                    console.log(response)
                    if (response.errors) {
                        $('.alert-danger').html('');
                        $.each(response.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' + value +
                                '</li></strong>');
                        });
                        $('#saveBtn').html('SIMPAN');

                    } else {
                        $('.alert-danger').hide();

                        swal({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        $('#supplierForm').trigger("reset");
                        $('#saveBtn').html('SIMPAN');
                        $('#ajaxModel').modal('hide');

                        table.draw();
                    }
                }
            });
        });

        // Get single article in EditModel
        $('.modelClose').on('click', function() {
            $('#ajaxModel').modal('hide');
        });
        var id;
        $('body').on('click', '#btn-create-supplier', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "data-admin/" + id,
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#ajaxModelBody').html(result.html);
                    $('#ajaxModel').modal('show');
                }
            });
        });

        // Update article Ajax request.
        $('#SubmitEditArticleForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "user/" + id,
                method: 'PUT',
                data: {
                    username: $('#editUsername').val(),
                    email: $('#editEmail').val(),
                    role_id: $('#editRole').val(),
                    password: $('#editPassword').val(),
                },
                success: function(result) {
                    if (result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' + value +
                                '</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        setInterval(function() {
                            $('.alert-success').hide();
                            $('#EditArticleModal').hide();
                            location.reload();

                        }, 2000);
                    }
                }
            });
        });

        // Delete article Ajax request.
        var deleteID;
        $(document).on('click', '#getDeleteId', function() {
            deleteID = $(this).data('id');
            // $('#confirmModal').modal('show');
        });
        $('#SubmitDeleteArticleForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'DELETE',
                url: 'data-admin/' + id,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function() {
                    $('#DeleteArticleModal').modal('hide');
                    location.reload();
                },
                error: function() {
                    console.log('Error: failed to delete data.');
                }
            });
        });
        // var deleteID;
        // $(document).on('click', '#getDeleteId', function() {
        //     deleteID = $(this).data('id');
        //     // $('#confirmModal').modal('show');
        // });
        // $('#SubmitDeleteArticleForm').click(function(e) {
        //     e.preventDefault();
        //     var id = deleteID;
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: 'DELETE',
        //         url: 'data-admin/soft-delete/' + id,
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             "_method": "DELETE"
        //         },
        //         success: function() {
        //             $('#DeleteArticleModal').modal('hide');
        //             location.reload();
        //         },
        //         error: function() {
        //             console.log('Error: failed to delete data.');
        //         }
        //     });
        // });

    });
</script>
