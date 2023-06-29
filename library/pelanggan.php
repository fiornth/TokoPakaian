<!DOCTYPE html>
<html>
<head>
    <title>Data Toko Pakaian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        include_once("connect.php");
        $pelanggans = mysqli_query($mysqli, "SELECT * FROM pelanggan");
    ?>

    <div class="container">

        <div class="row" style="margin: 50px;">
            <div class="col-md-2"></div>

            <div class="col-md-2 text-center">
                <a href="index.php">Produk</a>
            </div>
            <div class="col-md-2 text-center">
                <a href="kategori.php">Kategori</a>
            </div>
            <div class="col-md-2 text-center">
                <a href="supplier.php">Supplier</a>
            </div>
            <div class="col-md-2 text-center">
                <a href="pelanggan.php">Pelanggan</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="addpelanggan.php" class="btn btn-primary">Add New Pelanggan</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Id_pelanggan</td>
                            <td class="text-center">Nama_pelanggan</td>
                            <td class="text-center">Alamat_pelanggan</td>
                            <td class="text-center">Telepon_pelanggan</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($pelanggan = mysqli_fetch_array($pelanggans)) {
                                echo "
                                    <tr>
                                        <td>".$pelanggan['Id_pelanggan']."</td>
                                        <td>".$pelanggan['Nama_pelanggan']."</td>
                                        <td>".$pelanggan['Alamat_pelanggan']."</td>
                                        <td>".$pelanggan['Telepon_pelanggan']."</td>
                                        <td class='text-center'>
                                            <a href='editpelanggan.php?Id_pelanggan=".$pelanggan['Id_pelanggan']." 'class='btn btn-warning'>Edit</a>
                                            <a href='#' class='btn btn-danger' onclick='confirmation(` ".$pelanggan['Id_pelanggan']." `)'>Delete</a>
                                        </td>
                                    </tr>
                                ";
                            };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    function confirmation(Id_pelanggan) {
        if (confirm('Apakah anda yakin ingin menghapus data pelanggan tersebut ?')) {
            window.location.href = 'deletepelanggan.php?Id_pelanggan=' + Id_pelanggan;
        }
    }
</script>