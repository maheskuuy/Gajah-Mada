<?php
include 'php/config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM transaksi WHERE Id_transaksi = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

//Delete Data
if (isset($_POST['delete'])) {
    $sql1 = "DELETE FROM transaksi WHERE Id_transaksi = '$id'";
    $deleteQuery = mysqli_query($conn, $sql1);

    var_dump($deleteQuery);

    if ($deleteQuery) {
        header("Location: riwayat tabel.php");
    } else {
        echo mysqli_error($conn);
    }
}


if (isset($_POST['edit'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $waktu = $_POST['waktu'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];
    $status = $_POST['status'];

    $sql2 = "UPDATE transaksi SET 
            Id_transaksi='$id_transaksi',
            Waktu='$waktu',
            Jumlah='$jumlah',
            Total_harga='$total_harga',
            Status='Lunas'
        WHERE Id_transaksi = '$id'
    ";

    $updateQuery = mysqli_query($conn, $sql2);

    if ($updateQuery) {
        echo "<script>
                alert('Data Berhasil Terupdate');
            </script>";
        header("Refresh: 0; url=riwayat tabel.php?id=$id");
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

    <title>BACKDOOR19 - Konfirmasi Pembayaran</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Konfirmasi Pembayaran</h1>
                                    </div>
                                    <form class="user" action="" method="post" onSubmit="return validasi()">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='id_transaksi' value="<?= $data['Id_transaksi'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user" id="username"
                                                name='waktu' value="<?= $data['Waktu'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='jumlah' value="<?= $data['Jumlah'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='total_harga' value="<?= $data['Total_harga'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='status' value="<?= $data['Status'] ?>">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="edit" class="btn btn-warning btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">Konfirmasi Bayar</span>
                                            </button>
                                            <button name="delete" href="#" class="btn btn-danger btn-icon-split ">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="text-center" type="text" class=" text-center"><a href="riwayat tabel.php">
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