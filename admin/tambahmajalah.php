<html>
<body>
<?php
$conn=oci_connect("intan","intan","localhost/XE");
$id = $_POST['id_majalah'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];

$statement=oci_parse($conn, "INSERT INTO MAJALAH (ID_MAJALAH, JUDUL, PENGARANG, PENERBIT) 
VALUES (:id_majalah, :judul, :pengarang, :penerbit)");
oci_bind_by_name($statement, ':id_majalah', $id);
oci_bind_by_name($statement, ':judul', $judul);
oci_bind_by_name($statement, ':pengarang', $pengarang);
oci_bind_by_name($statement, ':penerbit', $penerbit);

//oci_bind_by_name($statement, ':hd', $hd);
oci_execute($statement);
oci_commit($conn);
echo "<script>location='insertmajalah.php';</script>";
?>
</body>
</html>