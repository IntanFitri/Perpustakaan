<!DOCTYPE>
<html>
<head>
<body>
<?php

$conn=oci_connect("perpus","perpus","localhost/XE");
?>
<table>
					<tr> <td>Nomor</td>
							 <td>:</td>
							 <?php
							 echo "<td><input type='text' name='id' value=$_GET[id]></td>";
							 ?>
					<tr> <td>judul</td>
						 <td>:</td>
						 <td><input type='text' name='judulb'><td>
					</tr>
					<tr> <td>pengarang</td>
						 <td>:</td>
						 <td><input type='text' name='pengarang'><td>
					</tr>
					<tr> <td>penerbit</td>
						 <td>:</td>
						 <td><input type='text' name='penerbit'><td>
					</tr>
					<tr> <td>jenis buku</td>
						 <td>:</td>
						 <td><input type='text' name='j_buku'><td>
					</tr>
			 <td><input type='hidden' name='action' value='edit'><td>
		<tr> <td><input type='submit' value='Tambah'></td>
		</tr>
</form>
</table>
<?php
oci_commit($conn);
?>

	</body>
</html>