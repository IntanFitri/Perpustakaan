<?php
$conn=oci_connect("intan","intan","localhost/XE");

$id = $_GET['id'];
$judul = $_GET['judul'];
$pengarang = $_GET['pengarang'];
$tahun = $_GET['tahun_terbit'];
$jenis_buku = $_GET['jenis_buku'];
$status = $_GET['status'];
$jumlah = $_GET['jumlah'];
//$query= "UPDATE BUKU SET ID_BUKU='$id', JUDUL='$judul', PENGARANG='$pengarang', TAHUN_TERBIT='$tahun', JENIS_BUKU='$jenis_buku', STATUS='$status', JUMLAH='$jumlah'  
//WHERE ID_BUKU=$id";
//echo $query;
$s=oci_parse($conn, "UPDATE BUKU SET ID_BUKU='$id', JUDUL='$judul', PENGARANG='$pengarang', TAHUN_TERBIT='$tahun', JENIS_BUKU='$jenis_buku', STATUS='$status', JUMLAH='$jumlah'  
WHERE ID_BUKU='$id'");
$eksekusi=oci_execute($s, OCI_DEFAULT);
if($eksekusi)  
{  
oci_commit($conn); //*** Commit Transaction ***// 
echo "<script>alert('DATA BERHASIL UPDATE');</script>";
echo "<meta http-equiv='refresh' content='0;url=insertumum.php'>";
}  
else  
{  
oci_rollback($conn); //*** RollBack Transaction ***//  
$e = oci_error($s);  
echo "Error Save [".$e['message']."]";  
}  
oci_close($conn);  
?>  
