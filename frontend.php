<?php

require_once"konmysqli.php";


function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
  $rs->free();
  return $jum;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan Komisi Yudisial RI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Lightbox-->
    <link rel="stylesheet" href="frontend/vendor/lightbox2/css/lightbox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="frontend/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="frontend/css/custom.css">
    <!-- Leaflet CSS - For the map-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.css">
    <!-- Favicon-->
    <link rel="icon" href="ypathfile/logo-KY.jpg">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  </head>
  <body>
    <!-- Hero Section-->
    <section id="intro" style="background: url(frontend/img/library.jpg)" class="hero bg-cover">
      <div class="overlay"></div>
      <div class="content h-100 d-flex align-items-center">
        <div class="container text-center text-white">
          <p class="headings-font-family text-uppercase lead">Welcome to </p>
          <h1 class="text-uppercase hero-text text-white">Perpustakaan<span class="font-weight-bold d-block">Komisi Yudisial RI</span></h1>
        </div>
      </div><a href="#about" class="scroll-btn link-scroll"><i class="fas fa-angle-double-down"></i></a>
    </section>
    <!-- Navbar-->
    <!-- navbar-->
    <header class="header sticky-top">
      <nav class="navbar navbar-expand-lg bg-white border-bottom py-0">
        <div class="container"><a href="#" class="navbar-brand py-1"><img src="frontend/img/Untitled-1.jpg" alt="" class="img-fluid"></a>
          <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span class="fas fa-bars"></span></button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto px-3">
              <li class="nav-item active"><a href="#intro" class="nav-link text-uppercase link-scroll">Home </a></li>
              <li class="nav-item"><a href="#about" class="nav-link text-uppercase link-scroll">About</a></li>
              <li class="nav-item"><a href="#statistik" class="nav-link text-uppercase link-scroll">Statistik</a></li>
              <li class="nav-item"><a href="#profil" class="nav-link text-uppercase link-scroll">Profil</a></li>
              <li class="nav-item"><a href="#gallery" class="nav-link text-uppercase link-scroll">Gallery</a></li>
              <li class="nav-item"><a href="#persyaratan" class="nav-link text-uppercase link-scroll">Persyaratan</a></li>
              <li class="nav-item"><a href="#contact" class="nav-link text-uppercase link-scroll">Contact</a></li>
              <li class="nav-item"><a href="login.php" class="nav-link text-uppercase link-scroll">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- About Section-->
    <section id="about" class="about">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-6">
            <header class="text-center mb-5">
              <h2 class="lined text-uppercase">About us</h2>
            </header>
            <p>Menurut UU Perpustakaan pada Bab I pasal 1 menyatakan Perpustakaan adalah institusi yang mengumpulkan pengetahuan tercetak dan terekam, mengelolanya dengan cara khusus guna memenuhi kebutuhan intelektualitas para penggunanya melalui beragam cara interaksi pengetahuan.
            Dalam arti tradisional, perpustakaan adalah sebuah koleksi buku dan majalah. Walaupun dapat diartikan sebagai koleksi pribadi perseorangan, namun perpustakaan lebih umum dikenal sebagai sebuah koleksi besar yang dibiayai dan dioperasikan oleh sebuah kota atau institusi, dan dimanfaatkan oleh masyarakat yang rata-rata tidak mampu membeli sekian banyak buku atas biaya sendiri.
            <br>
            <br>
           	Perpustakaan Komisi Yudisial Republik Indonesia diresmikan pada tanggal 29 Januari 2013. Ruangan terdiri dari enam segmentasi. Ruang sirkulasi, baca indoor dan out door, internet, fotokopi, audivisional.
            </p>
          </div>
          <div class="col-lg-6"><img src="frontend/img/perpustakaan1.jpg" class="img-fluid"></div>
        </div>
        <div class="row">   
          <div class="col-lg-6"> 
            <h5 class="text-uppercase font-weight-bold"></i>Visi Perpustakaan</h5>
            <p>Terwujudnya Indonesia cerdas melaui gemar membaca dengan memberdayakan perpustakaan.</p>
          </div>
          <div class="col-lg-6"> 
            <h5 class="text-uppercase font-weight-bold">Misi Perpustakaan</h5>
            <p>1. Mewujudkan Koleksi Buku yang Lengkap dan Mutakhir
            <br>2. Terwujudnya layanan prima
            <br>3. Terwujudnya perpustakaan sesuai standar nasional perpustakaan. </p>
          </div>
        </div>
      </div>
    </section>
        <!-- Services Section-->


<?php

$sql="select kode_ebook from `$tbebook` where status='Publish' ";
$jumebook=getJum($conn,$sql);      

$sql="select kode_bukutamu from `$tbbukutamu` ";
$jumbukutamu=getJum($conn,$sql);  

$sql="select kode_buku from `$tbbuku` where status='Tersedia' ";
$jumbuku=getJum($conn,$sql);  

$sql="select kode_anggota from `$tbanggota` ";
$jumanggota=getJum($conn,$sql);  

?>        
    <section id="statistik" class="bg-gray">
      <div class="container">
        <header class="text-center mb-5">
          <h2 class="lined text-uppercase">Statistik</h2>
        </header>
        <div class="row text-center">
          <div class="col-lg-4">
            <div class="bg-white mb-4 p-4">
              <div class="icon mb-3"><i class="fas fa-user"></i></div>
              <h5 class="text-uppercase">Anggota Perpustakaan</h5>
              <h2 class="text-uppercase font-weight-bold"><?php echo $jumanggota;?></h2>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-white mb-4 p-4">
              <div class="icon mb-3"><i class="fas fa-users"></i></div>
              <h5 class="text-uppercase">Pengunjung Perpustakaan</h5>
              <h2 class="text-uppercase font-weight-bold"><?php echo $jumbukutamu;?></h2>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-white mb-4 p-4">
              <div class="icon mb-3"><i class="fas fa-book"></i></div>
              <h5 class="text-uppercase">Koleksi Buku</h5>
              <h2 class="text-uppercase font-weight-bold"><?php echo $jumbuku;?></h2>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="bg-white mb-4 p-4">
              <div class="icon mb-3"><i class="fas fa-book-open"></i></div>
              <h5 class="text-uppercase">Koleksi E-Book</h5>
              <h2 class="text-uppercase font-weight-bold"><?php echo $jumebook;?></h2>
            </div>
          </div>
        </div>
      </div>
    </section>
        <!-- Team Section-->
    <section id="profil">
      <div class="container">
        <header class="text-center mb-5">
          <h2 class="text-uppercase lined">Profil Ketua Komisi Yudisial RI</h2>
        </header>
        <div class="row text-center">
          <div class="col-lg-3 col-md-6 mb-4"><img src="frontend/img/jaja.jpg" alt="Dr. Jaja Ahmad Jayus, S.H., M.Hum." class="img-fluid mb-4">
            <h4 class="font-weight-bold text-uppercase"><a class="no-anchor-style">Dr. Jaja Ahmad Jayus, S.H., M.Hum.</a></h4>
            <p class="small text-gray text-uppercase">Ketua Komisi Yudisial</p>
            <p class="small text-gray">Tempat/Tanggal Lahir : Kuningan, 6 April 1965</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4"><img src="frontend/img/maradaman.jpg" alt="Drs. H. Maradaman Harahap, S.H., M.H." class="img-fluid mb-4">
            <h4 class="font-weight-bold text-uppercase"><a class="no-anchor-style">Drs. H. Maradaman Harahap, S.H., M.H.</a></h4>
            <p class="small text-gray text-uppercase">Wakil Ketua Komisi Yudisial</p>
            <p class="small text-gray">Tempat/Tanggal Lahir : Tapanuli, 5  Juli 1948 </p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4"><img src="frontend/img/aidul.jpg" alt="Prof. Dr. Aidul Fitriciada Azhari, S.H., M.Hum." class="img-fluid mb-4">
            <h4 class="font-weight-bold text-uppercase"><a class="no-anchor-style">Prof. Dr. Aidul Fitriciada Azhari, S.H., M.Hum.</a></h4>
            <p class="small text-gray text-uppercase">Ketua Bidang Rekrutmen Hakim </p>
            <p class="small text-gray">Tempat/Tanggal Lahir : Tasikmalaya, 1 Januari 1968</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4"><img src="frontend/img/sukma.jpg" alt="Sukma Violetta, S.H., LL.M." class="img-fluid mb-4">
            <h4 class="font-weight-bold text-uppercase"><a class="no-anchor-style">Sukma Violetta, S.H., LL.M.</a></h4>
            <p class="small text-gray text-uppercase">Ketua Bidang Pengawasan Hakim dan Investigasi</p>
            <p class="small text-gray">Tempat/Tanggal Lahir : Jakarta, 10 Agustus 1964</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4"><img src="frontend/img/sumartoyo.jpg" alt="Dr. H. Sumartoyo, S.H., M.Hum." class="img-fluid mb-4">
            <h4 class="font-weight-bold text-uppercase"><a class="no-anchor-style">Dr. H. Sumartoyo, S.H., M.Hum.</a></h4>
            <p class="small text-gray text-uppercase">Ketua Bidang Sumber Daya Manuasia, Advokasi, Hukum, Penelitian dan Pengembangan</p>
            <p class="small text-gray">Tempat/Tanggal Lahir : Yogyakarta, 4 September 1956</p>
          </div>  
          <div class="col-lg-3 col-md-6 mb-4"><img src="frontend/img/joko.jpg" alt="Dr. Joko Sasmito, S.H., M.H." class="img-fluid mb-4">
            <h4 class="font-weight-bold text-uppercase"><a class="no-anchor-style">Dr. Joko Sasmito, S.H., M.H.</a></h4>
            <p class="small text-gray text-uppercase">Ketua Bidang Pencegahan dan Peningkatan Kapasitas Hakim</p>
            <p class="small text-gray">Tempat/Tanggal Lahir : Mojokerto, 12 Mei 1957</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4"><img src="frontend/img/farid.jpg" alt="Dr. Farid Wajdi, S.H., M.Hum." class="img-fluid mb-4">
            <h4 class="font-weight-bold text-uppercase"><a class="no-anchor-style">Dr. Farid Wajdi, S.H., M.Hum.</a></h4>
            <p class="small text-gray text-uppercase">Tempat/Tanggal Lahir : Silaping, 2 Agustus 1970</p>
            <p class="small text-gray">Ketua Bidang Hubungan Antar Lembaga dan Layanan Informasi merangkap Juru Bicara.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Portfolio Section-->
    <section id="gallery" class="pb-0">
      <header class="text-center mb-4">
        <h2 class="lined text-uppercase mb-5">Gallery</h2>
      </header>
      <div class="row p-0">           
        <div class="col-lg-3 col-md-4 col-6 p-0"><a href="frontend/img/gedung.jpg" data-lightbox="image-1" data-title="Gedung Komisi Yudisial Republik Indonesia" class="d-block"><img src="frontend/img/gedung.jpg" alt="..." class="img-fluid d-block mx-auto"></a></div>
        <div class="col-lg-3 col-md-4 col-6 p-0"><a href="frontend/img/kpk.jpg" data-lightbox="image-1" data-title="Foto Bersama Pimpinan KY dan KPK" class="d-block"><img src="frontend/img/kpk.jpg" alt="..." class="img-fluid d-block mx-auto"></a></div>
        <div class="col-lg-3 col-md-4 col-6 p-0"><a href="frontend/img/komisi.jpg" data-lightbox="image-1" data-title="Komisi Yudisial Republik Indonesia" class="d-block"><img src="frontend/img/komisi.jpg" alt="..." class="img-fluid d-block mx-auto"></a></div>
        <div class="col-lg-3 col-md-4 col-6 p-0"><a href="frontend/img/kyma.jpg" data-lightbox="image-1" data-title="Foto Bersama Mahkamah Agung" class="d-block"><img src="frontend/img/kyma.jpg" alt="..." class="img-fluid d-block mx-auto"></a></div>
        <div class="col-lg-3 col-md-4 col-6 p-0"><a href="frontend/img/rapatkerja.jpg" data-lightbox="image-1" data-title="Rapat Kerja Komisi Yudisial RI Tahun 2017" class="d-block"><img src="frontend/img/rapatkerja.jpg" alt="..." class="img-fluid d-block mx-auto"></a></div>
        <div class="col-lg-3 col-md-4 col-6 p-0"><a href="frontend/img/sinergisitas.jpg" data-lightbox="image-1" data-title="Sinergisitas Komisi Yudisial RI" class="d-block"><img src="frontend/img/sinergisitas.jpg" alt="..." class="img-fluid d-block mx-auto"></a></div>
        <div class="col-lg-3 col-md-4 col-6 p-0"><a href="frontend/img/pertemuanmpr.jpg" data-lightbox="image-1" data-title="Pertemuan Komisi Yudisial dengan MPR" class="d-block"><img src="frontend/img/pertemuanmpr.jpg" alt="..." class="img-fluid d-block mx-auto"></a></div>
        <div class="col-lg-3 col-md-4 col-6 p-0"><a href="frontend/img/rapatdpr.jpg" data-lightbox="image-1" data-title="KY dan DPR Sepakat Dorong RUU Jabatan Hakim Terelasiasi" class="d-block"><img src="frontend/img/rapatdpr.jpg" alt="..." class="img-fluid d-block mx-auto"></a></div>
      </div>
    </section>
        <!-- Text Section-->
    <section id="persyaratan" class="bg-gray">
      <div class="container">
        <header class="text-center mb-5">
          <h2 class="lined text-uppercase">Persyaratan Pendaftaran</h2>
        </header>
        <div class="row">
          <div class="col-lg-6">
            <p>Siswa (SD, SMP, SLTA), mahasiswa, dan umum. Warga Negara Indonesia (WNI/WNA), berdomisili di dalam maupun luar negeri.</p>
            <p>Mengisi formulir pendaftaran Anggota yang telah disediakan di ruang keanggotaan Lt. 2 Perpustakaan Komisi Yudisial RI- Jakarta Pusat, RT.8/RW.8, Kramat, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10450, atau Registrasi anggota di website ini</p>
          </div>
          <div class="col-lg-6">
            <p>Mencantumkan nomor telepon dan alamat email yang dapat dihubungi.</p>
            <p>Mengisi formulir pendaftaran dengan lengkap dan benar. Untuk melihat data E-Book dan data Buku yang ada di Perpustakaan Komisi Yudisial Republik Indonesia</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Map-->
    <section id="map" class="border-bottom border-top"></section>
    <!-- Contact Section-->
    <section id="contact">
      <div class="container">
        <header class="text-center mb-5">
          <h2 class="text-uppercase lined">Contact</h2>
        </header>
        <div class="row">
          <div class="col-lg-6">
            <form action="" class="contact-form">
              <div class="row">
                <div class="form-group col-lg-6">
                  <label for="firstName">Your firstname *</label>
                  <input id="firstName" type="text" name="firstname" placeholder="Enter your firstname" class="form-control">
                </div>
                <div class="form-group col-lg-6">
                  <label for="lastName">Your lastname *</label>
                  <input id="lastName" type="text" name="lastname" placeholder="Enter your lastname" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                  <label for="email">Your email *</label>
                  <input id="email" type="email" name="email" placeholder="Enter your email" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                  <label for="message">Your message for us *</label>
                  <textarea id="message" name="message" placeholder="Enter your message" rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group col-lg-12">
                  <button type="submit" class="btn btn-outline-primary w-100">Send message</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
            <div class="bg-white mb-4 p-4">
              <div class="icon mb-3"><i class="fas fa-map-marker-alt"></i></div>
            <p> Jalan Kramat Raya No.57, RT.08 / RW.08, Kramat, Senen, RT.8/RW.8, Kramat, RT.8/RW.8, Kramat, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10450</p>
            <div class="icon mb-3"><i class="fas fa-phone"></i></div>
            <p>(021) 3905877</p>
            <div class="icon mb-3"><i class="fas fa-fax"></i></div>
            <p>(021) 3906215</p>
            <div class="icon mb-3"><i class="fas fa-envelope"></i></div>
            <p>kyri@komisiyudisial.go.id </p>
            <br>
            <ul class="mb-0 list-inline text-center">
              <h3 class="text-uppercase lined">Ikuti Sosial Media Kami</h3>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/komisiyudisialri" class="social-link social-link-facebook"><i class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item">
                <a href="https://twitter.com/KomisiYudisial" class="social-link social-link-twitter"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/komisiyudisialri" class="social-link social-link-instagram"><i class="fab fa-instagram"></i></a></li>
              <li class="list-inline-item">
                <a href="https://www.youtube.com/channel/UCbv5OFbaeZ2R9wFhSZqGGVQ?view_as=subscriber" class="social-link social-link-youtube"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <footer class="py-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center text-lg-left">
          </div>
          <div class="col-lg-6 text-center text-lg-right">
            <p class="mb-0 text-gray">Copyright &copy; 2019 Dicky Setiadi | Skripsi Y.A.I</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="frontend/vendor/jquery/jquery.min.js"></script>
    <script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/vendor/lightbox2/js/lightbox.min.js"></script>
    <script src="frontend/vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.js"> </script>
    <script src="frontend/js/front.js"></script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>