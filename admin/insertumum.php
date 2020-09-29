<!DOCTYPE html>
<?php error_reporting(E_ALL ^ (E_NOTICE || E_WARNING)); ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>PERPUSTAKAAN</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="index.php">Admin</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="logout.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i> Logout</a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="#"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="IMG_6882.JPG" alt="User Image"></div>
            <div class="pull-left info">
              <p>Admin</p>
              <p class="designation">Perpustakaan Mini</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i><span>Home</span></a></li>
			<li class="treeview"><a href="insertumum.php"><i class="fa fa-laptop"></i><span>Buku</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
      
              </ul>
            </li>
            
			
              <ul class="treeview-menu">

             
              </ul>
            </li>
			<li class="treeview"><a href="insertanggota.php"><i class="fa fa-th-list"></i><span>Anggota</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
            
	
              </ul>
            </li>
            <li class="treeview"><a href="insertpem.php"><i class="fa fa-edit"></i><span>Peminjaman</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
            
         
              </ul>
            </li>
			<li><a href="allbook.php"><i class="fa fa-file-text"></i> All Book</a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Buku</h1>
            <p>Buku Perpustakaan</p>
			
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Buku</li>
              <li class="active"><a href="#">Insert Buku</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
		<div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Insert Buku </h3>
              <table class="table">
                <thead>

<?php $conn=oci_connect("intan","intan","localhost/XE");?>

<form action='tambah.php' method="POST">
<tr> <td>ID</td>
	<td>:</td>
	<td><input type='text' name='id_buku'><td>
</tr>
<tr> <td>Judul</td>
	<td>:</td>
	<td><input type='text' name='judul'><td>
</tr>
<tr> <td>Pengarang</td>
	<td>:</td>
	<td><input type='text' name='pengarang'><td>
</tr>
<tr> <td>Tahun Terbit</td>
	<td>:</td>
	<td><input type='text' name='tahun_terbit'><td>
</tr>
<tr> <td>Jenis Buku</td>
	<td>:</td>
	<td><input type='text' name='jenis_buku'><td>
</tr>
<tr> <td>Status</td>
	<td>:</td>
	<td><input type='text' name='status'><td>
</tr>
<tr> <td>Jumlah</td>
	<td>:</td>
	<td><input type='text' name='jumlah'><td>
</tr>
<tr> <td><input type='submit' value='Tambah'></td>
</tr>
</form>
<table class="table">	
	<th>ID BUKU</th>
	<th>JUDUL</th>
	<th>PENGARANG</th>
	<th>TAHUN TERBIT</th>
	<th>STATUS</th>
	<th>JENIS BUKU</th>
	<th>JUMLAH</th>
	
		<?php 
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
								echo " <td>".($res['JUMLAH']) ."</td>"; ?>
								 <td> <a href="editumum.php?id_buku=<?=$res['ID_BUKU'];?>">Edit</a></td>
								<?php echo " <td> <a href='?action=del&id=$res[ID_BUKU]'>Delete</a></td>\n</tr>\n"; 
								}
								?>

</table>
<?php
				error_reporting(0);
				if ($_GET['action'] == 'del') {
					$query="DELETE FROM BUKU WHERE ID_BUKU='$_GET[id]'";
					$s=oci_parse($conn,$query);
					oci_execute($s);
					echo "<script>location='insertumum.php';</script>";
				}
				//else if ($_GET['action'] == 'edit') {
					//$id = $_GET['id'];
					//$judulb = $_GET['judulb'];
					//$pengarang = $_GET['pengarang'];
					//$penerbit = $_GET['penerbit'];
					//$tahun = $_GET['tahun'];
					//$j_buku = $_GET['j_buku'];
					//$kategori = $_GET['kategori'];
					//$genre = $_GET['genre'];
					//$jumlah = $_GET['jumlah'];
					//$query= "UPDATE DAFTAR_BUKU SET JUDUL='$judulb', PENGRANAG='$pengarang', PENERBIT='$penerbit', $TANGGAL='$tahun', JENIS_BUKU='$j_buku', KATEGORI='$kategori', GENRE='$genre', JUMLAH='$jumlah'  WHERE ID_BUKU='$_GET[id]'";
					//echo $query;
					//$s=oci_parse($conn, $query);
					//oci_execute($s);
					//echo "<script>location='insertumum.php';</script>";
				
			?>

			

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
 </body>
</html>