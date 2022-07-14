<?php
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT telp_admin, email_admin, alamat_admin FROM tb_admin WHERE id_admin = 1");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TokoPaEdi</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
		<h1><a href="index.php">TokoPaEdi</a></h1>
		<ul>
			<li><a href="produk.php">Produk</a></li>
		</ul>
	</div>
	</header>

	<!--search-->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!--produk detail-->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="produk/<?php echo $p->gambar_produk ?>" width="100%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->nama_produk ?></h3>
					<h4>Rp. <?php echo number_format($p->harga_produk) ?></h4>
					<p>Deskripsi : <br>
						<?php echo $p->deskripsi_produk ?>
					</p>
					<p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->telp_admin ?>&text=Hai, Saya tertarik dengan produk Anda." target="_blank">
						Hubungin Via Whatsapps
						<img src="img/whatsapp.png" width="50px"></a>
					</p>
				</div>
			</div>
		</div>
	</div>

		<!--footer-->
		<div class="footer">
			<div class="coontainer">
				<h4>Alamat</h4>
				<p><?php echo $a->alamat_admin ?></p>

				<h4>Email</h4>
				<p><?php echo $a->email_admin ?></p>

				<h4>No. HP</h4>
				<p><?php echo $a->telp_admin ?></p>
				<small>Copyright &copy; 2022 - TokoPaEdi.</small>
			</div>
		</div>
</body>
</html>