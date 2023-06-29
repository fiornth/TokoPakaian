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
        $products = mysqli_query($mysqli, "SELECT produk.*, supplier.nama_supplier as Nama_supplier, kategori.nama_kategori as Kategori
                                            FROM produk 
                                            LEFT JOIN supplier ON produk.id_supplier = supplier.id_supplier
                                            LEFT JOIN kategori ON produk.kode_kategori = kategori.kode_kategori
                                            ");
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
                <a href="add.php" class="btn btn-primary">Add New Product</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Id_produk</td>
                            <td class="text-center">Nama_supplier</td>
                            <td class="text-center">Nama_produk</td>
                            <!-- <td class="text-center">Foto</td> -->
                            <td class="text-center">Kuantitas</td>
                            <td class="text-center">Harga</td>
                            <td class="text-center">Kode_kategori</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($product = mysqli_fetch_array($products)) {
                                echo "
                                    <tr>
                                        <td>".$product['Id_produk']."</td>
                                        <td>".$product['Nama_supplier']."</td>
                                        <td>".$product['Nama_produk']."</td>
                                       
                                        <td>".$product['Kuantitas']."</td>
                                        <td>".$product['Harga']."</td>
                                        <td>".$product['Kategori']."</td>
                                        <td class='text-center'>
                                            <a href='edit.php?Id_produk=".$product['Id_produk']." 'class='btn btn-warning'>Edit</a>
                                            <a href='#' class='btn btn-danger' onclick='confirmation(` ".$product['Id_produk']." `)'>Delete</a>
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
    function confirmation(Id_produk) {
        if (confirm('Apakah anda yakin ingin menghapus data produk tersebut ?')) {
            window.location.href = 'delete.php?Id_produk=' + Id_produk;
        }
    }
</script>