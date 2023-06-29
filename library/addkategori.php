<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

    <?php 
        include_once("connect.php");
    ?>

    <div class="container">

        <div class="row" style="margin: 50px;">
            <div class="col-md-12 text-center">
                <h4>TAMBAH KATEGORI</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="addkategori.php" method="post" name="form2">
                    <table width="100%" class=" table-bordered" cellpadding="10" border="0">
                        <tr>
                            <td>Kode Kategori</td>
                            <td><input type="text" class="form-control" name="kode_kategori"></td>
                        </tr>
                        <tr>
                            <td>Nama Kategori</td>
                            <td><input type="text" class="form-control" name="nama_kategori"></td>
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
        $kode_kategori = $_POST['kode_kategori'];
        $nama_kategori = $_POST['nama_kategori'];

        $insert = mysqli_query($mysqli, "INSERT INTO `kategori`(`Kode_kategori`, `Nama_kategori`) VALUES('$kode_kategori', '$nama_kategori'); ");
        
        
        header("Location: kategori.php");
    }
?>