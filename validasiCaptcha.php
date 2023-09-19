<?php
// definisikan file untuk koneksi database
include 'config.php';
// menyimpan data yang dikirim user ke variable
    $hasilCaptcha = $_POST["hasilCaptcha"];
    $angkaPertama = $_POST["angkaPertama"];
    $angkaKedua = $_POST["angkaKedua"];
// kalkulasi captcha
    $cekTotal = $angkaPertama + $angkaKedua;
// jika hasil captcha sesuai
    if ($hasilCaptcha == $cekTotal) {
        // menangkap data dari form
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $website = $_POST['website'];
        $message = $_POST['message'];
        
        $hasil = mysqli_query($link, "insert into info(name, email, phone, website, message) values('$nama','$email','$phone','$website','$message')");

        if ($hasil) {
            $message = "data sudah masuk";
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
    } 
    // jika gagal
    else {
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