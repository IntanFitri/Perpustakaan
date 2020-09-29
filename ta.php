<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koleksi TA</title>
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
            <img src="Logo.png" width="570" height="110"/>
        </div>
      <div class="container"></div>
<!--end header -->
	
<div class="container">
  <br>
  <br>
  <h3>Daftar Buku TA Seoul Library Mall</h3>
  <table class="table">
                <thead>
                  <tr class='success'>
                    <th>ID BUKU</th>
                    <th>JUDUL</th>
                    <th>PENGARANG</th>
					<th>JENIS BUKU</th>
                  </tr>
                </thead>
                <tbody>
					<?php
					$conn=oci_connect('intan','intan','localhost/xe');
					
					$query="SELECT * FROM DAFTAR_BUKU WHERE JENIS_BUKU='ta'";
					$s=oci_parse($conn,$query);
					oci_execute($s,OCI_DEFAULT);
					while($res=oci_fetch_array($s,OCI_BOTH)){
					echo " <tr class='info'>\n";
					echo " <td>".($res['ID_BUKU']) ."</td>";
					echo " <td>".($res['JUDUL']) ."</td>";
					echo " <td>".($res['PENGARANG']) ."</td>";
					echo " <td>".($res['JENIS_BUKU']) ."</td>";
					}
					
					?>
                </tbody>
              </table>
	
</div>
</body>
</html>

