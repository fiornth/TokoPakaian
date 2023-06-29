<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Supplier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

    <?php 
        include_once("connect.php");
        
        $id_supplier = $_GET['Id_supplier'];
        $supplier = mysqli_query($mysqli, "SELECT * FROM supplier WHERE Id_supplier ='$id_supplier' ");

        while($supplier_data = mysqli_fetch_array($supplier))
        {
            $id_supplier = $supplier_data['Id_supplier'];
            $nama_supplier = $supplier_data['Nama_supplier'];
            $alamat_supplier = $supplier_data['Alamat_supplier'];
            $telepon_supplier = $supplier_data['Telepon_supplier'];
        }
    ?>

    <div class="container">

        <div class="row" style="margin: 50px;">
            <div class="col-md-12 text-center">
                <h4>EDIT SUPPLIER</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="editsupplier.php?id_supplier=<?php echo $id_supplier?>" method="post" name="form3">
                    <table width="100%" class=" table-bordered" cellpadding="10" border="0">
                        <tr>
                            <td>ID Supplier</td>
                            <td><input type="text" readonly= "" class="form-control" name="id_supplier" value="<?php echo $id_supplier; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nama Supplier</td>
                            <td><input type="text" class="form-control" name="nama_supplier" value="<?php echo $nama_supplier; ?>"></td>
                        </tr>
                        <tr>
                            <td>Alamat Supplier</td>
                            <td><input type="text" class="form-control" name="alamat_supplier" value="<?php echo $alamat_supplier; ?>"></td>
                        </tr>
                        <tr>
                            <td>Telepon Supplier</td>
                            <td><input type="text" class="form-control" name="telepon_supplier" value="<?php echo $telepon_supplier; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Add"</td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php
    if(isset($_POST['Submit'])) {
        $id_supplier = $_POST['id_supplier'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat_supplier = $_POST['alamat_supplier'];
        $telepon_supplier = $_POST['telepon_supplier'];

        $result = mysqli_query($mysqli, "UPDATE supplier SET Nama_supplier = '$nama_supplier', Alamat_supplier = '$alamat_supplier', Telepon_supplier = '$telepon_supplier' WHERE Id_supplier = '$id_supplier';" );

        header("Location:supplier.php");
        // print_r($_POST);
    }
?>