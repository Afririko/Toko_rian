<H2>Tambah Pelanggan</H2>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Nama Pelanggan</label>
<input type="text" class="form-control" name="nama">
 </div>
<div class="form-group">
<label>E-Mail Pelanggan</label>
 <input type="text" class="form-control" name="email">
 </div>
 <div class="form-group">
 <label>Telepon</label>
 <input type="text" class="form-control" name="telepon">
 </div>
 <div class="form-group">
 <label>Password</label>
 <input type="text" class="form-control" name="password">
 </div>
 <button class="btn btn-primary" name="save">Simpan</button>
 </form>
 <?php
 if (isset($_POST['save']))
 {
 $koneksi->query("INSERT INTO pelanggan(nama_pelanggan,email_pelanggan,telepon_pelanggan,password_pelanggan)VALUES('$_POST[nama]','$_POST[email]','$_POST[telepon]','$_POST[password]')");

 echo "<div class='alert alert-info'>Data Tersimpan</div>";
 echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";

}
 ?>