<!DOCTYPE html>
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
    <title>PERPUSTAKAAN </title>
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
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
              <p class="designation">Seoul Library Mall</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i><span>Home</span></a></li>
			<li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Buku Umum</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="insertumum.php"><i class="fa fa-circle-o"></i> List Buku</a></li>

              </ul>
            </li>
        
			<li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Majalah</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="insertmajalah.php"><i class="fa fa-circle-o"></i> List Majalah</a></li>
           
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Anggota</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="insertanggota.php"><i class="fa fa-circle-o"></i> List Anggota</a></li>
			
              </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Peminjaman</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="insertpem.php"><i class="fa fa-circle-o"></i> Daftar Peminjaman</a></li>
              
              </ul>
            </li>
			<li><a href="allbook.php"><i class="fa fa-file-text"></i> All Book</a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Majalah</h1>
            <p>PERPUSTAKAAN</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Majalah</li>
              <li class="active"><a href="#">Insert Majalah</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
		<div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Insert Majalah </h3>
              <table class="table">
                <thead>
<?php $conn=oci_connect("intan","intan","localhost/XE");?>

<form action='tambahmajalah.php' method="POST">
<tr> <td>Id Majalah</td>
	<td>:</td>
	<td><input type='text' name='id_majalah'><td>
</tr>
<tr> <td>Judul</td>
	<td>:</td>
	<td><input type='text' name='judul'><td>
</tr>
<tr> <td>Pengarang</td>
	<td>:</td>
	<td><input type='text' name='pengarang'><td>
</tr>
<tr> <td>Penerbit</td>
	<td>:</td>
	<td><input type='text' name='penerbit'><td>
	</tr>
<tr> <td><input type='submit' value='Tambah'></td>
</tr>
</form>
<table class="table">	
	<th>ID MAJALAH</th>
	<th>JUDUL</th>
	<th>PENGARANG</th>
	<th>PENERBIT</th>
	<?php 
		$query="SELECT * FROM MAJALAH ";
								$s=oci_parse($conn,$query);
								oci_execute($s,OCI_DEFAULT);
								
								while($res=oci_fetch_array($s,OCI_BOTH)){
								echo " <tr class='success'>\n";
								echo " <td>".($res['ID_MAJALAH']) ."</td>";
								echo " <td>".($res['JUDUL']) ."</td>";
								echo " <td>".($res['PENGARANG']) ."</td>";
								echo " <td>".($res['PENERBIT']) ."</td>"; ?>
								 <td> <a href="editmajalah.php?id_buku=<?=$res['ID_MAJALAH'];?>">Edit</a></td>
								<?php echo " <td> <a href='?action=del&id=$res[ID_MAJALAH]'>Delete</a></td>\n</tr>\n"; 
								}
								?>
</table>

<?php
				error_reporting(0);
				if ($_GET['action'] == 'del') {
					$query="DELETE FROM MAJALAH WHERE ID_MAJALAH='$_GET[id]'";
					$s=oci_parse($conn,$query);
					oci_execute($s);
					echo "<script>location='insertmajalah.php';</script>";
				}else if ($_GET['action'] == 'edit') {
					$id = $_GET['id'];
					$judul = $_GET['judul'];
					$pengarang = $_GET['pengarang'];
					$penerbit = $_GET['penerbit'];
					$query= "UPDATE MAJALAH SET JUDUL='$judul', PENGARANG='$pengarang', PENERBIT='$penerbit', 
					WHERE ID_MAJALAH='$_GET[id]'";
					echo $query;
					$s=oci_parse($conn, $query);
					oci_execute($s);
					echo "<script>location='insertmajalah.php';</script>";
				} 
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