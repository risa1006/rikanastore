<?php
session_start();

echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";


$koneksi = new mysqli("localhost","root","","rikanastore");
?>

<!DOCTYPE html>
<html>
<head>
	<title>keranjang belanja</title>
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

<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
				<!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
				<?php 
				$ambil = $koneksi->query("SELECT * FROM produk
					WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"]*$jumlah;
				?>
				
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>

			</tbody>
		</table>
		<a href="index.php" class="btn  btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn  btn-primary">Checkout</a>
	</div>
</section>




</body>
</html>