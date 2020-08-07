<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if(isset ($_POST["cari"])){
    $mahasiswa = cari ($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>   
<div class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;" role="navigation">
    <a class="navbar-brand" href="#">Admin Page</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="tambah.php">Tambah Data <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
            </li>
            
        </ul>
        <form class="form-inline mt-2 mt-md-0" action="" method="POST">
        <div class="search-box">
    <form action="" method="post">
            <input type="text" name="keyword" id="keyword"  placeholder="Masukkan Keyword..." ><span></span>
        </div><img src="gif/Ellipsis-1.5s-200px.gif" class="loader">
        <button type="submit" name="cari" id="tombol-cari">Cari !</button>
    </form> 
        </form>
    </div>
</div>
<h1 class="jdl"> Data Mahasiswa </h1>

 
    
    <div id="container">
   
<div class="limiter">
<div class="container-table100">
<div class="wrap-table100">
<div class="table100">


<table>
<thead>

    <br>
    <br>
    <tr class="table100-head">
        <th class="column1">ID</th>
        <th class="column2">Aksi</th>
        <th class="column3">Nama</th>
        <th class="column4">NIM</th>
        <th class="column5">Jurusan</th>
        <th class="column6">Umur</th>
        <th class="column7">Asal Kota</th>
    </tr>
    <tbody>
<?php $i = 1 ?>
<?php foreach($mahasiswa as $row) :  ?>
    <tr>
        <td class="column1"><?= $i; ?></td>
        <td class="column2">
            <a href="ubah.php?id=<?= $row["id"]; ?>"> Ubah </a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin dihapus ?');"> Hapus </a>
        </td>
        <td class="column3"><?= $row["nama"]; ?></td>
        <td class="column4"><?= $row["nim"]; ?></td>
        <td class="column5"><?= $row["jurusan"]; ?></td>
        <td class="column6"><?= $row["umur"]; ?></td>
        <td class="column7"><?= $row["asal"]; ?></td>
    </tr>
<?php $i++ ?>
<?php endforeach; ?>
    </tbody>
</thead>    
</table>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
<script src="js/livesearch.js"></script>
</body>
</html>