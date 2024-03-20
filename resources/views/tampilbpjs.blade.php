<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KONFIRMASI IDENTITAS PASIEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .keyboard-container {
            position: relative;
            margin-top: 20px;
        }

        #keyboard {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #keyboard button {
            width: calc(20% - 10px); /* Adjust button width */
            height: 60px; /* Adjust button height */
            font-size: 24px; /* Adjust font size */
            border: none;
            background-color: #fff;
            cursor: pointer;

        }

        #keyboard button:hover {
            background-color: #e0e0e0;
        }

        #openKeyboardButton {
            position: absolute;
            top: 0;
            right: 0;
            transform: translateY(-100%);
            padding: 5px 10px;
            font-size: 18px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;


        }

        #openKeyboardButton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-primary shadow-lg">
                <div class="card-body p-5">
                    <h1 class="text-center mb-8 text-primary">KONFIRMASI IDENTITAS PASIEN</h1>
                    <br>
                    <h2 class="text-center mb-4 text-primary">MASUKAN NOMOR BPJS</h2>
                    <div class="keyboard-container">
                        <button id="openKeyboardButton" onclick="toggleKeyboard()">
                            <i class="fas fa-keyboard"></i>
                        </button>

                    </div>

                    <!-- Form for entering BPJS number -->
                    <form id="bpjsForm" action="{{ route('check.bpjs') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nomor_bpjs" class="form-label"></label>
                            <input type="text" class="form-control"  id="inputField" name="nomor_bpjs" style="width: 100%; font-size: 30px;"  autocomplete="off">
                        </div>


                        <div class="text-center"> <!-- Center the button -->
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" style="width: 100%; font-size: 30px;" type="submit">CARI</button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3" id="keyboard" style="display: none;">
                        <button onclick="addCharacter('1')">1</button>
                        <button onclick="addCharacter('2')">2</button>
                        <button onclick="addCharacter('3')">3</button>
                        <button onclick="addCharacter('4')">4</button>
                        <button onclick="addCharacter('5')">5</button>
                        <button onclick="addCharacter('6')">6</button>
                        <button onclick="addCharacter('7')">7</button>
                        <button onclick="addCharacter('8')">8</button>
                        <button onclick="addCharacter('9')">9</button>
                        <button onclick="addCharacter('0')">0</button>
                        <button onclick="deleteCharacter()">Hapus</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // Handle form submission and display the modal
    $(document).ready(function () {
        $('#bpjsForm').submit(function (e) {
            e.preventDefault();

            // Submit the form using AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    // If data is found, show the modal
                    if (response.patientData) {
                        // Set the patient ID dynamically in the modal title
                        $('#patientId').text(response.patientData.id);
                        // Display additional details in the modal body
                        $('#patientDetails').html(`
                            <p><strong>No BPJS:</strong> ${response.patientData.no_bpjs}</p>
                            <p><strong>NORM:</strong> ${response.patientData.norm}</p>
                            <p><strong>NIK KTP:</strong> ${response.patientData.nik_ktp}</p>
                            <p><strong>Nama:</strong> ${response.patientData.nama}</p>
                            <p><strong>Jenis Kelamin:</strong> ${response.patientData.jenis_kelamin}</p>
                            <p><strong>Tanggal Lahir:</strong> ${response.patientData.tgl_lahir}</p>
                            <p><strong>Alamat:</strong> ${response.patientData.alamat}</p>
                        `);
                        $('#exampleModal').modal('show');
                    } else {
                        // If no data is found, show an alert
                        alert('Data tidak ditemukan.');
                    }
                },
                error: function () {
                    alert('Error occurred while processing the request.');
                }
            });
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">VERIFIKASI DATA  <span hidden id="patientId"></span></h5>

            </div>
            <div class="modal-body mt-3" id="patientDetails">
                <!-- Display additional details here -->
                @if(isset($data) && $data->count() > 0)
                    @foreach($data as $row)
                        <p><strong>No BPJS:</strong> {{ $row->no_bpjs }}</p>
                        <p><strong>NORM:</strong> {{ $row->norm }}</p>
                        <p><strong>NIK KTP:</strong> {{ $row->nik_ktp }}</p>
                        <p><strong>Nama:</strong> {{ $row->nama }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $row->jenis_kelamin }}</p>
                        <p><strong>Tanggal Lahir:</strong> {{ $row->tgl_lahir }}</p>
                        <p><strong>Alamat:</strong> {{ $row->alamat }}</p>
                    @endforeach
                @endif
            </div>
            <div class="modal-footer">
                @if(isset($data) && $data->count() > 0)
                    <!-- Displaying only one "Simpan" button outside the loop -->
                    <button type="button" class="btn btn-primary" onclick="redirectToSelect()">Simpan</button>
                @endif
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function redirectToSelect() {
        // Get the ID from the span with id "patientId"
        var id = document.getElementById('patientId').innerText;
        // Ganti URL dengan URL yang sesuai untuk halaman "select"
        window.location.href = '{{ route("select") }}' + '?id=' + id;
    }

    function addCharacter(char) {
        var inputField = document.getElementById('inputField');
        inputField.value += char;
    }

    function deleteCharacter() {
        var inputField = document.getElementById('inputField');
        inputField.value = inputField.value.slice(0, -1);
    }

    function toggleKeyboard() {
        var keyboard = document.getElementById('keyboard');
        var openButton = document.getElementById('openKeyboardButton');
        if (keyboard.style.display === 'none') {
            keyboard.style.display = 'block';
            openButton.innerHTML = '<i class="fas fa-keyboard"></i> Close';
        } else {
            keyboard.style.display = 'none';
            openButton.innerHTML = '<i class="fas fa-keyboard"></i> Keyboard';
        }
    }
</script>

</body>
</html>
