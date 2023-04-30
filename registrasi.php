<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
//error_reporting(0);
require_once"konmysqli.php";
$tgl_lahir=WKT(date("Y-m-d"));
?>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registrasi Anggota</title>

    <!-- Icons font CSS-->
    <link href="registrasi/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="registrasi/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="registrasi/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="registrasi/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="registrasi/css/main.css" rel="stylesheet" media="all">
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_lahir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
</head>

<?php
  $sql="select `kode_anggota` from `$tbanggota` order by `kode_anggota` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="AGT".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_anggota"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $kode_anggota=$idmax;
?>


<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registrasi Anggota</h2>
                    <form method="post">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nama Lengkap" name="nama_anggota" id="nama_anggota" required>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="jenis_kelamin" required>
                                    <option disabled="disabled" selected="selected">Jenis Kelamin</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Tanggal Lahir" name="tgl_lahir" id="tgl_lahir" required>
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Alamat" name="alamat" id="alamat" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Telepon" name="telepon" id="telepon" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Email" name="email" id="email" required>
                        
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Username" name="username" id="username" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password" id="password" required>
                        </div>
                        <div class="p-t-10">
                            <input class="btn btn--pill btn--green" type="hidden" name="kode_anggota" id="kode_anggota" value="<?php echo $kode_anggota; ?>"/>
                            <input class="btn btn--pill btn--green" type="submit" name="Simpan" id="Simpan" value="Daftar"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
if(isset($_POST["Simpan"])){
    $pro=strip_tags($_POST["pro"]);
    $kode_anggota=strip_tags($_POST["kode_anggota"]);
    $kode_anggota0=strip_tags($_POST["kode_anggota0"]);
    $nama_anggota=strip_tags($_POST["nama_anggota"]);
    $jenis_kelamin=strip_tags($_POST["jenis_kelamin"]);
    $tgl_lahir=(strip_tags($_POST["tgl_lahir"]));
    $alamat=strip_tags($_POST["alamat"]);
    $telepon=strip_tags($_POST["telepon"]);
    $email=strip_tags($_POST["email"]);
    $username=strip_tags($_POST["username"]);
    $password=strip_tags($_POST["password"]);
    
    $ar=explode("/",$tgl_lahir);//11/07/2019
    $thn=$ar[2];
    $bln=$ar[1];
    $tgl=$ar[0];
    $tgl_lahir="$thn-$bln-$tgl";

$sql=" INSERT INTO `$tbanggota` (
`kode_anggota` ,
`nama_anggota` ,
`jenis_kelamin` ,
`tgl_lahir` ,
`alamat` ,
`telepon`,
`email` ,
`username` ,
`password` 

) VALUES (
'$kode_anggota', 
'$nama_anggota', 
'$jenis_kelamin',
'$tgl_lahir',
'$alamat',
'$telepon',
'$email', 
'$username', 
'$password'
)";
    
$simpan=process($conn,$sql);
        if($simpan) {echo "<script>alert('Data $kode_anggota added Successfully!');document.location.href='login.php';</script>";}
        else{echo"<script>alert('Data $kode_anggota failed to save');document.location.href='registrasi.php';</script>";}
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

<!-- Jquery JS-->
    <script src="registrasi/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="registrasi/vendor/select2/select2.min.js"></script>
    <script src="registrasi/vendor/datepicker/moment.min.js"></script>
    <script src="registrasi/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="registrasi/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->