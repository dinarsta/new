<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Poli dan Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .custom-container {
            margin-top: 50px;
        }

        .custom-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-table th,
        .custom-table td {
            padding: 10px;
            text-align: center;
        }

        .custom-table th {
            background-color: #f8f9fa;
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-light">

                        <button type="button" class="btn btn-outline-primary" onclick="showConfirmationModal()"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-arrow-right"></i> LANJUTKAN
                        </button>
                    </div>
                @endif
                <form action="{{ route('handle.selection', ['id' => $bpjsEntry->id]) }}" method="post"
                    class="custom-form">
                    @csrf
                    <h1 class="text-center mb-4">Pilih Poli dan Dokter</h1>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                            value="{{ $bpjsEntry->nama }}" readonly>
                    </div>


                    <div class="mb-3">
                        <label for="selected_poli_id" class="form-label">Pilih Poliklinik:</label>
                        <select name="selected_poli_id" id="selected_poli_id" class="form-select">
                            <option value="">Pilih Poly</option>
                            @foreach ($polies as $poli)
                                <option value="{{ $poli->id }}">{{ $poli->nama_poly }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="selected_dokter_id" class="form-label">Pilih Dokter:</label>
                        <select name="selected_dokter_id" id="selected_dokter_id" class="form-select">
                            <!-- Placeholder option -->
                            <option value="">Pilih Dokter</option>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary custom-btn">Simpan Pilihan</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">KONFIRMASI</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <p><strong>No BPJS:</strong> {{ $bpjsEntry->no_bpjs }}</p>
                                    <p><strong>NORM:</strong> {{ $bpjsEntry->norm }}</p>
                                    <p><strong>NIK KTP:</strong> {{ $bpjsEntry->nik_ktp }}</p>
                                    <p><strong>Nama:</strong> {{ $bpjsEntry->nama }}</p>
                                    <p><strong>Jenis Kelamin:</strong> {{ $bpjsEntry->jenis_kelamin }}</p>
                                    <p><strong>Tanggal Lahir:</strong> {{ $bpjsEntry->tgl_lahir }}</p>
                                    <p><strong>Alamat:</strong> {{ $bpjsEntry->alamat }}</p>
                                    <p><strong>Poli:</strong>
                                        @if ($bpjsEntry->selected_poli_id)
                                            {{ App\Models\Poly::find($bpjsEntry->selected_poli_id)->nama_poly }}
                                        @else
                                            Belum dipilih
                                        @endif
                                    </p>

                                    <p><strong>Dokter:</strong>
                                        @if ($bpjsEntry->selected_dokter_id)
                                            {{ App\Models\Dokter::find($bpjsEntry->selected_dokter_id)->nama_dokter }}
                                        @else
                                            Belum dipilih
                                        @endif
                                    </p>

                                </div>

                                <div class="modal-footer">

                                    <a href="{{ route('cetak', ['id' => $bpjsEntry->id]) }}"
                                        class="mt-2 btn btn-danger custom-btn">Lanjut</a>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-md-6">
                <div class="custom-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Dokter</th>
                                <th>Jam Kerja</th>
                                <th>Shift</th>
                                <th>HARI</th>
                            </tr>
                        </thead>
                        <tbody id="jadwal_dokter">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // When the selected poli is changed
        document.getElementById('selected_poli_id').addEventListener('change', function() {
            var selectedPoliId = this.value;
            var dokterSelect = document.getElementById('selected_dokter_id');
            var jadwalDokterTable = document.getElementById('jadwal_dokter');

            // Clear existing options
            dokterSelect.innerHTML = '<option value="">Pilih dokter</option>';
            jadwalDokterTable.innerHTML = ''; // Clear existing jadwal dokter

            // Filter dokters based on the selected poli
            @foreach ($dokters as $dokter)
                if (selectedPoliId == {{ $dokter->id_poli }}) {
                    var option = document.createElement('option');
                    option.value = '{{ $dokter->id }}';
                    option.text = '{{ $dokter->nama_dokter }}';
                    dokterSelect.appendChild(option);

                    // Add jadwal dokter to table
                    var row = jadwalDokterTable.insertRow();
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.innerText = '{{ $dokter->nama_dokter }}';
                    cell2.innerText = '{{ $dokter->jam_kerja }}';
                    cell3.innerText = '{{ $dokter->shift }}';
                    cell4.innerText = '{{ $dokter->hari }}';
                }
            @endforeach
        });
    </script>

    <script>
        // Fungsi untuk menangkap dan menampilkan poliklinik dan dokter yang dipilih
        function showConfirmationModal() {
            // Dapatkan nilai poliklinik yang dipilih
            var selectedPoli = document.getElementById('selected_poli_id').value;

            // Dapatkan teks poliklinik yang dipilih
            var selectedPoliText = $('#selected_poli_id option:selected').text();

            // Dapatkan nilai dokter yang dipilih
            var selectedDokter = document.getElementById('selected_dokter_id').value;

            // Dapatkan teks dokter yang dipilih
            var selectedDokterText = $('#selected_dokter_id option:selected').text();

            // Isi modal dengan data yang dipilih
            document.getElementById('selectedPoliText').innerHTML = selectedPoliText;
            document.getElementById('selectedDokterText').innerHTML = selectedDokterText;

            // Tampilkan modal
            $('#exampleModal').modal('show');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>


</body>

</html>
