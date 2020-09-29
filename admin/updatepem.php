<?php
$conn=oci_connect("intan","intan","localhost/XE");
$id = $_GET['id'];
$id_buku = $_GET['id_buku'];
$nama = $_GET['nama'];
$judul = $_GET['judul'];
$tgl_pinjam = $_GET['tgl_pinjam'];
$tgl_pengembalian = $_GET['tgl_pengembalian'];

//$query= "UPDATE BUKU SET ID_BUKU='$id', JUDUL='$judul', PENGARANG='$pengarang', TAHUN_TERBIT='$tahun', JENIS_BUKU='$jenis_buku', STATUS='$status', JUMLAH='$jumlah'  
//WHERE ID_BUKU=$id";
//echo $query;
$s=oci_parse($conn, "UPDATE PINJAM SET ID_PINJAM='$id', ID_BUKU='$id_buku', NAMA='$nama', JUDUL='$judul', TGL_PINJAM='$tgl_pinjam', TGL_PENGEMBALIAN='$tgl_pengembalian'
WHERE ID_PINJAM='$id'");
$eksekusi=oci_execute($s, OCI_DEFAULT);
if($eksekusi)  
{  
oci_commit($conn); //*** Commit Transaction ***// 
echo "<script>alert('DATA BERHASIL UPDATE');</script>";
echo "<meta http-equiv='refresh' content='0;url=insertpem.php'>";
}  
else  
{  
oci_rollback($conn); //*** RollBack Transaction ***//  
$e = oci_error($s);  
echo "Error Save [".$e['message']."]";  
}  
oci_close($conn);  
?>  
