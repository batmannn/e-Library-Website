<?php
	require "cekAdmin.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<link rel="icon" type="image/png" href="images/36.png">
     <title>SeL Admin</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
               <div class="navbar nav_title" style="padding-left: 0%">
              <a href="index.php" class="site_title"><img src="images/48.png">Admin Page</a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <?php
				echo "<h2>Selamat datang,<br>".$_SESSION["nama"]."</h2>";
				?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               <ul class="nav side-menu">
                   <li><a><i class="fa fa-edit"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Keanggotaan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="daftar_anggota.php">Daftar Anggota</a></li>
                      <li><a href="tambah_anggota.php">Tambah Anggota</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>Peminjaman<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="daftar_peminjaman.php">Daftar Peminjaman</a></li>
                      <li><a href="peminjaman.php">Peminjaman dan Pengembalian</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i>Buku<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="daftar_buku.php">Daftar Buku</a></li>
                      <li><a href="tambah_buku.php">Tambah Buku</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
          
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt="">Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambah Buku</h3>
              </div>
            </div>

            <div class="clearfix"></div>

 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Input Buku<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="judul">Judul Buku<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="judul" name="judul" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Pengarang<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pengarang" name="pengarang" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="isbn" class="control-label col-md-3 col-sm-3 col-xs-12">ISBN<span class="required">*</span>
						</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="isbn" name="isbn" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="penerbit" class="control-label col-md-3 col-sm-3 col-xs-12">Penerbit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="penerbit" name="penerbit" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="thn_terbit" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Terbit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="thn_terbit" name="thn_terbit" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label for="genre" class="control-label col-md-3 col-sm-3 col-xs-12">Genre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="genre" name="genre" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <input type="submit" class="btn btn-success" value="Submit" name="insertBuku">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
		
          </div>
        </div>

<?php
	//first check if post insertBuku has value
	if(isset($_POST['insertBuku'])){
		//if it is, then proceed to the following

		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$thn_terbit = $_POST['thn_terbit'];
		$isbn = $_POST['isbn'];
		$genre = $_POST['genre'];

		//insert the following data to database

		$sql = "INSERT INTO buku (judul, pengarang, penerbit, thn_terbit, isbn, genre) VALUES ('$judul', '$pengarang', '$penerbit', '$thn_terbit', '$isbn', '$genre')";
		$result = mysqli_query($connection, $sql); 
		
		if($result){
			//if inserting data succeeds, show notification in modal box
?>
<script type="text/javascript">
	var notif = document.getElementById("notif");

	var show = "<div class='alert alert-success'><p><strong>Sukses!</strong> Data berhasil masuk.</p>";
	show+="<p><a href='daftar_buku.php' class='btn btn-success'> Lihat semua buku.</a></p></div>";
	notif.innerHTML = show;
</script>
		
<?php
		}else{
		//if inserting data fails, show error notification	
?>

<script type="text/javascript">
	var notif = document.getElementById("notif");
	var show = "<div class='alert alert-warning'><p><strong>Gagal!</strong> Terjadi kesalahan. Data tidak berhasil masuk.</p>";
	show+="<a href='daftar_buku.php'>Lihat semua buku.</a>";
	notif.innerHTML = show;
</script>
	</div>

<?php
		}
	}
?>

        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>