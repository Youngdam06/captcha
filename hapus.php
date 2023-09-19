<?php
// definisikan file untuk koneksi database
include 'config.php';

$id = $_GET['id'];
// query delete
mysqli_query($link, "delete from info where id=$id");

header('location:form.php');
?>