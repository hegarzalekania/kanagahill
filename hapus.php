<?php
include 'lib/koneksi.php';

$id_pemesanan = htmlentities($_GET['id_pemesanan']);

$sql = "SELECT * FROM pemesanan where id_pemesanan = '$id_pemesanan' and is_deleted=0";

$query = mysqli_query($db,$sql);

if(mysqli_num_rows($query)==0)
{
    echo 'tidak ada'; exit;
}else{
    $sql_hapus = "UPDATE pemesanan SET is_deleted='1' where id_pemesanan ='$id_pemesanan'";
    $query_hapus = mysqli_query($db,$sql_hapus);
    //var_dump($sql_hapus); exit;
    if($query_hapus)
    {
        header('Location: daftar.php');
    }else{
        header('Location: daftar.php');
    }
}