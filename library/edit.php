<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

    <?php 
        include_once("connect.php");
        $array_supplier = mysqli_query($mysqli, "SELECT * FROM supplier");
        $array_kategori = mysqli_query($mysqli, "SELECT * FROM kategori");

        $id_produk = $_GET['Id_produk'];
        $produk = mysqli_query($mysqli, "SELECT * FROM produk WHERE Id_produk='$id_produk' ");

        while($produk_data = mysqli_fetch_array($produk))
        {
            $id_produk = $produk_data['Id_produk'];
            $id_supplier = $produk_data['Id_supplier'];
            $nama_produk = $produk_data['Nama_produk'];
            $kuantitas = $produk_data['Kuantitas'];
            $harga = $produk_data['Harga'];
            $kode_kategori = $produk_data['Kode_kategori'];
            $foto = $produk_data['Foto'];
        }
    ?>

    <div class="container">

        <div class="row" style="margin: 50px;">
            <div class="col-md-12 text-center">
                <h4>EDIT PRODUK</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="edit.php?id_produk=<?php echo $id_produk?>" method="post" name="form1">
                    <table width="100%" class=" table-bordered" cellpadding="10" border="0">
                        <tr>
                            <td>ID Produk</td>
                            <td><input type="text" readonly= "" class="form-control" name="id_produk" value="<?php echo $id_produk; ?>"></td>
                        </tr>
                        <tr>
                            <td>Supplier</td>
                            <td>
                                <select class="form-control" name="id_supplier" value="<?php echo $id_supplier; ?>">
                                    <?php
                                        while($supplier = mysqli_fetch_array($array_supplier)) {
                                            echo "
                                                <option ".($supplier['Id_supplier'] == $id_supplier ? 'selected' : '')." value=".$supplier['Id_supplier']."> ".$supplier['Id_supplier']." ".$supplier['Nama_supplier']." </option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Produk</td>
                            <td><input type="text" class="form-control" name="nama_produk" value="<?php echo $nama_produk; ?>"></td>
                        </tr>
                        <tr>
                            <td>Kuantitas</td>
                            <td><input type="text" class="form-control" name="kuantitas" value="<?php echo $kuantitas; ?>"></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>"></td>
                        </tr>
                        <tr>
                            <td>Kode Kategori</td>
                            <td><select class="form-control" name="kode_kategori" value="<?php echo $kode_kategori; ?>">
                                <?php
                                    while($kategori = mysqli_fetch_array($array_kategori)) {
                                        echo "
                                            <option ".($kategori['Kode_kategori'] == $kode_kategori ? 'selected' : '')." value=".$kategori['Kode_kategori'].">".$kategori['Kode_kategori']." ".$kategori['Nama_kategori']."</option>
                                        ";
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Foto</td>
                            <td><input type="file" name="foto" id="foto" value="<?php echo $foto; ?>"></td>
                        </tr>
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
        $id_produk = $_POST['id_produk'];
        $id_supplier = $_POST['id_supplier'];
        $nama_produk = $_POST['nama_produk'];
        $kuantitas = $_POST['kuantitas'];
        $harga = $_POST['harga'];
        $kode_kategori = $_POST['kode_kategori'];
        $foto = $_POST['foto'];

        $result = mysqli_query($mysqli, "UPDATE produk SET Id_supplier = '$id_supplier', Nama_produk = '$nama_produk', Kuantitas = '$kuantitas', Harga = '$harga', Kode_kategori = '$kode_kategori', Foto = '$foto' WHERE Id_produk = '$id_produk';" );

        header("Location:index.php");
        // print_r($_POST);
    }
?>