<?php
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT telp_admin, email_admin, alamat_admin FROM tb_admin WHERE id_admin = 1");
	$a = mysqli_fetch_object($kontak);
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
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!--kategori-->
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<?php 
					$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
					if(mysqli_num_rows($kategori) > 0)
					{
						while($k = mysqli_fetch_array($kategori))
						{
				?>
				<a href="produk.php?kat=<?php echo $k['id_kategori'] ?>">
				<div class="col-5">
					<img src="img/kategori-icon.png" width="40px" style="margin-bottom: 5px;">
					<p><?php echo $k['nama_kategori'] ?></p>
				</div>
			</a>
			<?php }} else{ ?>
				<p>Kategori tidak ada</p>
			<?php } ?>
			</div>
		</div>
	</div>

	<!--new produk-->
	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php
					$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE status_produk = 1 ORDER BY id_produk DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0)
					{
						while($p = mysqli_fetch_array($produk))
						{
				?>
				<a href="detail-produk.php?id=<?php echo $p['id_produk'] ?>">
					<div class="col-4">
						<img src="produk/<?php echo $p['gambar_produk'] ?>">
						<p class="nama"><?php echo substr($p['nama_produk'], 0, 30) ?></p>
						<p class="harga">Rp. <?php echo number_format($p['harga_produk']) ?></p>
					</div>
				<?php }} else { ?>
					<p>Produk tidak ada</p>
				<?php } ?>
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