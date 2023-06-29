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
        $kategories = mysqli_query($mysqli, "SELECT * FROM kategori");
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
                <a href="addkategori.php" class="btn btn-primary">Add New Kategori</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Kode_kategori</td>
                            <td class="text-center">Nama_kategori</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($kategori = mysqli_fetch_array($kategories)) {
                                echo "
                                    <tr>
                                        <td>".$kategori['Kode_kategori']."</td>
                                        <td>".$kategori['Nama_kategori']."</td>
                                        <td class='text-center'>
                                            <a href='editkategori.php?Kode_kategori=".$kategori['Kode_kategori']." 'class='btn btn-warning'>Edit</a>
                                            <a href='#' class='btn btn-danger' onclick='confirmation(` ".$kategori['Kode_kategori']." `)'>Delete</a>
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
    function confirmation(Kode_kategori) {
        if (confirm('Apakah anda yakin ingin menghapus data kategori tersebut ?')) {
            window.location.href = 'deletekategori.php?Kode_kategori=' + Kode_kategori;
        }
    }
</script>