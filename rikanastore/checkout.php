<?php
session_start();
$koneksi = new mysqli("localhost","root","","rikanastore");




// jika tidak ada session pelanggan (belum login) maka dilarikan ke login.php
if (!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>alert('login.php');</script>";


}
?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
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


<pre>
	<?php print_r($_SESSION["pelanggan"]); ?>
</pre>


</body>
</html>