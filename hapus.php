<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include 'functions.php';
$id = $_GET["id"];

if (hapus($id) > 0){
    echo  "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php';
        </script>";
} else {
    echo  "<script>
            alert('Data Tidak Berhasil Dihapus !!!');
            document.location.href = 'index.php';
        </script>";
}


?>