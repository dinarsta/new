
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CETAK ANTRIAN</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
          <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
         <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<style type="text/css" media="print" >

    
input{
   border: none;
}
input:focus{
    outline:none;
}

input[type='file'] {
        opacity: 0;
    }

    .btn {
        display: none;
    }

label{
    font-size:10px;
}

</style>
<body>
		



<center><label>NO RM : {{ $bpjsEntry->norm }}</label></center>
<center><label> {{ $bpjsEntry->nama }}</label></center>
<center><label>{{ $bpjsEntry->jenis_kelamin }} </label></center>



<a class="btn btn-danger" href="index.php" role="button">Kembali</a>
</body>
</html>
<script type="text/javascript">
    window.print();
</script>