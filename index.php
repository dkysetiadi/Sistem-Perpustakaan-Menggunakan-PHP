<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
if(!isset($_SESSION["cid"]))
{
die("<script>location.href='frontend.php';</script>");
}
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $tittle;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="backend/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="backend/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="backend/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="backend/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    <link href="backend/dist/css/font-awesome.css" rel="stylesheet" />
  </head>
   <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>Perpustakaan</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu Navigation</span>
          </a>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="backend/dist/img/logo.jpg" class="img-circle" />
            </div>
            <div class="pull-left info">
              <p>Perpustakaan <br>Komisi Yudisial RI</p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
//";if($mnu=="home"){echo"class='current'";} echo"
if($_SESSION["cstatus"]=="Administrator"){	
      echo"
<li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
    <li ";if($mnu=="admin"){echo"class='active'";} echo"><a href='index.php?mnu=admin'><i class='fa fa-user'></i> <span>Admin</span></a></li>
    <li ";if($mnu=="anggota"){echo"class='active'";} echo"><a href='index.php?mnu=anggota'><i class='fa fa-user-plus'></i> <span>Anggota</span></a></li>
      <li ";if($mnu=="bukutamu"){echo"class='active'";} echo"><a href='index.php?mnu=bukutamu'><i class='fa fa-users'></i> <span>Pengunjung</span></a></li>
	       <li ";if($mnu=="buku"){echo"class='active'";} echo"><a href='index.php?mnu=buku'><i class='fa fa-book'></i> <span>Buku</span></a></li>
            <li ";if($mnu=="ebook"){echo"class='active'";} echo"><a href='index.php?mnu=ebook'><i class='fa fa-book'></i> <span>E-Book</span></a></li>
	           <li ";if($mnu=="transaksi"){echo"class='active'";} echo"><a href='index.php?mnu=transaksi'><i class='fa fa-bar-chart'></i> <span>Transaksi</span></a></li>
       <li ";if($mnu=="pengembalian"){echo"class='active'";} echo"><a href='index.php?mnu=pengembalian'><i class='fa fa-area-chart'></i> <span>View Transaksi</span></a></li>
<li ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><i class='fa fa-sign-out'></i> <span>Logout</span></a></li>";
}
else if($_SESSION["cstatus"]=="Petugas"){	
      echo"
<li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
	     <li ";if($mnu=="anggota"){echo"class='active'";} echo"><a href='index.php?mnu=anggota'><i class='fa fa-user-plus'></i> <span>Anggota</span></a></li>
        <li ";if($mnu=="bukutamu"){echo"class='active'";} echo"><a href='index.php?mnu=bukutamu'><i class='fa fa-users'></i> <span>Pengunjung</span></a></li>
         <li ";if($mnu=="buku"){echo"class='active'";} echo"><a href='index.php?mnu=buku'><i class='fa fa-book'></i> <span>Buku</span></a></li>
         <li ";if($mnu=="ebook"){echo"class='active'";} echo"><a href='index.php?mnu=ebook'><i class='fa fa-book'></i> <span>E-Book</span></a></li>
	     <li ";if($mnu=="transaksi"){echo"class='active'";} echo"><a href='index.php?mnu=transaksi'><i class='fa fa-bar-chart'></i> <span>Transaksi</span></a></li>
    <li ";if($mnu=="pengembalian"){echo"class='active'";} echo"><a href='index.php?mnu=pengembalian'><i class='fa fa-area-chart'></i> <span>View Transaksi</span></a></li>
    <li ";if($mnu=="uprofil"){echo"class='active'";} echo"><a href='index.php?mnu=uprofil'><i class='fa fa-cog'></i> <span>Settings</span></a></li>
	<li ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><i class='fa fa-sign-out'></i> <span>Logout</span></a></li>";
}
else if($_SESSION["cstatus"]=="Anggota"){ 
      echo"
      <li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
      <li ";if($mnu=="abuku"){echo"class='active'";} echo"><a href='index.php?mnu=abuku'><i class='fa fa-book'></i> <span>Koleksi Buku</span></a></li>   
            <li ";if($mnu=="aebook"){echo"class='active'";} echo"><a href='index.php?mnu=aebook'><i class='fa fa-book'></i> <span>Koleksi E-Book</span></a></li>   
       <li ";if($mnu=="aprofil"){echo"class='active'";} echo"><a href='index.php?mnu=aprofil'><i class='fa fa-cog'></i> <span>Settings</span></a></li>
 <li ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><i class='fa fa-sign-out'></i> <span>Logout</span></a></li>";
}


else{
	 echo"<li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>";
	 echo"<li ";if($mnu=="login"){echo"class='active'";} echo"><a href='index.php?mnu=login'><i class='fa fa-sign-in'></i>Login</a></li>";	 
	}
      ?>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <section class="content">

          <div class="row">
            <div class="col-md-12">
        <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body">
<?php 
				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="anggota"){require_once"anggota/anggota.php";}
else if($mnu=="buku"){require_once"buku/buku.php";}
else if($mnu=="ebook"){require_once"ebook/ebook.php";}

else if($mnu=="abuku"){require_once"buku/abuku.php";}
else if($mnu=="aebook"){require_once"ebook/aebook.php";}


else if($mnu=="transaksi"){require_once"transaksi/transaksi.php";}
else if($mnu=="atransaksi"){require_once"transaksi/atransaksi.php";}

else if($mnu=="user"){require_once"user/user.php";}
else if($mnu=="bukutamu"){require_once"bukutamu/bukutamu.php";}
else if($mnu=="pengembalian"){require_once"transaksi/pengembalian.php";}
else if($mnu=="apengembalian"){require_once"transaksi/apengembalian.php";}

//Profil Admin
else if($mnu=="uprofil"){require_once"admin/uprofil.php";}
else if($mnu=="uprofil2"){require_once"admin/uprofil2.php";}

//Profil Anggota
else if($mnu=="aprofil"){require_once"anggota/aprofil.php";}
else if($mnu=="aprofil2"){require_once"anggota/aprofil2.php";}

else if($mnu=="frontend"){require_once"frontend.php";}
else if($mnu=="logout"){require_once"logout.php";}

else {require_once"dashboard.php";}
				
 ?>           
 </div></div>
 <!-- kotak putih -->

  </div><!-- /.col -->
          </div><!-- /.row -->
          </section>
        </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <center>Copyright &copy; 2019 Dicky Setiadi | Skripsi Y.A.I</center>
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <?php if($mnu=="home" || $mnu==""){?>
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <?php }?>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="backend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='backend/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="backend/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="backend/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <?php if($mnu=="home" || $mnu==""){?>
    <script src="backend/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="backend/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script> <?php }?>
    <!-- iCheck -->
    <script src="backend/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="backend/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="backend/plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="backend/dist/js/pages/dashboard2.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="backend/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>

<?php function RP($rupiah){
	$x=0;
	if($rupiah==0){$x=0;}
	else{
		$x= number_format($rupiah,"2",",",".");
	}
	return $x;
}
	?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"||$arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari"||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret"||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"||$arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"||$arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"||$arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getAnggota($conn,$kode){
$field="nama_anggota";
$sql="SELECT `$field` FROM `tb_anggota` where `kode_anggota`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getBuku($conn,$kode){
$field="judul";
$sql="SELECT `$field` FROM `tb_buku` where `kode_buku`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
?>