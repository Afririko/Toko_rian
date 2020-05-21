<?php
session_start();
$koneksi = new mysqli("localhost","root","","db_tokorian");
?>
<!DOCTYPE html>
<html>
<head>
<title>Nota Pembelian</title>
<link rel="stylesheet" href="admin/assets/css/bootstrap.css" />
</head>
<body>

	<!--navbar -->
<?php include 'menu.php'; ?>

<section class="konten">
<div class="container">

<H2>Detail Pembelian</H2>
<hr>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<?php
$idpelangganyangbeli = $detail["id_pelanggan"];

$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idpelangganyangbeli!==$idpelangganyanglogin)
	
	{
	echo "<script>alert('Upss ! Terjadi Kesalahan');</script>";
	echo "<script>location='riwayat.php' ;</script>";
	exit();
	}
?>


<section class="konten">
	<div class="container">
 <div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong> <br>
		Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
 		Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
	</div>
	<div class="col-md-4">
	<h3>Pelanggan</h3>
	<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
 <p>
 	<?php echo $detail['email_pelanggan']; ?><br>
 	<?php echo $detail['telepon_pelanggan']; ?>
 </p>
 </div>
	<div class="col-md-4"></div>
	<h3>Pengiriman</h3>
	<strong><?php echo $detail['nama_kota']; ?></strong> <br>
	Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
	Alamat: <?php echo $detail['alamat_pengiriman']; ?>
</div>
</div>

 <table class= "table table-bordered">
 <thead>
 <tr>
<th> No</th>
 <th> Nama Produk </th>
 <th> Harga </th>
 <th> Berat </th>
 <th> Jumlah </th>
 <th> Sub Berat </th>
<th> Sub Total </th>
 </tr>
 </thead>
 <tbody>
 <?php $nomor=1; ?>
<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk where id_pembelian='$_GET[id]'"); ?>
<?php while($pecah=$ambil->fetch_assoc()) { ?>
 <tr>
 <td> <?php echo $nomor; ?></td>
 <td><?php echo $pecah['nama']; ?></td>
 <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
 <td><?php echo $pecah['berat']; ?></td>
 <td><?php echo $pecah['jumlah']; ?></td>
 <td><?php echo $pecah['subberat']; ?></td>
 <td>Rp. <?php echo number_format($pecah["subharga"]); ?></td>
 </tr>
 <?php $nomor++; ?>
 <?php } ?>
 </tbody>
 </table>

 <div class="row">
	<div class="col-md-7">
					<div class="alert alert-info">
						<p>
						Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
						<strong>BANK MANDIRI 137-001088-3276 AN. Rian</strong>
					</p>
				</div>
			</div>

</body>
</html>