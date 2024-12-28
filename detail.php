<?php
include 'lib/koneksi.php';

$id_pemesanan = htmlentities($_GET['id_pemesanan']);

$sql = "SELECT * FROM pemesanan where id_pemesanan = '$id_pemesanan' and is_deleted=0";

$query = mysqli_query($db,$sql);

if(mysqli_num_rows($query)==0)
{
    echo 'tidak ada'; exit;
}else{
    $detail = mysqli_fetch_row($query);
?>

<main class="flex-shrink-0">
  <div class="container">
    <form method="post" action="lib/proses.php">
<div class="card mt-2">
  <div class="card-header bg-dark text-white">
    Detail Pemesanan Paket Wisata #<?=$detail[0]?>
  </div>
  <div class="card-body">
	<div class="mb-3">
	  <label for="nama_pemesanan" class="form-label">Nama Lengkap</label>
	  <div id="nama_pemesan"><?=$detail[1]?></div>
	</div>
	<div class="mb-3">
	  <label for="hp_pemesan" class="form-label">Nomor Handphone</label>
	  <div id="hp_pemesan"><?=$detail[2]?></div>
	</div>
	<div class="mb-3">
	  <label for="waktu_wisata" class="form-label">Waktu Mulai Perjalanan</label>
	  <div id="waktu_wisata"><?=$detail[3]?></div>
	</div>
	<div class="mb-3">
	  <label for="hari_wisata" class="form-label">Hari Wisata</label>
	  <div id="hari_wisata"><?=$detail[4]?></div>
	</div>
	<div class="mb-3">
	    <div class="form-check">
		  <input class="form-check-input" type="checkbox" name="paket_inap" value="1" id="paket_inap" <?=($detail[5]==1)?'checked':''?> disabled>
		  <label class="form-check-label" for="paket_inap">
			Penginapan (Rp. 1.000.000)
		  </label>
		</div>
	</div>
	<div class="mb-3">
	    <div class="form-check">
		  <input class="form-check-input" type="checkbox" name="paket_transport" value="1" id="paket_transport" <?=($detail[6]==1)?'checked':''?> disabled>
		  <label class="form-check-label" for="paket_transport">
			Transportasi (Rp. 1.200.000)
		  </label>
		</div>
	</div>
	<div class="mb-3">
	    <div class="form-check">
		  <input class="form-check-input" type="checkbox" name="paket_makan" value="1" id="paket_makan" <?=($detail[7]==1)?'checked':''?> disabled>
		  <label class="form-check-label" for="paket_makan">
			Service/ Makan (Rp. 500.000)
		  </label>
		</div>
	</div>
	<div class="mb-3">
	  <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
	   <div id="jumlah_peserta"><?=$detail[8]?></div>
	 </div>
	<div class="mb-3">
	  <label for="total" class="form-label">Total Tagihan</label>
	  <div id="total">Rp. <?=number_format($detail[9],0,',','.')?></div>
	</div>
	<div class="mb-3">
	  <label for="created_at" class="form-label">Waktu Pemesanan</label>
	  <div id="created_at"><?=$detail[10]?></div>
	</div>
  </div>
  <div class="card-footer d-print-none">
    <a href="index.php?aksi=pesan" class="btn btn-primary">Buat Pesanan Baru</a>
	<a href="#" onclick="window.print()" class="btn btn-success">Cetak</a>
  </div>
</div>
<?php } ?>