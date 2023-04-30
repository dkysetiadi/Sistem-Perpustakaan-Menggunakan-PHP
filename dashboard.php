        <?php
		if($_SESSION["cstatus"]=="Administrator"){
        ?>

        <div class="row">
            <div class="col-lg-3 col-xs-6">

<?php
    $sql="select * from `$tbebook` where status='Publish' order by `kode_ebook` desc";
          $jum=getJum($conn,$sql);         
  $jmldata = $jum;
?>      
              <!-- small box -->
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data E-Book</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-bookmarks"></i>
                </div>
                <a href='?mnu=ebook' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">

<?php
    $sql="select * from `$tbbuku` where status='Tersedia' order by `kode_buku` desc";
          $jum=getJum($conn,$sql);         
  $jmldata = $jum;
?>      
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Buku</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-book"></i>
                </div>
                <a href='?mnu=buku' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
<?php
    $sql="select * from `$tbtransaksi` order by `kode_transaksi` desc";
          $jum=getJum($conn,$sql);       
  $jmldata = $jum;
?> 
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Transaksi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href='?mnu=pengembalian' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->     
<?php
  $sql="select * from `$tbanggota` order by `kode_anggota` desc";
      $jum=getJum($conn,$sql);      
  $jmldata = $jum;
?>    
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Anggota</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href='?mnu=anggota' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
<?php
    $sql="select * from `$tbbukutamu` order by `kode_bukutamu` desc";
          $jum=getJum($conn,$sql);           
  $jmldata = $jum;
?> 
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Pengunjung</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href='?mnu=bukutamu' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

             <div class="col-lg-3 col-xs-6">

<?php
    $sql="select * from `$tbadmin` where level='Petugas' order by `kode_admin` desc";
          $jum=getJum($conn,$sql);   
            $jmldata = $jum;
?>      
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Petugas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-contact"></i>
                </div>
                <a href='?mnu=admin' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->


<section class="content-header">
  <div class="col-md-12">
    <div class="box">
      
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
        </div>
        <!-- /.row -->
      </div>
      <!-- ./box-body -->
      <div class="box-footer">
        <div class="row">
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </div>
</section>
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
  <?php
		} else if($_SESSION["cstatus"]=="Petugas"){
        ?>
		
              <div class="row">
                <div class="col-lg-3 col-xs-6">

<?php
    $sql="select * from `$tbebook` where status='Publish' order by `kode_ebook` desc";
          $jum=getJum($conn,$sql);         
  $jmldata = $jum;
?>      
              <!-- small box -->
              <div class="small-box bg-teal">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data E-Book</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-bookmarks"></i>
                </div>
                <a href='?mnu=ebook' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">

<?php
    $sql="select * from `$tbbuku` where status='Tersedia' order by `kode_buku` desc";
          $jum=getJum($conn,$sql);         
  $jmldata = $jum;
?>      
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Buku</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-book"></i>
                </div>
                <a href='?mnu=buku' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
<?php
    $sql="select * from `$tbtransaksi` order by `kode_transaksi` desc";
          $jum=getJum($conn,$sql);       
  $jmldata = $jum;
?> 
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Transaksi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href='?mnu=pengembalian' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->     
<?php
  $sql="select * from `$tbanggota` order by `kode_anggota` desc";
      $jum=getJum($conn,$sql);      
  $jmldata = $jum;
?>     
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Anggota</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href='?mnu=anggota' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
<?php
    $sql="select * from `$tbbukutamu` order by `kode_bukutamu` desc";
          $jum=getJum($conn,$sql);           
  $jmldata = $jum;
?> 
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $jmldata; ?></h3>
                  <p>Data Pengunjung</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href='?mnu=bukutamu' class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->


<section class="content-header">
  <div class="col-md-12">
    <div class="box">
      
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
        </div>
        <!-- /.row -->
      </div>
      <!-- ./box-body -->
      <div class="box-footer">
        <div class="row">
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </div>
</section>
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<?php 
    } else { 
    
    require_once"dashboard.php";     } ?>