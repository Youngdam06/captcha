<?php
// definisikan database server dsb.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kontak');

//  akses untuk koneksi ke database 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link == false) {
    die("ERROR: could not connect. " . mysqli_connect_error());
}

?>