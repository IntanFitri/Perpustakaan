<html>
<body>
<?php
$conn=oci_connect("intan","intan","localhost/XE");
$id = $_POST['id_pinjam'];
$id_buku = $_POST['id_buku'];
$nama = $_POST['nama'];
$judul = $_POST['judul'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];

$statement=oci_parse($conn, "INSERT INTO PINJAM (ID_PINJAM, ID_BUKU, NAMA , JUDUL, TGL_PINJAM, TGL_PENGEMBALIAN) 
VALUES (:id_pinjam, :id_buku, :nama, :judul, :tgl_pinjam, :tgl_pengembalian)");
oci_bind_by_name($statement, ':id_pinjam', $id);
oci_bind_by_name($statement, ':id_buku', $id_buku);
oci_bind_by_name($statement, ':nama', $nama);
oci_bind_by_name($statement, ':judul', $judul);
oci_bind_by_name($statement, ':tgl_pinjam', $tgl_pinjam);
oci_bind_by_name($statement, ':tgl_pengembalian', $tgl_pengembalian);
//oci_bind_by_name($statement, ':hd', $hd);
oci_execute($statement);
oci_commit($conn);
echo "<meta http-equiv='refresh' content='0;url=insertpem.php'>";
?>
</body>
</html>