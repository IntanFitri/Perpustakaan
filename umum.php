<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar Buku Umum</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="css2/bootstrap.min.css"type="text/css">
    <script src="js2/jquery.min.js"></script>
    <script src="js2/bootstrap.min.js"></script>
</head>
<body>

<!--header -->
      <div class="container"></div>
        <div id="header">
            <!--<img src="#" width="570" height="110"/>-->
        </div>
      <div class="container"></div>
<!--end header -->
	
<div class="container">
  <br>
  <br>
  <h3 align="center">Daftar Buku Perpustakaan Mini</h3>
    <table class="table">
                <thead>
                  <tr class='info'>
                   <tr>
                   	<th>ID BUKU</th>
					<th>JUDUL</th>
					<th>PENGARANG</th>
					<th>TAHUN TERBIT</th>
					<th>STATUS</th>
					<th>JENIS BUKU</th>
					<th>JUMLAH</th>
                  </tr>
                </thead>
                <tbody>
					<?php 
				$conn=oci_connect('intan','intan','localhost/xe');
				$query="SELECT * FROM BUKU ORDER BY ID_BUKU";
				$s=oci_parse($conn,$query);
				oci_execute($s,OCI_DEFAULT);
				while($res=oci_fetch_array($s,OCI_BOTH)){
				echo " <tr class='success'>\n";
				echo " <td>".($res['ID_BUKU']) ."</td>";
				echo " <td>".($res['JUDUL']) ."</td>";
				echo " <td>".($res['PENGARANG']) ."</td>";
				echo " <td>".($res['TAHUN_TERBIT']) ."</td>";
				echo " <td>".($res['STATUS']) ."</td>";
				echo " <td>".($res['JENIS_BUKU']) ."</td>";
				echo " <td>".($res['JUMLAH']) ."</td>"; 
				?>
				 <td> <a href="editumum.php?id_buku=<?=$res['ID_BUKU'];?>"></a></td>
				<?php echo " <td> <a href='?action=del&id=$res[ID_BUKU]'></a></td>\n</tr>\n"; 
				}
				?>
				 <td> <a href="index.html?id_buku=<?=$res;?>">kembali</a></td>
                </tbody>
              </table>
	
</div>
</body>
</html>

