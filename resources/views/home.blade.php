<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SYti1I5V87e2LCA9zN3p1cfl8+e3fKEW/2kN" crossorigin="anonymous">

  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 20px;
    }

    .btn-bpjs {
      background-color: #28a745; /* Warna hijau */
      color: #fff; /* Warna teks putih */
      border: none;
    }

    .btn-bpjs:hover {
      background-color: #218838; /* Warna hijau saat hover */
    }

    .btn-umum {
      background-color: #ffc107; /* Warna kuning */
      color: #212529; /* Warna teks hitam */
      border: none;
    }

    .btn-umum:hover {
      background-color: #e0a800; /* Warna kuning saat hover */
    }

    i {
      color: #007bff;
    }

    h1 {
      color: #343a40;
    }
  
    .rs{
      position: relative;
      top:-230px;
      left:350px;
    }

    body{
      background-color: grey;
    }
  </style>

  <title>BPJS</title>
</head>

<body>

<div class="card text-center" style="background-color :orange;">
  <div class="card-header">
  <center><img src="logo.png" alt="LOGO" width="100" height="100"></center>
    <br>
  <label for="exampleFormControlInput1" class="form-label" style="font-weight: bold; font-size: 35px;">RUMAH SAKIT PRIMANUSA MUKTI UTAMA</label></center>
  <br>  
  <label for="exampleFormControlInput1" class="form-label" style="font-weight: bold; font-size: 35px;">SELAMAT DATANG</label>  
  <div class="card-body " style=" background-image: url('kuy.jpg');">
    <h5 class="card-title">ANJUNGAN PENDAFTARAN MANDIRI</h5>
    <p class="card-text">SILAKAN UNTUK MENEKAN TOMBOL UNTUK DAFTAR.</p>
    <a href="/tampilbpjs" class="btn btn-success" style="height: 150px;width: 500px; font-weight: bold; font-size: 35px"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg><br>BPJS</a>
    <a href="umum.php" style="height: 150px;width: 500px; font-weight: bold; font-size: 35px" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/><br>UMUM</a>
  </div>
  <br>
  <br>
 
</div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
</body>

</html>
