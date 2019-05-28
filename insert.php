<?php
$koneksi = mysqli_connect("localhost","root","","buku_telphon");
$sql = "insert into kontak values ('".$_POST['nama']."','".$_POST['email']."','".$_POST['no_tlpn']."','".$_POST['alamat']."')";
$query = mysqli_query($koneksi,$sql);
if($query){
    header("location:index.php?berhasil=berhasil");
}else{
    header("location:index.php?gagal=gagal");
}