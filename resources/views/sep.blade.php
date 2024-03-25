<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <img src="{{ asset('bpjs-logo.png') }}" alt="BPJS Logo" style="max-width: 150px; margin-top: 20px;">
        <center>
            <h4>SURAT ELEGIBILITAS PESERTA</h4>
            <b>RUMAH SAKIT PRIMANUSA</b>
        </center>

        <div class="row mt-4">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <td><strong>NO. SEP</strong></td>
                        <td>: {{ $bpjsEntry->sep }}</td>
                    </tr>
                    <tr>
                        <td><strong>NO. BPJS</strong></td>
                        <td>: {{ $bpjsEntry->no_bpjs }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Peserta</strong></td>
                        <td>: {{ $bpjsEntry->nama }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tgl Lahir</strong></td>
                        <td>: {{ $bpjsEntry->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <td><strong>No Telepon</strong></td>
                        <td>: {{ $bpjsEntry->tlp }}</td>
                    </tr>
                    <tr>
                        <td><strong>Fakses Rujuk</strong></td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td><strong>Diagnosa Awal</strong></td>
                        <td>: {{ $bpjsEntry->diagnosa }}</td>
                    </tr>
                    <tr>
                        <td><strong>Catatan</strong></td>
                        <td>: </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <td><strong>Peserta</strong></td>
                        <td>: {{ $bpjsEntry->peserta }}</td>
                    </tr>
                    <tr>
                        <td><strong>COB</strong></td>
                        <td>: - </td>
                    </tr>
                    <tr>
                        <td><strong>Kelas Rawat</strong></td>
                        <td>: {{ $bpjsEntry->kelas }}</td>
                    </tr>
                    <tr>
                        <td><strong>Penjamin</strong></td>
                        <td>: - </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="text-center">
            <label>* Saya Menyetujui BPJS KESEHATAN Menggunakan Informasi Medis Pasien Jika Diperlukan</label>
            <br>
            <label>* SEP Bukan Sebagai Bukti Penjaminan Peserta</label>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('cetak', ['id' => $bpjsEntry->id]) }}" class="btn btn-primary btn-circle no-print">
                <i class="fas fa-arrow-left"> kembali</i>
            </a>

        </div>
    </div>

</body>

</html>
