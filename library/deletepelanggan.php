<?php 
    ob_start();

    include_once("connect.php");

    $id_pelanggan = $_GET['Id_pelanggan'];
    $delete = mysqli_query($mysqli, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan' ");

    header("Location: pelanggan.php");
?>