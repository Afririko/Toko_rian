<?php
session_start();
// mendapatkan id produk dari url
$id_produk = $_GET['id'];
if(isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk]+=1;

}
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

echo "<script>alert('Produk Telah Masuk Ke Keranjang Belanja');</script>";
echo "<script>location='keranjang.php';</script>";


?>