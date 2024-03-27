<!DOCTYPE html>
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
                <form id="formSelection" class="custom-form">
                    @csrf
                    <h1 class="text-center mb-4">Pilih Poli dan Dokter</h1>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                            value="{{ $umumEntry->nama }}" readonly>
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
                        <tbody id="jadwal_dokter"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">KONFIRMASI</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda akan menuju ke:</p>
                    poliklinik
                    <strong id="selectedPoliText"></strong>
                    dan berkonsultasi dengan Dokter
                    <p>
                        <strong id="selectedDokterText"></strong>
                    <p>Apakah Anda yakin ingin melanjutkan?</p>
                    </p>
                </div>

                <div class="modal-footer">
                    <a href="#" id="lanjutButton" class="mt-2 btn btn-danger custom-btn">Lanjut</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // When the selected poli is changed
            $('#selected_poli_id').change(function() {
                var selectedPoliId = $(this).val();
                var dokterSelect = $('#selected_dokter_id');
                var jadwalDokterTable = $('#jadwal_dokter');

                // Clear existing options
                dokterSelect.html('<option value="">Pilih dokter</option>');
                jadwalDokterTable.empty(); // Clear existing jadwal dokter

                // Filter dokters based on the selected poli
                @foreach ($dokters as $dokter)
                    if (selectedPoliId == {{ $dokter->id_poli }}) {
                        var option = $('<option>').val('{{ $dokter->id }}').text(
                            '{{ $dokter->nama_dokter }}');
                        dokterSelect.append(option);

                        // Add jadwal dokter to table
                        var row = $('<tr>');
                        row.append($('<td>').text('{{ $dokter->nama_dokter }}'));
                        row.append($('<td>').text('{{ $dokter->jam_kerja }}'));
                        row.append($('<td>').text('{{ $dokter->shift }}'));
                        row.append($('<td>').text('{{ $dokter->hari }}'));
                        jadwalDokterTable.append(row);
                    }
                @endforeach
            });

            // Form submission handling
            $('#formSelection').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                //
                // Collect form data
                var formData = $(this).serialize();

                // Send form data via AJAX
                $.ajax({
                    url: "{{ route('handle.selectionumum', ['id' => $umumEntry->id]) }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        // Handle success response (if needed)
                        console.log(response);

                        // Show confirmation modal
                        showConfirmationModal();
                    },
                    error: function(xhr, status, error) {
                        // Handle error (if needed)
                        console.error(error);
                    }
                });
            });

            // Function to display confirmation modal
            function showConfirmationModal() {
                // Get selected poliklinik and dokter values
                var selectedPoliText = $('#selected_poli_id option:selected').text();
                var selectedDokterText = $('#selected_dokter_id option:selected').text();

                // Fill modal with selected data
                $('#selectedPoliText').text(selectedPoliText);
                $('#selectedDokterText').text(selectedDokterText);

                // Show modal
                $('#exampleModal').modal('show');

                // Set the action for the "Lanjut" button in the modal
                $('#lanjutButton').attr('href', "{{ route('cetak', ['id' => $umumEntry->id]) }}");
            }
        });
    </script>
</body>

</html>
