<html>
<body>
<?php
$conn=oci_connect("intan","intan","localhost/XE");
$id =$_POST['id_buku'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$tahun_terbit=$_POST['tahun_terbit'];
$jenis_buku = $_POST['jenis_buku'];
$status = $_POST['status'];
$jumlah = $_POST['jumlah'];
$statement=oci_parse($conn, "INSERT INTO BUKU (ID_BUKU,JUDUL, PENGARANG, TAHUN_TERBIT, JENIS_BUKU, STATUS, JUMLAH) 
VALUES (:id_buku, :judul, :pengarang, :tahun_terbit, :jenis_buku, :status, :jumlah)");
oci_bind_by_name($statement, ':id_buku', $id);
oci_bind_by_name($statement, ':judul', $judul);
oci_bind_by_name($statement, ':pengarang', $pengarang);
oci_bind_by_name($statement, ':tahun_terbit', $tahun_terbit);
oci_bind_by_name($statement, ':jenis_buku', $jenis_buku);
oci_bind_by_name($statement, ':status', $status);
oci_bind_by_name($statement, ':jumlah', $jumlah);
//oci_bind_by_name($statement, ':hd', $hd);
oci_execute($statement);
oci_commit($conn);
//echo "sukses";
echo "<script>alert('DATA BERHASIL DITAMBAHKAN');</script>";
echo "<meta http-equiv='refresh' content='0;url=insertumum.php'>";
?>
</body>
</html>