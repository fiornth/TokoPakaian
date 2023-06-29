<?php 
    ob_start();

    include_once("connect.php");

    $id_supplier = $_GET['Id_supplier'];
    $delete = mysqli_query($mysqli, "DELETE FROM supplier WHERE id_supplier = '$id_supplier' ");

    header("Location: supplier.php");
?>