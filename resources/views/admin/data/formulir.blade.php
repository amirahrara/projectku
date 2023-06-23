@extends('admin.layout.main')

@section('content')
    <div class="content-wrapper">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <p class="card-title">Data Pengajuan Permohonan Informasi Pengguna</p>
                            </div>
                            <div class="col">
                                <div class=" text-end">
                                    <a href="/export-excel" class="btn btn-success btn-sm">Export Excel</a>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table dataTable no-footer" role="grid">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Permohonan</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Petugas Penerima</th>
                                                <th>Status</th>
                                                <th>Lihat Data</th>
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

    <!-- Edit Article Modal -->
    <div class="modal" id="EditArticleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data</h5>
                    <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                        <strong>Gagal!</strong>Data sudah ada sebelumnya.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                        <strong>Success!</strong>Data updated successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div id="EditArticleModalBody">

                    </div>

                </div>
                <!-- Modal footer -->

                <div class="modal-footer">


                    {{-- <form action="/formulir-pdf" method="POST">
                        @csrf
                        <input type="text" id="id" name="id" value="{{ $datapdf->id }}">
                        <button type="submit" class="btn btn-primary">Unduh PDF</button>

                    </form> --}}
                    {{-- <a href="/formulir-pdf/{{ $datapdf->id }}" class="btn btn-primary" target="_blank"
                        aria-hidden="true"></i>Unduh PDF</a> --}}

                    <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Article Modal -->
    <div class="modal" id="EditArticleModal2">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Detail Status</h5>
                    <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                        <strong>Success!</strong>Data updated successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="EditArticleModalBody2">

                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="SubmitEditArticleForm">Update</button>
                    <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- 
<div class="modal" id="EditArticleModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Detail Status</h5>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">

                <div id="EditArticleModalBody2">

                </div>

            </div>
            <!-- Modal footer -->
            
            <div class="modal-footer">

                <button type="button" class="btn btn-success" id="SubmitEditArticleForm">Update</button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@push('script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
@endpush

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 10,
            // scrollX: true,
            "order": [
                [0, "asc"]
            ],
            ajax: '{{ route('data-formulir-get') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'nama',
                    name: 'nama',
                    orderable: false
                },
                {
                    data: 'nik',
                    name: 'nik',
                    orderable: false
                },
                {
                    data: 'petugas_penerima',
                    name: 'petugas_penerima',
                    orderable: false
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    serachable: false,
                    sClass: 'text-center'
                },
                {
                    data: 'Actions',
                    name: 'Actions',
                    orderable: false,
                    serachable: false,
                    sClass: 'text-center'
                },
            ]
        });


        // Get single article in EditModel
        $('.modelClose').on('click', function() {
            $('#EditArticleModal').hide();
        });
        var id;
        $('body').on('click', '#getEditArticleData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "data-formulir/" + id + "/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#EditArticleModalBody').html(result.html);
                    $('#EditArticleModal').show();
                }
            });
        });

        // Get single article in EditModel
        $('.modelClose').on('click', function() {
            $('#EditArticleModal2').hide();
        });
        var id;
        $('body').on('click', '#getEditArticleData2', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "data-formulir/" + id + "/status",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function(result) {
                    console.log(result);
                    $('#EditArticleModalBody2').html(result.html);
                    $('#EditArticleModal2').show();
                }
            });
        });

        // // Update article Ajax request.
        // $('#SubmitEditArticleForm').click(function(e) {
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         url: "formulir/"+id,
        //         method: 'PUT',
        //         data: {
        //             nama_kategori: $('#editNamaKategori').val(),
        //             tipe_kategori: $('#editTipeKategori').val(),
        //         },
        //         success: function(result) {
        //             if(result.errors) {
        //                 $('.alert-danger').html('');
        //                 $.each(result.errors, function(key, value) {
        //                     $('.alert-danger').show();
        //                     $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
        //                 });
        //             } else {
        //                 $('.alert-danger').hide();
        //                 $('.alert-success').show();
        //                 $('.datatable').DataTable().ajax.reload();
        //                 setInterval(function(){
        //                     $('.alert-success').hide();
        //                     $('#EditArticleModal').hide();
        //                     location.reload();

        //                 }, 2000);
        //             }
        //         }
        //     });
        // });

        // Update article Ajax request.
        $('#SubmitEditArticleForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "data-formulir/" + id,
                method: 'PUT',
                data: {
                    status: $('#editStatus').val(),
                    alasan: $('#editAlasan').val(),
                    petugas_penerima: $('#editPetugas').val(),
                    // jabatan: $('#editJabatan').val(),
                    user_id: $('#user_id').val(),
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
        $('body').on('click', '#getDeleteId', function() {
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteArticleForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "formulir/" + id,
                method: 'DELETE',
                success: function(result) {
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('.datatable').DataTable().ajax.reload();
                    setInterval(function() {
                        $('#CreateArticleModal').modal('hide');
                        location.reload();
                    }, 2000);

                }

            });
        });
    });
</script>


<script>
    function showReason() {
        var status = document.getElementById("editStatus").value;
        var reasonDiv = document.getElementById("reasonDiv");
        if (status == "Ditolak") {
            reasonDiv.style.display = "block";
            reasonDiv.classList.add("show", "collapse");
        } else {
            reasonDiv.style.display = "none";
            reasonDiv.classList.remove("show", "collapse");
        }
    }
</script>
