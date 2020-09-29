<?php
$conn=oci_connect("intan","intan","localhost/XE");

$id = $_GET['id_majalah'];
$judul = $_GET['judul'];
$pengarang = $_GET['pengarang'];
$penerbit = $_GET['penerbit'];


$query= "UPDATE MAJALAH SET ID_MAJALAH='$id', JUDUL='$judul', PENGARANG='$pengarang', PENERBIT='$penerbit'
 WHERE ID_MAJALAH=$id";
//echo $query;
$s=oci_parse($conn, $query);
$eksekusi=oci_execute($s, OCI_DEFAULT);

if($eksekusi)  
{  
oci_commit($conn); //*** Commit Transaction ***// 
echo "<script>alert('DATA BERHASIL UPDATE');</script>";
echo "<meta http-equiv='refresh' content='0;url=insertmajalah.php'>";
}  
else  
{  
oci_rollback($conn); //*** RollBack Transaction ***//  
$e = oci_error($s);  
echo "Error Save [".$e['message']."]";  
}  
oci_close($conn);  
?>  
