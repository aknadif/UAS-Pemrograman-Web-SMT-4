<?php 
include '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa
            WHERE
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' OR
            umur LIKE '%$keyword%' OR
            asal LIKE '%$keyword%' ";
$mahasiswa = query($query);

?>
<link rel="stylesheet" href="../DASAR SQLPHP/10/css/index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

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