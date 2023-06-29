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
    ?>

    <div class="container">

        <div class="row" style="margin: 50px;">
            <div class="col-md-12 text-center">
                <h4>TAMBAH PRODUK</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="add.php" method="post" name="form1" enctype="multipart/form-data">
                    <table width="100%" class=" table-bordered" cellpadding="10" border="0">
                        <tr>
                            <td>ID Produk</td>
                            <td><input type="text" class="form-control" name="id_produk"></td>
                        </tr>
                        <tr>
                            <td>Supplier</td>
                            <td>
                                <select class="form-control" name="id_supplier">
                                    <?php
                                        while($supplier = mysqli_fetch_array($array_supplier)) {
                                            echo "
                                                <option value=".$supplier['Id_supplier'].">".$supplier['Id_supplier']." ".$supplier['Nama_supplier']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Produk</td>
                            <td><input type="text" class="form-control" name="nama_produk"></td>
                        </tr>
                        <tr>
                            <td>Kuantitas</td>
                            <td><input type="text" class="form-control" name="kuantitas"></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><input type="text" class="form-control" name="harga"></td>
                        </tr>
                        <tr>
                            <td>Kode Kategori</td>
                            <td><select class="form-control" name="kode_kategori">
                                <?php
                                    while($kategori = mysqli_fetch_array($array_kategori)) {
                                        echo "
                                            <option value=".$kategori['Kode_kategori'].">".$kategori['Kode_kategori']." ".$kategori['Nama_kategori']."</option>
                                        ";
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td><input type="file" name="foto" id="foto"><br></td>
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

        
    $target_dir = "images/";
    $name_file = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $name_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $new_name = $target_file . "." . $imageFileType;

    // Check if image file is a actual image or fake image
    if(isset($_POST['Submit'])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        } else {
        echo "File is not an image.";
        $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["foto"]["size"] > 10000000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0  ) {
        echo "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
}

        $kuantitas = $_POST['kuantitas'];
        $harga = $_POST['harga'];
        $kode_kategori = $_POST['kode_kategori'];


        $insert = mysqli_query($mysqli, "INSERT INTO `produk`(`Id_produk`, `Id_supplier`, `Nama_produk`, `Foto`, `Kuantitas`, `Harga`, `Kode_kategori`) VALUES('$id_produk', '$id_supplier', '$nama_produk', '$target_file', '$kuantitas', '$harga', '$kode_kategori'); ");
        
        header("Location: index.php");
    }
?>