<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permohonan Informasi</title>

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
                <p style="margin-bottom:-10px; margin-top:30px;"><b>FORMULIR PERMOHONAN INFORMASI</b></p>
                <p style="margin-bottom:10px;">No. Pendaftaran (diisi petugas)** :..................................................</p>
            </center>
        </table>
        <br>
        <br>
        
       
            {{-- @foreach ($form as $item) --}}
            <table cellpadding="4">
                <tr>

                    <td><b> Nama</b></td>
                    <td>:</td>
                    <td>&nbsp; {{ $pdf->pengguna->nama }}</td>
                </tr>

                <tr>

                    <td><b> Alamat</b></td>
                    <td>:</td>
                    <td>&nbsp; {{ $pdf->pengguna->alamat }}</td>
                </tr>

                <tr>
                    <td><b> Pekerjaan</b></td>
                    <td>:</td>
                    <td>&nbsp; {{ $pdf->pengguna->pekerjaan }}</td>
                </tr>
                <tr>
                    <td><b> Nomor Telepon/Email</b></td>
                    <td>:</td>
                    <td>&nbsp; {{ $pdf->pengguna->no_telp }}</td>
                </tr>
            </table>
           

        <table cellpadding="4">
            <tr>
                <td>
                    <b>Rincian Informasi yang dibutuhkan</b> 
                </td>
            </tr>
            <tr>
                <td>{{ $pdf->rincian }}</td>
            </tr>

            <tr>
                <td>
                    <b>Tujuan Penggunaan Informasi</b> 
                </td>
            </tr>
            <tr>
                <td>{{ $pdf->tujuan }}</td>
            </tr>

            <tr>
                <td>
                    <b>Cara Memperoleh Informasi**</b> 
                </td>
            </tr>
            <tr>
                <td>{{ $pdf->memperoleh_informasi }}</td>
            </tr>

            <tr>
                <td>
                    <b>Cara Mendapatkan Salinan Informasi</b> 
                </td>
            </tr>
            <tr>
                <td>{{ $pdf->mendapat_salinan }}</td>
            </tr>
            
        </table>
            <br>
            <br>
            <table width ="470"> 
                <center>Surabaya, {{ Carbon\Carbon::now()->isoFormat('D MMMM Y')}}</center>
            </table>
           

            
                <table width= "440">
                    <tr>
                        <td>
                            <center>
                                <h4 style="margin-bottom:-20px;">Petugas Pelayanan Informasi</h4>
                                <h4>(Penerima Permohonan)</h4>
                                
                                <img src="{{ 'storage/tandatangan/' . $pdf->user->tanda_tangan }}" style="width: 100px; height: 80px;" alt="tanda_tangan">
                                <p style="margin-bottom:-10px;">({{ $pdf->petugas_penerima }})</p>
                                
                            </center>
                        </td> 
                
                        <td>
                            <center>
                                <h4 style="margin-bottom:-20px;">Pemohon Informasi</h4>
                                <br>
                                
                                <img src="{{ public_path($pdf->ttd) }}" style="width: 120px; height: 115px;">
                                
                                <p style="margin-bottom:-10px;">({{ $pdf->pengguna->nama }})</p>
                                
                            </center>
                        </td>
                    </tr>
               
                   
                </table>
                {{-- @endforeach --}}

           

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



        



</body>

</html>
