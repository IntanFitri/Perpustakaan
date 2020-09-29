<html>
<body>
<?php
$conn=oci_connect("intan","intan","localhost/XE");
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nomor = $_POST['nomor'];
$username = $_POST['username'];
$password = $_POST['password'];
$statement=oci_parse($conn, "INSERT INTO PENJAGA_PERPUS (ID_PENJAGA, NAMA , ALAMAT, NOMOR,  USERNAME, PASSWORD) 
VALUES (:id, :nama, :alamat, :nomor, :username, :password)");
oci_bind_by_name($statement, ':id', $id);
oci_bind_by_name($statement, ':nama', $nama);
oci_bind_by_name($statement, ':alamat', $alamat);
oci_bind_by_name($statement, ':nomor', $nomor);
oci_bind_by_name($statement, ':username', $username);
oci_bind_by_name($statement, ':password', $password);
//oci_bind_by_name($statement, ':hd', $hd);
oci_execute($statement);
oci_commit($conn);
//echo "<script>alert('DATA BERHASIL DITAMBAHKAN');</script>";
echo "<meta http-equiv='refresh' content='0;url=insertanggota.php'>";
?>
</body>
</html>