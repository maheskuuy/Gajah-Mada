<?php
include 'php/config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM Jadwal WHERE Id_jadwal = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

//Delete Data
if (isset($_POST['delete'])) {
    $sql1 = "DELETE FROM jadwal WHERE Id_jadwal = '$id'";
    $deleteQuery = mysqli_query($conn, $sql1);


    if ($deleteQuery) {
        header("Location: tambahjadwal.php");
    } else {
        echo mysqli_error($conn);
    }
}


if (isset($_POST['edit'])) {
    $jam_mulai = $_POST['jam_mulai'];
    $jam_berakhir = $_POST['jam_berakhir'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];

    $sql2 = "UPDATE jadwal SET 
            Tgl_jadwal='$tanggal',
            Jam_mulai='$jam_mulai',
            Jam_berakhir='$jam_berakhir',
            Hari='$hari' 
        WHERE Id_jadwal = '$id'

    ";

    $updateQuery = mysqli_query($conn, $sql2);
    var_dump($updateQuery);
    if ($updateQuery) {
        echo "<script>
                alert('Data Berhasil Terupdate');
            </script>";
        header("Refresh: 0; url=rincianjadwal.php?id=$id");
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

    <title>BACKDOOR19 - Login</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Rincian Jadwal</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control form-control-user" id="username"
                                                name='id_jadwal' value="<?= $data['Id_jadwal'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="time" class="form-control form-control-user" id="username"
                                                name='jam_mulai' value="<?= $data['Jam_mulai'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <input type="time" class="form-control form-control-user" id="username"
                                                name='jam_berakhir' value="<?= $data['Jam_berakhir'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='hari' value="<?= $data['Hari'] ?>">
                                        </div>


                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-user" id="password"
                                                name='tanggal' value="<?= $data['Tgl_jadwal'] ?>">
                                        </div>

                                        <div class="text-center">
                                            <button href="#" name="edit" class="btn btn-warning btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </button>
                                            <button href="#" name="delete" class="btn btn-danger btn-icon-split ">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                        </div>

                                        </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="text-center" type="text" class=" text-center"><a href="tambahjadwal.php">
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