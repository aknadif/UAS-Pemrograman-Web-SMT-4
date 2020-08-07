<?php 
// Koneksi ke database //index
$conn = mysqli_connect("localhost", "root", "" , "uassmt4");

function query($query){

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
}
//Tambah
function tambah($data){

    global $conn;

    $nama    = htmlspecialchars($data ["nama"]);
    $nim     = htmlspecialchars($data ["nim"]);
    $jurusan = htmlspecialchars($data ["jurusan"]);
    $umur    = htmlspecialchars($data ["umur"]);
    $asal    = htmlspecialchars($data ["asal"]);
    



    $query = "INSERT INTO mahasiswa
            VALUES
            ( NULL ,'$nama', '$nim', '$jurusan', '$umur', '$asal')
            ";
mysqli_query($conn, $query);


 return mysqli_affected_rows($conn);   
}


//Hapus
function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id ");
    return mysqli_affected_rows($conn);
}
//Ubah
function ubah($data){
    global $conn;
    $id = $data["id"];

    $nama    = htmlspecialchars($data ["nama"]);
    $nim     = htmlspecialchars($data ["nim"]);
    $jurusan = htmlspecialchars($data ["jurusan"]);
    $umur    = htmlspecialchars($data ["umur"]);
    $asal    = htmlspecialchars($data ["asal"]);


    $query = "UPDATE mahasiswa SET
            nama = '$nama',
            nim = '$nim',
            jurusan = '$jurusan',
            umur = '$umur',
            asal = '$asal'
            WHERE id = $id
            ";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function cari ($keyword){
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                nim LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' OR
                umur LIKE '%$keyword%' OR
                asal LIKE '%$keyword%' ";
                
            return query($query);
            }
// Registrasi
function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email  = stripslashes($data["email"]);
    $password =  mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    // cek username sudah ada atau belum
$result =    mysqli_query($conn, "SELECT username FROM login WHERE 
        username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username sudah terdaftar !')
        </script>";
        return false;
    }
    //konfirmasi Password
    if ($password !== $password2){
        echo "<script>
                alert('Konfirmasi password tidak valid !!!');
              </script> ";
            return false;
    }
    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // Tambah userbaru ke database
    mysqli_query($conn, "INSERT INTO login VALUES(NULL , '$username','$email','$password')");
    return mysqli_affected_rows($conn);
}

?>
