<?php
 session_start();
 //koneksi ke database
 $koneksi = new mysqli("localhost","root","","db_tokorian");

 if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$id_pem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pem'");
$datapem = $ambil->fetch_assoc();

$idpelangganyangbeli = $datapem["id_pelanggan"];

$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if ($idpelangganyanglogin!==$idpelangganyangbeli)
	
	{
	echo "<script>alert('Upss ! Terjadi Kesalahan');</script>";
	echo "<script>location='riwayat.php' ;</script>";
	exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<Link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
	
<?php include 'menu.php'; ?>

	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<hr>
		<p>Kirim bukti pembayaran Anda disini</p>
		<div class="alert alert-info">Total tagihan Anda<strong> Rp. <?php echo number_format($datapem["total_pembelian"]) ?></strong></div>

		<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Penyetor</label>
								<input type="text" class="form-control" name="nama"required>
							</div>
					<div class="form-group">
						<label>Bank</label>
								<input type="text" class="form-control" name="bank"required>
							</div>
					<div class="form-group">
						<label>Jumlah</label>
								<input type="number" class="form-control" name="jumlah" min="1">
							</div>
					<div class="form-group">
						<label>Foto Bukti</label>
								<input type="file" class="form-control" name="bukti">
								<p class="text-danger">Foto bukti harus JPG maks. 2MB</p>
							</div>
							<button class="btn btn-primary" name="kirim">Kirim</button>
</form>
</div>
<?php
if (isset($_POST['kirim']))
{
 $namabukti = $_FILES["bukti"]["name"];
 $lokasibukti = $_FILES["bukti"]["tmp_name"];
 $namafiks = date("YmdHis").$namabukti;
 move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

 $nama = $_POST["nama"];
 $bank = $_POST["bank"];
 $jumlah = $_POST["jumlah"];
 $tanggal = date("Y-m-d");

 $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)VALUES('$id_pem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

 $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian ='$id_pem'");

echo "<script>alert('Terima Kasih sudah mengirimkan bukti pembayaran');</script>";
	echo "<script>location='riwayat.php' ;</script>";

 }
?>

</body>
</html>
