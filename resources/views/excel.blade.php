<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Permohonan</title>

    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top
        }
    </style>
</head>

{{-- <body>

    <table width="470">
        <center>
            <p style="margin-bottom:-10px; margin-top:30px;"><b>Register Permohonan Informasi Publik</b></p>
        </center>
    </table>
    <br><br><br>

    <table border="1px">
        <tr>
            <th rowspan="3">No.</th>
            <th rowspan="3">Tgl</th>
            <th rowspan="3">Nama</th>
            <th rowspan="3">Alamat</th>
            <th rowspan="3">Nomor Kontak</th>
            <th rowspan="3">Pekerjaan</th>
            <th rowspan="3">Informasi yang diminta</th>
            <th rowspan="3">Tujuan Penggunaan Informasi</th>
            <th colspan="3">Status Informasi</th>
            <th colspan="2">Bentuk Informasi Yang Dikuasai</th>
            <th colspan="2">Jenis Permohonan</th>
            <th rowspan="3">Keputusan</th>
            <th rowspan="3">Alasan Penolakan</th>
            <th colspan="2">Hari dan Tanggal</th>
            <th colspan="2">Biaya dan Cara Pembayaran</th>
        </tr>
        <tr>
            <th colspan="2">Dibawah Penguasaan</th>
            <th rowspan="2">Belum Didokumentasikan</th>
            <th rowspan="2">Softcopy</th>
            <th rowspan="2">Hardcopy</th>
            <th rowspan="2">Melihat atau Mengetahui</th>
            <th rowspan="2">Meminta Salinan</th>
            <th rowspan="2">Pemberitahuan Tertulis</th>
            <th rowspan="2">Pemberian Informasi</th>
            <th rowspan="2">Biaya</th>
            <th rowspan="2">Cara</th>

        </tr>
        <tr>
            <th>Ya</th>
            <th>Tidak</th>
        </tr>

        @foreach ($export as $item)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td><a href="https://wa.me/{{ $item->no_telp }}">{{ $item->no_telp }}</a></td>
                <td>{{ $item->pekerjaan }}</td>
                <td>{{ $item->rincian }}</td>
                <td>{{ $item->tujuan }}</td>
                <td>{{ $item->status == 'Penyiapan Data' }}</td>
                <td>{{ ($item->status == 'Ditolak') != ($item->alasan == 'Informasi Belum Di Dokumentasikan') }}</td>
                <td>{{ $item->status == 'Ditolak' && $item->alasan == 'Informasi Belum Di Dokumentasikan' }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
        @endforeach


    </table>
</body> --}}

<body>

    <table class="tg" style="undefined;table-layout: fixed; width: 1530px">
        <colgroup>
            <col style="width: 29px">
            <col style="width: 30px">
            <col style="width: 48px">
            <col style="width: 55px">
            <col style="width: 78px">
            <col style="width: 74px">
            <col style="width: 109px">
            <col style="width: 105px">
            <col style="width: 76px">
            <col style="width: 92px">
            <col style="width: 54px">
            <col style="width: 71px">
            <col style="width: 83px">
            <col style="width: 85px">
            <col style="width: 76px">
            <col style="width: 57px">
            <col style="width: 76px">
            <col style="width: 88px">
            <col style="width: 96px">
            <col style="width: 89px">
            <col style="width: 59px">
        </colgroup>
        <thead>
            <tr>
                <th class="tg-0pky" rowspan="3">No<br></th>
                <th class="tg-0pky" rowspan="3">Tgl<br></th>
                <th class="tg-0pky" rowspan="3">Nama<br></th>
                <th class="tg-0pky" rowspan="3">Alamat<br></th>
                <th class="tg-0pky" rowspan="3">Nomor Kontak<br></th>
                <th class="tg-0pky" rowspan="3">Pekerjaan<br></th>
                <th class="tg-0pky" rowspan="3">Informasi yang diminta</th>
                <th class="tg-0pky" rowspan="3">Tujuan Penggunaan Informasi</th>
                <th class="tg-0pky" colspan="3">Status Informasi</th>
                <th class="tg-0pky" colspan="2">Bentuk Informasi yang dikuasai</th>
                <th class="tg-0pky" colspan="2">Jenis Permohonan</th>
                <th class="tg-0pky" rowspan="3">Keputusan</th>
                <th class="tg-0pky" rowspan="3">Alasan Penolakan</th>
                <th class="tg-0pky" colspan="2">Hari dan Tanggal</th>
                <th class="tg-0pky" colspan="2">Biaya dan Cara Pembayaran</th>
            </tr>
            <tr>
                <th class="tg-0pky" colspan="2">Dibawah Penguasaan</th>
                <th class="tg-0pky" rowspan="2">Belum Didokumentasikan</th>
                <th class="tg-0pky" rowspan="2">Softcopy</th>
                <th class="tg-0pky" rowspan="2">Hardcopy</th>
                <th class="tg-0pky" rowspan="2">Melihat atau Mengetahui</th>
                <th class="tg-0pky" rowspan="2">Meminta Salinan</th>
                <th class="tg-0pky" rowspan="2">Pemberitahuan Tertulis</th>
                <th class="tg-0pky" rowspan="2">Pemberian Informasi</th>
                <th class="tg-0pky" rowspan="2">Biaya</th>
                <th class="tg-0pky" rowspan="2">Cara</th>
            </tr>
            <tr>
                <th class="tg-0pky">Ya</th>
                <th class="tg-0pky">Tidak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($export as $item)
            <tr>

                <td class="tg-0lax" scope="row">{{ $loop->iteration }}</td>
                <td class="tg-0lax">{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                <td class="tg-0lax">{{ $item->nama }}</td>
                <td class="tg-0lax">{{ $item->alamat }}</td>
                <td class="tg-0lax"><a href="https://wa.me/{{ $item->no_telp }}">{{ $item->no_telp }}</a></td>
                <td class="tg-0lax">{{ $item->pekerjaan }}</td>
                <td class="tg-0lax">{{ $item->rincian }}</td>
                <td class="tg-0lax">{{ $item->tujuan }}</td>
                
                <td class="tg-0lax">
                    @if($item->status == 'Data Telah Diserahkan' || $item->status == 'Data Siap Diserahkan' )
                    Ya
                    @endif
                </td>
                {{-- <td class="tg-0lax">9</td> --}}
                <td class="tg-0lax">
                    @if($item->status == 'Ditolak' && $item->alasan !== 'Informasi Belum Di Dokumentasikan') 
                    Tidak
                    @endif
                </td>

                {{-- <td class="tg-0lax">10</td> --}}
                <td class="tg-0lax">
                    @if($item->status == 'Ditolak'&& $item->alasan == 'Informasi Belum Di Dokumentasikan')
                    Informasi Belum Di Dokumentasikan
                    @else
                    @endif
                </td>

                {{-- <td class="tg-0lax">11</td> --}}
                <td class="tg-0lax">@if($item->memperoleh_informasi == 'Mendapatkan Salinan Softcopy')
                    Mendapatkan Salinan Softcopy
                    @else

                    @endif
                </td>
                <td class="tg-0lax">@if($item->memperoleh_informasi == 'Mendapatkan Salinan Hardcopy')
                    Mendapatkan Salinan Hardcopy
                    @else
                    
                    @endif</td>
                <td class="tg-0lax">{{ ($item->memperoleh_informasi) }}</td>
                <td class="tg-0lax">{{ $item->mendapat_salinan}}</td>
                <td class="tg-0lax">
                    @if($item->status == 'Ditolak')
                Ditolak
                @elseif($item->status == 'Penyiapan Data' || $item->status == 'Register')
                Sedang Proses
                @else
                Diterima
                @endif
                </td>
                <td class="tg-0lax">@if($item->status == 'Ditolak')
                    {{ $item->alasan }}
                    @elseif($item->status !== 'Ditolak')
                    @endif
                </td>
                <td class="tg-0lax">18</td>
                <td class="tg-0lax">19</td>
                <td class="tg-0lax">20</td>
                <td class="tg-0lax">21</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>


</html>
