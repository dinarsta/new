<?php
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\Printer;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
        }

        .antrian {
            margin-top: 20px;
        }

        .antrian-nomor {
            font-size: 24px;
            font-weight: bold;
        }

        .antrian-nama {
            font-size: 18px;
        }

        .antrian-poli {
            font-size: 16px;
        }

        .antrian-info {
            margin-top: 10px;
        }

        .antrian-info-text {
            font-size: 14px;
        }

        /* Define a style for print media */
        @media print {

            /* Hide the "Print" button */
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>SELAMAT DATANG</h1>
            <h2>DI RS PMU</h2>
        </div>

        <div class="antrian">
            <div class="antrian-nomor">
                <p>NO ANTRIAN: PLY001</p>
            </div>

            <div class="antrian-nama">
                <p><strong> {{ $bpjsEntry->nama }}</strong> </p>
            </div>

            <div class="antrian-poli">
                <p><strong>Poli:</strong>
                    @if ($bpjsEntry->selected_poli_id)
                        {{ App\Models\Poly::find($bpjsEntry->selected_poli_id)->nama_poly }}
                    @else
                        Belum dipilih
                    @endif
                </p>
            </div>
            <p><strong>Dokter:</strong>
                @if ($bpjsEntry->selected_dokter_id)
                    {{ App\Models\Dokter::find($bpjsEntry->selected_dokter_id)->nama_dokter }}
                @else
                    Belum dipilih
                @endif
            </p>

            <div class="antrian-info">
                <p class="antrian-info-text">
                    SILAKAN MENUNGGU NOMOR ANDA DI PANGGIL
                </p>

                <p class="antrian-info-text">
                    Terimakasih Telah Tertib
                </p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
