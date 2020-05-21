<H2>Edit Produk</H2>
<?php
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
 $pecah=$ambil->fetch_assoc();

 
 ?>

 <form method="post" enctype="multipart/form-data">
 <div class="form-group">
 <label>Nama Produk</label>
 <input type="text" name="nama" class="form-control"
 value="<?php echo $pecah['nama_produk']; ?>">
 </div>
 <div class="form-group">
 <label>Harga (Rp)</label>
 <input type="number" name="harga" class="form-control"
 value="<?php echo $pecah['harga_produk']; ?>">
 </div>
 <div class="form-group">
 <label>Berat (Gr)</label>
 <input type="number" name="berat" class="form-control"
 value="<?php echo $pecah['berat_produk']; ?>">
 </div>
 <div class="form-group">
 <img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">
 </div>
 <div class="form-group">
 <label>Ganti Foto</label>
 <input type="file" name="foto">
 </div>
 <div class="form-group">
 <label>Deskripsi</label>
 <textarea name="deskripsi" class="form-control" rows="10">
 <?php echo $pecah['deskripsi_produk']; ?>
 </textarea>
 </div>
 <div class="form-group">
 <label>Stok</label>
 <input type="number" name="stok" class="form-control"
 value="<?php echo $pecah['stok_produk']; ?>">
 </div>
 <button class= "btn btn-primary" name= "edit" >Edit </button>
 </form>

 <?php
 if (isset ($_POST['edit' ]))
 {
 $namafoto =$_FILES['foto' ][ 'name' ];
 $lokasifoto =$_FILES['foto' ][ 'tmp_name' ];
 // Jika foto dirubah
 if (!empty ($lokasifoto ))
 {
 move_uploaded_file ($lokasifoto , "../foto_produk/$namafoto" );

 $koneksi ->query ("UPDATE produk SET nama_produk='$_POST[nama]',
 harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',
 foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]'
 WHERE id_produk='$_GET[id]'" );
 }
 else
 {

 $koneksi ->query ("UPDATE produk SET nama_produk='$_POST[nama]',
 harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',
 deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]'
 WHERE id_produk='$_GET[id]'" );
 }
 echo "<script>alert('Data Produk Berhasil Diedit');</script>" ;
 echo "<script>location='index.php?halaman=produk'</script>" ;
}
?>