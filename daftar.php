<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KanagaHill</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <!-- Header Section -->
  <header class="hero-section">
    <nav class="navbar">
      <div class="logo">KanagaHill</div>
      <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="pemesanan.php">Packages</a></li>
        <li><a href="#">Upcoming Packages</a></li>
      </ul>
      <a href="#" class="get-in-touch">Get In Touch</a>
    </nav>
    <div class="hero-content">
      <h1>Read</h1>
      <h2>About Us</h2>
    </div>
  </header>

  <?php
include 'lib/koneksi.php';

$sql = "SELECT * FROM pemesanan where is_deleted = 0 order by created_at desc";

$query = mysqli_query($db,$sql);

if(mysqli_num_rows($query)==0)
{
    echo 'tidak ada'; exit;
}else{
    $detail = mysqli_fetch_row($query);
?>
<h1>Daftar Pemesanan</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pemesan</th>
      <th scope="col">Nomor HP</th>
      <th scope="col">Tanggal Berangkat</th>
      <th scope="col">Total Tagihan</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $co = 1;
      while($detail = mysqli_fetch_assoc($query)){
      ?>
    <tr>
      <th scope="row"><?=$co?></th>
      <td><?=$detail['nama_pemesanan']?></td>
      <td><?=$detail['hp_pemesan']?></td>
      <td><?=$detail['waktu_wisata']?></td>
      <td><?=$detail['total_tagihan']?></td>
      <td><a href="detail.php?id_pemesanan=<?=$detail['id_pemesanan']?>">Detail</a> 
      <a href="index.php?aksi=edit&id_pemesanan=<?=$detail['id_pemesanan']?>">Edit</a> 
      <a href="index.php?aksi=hapus&id_pemesanan=<?=$detail['id_pemesanan']?>">Hapus</a></td>
    </tr>
        <?php
        $co++;
        }
        ?>
  </tbody>
</table>
<?php
} 
?>

  <!-- Footer Section -->
  <footer>
    <div class="footer-content">
      <div class="company-info">
        <h2>KanagaHill</h2>
        <p>Build memories on the clouds</p>
        <div class="social-links">
          <a href="#">LinkedIn</a>
          <a href="#">Twitter</a>
          <a href="#">Instagram</a>
        </div>
      </div>
      <div class="footer-links">
        <h3>Company</h3>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Pricing</a></li>
        </ul>
      </div>
      <div class="newsletter">
        <h3>Join Our Newsletter</h3>
        <form>
          <input type="email" placeholder="Your email address">
          <button type="submit">Subscribe</button>
        </form>
        <p>* Will send you weekly updates for your better tour packages.</p>
      </div>
    </div>
  </footer>
</body>
</html>
