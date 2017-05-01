<?php
	require "cekMember.php";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="icon" type="image/png" href="images/36.png">
    <title>Halaman Member</title>

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
              <a href="index.php" class="site_title"><img src="images/48.png">Member Page</a>
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
                  
                  <li><a><i class="fa fa-desktop"></i>Peminjaman<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="peminjaman.php">Lihat Peminjaman</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i>Buku<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="daftar_buku.php">Daftar Buku</a></li>
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
                    <img src="images/user.png" alt="">Menu
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
                <h3>Peminjaman Buku</h3>
              </div>
            </div>

            <div class="clearfix"></div>

			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
				  <div class="row">
				  <div class="col-md-12 col-sm-12 col-xs-12">
				   <div class="x_panel">
				  <div class="x_title">
                    <h2>Lihat Peminjaman<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
				 <div class="x_content">
                 
                     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-hover table-bordered">
				<tr>
					<th>No.</th>
					<th>NIS/NIP peminjam</th>
					<th>Judul buku</th>
					<th>ISBN buku</th>
					<th>Tanggal pinjam</th>
					<th>Tanggal harus kembali</th>
					<th>Tanggal kembali</th>
				</tr>
<?php
		
	if(isset($_GET['category'])&&isset($_GET['keyword'])){
		$category = $_GET['category'];
		$keyword = $_GET['keyword'];

		//search for data in table peminjaman where category contains keyword
		$sql = "SELECT * FROM anggota, buku, peminjaman WHERE $category LIKE '%$keyword%'";
		$result = mysqli_query($connection, $sql); 
		if($result){
			$count=mysqli_num_rows($result);	
		}else{
			die("Maaf, tidak ditemukan data yang cocok dengan keyword Anda.");
		}	
	}else{
		$uwuwu=$_SESSION['nis_nip'];
		$sql = "SELECT * FROM buku b, peminjaman p WHERE b.isbn = p.id_buku AND p.id_anggota = $uwuwu";
		$result = mysqli_query($connection, $sql); 
		
		$count=mysqli_num_rows($result);	
	}


	if(!$result){
		die("No result found");
	}else{
		$count=mysqli_num_rows($result);	
	}

	if($count>0){
		$number = 1;	
		
		echo "<p>$count data ditampilkan.<p>";
		
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["id_peminjaman"];
			if(!isset($row["kembali"])){
				//if row kembali is empty, set status to 'belum kembali'
				$status = "belum kembali";
	        }else{
	        	//if row kembali already has value, set status to row kembali value
	        	$status = ($row["kembali"]);
	        }
	        echo "<tr> <td>" . $number. "</td><td> ". 
	        $row["id_anggota"]."</td><td>".
	        $row["judul"]."</td><td>".
	        $row["id_buku"]."</td><td>".
	        $row["tgl_pinjam"]."</td><td>".
	        $row["tgl_kembali"]."</td><td>".
	        $status."</td></tr>";
	        
	   
	        $number++;
	    }
		
		}else{
		echo "Maaf, tidak ditemukan data yang cocok.";
		
	}
?>
			</table>
                  </div>
                </div>
              </div>
            </div>
					
                  </div>
				</div>
				</div>
              </div>
			</div>
			</div>
        </div>

		</div>
	</div>
	</div>
	</div>
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

<script type="text/javascript">
	//source code : modified from http://jsfiddle.net/7LXPq/93/
	$(document).ready( function() {

		//create object Date
    	var now = new Date();
 		var day = ("0" + now.getDate()).slice(-2);
    	var month = ("0" + (now.getMonth() + 1)).slice(-2);
    	day = parseInt(day);

    	//default date is today
    	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

    	//set default date to tgl_pinjam
		$('#tgl_pinjam').val(today);

		//date to return book is a week after it's borrowed
		//so the default is today + 7
		var returnLoan = now.getFullYear()+"-"+(month)+"-"+(day+7);
		//set default date to tgl_kembali
		$('#tgl_kembali').val(returnLoan);

	});

</script>