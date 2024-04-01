<?php
include 'php/config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM film WHERE Id_film = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

//Delete Data
if (isset($_POST['delete'])) {
    $sql1 = "DELETE FROM film WHERE Id_film = '$id'";
    $deleteQuery = mysqli_query($conn, $sql1);

    if ($deleteQuery) {
        header("Location: detail.php");
    } else {
        echo mysqli_error($conn);
    }
}


if (isset($_POST['edit'])) {
    $judul = $_POST['judul'];
    $sutradara = $_POST['sutradara'];
    $durasi = $_POST['durasi'];
    $genre = $_POST['genre'];
    $sinopsis = $_POST['sinopsis'];
    $aktor = $_POST['aktor'];
    $poster = $_POST['poster'];

    $sql2 = "UPDATE film SET 
            Judul='$judul',
            Sutradara='$sutradara',
            Durasi='$durasi',
            Genre='$genre',
            Sinopsis='$sinopsis',
            Aktor='$aktor',
            Poster='$poster' 
        WHERE Id_film = '$id'
    ";

    $updateQuery = mysqli_query($conn, $sql2);

    if ($updateQuery) {
        echo "<script>
                alert('Data Berhasil Terupdate');
            </script>";
        header("Refresh: 0; url=rincianfilm.php?id=$id");
    } else {
        echo mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BACKDOOR19 - Rincian Film</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>


<body class="bg-gradient">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Rincian Film</h1>
                                    </div>
                                    <form class="user" action="" method="POST" onSubmit="return validasi()">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control form-control-user" id="username"
                                                name='id_film' value="<?= $data['Id_film'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='judul' value="<?= $data['Judul'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='sutradara' value="<?= $data['Sutradara'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='durasi' value="<?= $data['Durasi'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='genre' value="<?= $data['Genre'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='sinopsis' value="<?= $data['Sinopsis'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='aktor' value="<?= $data['Aktor'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='poster' value="<?= $data['Poster'] ?>">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="edit" class="btn btn-warning btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </button>
                                            <button name="delete" href="#" class="btn btn-danger btn-icon-split ">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center" type="text" class=" text-center"><a href="detail.php">
            < Kembali</a>
    </div>

</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>