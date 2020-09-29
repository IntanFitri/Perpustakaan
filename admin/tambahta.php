<html>
<body>
<?php
$conn=oci_connect("perpus","perpus","localhost/XE");
$id = $_POST['id'];
$judulb = $_POST['judulb'];
$pengarang = $_POST['pengarang'];
$j_buku = $_POST['j_buku'];
$statement=oci_parse($conn, "INSERT INTO DAFTAR_BUKU (ID_BUKU, JUDUL, PENGRANAG, JENIS_BUKU) VALUES (:id, :judulb, :pengarang, :j_buku)");
oci_bind_by_name($statement, ':id', $id);
oci_bind_by_name($statement, ':judulb', $judulb);
oci_bind_by_name($statement, ':pengarang', $pengarang);
oci_bind_by_name($statement, ':j_buku', $j_buku);
//oci_bind_by_name($statement, ':hd', $hd);
oci_execute($statement);
oci_commit($conn);
echo "<script>alert('DATA BERHASIL DITAMBAHKAN');</script>";
echo "<meta http-equiv='refresh' content='0;url=insertta.php'>";
?>
</body>
</html>