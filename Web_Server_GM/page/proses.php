<?php
include '../php/config.php';
if (isset($_POST['btnProses'])){

$judul=$_POST['judul'];
$sutradara=$_POST['sutradara'];
$durasi=$_POST['durasi'];
$genre=$_POST['genre'];
$sinopsis=$_POST['sinopsis'];
$aktor=$_POST['aktor'];

if($_POST['btnProses']=="tambah"){

$poster=$_FILES['poster']['name'];
$dir="../img/";
$dirFile=$_FILES['poster']['tmp_name'];
move_uploaded_file($dirFile,$dir . $poster);
$query=mysqli_query($conn, "INSERT INTO film VALUES (null,'$judul','$sutradara','$durasi','$genre','$sinopsis','$aktor','$poster')");

if ($query){
    echo "<script>
    alert('Data Berhasil ditambahkan');
    window.location.href='../?page=daftar_film';
    </script>
    ";  
} else{
    echo "<script>
    alert('data gagal ditambahkan');
    </script>
    ";
}
    }else{
        echo "edit data";
    }
    }

?>