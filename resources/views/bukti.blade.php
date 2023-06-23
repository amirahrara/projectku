<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Permohonan</title>

</head>

<body>


    <div id="halaman">
        <style type="text/css" media="all">
            @page {
                size: A4;
            }

            #judul {
                text-align: center;
            }

            #halaman {
                width: 600px;
                height: auto;
                position: absolute;
                padding-top: 50px;
                padding-left: 50px;
                padding-right: 50px;
                padding-bottom: 50px;
            }

            #row {
                display: grid;
                grid-template-columns: 300px 300px;
            }

            #column {
                padding: 16px;
                height: 250px;
            }
        </style>
        <table>
            <tr>
                <td>
                    <img src="img/bawaslu.png" alt="bawaslu" width="250"><br>
                    <font size="3">Jalan Tenggilis Mejoyo No.1 Surabaya</font><br>
                    <font size="3">Telpon &nbsp;: (031)99857450</font><br>
                    <font size="3">Surel &nbsp;&nbsp;&nbsp; : set.surabaya@bawaslu.go.id</font><br>
                    <font size="3">Laman &nbsp;: http://surabaya.bawaslu.go.id</font>
                </td>
            </tr>
        </table>

        <hr style="border:1px solid black;">

        <table width="470">
            <center>
                <p style="margin-bottom:-10px; margin-top:30px;"><b>TANDA BUKTI</b></p>
                <p style="margin-bottom:10px;"><b>PERMOHONAN INFORMASI PUBLIK</b></p>
            </center>
        </table>

        <table height="50">
            <tr>
                <td>
                    Yang menyerahkan formular permohonan Informasi Publik:
                </td>
            </tr>

            <table width="150">
                {{-- @foreach ($pdf as $item) --}}


                <tr>

                    <td>a. &nbsp; Nama</td>
                    <td>:</td>
                    <td>{{ auth()->user()->nama }}</td>
                </tr>

                <tr>

                    <td>b. &nbsp; Alamat</td>
                    <td>:</td>
                    <td>{{ auth()->user()->alamat }}</td>
                </tr>
            </table>

            <br>
            <table width="350">
                <tr>
                    <td>c. &nbsp; Tanggal Penyerahan Formulir Permohonan</td>
                    <td>:</td>
                    <td>{{ Carbon\Carbon::parse($pdf->created_at)->translatedFormat('d F Y') }}</td>
                </tr>

            </table>
            <table width="190">
                <tr>
                    <td>d. &nbsp; Nomor Registrasi Permohonan</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
            <br>
        </table>

        <table height="50">
            <tr>
                <td>
                    Yang menerima formular permohonan Informasi Publik:
                </td>
            </tr>

            <table width="400">
                <tr>

                    <td>a. &nbsp; Nama</td>
                    <td>:</td>
                    <td> &nbsp; {{ $pdf->user->nama_lengkap }}</td>
                </tr>

                <tr>

                    <td>b. &nbsp; Jabatan</td>
                    <td>:</td>
                    <td>
                        &nbsp; {{ $pdf->user->jabatan }}
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <table width="470">
                <center>Surabaya, {{ Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</center>
            </table>



            <table width="470">
                <tr>
                    <td>
                        <center>
                            <h4 style="margin-bottom:-20px;">Yang Menerima</h4>
                            <h4>(Petugas Pelayanan)</h4>
                            {{-- <img src="{{ url('storage/tandatangan/'. $ttd[0]->tanda_tangan) }}" alt=""> --}}

                            <img src="{{ 'storage/tandatangan/' . $pdf->user->tanda_tangan }}" style="width: 100px; height: 80px;" alt="Tanda Tangan">
                            <p style="margin-bottom:-10px;">({{ $pdf->petugas_penerima }})</p>

                        </center>
                    </td>

                    <td>
                        <center>
                            <h4 style="margin-bottom:-20px;">Yang Menyerahkan</h4>
                            <h4>(Pemohon Informasi)</h4>
                            <img src="{{ public_path($pdf->ttd) }}" style="width: 100px; height: 80px;">
                            <p style="margin-bottom:-10px;">({{ auth()->user()->nama }})</p>

                        </center>
                    </td>
                </tr>
                {{-- @endforeach --}}

            </table>






            {{-- <div id="row">
                <div id="column">
                    <center>
                        <h4 style="margin-bottom:-20px;">Yang Menerima</h4>
                        <h4>(Petugas Pelayanan)</h4>
                        <br><br><br>
                        <p style="margin-bottom:-10px;">(....................................)</p>
                        <p>Nama dan Tanda Tangan</p>
                    </center>
                </div>
                <div id="column">
                    <center>
                        <h4 style="margin-bottom:-20px;">Yang Menerima</h4>
                        <h4>(Pemohon Informasi)</h4>
                        <br><br><br>
                        <p style="margin-bottom:-10px;">(....................................)</p>
                        <p>Nama dan Tanda Tangan</p>
                    </center>
                </div>
            </div> --}}



        </table>



</body>

</html>
