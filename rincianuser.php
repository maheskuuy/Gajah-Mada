<?php
include 'php/config.php';

$id = $_GET['id'];

// Get Single Data
$sql = "SELECT * FROM data_user WHERE Id_user = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

//Delete Data
if (isset($_POST['delete'])) {
    $sql1 = "DELETE FROM data_user WHERE Id_user = '$id'";
    $deleteQuery = mysqli_query($conn, $sql1);

    if ($deleteQuery) {
        header("Location: tambahuser.php");
    } else {
        echo mysqli_error($conn);
    }
}


if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $level = $_POST['level'];
    $foto = $_POST['foto'];

    $sql2 = "UPDATE data_user SET 
            Username='$username',
            Password='$password',
            Email='$email',
            Kontak='$kontak',
            Alamat='$alamat',
            Gender='$gender',
            Level='$level',
            Foto='$foto' 
        WHERE Id_user = '$id'
    ";

    $updateQuery = mysqli_query($conn, $sql2);

    if ($updateQuery) {
        echo "<script>
                alert('Data Berhasil Terupdate');
            </script>";
        header("Refresh: 0; url=rincianuser.php?id=$id");
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

    <title>BACKDOOR19 - Rincian User</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<form method="GET" action=""></form>

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
                                        <h1 class="h4 text-gray-900 mb-4">Rincian User</h1>
                                    </div>
                                    <form class="user" action="" method="post" onSubmit="return validasi()">
                                        <input type="hidden" name="id" value="<?= $data['Id_user'] ?>">
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user" id="username"
                                                name='username' value="<?= $data['Username'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='password' value="<?= $data['Password'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="username"
                                                name='email' value="<?= $data['Email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='kontak' value="<?= $data['Kontak'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='alamat' value="<?= $data['Alamat'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name='gender' value="<?= $data['Gender'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control form-control-user" id="password"
                                                name='level' value="<?= $data['Level'] ?>">
                                            <input type="hidden" name="foto" value="<?= $data['Foto'] ?>">
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

    </form>
    <div class="text-center" type="text" class=" text-center"><a href="tambahuser.php">
            < Kembali</a>
    </div>
</body>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>


</html>