<?php
$conn=oci_connect("intan","intan","localhost/XE");

$id = $_GET['id'];
$nama = $_GET['nama'];
$alamat = $_GET['alamat'];
$nomor = $_GET['nomor'];
$username = $_GET['username'];
$password = $_GET['password'];

$query= "UPDATE PENJAGA_PERPUS SET ID_PENJAGA='$id', NAMA='$nama', ALAMAT='$alamat', NOMOR='$nomor', USERNAME='$username', PASSWORD='$password'  
WHERE ID_PENJAGA='$id'";
//echo $query;
$s=oci_parse($conn, $query);
$eksekusi=oci_execute($s, OCI_DEFAULT);

if($eksekusi)  
{  
oci_commit($conn); //*** Commit Transaction ***// 
echo "<script>alert('DATA BERHASIL UPDATE');</script>";
echo "<meta http-equiv='refresh' content='0;url=insertanggota.php'>";
}  
else  
{  
oci_rollback($conn); //*** RollBack Transaction ***//  
$e = oci_error($s);  
echo "Error Save [".$e['message']."]";  
}  
oci_close($conn);  
?>  
