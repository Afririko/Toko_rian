<?php
session_start();

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi = new mysqli("localhost","root","","db_tokorian"); 

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang Kosong, silahkan belanja dulu !');</script>";
	echo "<script>location='index.php';</script>";

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css" >
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr />
		<table class="table table-bordered">
		<thead>
		<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Sub Harga</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>	
		<?php $nomor=1;
	
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		?>
			<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>

				<?php
				$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
				$pecah=$ambil->fetch_assoc();
				$subharga=$pecah["harga_produk"]*$jumlah;
			
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"];?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>

</body>
</html>