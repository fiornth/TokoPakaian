<?php 
    ob_start();

    include_once("connect.php");
    
    $id_produk = $_GET['Id_produk'];
    $delete = mysqli_query($mysqli, "DELETE FROM produk WHERE id_produk = '$id_produk' ");

    header("Location: index.php");
?>