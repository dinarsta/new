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

        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
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

        .cetak{
            position: relative;
            top: 100px;
        }
    </style>
</head>

<body>
    
    <center>
        
        <div class="cetak" >

        <a href="{{ route('print', ['id' => $bpjsEntry->id]) }}"
                            class="mt-2 btn btn-primary custom-btn" style="width: 50%; font-size: 30px; font-weight: bold;">Cetak Antrian</a>
<br>
<br>
<br>
<a href="{{ route('label', ['id' => $bpjsEntry->id]) }}"
                            class="mt-2 btn btn-warning custom-btn" style="width: 50%; font-size: 30px; font-weight: bold;">Cetak Label</a>                         
<br>
<br>
<br>
<a href="{{ route('sep', ['id' => $bpjsEntry->id]) }}"
                            class="mt-2 btn btn-success custom-btn" style="width: 50%; font-size: 30px; font-weight: bold;">Cetak SEP BPJS</a></div>
<br>
<br>
<br>
<br>
<br>
<br>
                            <a class="btn btn-danger" href="/" role="button"> Kembali</a>                       
</center>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    </script>
</body>

</html>
