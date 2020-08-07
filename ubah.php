<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include 'functions.php';

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];



if ( isset($_POST["submit"])){

    if( ubah ($_POST) > 0 ){
      echo  "<script>
            alert('Data Berhasil Diubah');
            document.location.href = 'index.php';
        </script>";
    }else {
      echo  "<script>
        alert('Data Tidak Berhasil Diubah !!!');
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
    <h1 style="text-align: center; font-size :50px;">Ubah Data</h1>

    <form action="" method="post" style="font-size: 25px" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"] ;?>">
        <ul>
        <div class="form-group">
            <label for="formGroupExampleInput nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="formGroupExampleInput nama" required value="<?= $mhs["nama"]; ?>" >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput nim">Nim</label>
            <input type="text" name="nim" class="form-control" id="formGroupExampleInput nim" required value="<?= $mhs["nim"]; ?>" >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput jurusan">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" id="formGroupExampleInput jurusan" required value="<?= $mhs["jurusan"]; ?>" >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput umur">Umur</label>
            <input type="text" name="umur" class="form-control" id="formGroupExampleInput umur" required value="<?= $mhs["umur"]; ?>" >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput asal">Asal</label>
            <input type="text" name="asal" class="form-control" id="formGroupExampleInput asal" required value="<?= $mhs["asal"]; ?>" >
        </div>
            
                <button name="submit" class="btn btn-primary">Ubah Data !!!</button>
            
        </ul>

    </form>
</body>
</html>