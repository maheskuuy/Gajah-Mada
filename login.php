<?php
include 'php/config.php';

if (isset($_POST['btnlogin'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    echo $username . $pass;
    if (!empty($username) && !empty($pass)) {
        $query = "SELECT * FROM data_user WHERE Username = '$username'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $userName = $row['Username'];
            $passVal = $row['Password'];

            if ($num != 0) {
                if ($userName == $username && $passVal == $pass) {
                    $_SESSION['username'] = $userName;
                    header('Location: index.php');
                    echo $error;
                } else {
                    $error = 'user atau password salah';
                    // header('Location: login.php');
                    echo $error;
                }
            } else {
                $error = 'User tidak ditemukan!';
                // header('Location: login.php');
                echo $error;
            }
        }
    } else {
        $error = "Data tidak boleh kosong!";
        echo $error;
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
                                        <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                    </div>
                                    <form class="user" action="" method="post" onSubmit="return validasi()">
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user" id="username"
                                                name='username' placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name='password' placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name='btnlogin'>
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script type="text/javascript">
        function validasi() {
            $username = document.getElementById("username").value;
            $password = document.getElementById("password").value;
            if ($username != "" && $password != "") {
                return true;
            } else {
                alert('Username dan Password harus di isi !');
                return false;
            }
        }


    </script>
</body>

</html>