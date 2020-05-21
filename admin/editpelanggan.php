<H2>Edit Pelanggan</H2>
 <?php
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

 ?>

 <form method="post" enctype="multipart/form-data">
 <div class="form-group">
 <label>Nama Pelanggan</label>
 <input type="text" name="nama" class="form-control"
 value="<?php echo $pecah['nama_pelanggan']; ?>">
 </div>
 <div class="form-group">
 <label>E-Mail Pelanggan</label>
 <input type="text" name="email" class="form-control"
 value="<?php echo $pecah['email_pelanggan']; ?>">
 </div>
 <div class="form-group">
 <label>Telepon</label>
 <input type="text" name="telepon" class="form-control"
 value="<?php echo $pecah['telepon_pelanggan']; ?>">
 </div>
 <div class="form-group">
 <label>Password</label>
 <input type="text" name="password" class="form-control"
 value="<?php echo $pecah['password_pelanggan']; ?>">
 </div>
 <button class="btn btn-primary" name="edit">Edit</button>
 </form>

<?php
 if (isset($_POST['edit']))
 {

 $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',
 email_pelanggan='$_POST[email]',telepon_pelanggan='$_POST[telepon]',
 password_pelanggan='$_POST[password]'
WHERE id_pelanggan='$_GET[id]'");

 echo "<script>alert('Data Pelanggan Berhasil Diedit');</script>";
 echo "<script>location='index.php?halaman=pelanggan'</script>";
 }
 ?>