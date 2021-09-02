
<?php  
include("../confs/config.php");
$result=mysqli_query($conn,"select * from customer where status<>4");
if(isset($_GET['edit'])){
$id=$_GET['edit'];
$supresult=mysqli_query($conn,"select * from customer where syskey=$id and status<>4");
$row=mysqli_fetch_assoc($supresult);
$name=$row['engName'];
$mmname=$row['mmName'];
$code=$row['code'];
$nrc=$row['nrc'];
$phone=$row['phone'];
$email=$row['email'];
$address=$row['address'];
$isupdate=true;
}
else {
$isupdate=false;
$name="";
$mmname="";
$code="";
$nrc="";
$phone="";
$email="";
$address="";
$id="";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://sa:123@crypto-admin-templates.multipurposethemes.com/images/favicon.ico">
    <title>Moe Yan Ledger</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Bootstrap extend-->
  <link rel="stylesheet" href="../css/bootstrap-extend.css">
<!-- Theme style -->
  <link rel="stylesheet" href="../css/master_style.css">
  <!-- theme style -->
  <link rel="stylesheet" href="../css/Styles.css">

</head>

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	  <b class="logo-mini">
		  <span class="light-logo"><img src="../images/logo-light.png" alt="logo"></span>
		  <span class="dark-logo"><img src="../images/logo-dark.png" alt="logo"></span>
	  </b>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
		  <img src="../images/logo-light-text.png" alt="logo" class="light-logo">
	  	  <img src="../images/logo-dark-text.png" alt="logo" class="dark-logo">
	  </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  
		  <li class="search-box">
            <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
            <form class="app-search" style="display: none;">
                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
			</form>
          </li>			
		  
          <!-- Messages -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-email"></i>
            </a>
          </li>
          <!-- Notifications -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
            </a>
          </li>
          <!-- Tasks -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-message"></i>
            </a>
          </li>
		  <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../image/moeyan.jpg" class="user-image rounded-circle" alt="User Image">
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
		<div class="row">
			<div class="col-lg-4 col-12" style="float: left;">
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Add New</h4>
          </div>
          <div class="box-body no-padding">
            <!-- Tab panes -->
                <form>
                <input type="hidden" name="cusid" id="cusid" value="<?php echo $id; ?>">
                <div class="divpad">
                  <label class="mr-25">Customer Code</label>
                  <?php if($isupdate==false): ?>
                  <input class="form-control" type="text"  name="cuscode" id="cuscode" value="<?php echo $code; ?>">
                  <?php else: ?>
                  <input class="form-control" type="text" disabled="disabled" name="cuscode" id="cuscode" value="<?php echo $code; ?>">
                  <?php endif ?> 
                </div>
                <div class="divpad">
                  <label class="mr-25">Customer Name</label>
                  <input class="form-control" type="text"  name="cusengname" id="cusengname" value="<?php echo $name; ?>"></div>
                  <div class="divpad">
                  <label class="mr-25">Myanmar Name</label>
                  <input class="form-control" type="text"  name="cusmmname" id="cusmmname" value="<?php echo $mmname; ?>"></div>
                <div class="divpad">
                  <label class="mr-25">NRC</label>
                  <input class="form-control" type="text"  name="cusnrc" id="cusnrc" value="<?php echo $nrc; ?>"></div>
                  <div class="divpad">
                  <label class="mr-25">Phone</label>
                  <input class="form-control" type="text"  name="cusphone" id="cusphone" value="<?php echo $phone; ?>"></div>
                  <div class="divpad">
                  <label class="mr-25">Email</label>
                  <input class="form-control" type="text"  name="cusemail" id="cusemail" value="<?php echo $email; ?>"></div>
                  <div class="divpad">
                  <label class="mr-25">Address</label>
                  <input class="form-control" type="text"  name="cusaddress" id="cusaddress" value="<?php echo $address; ?>"></div>  
                  <?php if($isupdate==false): ?>
                  <div class="divpad">
                  <input class="btn btn-block p-10 no-border btn-info" type="button" name="btncus" id="btncus" value="Save" aria-expanded="false">
                </div>
               <?php else: ?>
                  <div class="divpad">
                  <input class="btn btn-block p-10 no-border btn-info" type="button" name="btncus" id="btncus" value="Update" aria-expanded="false">
                </div>
                <?php endif ?>
                
                </form>
							</div>
						</div>		
            </div>				
						<!-- Nav tabs -->											

			
			<div class="col-lg-8 col-12" style="float: left;">
				<div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Customer List</h4>
						<ul class="box-controls pull-right">
						  <li><a class="box-btn-close" href="#"></a></li>
						  <li><a class="box-btn-slide" href="#"></a></li>	
						  <li><a class="box-btn-fullscreen" href="#"></a></li>
						</ul>
					</div>
					<div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid" id="customerlist">
              <thead>
                <tr class="bg-dark">
                  <th class="text-lighter">No</th>
                  <th class="text-lighter">Code</th>
                  <th class="text-lighter">Name</th>
                  <th class="text-lighter">MM Name</th>
                  <th class="text-lighter">NRC</th>
                  <th class="text-lighter">Phone</th>
                  <th class="text-lighter">Address</th>
                  <th class="text-lighter" colspan="2">Action</th>
                </tr>
              </thead>
                <tbody>
                  <?php $i=1; ?>
    <?php while($row = mysqli_fetch_assoc($result)):  ?>
      <tr>
      <td><?php  echo$i; ?></td>
      <td><?php  echo $row['code']; ?></td>
      <td><?php  echo $row['engName']; ?></td>
      <td><?php  echo $row['mmName']; ?></td>
      <td><?php  echo $row['nrc']; ?></td>
      <td><?php  echo $row['phone']; ?></td>
      <td><?php  echo $row['address']; ?></td>
      <td><a class="fa fa-edit" id="edit" href="customer.php?edit=<?php echo $row['syskey'] ?>" >Edit</a>
      <a class="fa fa-times" href="../dao/setup.php?cusdel=<?php echo $row['syskey']; ?>">Delete</a></td>
    </tr>
    <?php $i++;endwhile; ?>
    
  </tbody>
            </table>
          </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			
		</div>
		
  
		
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Purchase Now</a>
		  </li>
		</ul>
    </div>
	  &copy; 2018 <a href="https://www.multipurposethemes.com/">Multi-Purpose Themes</a>. All Rights Reserved.
  </footer>

    <!-- Control Sidebar -->
<!-- Control Sidebar -->
    <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
     <div class="ulogo">
       <a href="index.html">
        <!-- logo for regular state and mobile devices -->
        <span><b>MoeYan </b>Ledger</span>
      </a>
    </div>
        <div class="image">
          <img src="../image/moeyan.jpg"  alt="User Image">
        </div>
      </div>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
    <li class="nav-devider"></li>
        <li class="header nav-small-cap">MENU</li>
        <li>
          <a href="home.php">
            <i class="fa fa-home"></i> <span>ပင္မစာမ်က္နွာ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="lotteryprize.php">
            <i class="fa fa-edit"></i> <span>ထီေပါက္စဥ္</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview active">
          <a href="">
            <i class="fa fa-list-ul"></i>
            <span>TRANSACTION</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="buy.php"><i class="fa fa-refresh"></i>ဆုမဲအ၀ယ္</a></li>
            <li><a href="sale.php"><i class="fa fa-sign-in"></i>ဆုမဲအေရာင္း</a></li>
            <li><a href="#"><i class="fa fa-sign-out"></i>ဆုမဲအလွဲအလွယ္</a></li>          
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-gears"></i>
            <span>SETUP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="customer.php"><i class="fa fa-users"></i>CUSTOMER</a></li>
            <li><a href="supplier.php"><i class="fa fa-users"></i>ကိုယ္စားလွယ္</a></li>
            <li><a href="prizetype.php"><i class="fa fa-usd"></i>ဆုမဲအမ်ိးအစား</a></li>  
            <li><a href="location.php"><i class="fa fa-map-marker"></i>ဆိုင္</a></li> 
            <li><a href="round.php"><i class="fa fa-user-o"></i>အၾကိမ္</a></li> 
            <li><a href="staff.php"><i class="fa fa-user"></i>STAFF</a></li>  
            <li><a href="user.php"><i class="fa fa-user"></i>USER</a></li> 
            <li><a href="permission.php"><i class="fa fa-user"></i>PERMISSION</a></li>        
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-file-pdf-o"></i>
            <span>REPORT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="buystockbyprice.php">BUY REPORT(PRICE)</a></li>
            <li><a href="stockbalance.php">STOCK BALANCE</a></li> 
            <li><a href="balanceserial.php">ON HAND SERIAL</a></li> 
            <li><a href="cashbook.php">CASHBOOK</a></li>       
          </ul>
        </li>
        <li>
          <a href="../index.php">
            <i class="fa fa-user-circle-o"></i>
            <span>LOGOUT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        
      </ul>
    </section>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper --> 	 

	<!-- jQuery 3 -->
  <script src="../../assets/vendor_components/jquery/dist/jquery.min.js"></script>
	<script src="../../assets/vendor_components/jquery/dist/jquery.js"></script>
	
	<!-- popper -->
	<script src="../../assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="../../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>
	
	<!-- Slimscroll -->
	<script src="../../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="../../assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
  <!--amcharts charts -->
	<script src="../../../www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
	<script src="../../../www.amcharts.com/lib/3/gauge.js" type="text/javascript"></script>
	<script src="../../../www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
	<script src="../../../www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>
	<script src="../../../www.amcharts.com/lib/3/pie.js" type="text/javascript"></script>
	<script src="../../../www.amcharts.com/lib/3/plugins/animate/animate.min.js" type="text/javascript"></script>
	<script src="../../../www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
	<script src="../../../www.amcharts.com/lib/3/themes/patterns.js" type="text/javascript"></script>
	<script src="../../../www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>	
	
	<!-- webticker -->
	<script src="../../assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js"></script>
	
	<!-- Crypto_Admin App -->
	<script src="../js/template.js"></script>
	
	<!-- Crypto_Admin dashboard demo (This is only for demo purposes) -->
	<script src="../js/pages/dashboard.js"></script>
	<script src="../js/pages/dashboard-chart.js"></script>
  <script>
        $(document).ready(function(){
        $("#btncus").click(function(){  
      var syskey = $('#cusid').val();//$('#type option:selected').val();
      var code = $('#cuscode').val();
      var engname = $('#cusengname').val();
      var mmname = $('#cusmmname').val();
      var nrc = $('#cusnrc').val();
      var phone = $('#cusphone').val();
      var email = $('#cusemail').val();
      var address = $("#cusaddress").val();
      var text = $(this).val();
      var info="";
      var info1={syskey:syskey,code:code,engname:engname,mmname:mmname,nrc:nrc,phone:phone,email:email,address:address};
      var jsoninfo = "";
      var jsoninfo = JSON.stringify(info1);
      if(text == "Save")
      {
      $.ajax({
          url:"../dao/setup.php",
          method:"post",
          data:{cussave:jsoninfo},
          success:function(){
          window.location.href="customer.php";          
        }
      });
    }
    else
    {
      $.ajax({
          url:"../dao/setup.php",
          method:"post",
          data:{cusupdate:jsoninfo},
          success:function(){
          window.location.href="customer.php";          
        }
      });
     }
   });
  });
  </script>
</body>
</html>
