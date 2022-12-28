<?php
include 'php/config.php';
if(isset($_POST['btnLogin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query=mysqli_query($conn, "SELECT * FROM data_user WHERE Username = '$username'");
    $data=mysqli_fetch_array($query);
    
    if(mysqli_num_rows($query)>0){
        if (password_verify($password,$data['Password'])){
        //login berhasil
        // session_start();
        // $_SESSION['username'] = $data['Username'];
        header('Location:index.php');
    }else{
        //password salah
        // header('location:login.php?pesan= Password Salah');
        echo "<script>
        alert('Password Salah');
        window.location.href='login.php';
        </script>
        "; 
    }
    }else{
        //username salah
        //header('location:login.php?pesan= Username Salah');
        echo "<script>
    alert('Username Salah');
    window.location.href='login.php';
    </script>
    "; 
    }
}

?>