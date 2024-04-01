<?php
include './php/config.php';


// tambah.detail film
if (isset($_POST['btnProses'])) {

    $judul = $_POST['judul'];
    $sutradara = $_POST['sutradara'];
    $durasi = $_POST['durasi'];
    $genre = $_POST['genre'];
    $sinopsis = $_POST['sinopsis'];
    $aktor = $_POST['aktor'];

    if ($_POST['btnProses'] == "tambah") {

        $poster = $_FILES['poster']['name'];
        $dir = "../img/";
        $dirFile = $_FILES['poster']['tmp_name'];
        move_uploaded_file($dirFile, $dir . $poster);
        $query = mysqli_query($conn, "INSERT INTO film VALUES (null,'$judul','$sutradara','$durasi','$genre','$sinopsis','$aktor','$poster')");

        if ($query) {
            echo "<script>
    alert('Data Berhasil ditambahkan');
    window.location.href='detail.php';
    </script>
    ";
        } else {
            echo "<script>
    alert('data gagal ditambahkan');
    </script>
    ";
        }
    }
}

    // tambah data transaksi
if (isset($_POST['btnProses_transaksi'])) {

    $id_transaksi = $_POST['id_transaksi'];
    $username = $_POST['username'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $total_harga = $_POST['total_harga'];
    $id_tiket = $_POST['id_tiket'];
    if ($_POST['btnProses_transaksi'] == "tambah") {


        $query = mysqli_query($conn, "INSERT INTO transaksi VALUES ($id_transaksi,'$waktu','$jumlah','$total_harga',null)");
        $query = mysqli_query($conn, "INSERT INTO data_user VALUES (null,'$username','','','','','','','')");
        $query = mysqli_query($conn, "INSERT INTO tiket VALUES ('$id_tiket','$harga',null,null,null)");


        if ($query) {
            echo "<script>
                alert('Data Berhasil ditambahkan');
                window.location.href='tabel transaksi.php';
                </script>
                ";
        } else {
            echo "<script>
                alert('data gagal ditambahkan');
                </script>
                ";
        }
    }
}

    // tambah data Tiket
if (isset($_POST['btnProses_data'])) {

    var_dump($_POST);

    $id_tiket = $_POST['id_tiket'];
    $no_kursi = $_POST['no_kursi'];
    $harga = $_POST['harga'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_berakhir = $_POST['jam_berakhir'];
    $tanggal = $_POST['tanggal'];
    $nama_studio = $_POST['nama_studio'];
    $alamat_studio = $_POST['alamat_studio'];

    $sql1 = mysqli_query($conn, "INSERT INTO jadwal (Tgl_jadwal, Jam_mulai, Jam_berakhir) VALUES ('$tanggal','$jam_mulai','$jam_berakhir')");
    $sql2 = mysqli_query($conn, "INSERT INTO kursi VALUES (null,'$no_kursi',null)");
    $sql3 = mysqli_query($conn, "INSERT INTO studio VALUES (null,'$nama_studio','$alamat_studio')");
    $sql4 = mysqli_query($conn, "INSERT INTO tiket VALUES ('$id_tiket','$harga',null,null,null)");
    

    if ($sql1) {
        echo "<script>
            alert('Data Berhasil ditambahkan');
            window.location.href='data.php';
            </script>
            ";
    } else {
        echo "<script>
            alert('data gagal ditambahkan');
            </script>
            ";
    }
}


if (isset($_POST['btnProses_delete_data'])) {

$id_tiket   = $_GET['id_tiket'];
// query SQL untuk delete data
$query="DELETE from tiket where Id_tiket='$id_tiket'";
mysqli_query($conn, $query);
// mengalihkan ke halaman index.php
header("location:data.php");

if ($query) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        window.location.href='data.php';
        </script>
        ";
} else {
    echo "<script>
        alert('terjadi Sebuah kesalahan, coba lagi!');
        </script>
        ";
}

}

if (isset($_POST['btnProses_delete_transaksi'])) {

$id_tiket   = $_GET['id_transaksi'];
// query SQL untuk delete data
$query="DELETE from transaksi where Id_transaksi='$id_transaksi'";
mysqli_query($conn, $query);
// mengalihkan ke halaman index.php
header("location:tabel transaksi.php");

if ($query) {
    echo "<script>
        alert('Data Berhasil dihapus');
        window.location.href='tabel transaksi.php';
        </script>
        ";
} else {
    echo "<script>
        alert('terjadi Sebuah kesalahan, coba lagi!');
        </script>
        ";
}

}

if (isset($_POST['btnProses_delete_detail'])) {

$id_tiket   = $_GET['id_film'];
// query SQL untuk delete data
$query="DELETE from film where Id_film='$id_tiket'";
mysqli_query($conn, $query);
// mengalihkan ke halaman index.php
header("location:detail.php");

if ($query) {
    echo "<script>
        alert('Data Berhasil dihapus');
        window.location.href='detail.php';
        </script>
        ";
} else {
    echo "<script>
        alert('terjadi Sebuah kesalahan,coba lagi!');
        </script>
        ";
}

}

?>