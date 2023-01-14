<?php
session_start();
$koneksi = new mysqli("localhost","root","","rikanastore");
?>
<!DOCTYPE html>
<html>
<head>
	<title>login pelanggan</title>
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

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-daefault">
				<div class="panel-heading">
					<h3 class="panel-title">Login Pelanggan</h3>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<button class="btn btn-primary" name="simpan">Simpan</button>
				</form>
			</div>
		</div>
	</div>

<?php 
// jika ada tombol simpan (tombol simpan ditekan)
if (isset($_POST["simpan"]))
{

	$email = $_POST["email"];
	$password = $_POST["password"];
	// lakukan query mengecek akun di tabel pelanggan di db
	$ambil = $koneksi->query("SELECT * FROM pelanggan 
		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	// menghitung akun yang terambil
	$akunyangcocok = $ambil->num_rows;

	// jika 1 akun yang cocok, maka diloginkan
	if ($akunyangcocok==1)
	{
		// Anda sudah login
		// mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		// akun di session pelanggan
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('anda sukses login');</script>";
		echo "<script>location='checkout.php';</script>";

	}
	else
	{
		// anda gagal login
		echo "<script>alert('anda gagal login, periksa akun anda');</script>";
		echo "<script>location='login.php';</script>";
	}
}

?>

</body>
</html>