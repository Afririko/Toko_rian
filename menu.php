
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Toko Rian</a>
    </div>
    <ul class="nav navbar-nav navbar-left">
      <li><a href="keranjang.php"><span class="glyphicon glyphicon-list-alt"></span> Keranjang</a></li>

	    <li><a href="checkout.php"><span class="glyphicon glyphicon-ok"></span> Checkout</a></li>
	  
	  <?php if(isset($_SESSION['pelanggan'])): ?>
	  <li><a href="riwayat.php">Riwayat Belanja</a></li>
	
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	
	  <?php else: ?>
	  
      <li><a href="daftar.php"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	  
	  <?php endif ?>
    </ul>
  </div>
</nav>