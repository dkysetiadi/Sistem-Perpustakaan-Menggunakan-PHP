<?php
session_start();
require_once"konmysqli.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Perpustakaan Komisi Yudisial RI</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="login/imagesl/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="login/vendorl/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="login/fontsl/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="login/fontsl/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="login/vendorl/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="login/vendorl/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="login/vendorl/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="login/vendorl/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="login/vendorl/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="login/cssl/util.css">
  <link rel="stylesheet" type="text/css" href="login/cssl/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('login/imagesl/bg-01.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="post" action="">
          </span>

          <span class="login100-form-title p-b-34 p-t-27">
            Log in
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="user" placeholder="Username" id="user" required>
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="pass" placeholder="Password" id="pass" required>
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
              Remember me
            </label>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="Login" value="Login" id="Login">
              Sign In
            </button>
          </div>
          <div class="text-center p-t-90">
            <a class="txt1" href="registrasi.php"/><h6>
              <ins><font color="white">Registrasi</font></ins>
            </h6>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="login/vendorl/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendorl/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendorl/bootstrap/js/popper.js"></script>
  <script src="login/vendorl/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendorl/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendorl/daterangepicker/moment.min.js"></script>
  <script src="login/vendorl/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="login/vendorl/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="login/jsl/main.js"></script>

</body>
</html>
<?php
if(isset($_POST["Login"])){
	$usr=$_POST["user"];
	$pas=$_POST["pass"];
	
			$sql2="select * from `$tbadmin` where `username`='$usr' and `password`='$pas'";
		$sql3="select * from `$tbanggota` where `username`='$usr' and `password`='$pas'";
		
	if(getJum($conn,$sql2)>0){
			$d=getField($conn,$sql2);
				$kode=$d["kode_admin"];
				$nama=$d["nama_admin"];
				$level=$d["level"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]=$level;
		echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." (".$_SESSION["cid"].") Login!');
		document.location.href='index.php?mnu=home';</script>";
		}//Hak akses Admin
		
		else if(getJum($conn,$sql3)>0){
			$d=getField($conn,$sql3);
				$kode=$d["kode_anggota"];
				$nama=$d["nama_anggota"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]="Anggota";
		echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." (".$_SESSION["cid"].") Anggota Login!');
		document.location.href='index.php?mnu=home';</script>";
		}//Hak akses Anggota

		else{
			session_destroy();
			echo "<script>alert('Invalid Username or Password');
			document.location.href='login.php?mnu=login';</script>";
		}
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