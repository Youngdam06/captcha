<?php
include 'config.php';
$hasilCaptcha = $_POST["hasilCaptcha"];
$angkaPertama = $_POST["angkaPertama"];
$angkaKedua = $_POST["angkaKedua"];

$cekTotal = $angkaPertama + $angkaKedua;

if ($hasilCaptcha == $cekTotal) {
    // echo '<h2 class="green">Captcha OK</h2>';
    // menangkap data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $message = $_POST['message'];
    
    $hasil = mysqli_query($link, "update info set name='$nama' , email='$email', phone='$phone', website='$website', message='$message' where id='$id' ");

    if ($hasil) {
        $message = "data berhasil diedit";
        echo "<script type = 'text/javascript'>
        alert('$message');
        setTimeout(function() {
            window.location.href = 'form.php';
        }, 1000)
        </script>";
        exit();
    } else {
        $message = "data tidak masuk";
        echo "<script type = 'text/javascript'>
        alert('$message');
        setTimeout(function() {
            window.location.href = 'form.php';
        }, 1000)
        </script>";
        exit();
    }

    header("location:form.php");
} else {
    $message = "captcha salah";
    echo "<script type = 'text/javascript'>
    alert('$message');
    setTimeout(function() {
        window.location.href = 'form.php';
    }, 1000)
    </script>";
    exit();
    }

?>

