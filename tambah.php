<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include 'functions.php';

if ( isset($_POST["submit"])){

    if( tambah($_POST) > 0 ){
      echo  "<script>
            alert('Data Berhasil Dimasukkan');
            document.location.href = 'index.php';
        </script>";
    }else {
      echo  "<script>
        alert('Data Tidak Berhasil Dimasukkan !!!');
        document.location.href = 'index.php';
    </script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 style="text-align: center; font-size :50px;">Tambah Data</h1>

    <form action="" method="post" style="font-size: 25px" enctype="multipart/form-data">
    <ul>
<div class="form-group row">
    <label for="colFormLabel nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input name="nama" type="text" class="form-control" id="colFormLabel nama" placeholder="Masukkan Nama..." required>
    </div>
</div>
<div class="form-group row">
    <label for="colFormLabel nim" class="col-sm-2 col-form-label">Nim</label>
    <div class="col-sm-10">
      <input name="nim" type="text" class="form-control" id="colFormLabel nim" placeholder="Masukkan Nim..." required>
    </div>
</div>
<div class="form-group row">
    <label for="colFormLabel jurusan" class="col-sm-2 col-form-label">Jurusan</label>
    <div class="col-sm-10">
      <input name="jurusan" type="text" class="form-control" id="colFormLabel jurusan" placeholder="Masukkan Jurusan..." required>
    </div>
</div>
<div class="form-group row">
    <label for="colFormLabel umur" class="col-sm-2 col-form-label">Umur</label>
    <div class="col-sm-10">
      <input name="umur" type="text" class="form-control" id="colFormLabel umur" placeholder="Masukkan Umur..." required>
    </div>
</div>
<div class="form-group row">
    <label for="colFormLabel asal" class="col-sm-2 col-form-label">Asal</label>
    <div class="col-sm-10">
      <input name="asal" type="text" class="form-control" id="colFormLabel asal" placeholder="Masukkan Asal..." required>
    </div>
</div>

    <button name="submit" class="btn btn-primary">Tambah !!!</button>
    </ul>

    </form>
</body>
</html>