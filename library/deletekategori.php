<?php 
    ob_start();

    include_once("connect.php");

    $kode_kategori = $_GET['Kode_kategori'];
    $delete = mysqli_query($mysqli, "DELETE FROM kategori WHERE kode_kategori = '$kode_kategori' ");

    header("Location: kategori.php");
?>