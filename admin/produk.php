<H2>Data Produk</H2>

<table class="table table-hover">
<thead>
<tr>
<th>No</th>
<th>Nama Produk</th>
<th>Harga (Rp)</th>
<th>Berat (Gr)</th>
<th>Foto</th>
<th>Deskripsi</th>
<th>Stok</th>
<th>Aksi</th>
 </tr>
</thead>
<tbody>
<?php $nomor=1; ?>
<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
<?php while($pecah = $ambil->fetch_assoc()){ ?>
<tr>
<td> <?php echo $nomor; ?></td>
<td><?php echo $pecah['nama_produk']; ?></td>
<td><?php echo $pecah['harga_produk']; ?></td>
<td><?php echo $pecah['berat_produk']; ?></td>
<td>
<center><img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100" height="80"></center>
</td>
<td><?php echo $pecah['deskripsi_produk']; ?></td>
<td><?php echo $pecah['stok_produk']; ?></td>
 <td>
 <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">Hapus</a>
 <a href="index.php?halaman=editproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">Edit</a>
 </td>
</tr>
<?php $nomor++; ?>
<?php } ?>
</tbody>
</table>

<a href= "index.php?halaman=tambahproduk" class= "btn btn-primary" >Tambah Data </a>