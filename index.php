<?php
    require "../web_dinamis/library/connect.php";
    $queryProduk = mysqli_query($mysqli, "SELECT Id_produk, Nama_produk, Harga FROM produk");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online Pakaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>FEIRDM</h1>
            <h3>Search Your Outfits</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="PRODUK.PHP">
                    <div class="input-group my-4">
                        <input type="text" class="form-control" placeholder="What are you looking for?" aria-label="search product" aria-describedby="basic-addon2" name="keyword">
                        <button type="Submit" class="btn warna2">Search</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>

    <!-- hightlighted kategori -->
    <div class="container-fluid py-5 text-center">
        <div class="container">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-baju d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Baju">Baju</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-celana d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Celana">Celana</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-jaket d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=Jaket">Jaket</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid warna2 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. A enim perspiciatis hic culpa commodi earum eligendi velit soluta laborum in eaque assumenda beatae veritatis corporis autem nulla magni quasi voluptatum vero, maiores minus accusamus necessitatibus. Corporis voluptatem nihil maxime iusto commodi voluptatibus, eligendi nobis minus fuga molestias in similique consectetur?
            </p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while($dataProduk = mysqli_fetch_array($queryProduk)) { ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card"> 
                        <!-- <img src="images/<?php echo $dataProduk['Foto']; ?>" alt="Gambar Product"> -->
                    <!-- gamasuk di edit -->

                        <div class="card-body">
                            <h4 class="card-title"><?php echo $dataProduk['Nama_produk']; ?></h4>
                            <!-- <p class="card-text text-truncate">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <p class="card-text text-harga">Rp <?php echo $dataProduk['Harga']; ?></p>
                            <a href="#" class="btn warna3 text-white">Add to chart</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>