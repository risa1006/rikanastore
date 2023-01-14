<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","rikanastore");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Rikanastore</title>
	<link rel="stylesheet" href="adminRS/assets/css/bootstrap.css">
</head>
<body>



<!-- navbar -->
<nav class="navbar navbar-default">
	<div class="container">
		
	<ul class="nav navbar-nav ">
		<li><a href="index.php">Home</a></li>
		<li><a href="keranjang.php">Keranjang</a></li>
		<!-- jika sudah login (ada session pelanggan) -->
		<?php if (isset($_SESSION["pelanggan"])); ?>
			<li><a href="logout.php">Logout</a></li>
		<!-- selain itu berarti belum login/ (belum ada session pelanggan) -->
	
			<li><a href="login.php">Login</a></li>
		
		<li><a href="checkout.php">Checkout</a></li>
	</ul>
	</div>
</nav>

<!-- konten -->
<section class="konten">
	<div class="container">
		<h1>Produk Terbaru</h1>
		

		<div class="row">

			<?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
	
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
					<div class="caption">
						<h3><?php echo $perproduk['nama_produk']; ?></h3>
						<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
					</div>
				</div>
			</div> 
			<?php } ?>


		</div>
	</div>
</section>

</body>
</html>