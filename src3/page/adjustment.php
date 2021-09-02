<?php  
include("../confs/config.php");
include("../confs/auth.php");
  $user = $_SESSION['usersyskey'];
  $location = $_SESSION['locationsyskey'];
  $resultin=mysqli_query($conn,"SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType = 14 GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name");

  $resultout=mysqli_query($conn,"SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType = 15 GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name");

  $vouchercount=mysqli_query($conn,"select count(id) as count from transaction where createdUser = '$user' and recordType = 11 ");
  $row=mysqli_fetch_assoc($vouchercount);
  $c= $row["count"];
  $formno = 'ADJ-'.generate_numbers(++$c, 1, 6);
  $customer=mysqli_query($conn,"select * from customer where status <>4 ");
  $currency=mysqli_query($conn,"select * from currency where status <>4 ");
  $location=mysqli_query($conn,"select * from location where status <>4 ");

function generate_numbers($start, $count, $digits) {
   $num = str_pad($start, $digits, "0", STR_PAD_LEFT);
   return $num;
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from crypto-admin-templates.multipurposethemes.com/src3/pages/currency-ex/exchange.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Sep 2018 04:34:56 GMT -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://sa:123@crypto-admin-templates.multipurposethemes.com/images/favicon.ico">
    <title>Crypto Admin - Currency Exchange</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
<!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Select2 -->
  <link rel="stylesheet" href="../../assets/vendor_components/select2/dist/css/select2.min.css">
<!-- Bootstrap extend-->
  <link rel="stylesheet" href="../css/bootstrap-extend.css">
<!-- Theme style -->
  <link rel="stylesheet" href="../css/master_style.css">
  <!-- theme style -->
  <link rel="stylesheet" href="../css/Styles.css">
  <!-- Crypto_Admin skins -->
  <link rel="stylesheet" href="../css/skins/_all-skins.css"> 
    <!-- bootstrap datepicker --> 
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Bootstrap extend-->
  <link rel="stylesheet" href="../css/bootstrap-extend.css">
  
  <!-- daterange picker --> 
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
  
  <!-- bootstrap datepicker --> 
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../assets/vendor_plugins/iCheck/all.css">
  
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="../../assets/vendor_components/select2/dist/css/select2.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../css/master_style.css">

  <!-- Crypto_Admin skins -->
  <link rel="stylesheet" href="../css/skins/_all-skins.css">






    <link rel="stylesheet" href="../../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Bootstrap extend-->
  <link rel="stylesheet" href="../css/bootstrap-extend.css">
  
  <!-- daterange picker --> 
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
  
  <!-- bootstrap datepicker --> 
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../assets/vendor_plugins/iCheck/all.css">
  
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="../../assets/vendor_components/select2/dist/css/select2.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../css/master_style.css">

  <!-- Crypto_Admin skins -->
  <link rel="stylesheet" href="../css/skins/_all-skins.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div id="overlay" onclick="hideDialog()"></div>
<!-- Site wrapper -->
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
              <img src="../../images/user5-128x128.jpg" class="user-image rounded-circle" alt="User Image">
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADJUSTMENT FORM
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Adjustment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <div class="row">       
      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-lg-2">
              <button class="btn btn-block btn-md btn-success" id="btnAdjustment" onClick="showDialog()"><i class="fa fa-sign-out"></i>&nbsp;Adjustment</button>
              </div>
               <div class="col-lg-2">
              <button class="btn btn-block btn-md btn-success" id="btnPrint"><i class="fa fa-print"></i>&nbsp;Print</button>
              </div>
              <div class="col-lg-2">
              <button class="btn btn-block btn-md btn-success" id="btnExcel"><i class="fa fa-file-excel-o"></i>&nbsp;Excel</button>
              </div>
              <div class="col-lg-1">
              <button data-toggle="collapse" data-target="#demo" class="btn btn-block btn-md btn-info"><i class="fa fa-angle-double-down"></i></button>
              </div>
            </div>
            <div class="clear"></div>
            <div id="demo" class="collapse">
            <div class="row">
            <div class="col-lg-2">
              <label>Search By:</label>
              <input type="text" class="form-control" placeholder="Enter Text" id="stext">
            </div>
            <div class="col-lg-4">
              <label>Date range:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
              </div>
              <div class="col-lg-1">
              <label>  .</label>
              <button class="btn btn-block btn-sm btn-success" ><i class="fa fa-search"></i></button>
            </div>
            </div>
          </div>
          </div>
      <div class="box-body">
              <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#in" role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">Adjustment In</span></a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#out" role="tab"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Adjustment Out</span></a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tabcontent-border">
          <div class="tab-pane active" id="in" role="tabpanel">
            <div class="pad">
            <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid" id="adjustmenthistory">
              <thead>
                <tr class="bg-dark">
                  <th class="text-yellow">No</th>
                  <th class="text-yellow">Date</th>
                  <th class="text-yellow">Voucher</th>
                  <th class="text-yellow">Qty</th>
                  <th class="text-yellow">Location</th>
                  <th class="text-yellow">Staff</th>
                  <th class="text-yellow">Action</th>
                </tr>
              </thead>
                <tbody>
            <?php $i=1; ?>
            <?php while($row = mysqli_fetch_assoc($resultin)):  ?>
                  <tr>
                    <td><?php  echo $i; ?></td>
                    <td><?php  echo $row['voucherDate']; ?></td>
                    <td><?php  echo $row['voucherNo']; ?></td>
                    <td><?php  echo $row['totalQty']; ?></td>
                    <td><?php  echo $row['location']; ?></td>
                    <td><?php  echo $row['staff']; ?></td>
                    <td>
                      <a class="fa fa-edit"  href="user.php?view=<?php echo $row['syskey'] ?>" >View</a>
                      <a class="fa fa-edit" href="user.php?edit=<?php echo $row['syskey'] ?>">Edit</a>
                      <a class="fa fa-times" href="../dao/setup.php?usrdel=<?php echo $row['syskey']; ?>">Delete</a>
                    </td>                    
                </tr>
            <?php $i++;endwhile; ?>
                </tbody>
            </table>
          </div>
            </div>
          </div>
          <div class="tab-pane pad" id="out" role="tabpanel">
                      <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid" id="adjustmenthistory">
              <thead>
                <tr class="bg-dark">
                  <th class="text-yellow">No</th>
                  <th class="text-yellow">Date</th>
                  <th class="text-yellow">Voucher</th>
                  <th class="text-yellow">Qty</th>
                  <th class="text-yellow">Location</th>
                  <th class="text-yellow">Staff</th>
                  <th class="text-yellow">Action</th>
                </tr>
              </thead>
                <tbody>
            <?php $i=1; ?>
            <?php while($row = mysqli_fetch_assoc($resultout)):  ?>
                  <tr>
                    <td><?php  echo $i; ?></td>
                    <td><?php  echo $row['voucherDate']; ?></td>
                    <td><?php  echo $row['voucherNo']; ?></td>
                    <td><?php  echo $row['totalQty']; ?></td>
                    <td><?php  echo $row['location']; ?></td>
                    <td><?php  echo $row['staff']; ?></td>
                    <td>
                      <a class="fa fa-edit"  href="user.php?view=<?php echo $row['syskey'] ?>" >View</a>
                      <a class="fa fa-edit" href="user.php?edit=<?php echo $row['syskey'] ?>">Edit</a>
                      <a class="fa fa-times" href="../dao/setup.php?usrdel=<?php echo $row['syskey']; ?>">Delete</a>
                    </td>                    
                </tr>
            <?php $i++;endwhile; ?>
                </tbody>
            </table>
          </div>
          </div>
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

    <div id="ratedialog">

      <div class="box">
      <div class="col-12">
        <div class="clear"></div>
          <div class="row">
            <div class="form-group col-lg-2">
              <label>Voucher No :</label>
              <input type="text" class="form-control" value="<?php echo$formno; ?>" disabled id="voucherno">
              </div>
              <div class="form-group col-lg-3">
                <label>Exchange Date :</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" disabled>
                </div>
              </div>
              <div class="form-group col-lg-2">
              <label>Type :</label>
              <select class="form-control" id="type">
                <!--<option value="1" selected="selected" disabled="disabled">Choose Type</option>-->
                <option value="1">In</option>
                <option value="2">Out</option>
              </select>
              </div>
              <div class="form-group col-lg-3">
              <label>Currency :</label><br>
                <select class="form-control select2" id="currency" onChange="QtyFocus();" style="width: 100%;">
                  <option selected="selected">Select Currency</option>
                  <?php while($row = mysqli_fetch_assoc($currency)):  ?>
                    <option value="<?php echo $row['code']; ?>"><?php echo $row['description']; ?></option>
                  <?php endwhile; ?>s
                </select>
              </div>
              <div class="form-group col-lg-2">
                <label>Qty :</label>
                <input type ="text" class="form-control" id="qty">
              </div>
              </div>
              
          <div class="col-12">
           <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid" id="adjustmenttable">
              <thead>
                <tr class="bg-warning">
                  <th>No</th>
                  <th>Code</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Action</th>
                </tr>
              </thead>
                <tbody id="adjustmentlist">
                </tbody>
              </table>
              </div>
        </div>
        <div class="box-header">
          <div class="row">
           <div class="form-group col-lg-2">
              <label>Total Qty :</label>
              <input type ="text" class="form-control" disabled id="totalqty">
           </div>
           <div class="col-lg-2">
              <label>.</label>
              <button type ="button" class="btn btn-block btn-md btn-success" id="btnsave"><i class=" fa fa-save"></i>&nbsp;Save</button>
           </div>
           <div class="col-lg-2">
              <label>.</label>
              <button type ="button" class="btn btn-block btn-md btn-success" id="btnnew"><i class="fa fa-file-o"></i>&nbsp;New</button>
           </div>
           <div class="col-lg-2">
              <label>.</label>
              <button type ="button" class="btn btn-block btn-md btn-success" id="btnclose"><i class="fa fa-close"></i>&nbsp;Close</button>
           </div>
         </div>
        </div>
      </div>
    </div>

    </div>

  
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
    <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
     <div class="ulogo">
       <a href="index.html">
        <!-- logo for regular state and mobile devices -->
        <span><b>MoeYan </b>Exchange</span>
      </a>
    </div>
        <div class="image">
          <img src="../../image/moeyanx.png"  alt="User Image">
        </div>
      </div>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
    <li class="nav-devider"></li>
        <li class="header nav-small-cap">MENU</li>
        <li>
          <a href="#">
            <i class="fa fa-home"></i> <span>DASHBOARD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="changerate.php">
            <i class="fa fa-edit"></i> <span>RATE CHANGE</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="checkcredit.php">
            <i class="fa fa-edit"></i> <span>RECEIABLB/PAYABLE</span>
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
            <li><a href="exchange.php"><i class="fa fa-refresh"></i>EXCHANGE</a></li>
            <li><a href="receive.php"><i class="fa fa-sign-in"></i>RECEIVE</a></li>
            <li><a href="issue.php"><i class="fa fa-sign-out"></i>ISSUE</a></li>  
            <li><a href="transfer.php"><i class="fa fa-exchange"></i>TRANSFER</a></li> 
            <li><a href="adjustment.php"><i class="fa fa-tasks"></i>ADJUSTMENT</a></li>         
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
            <li><a href="supplier.php"><i class="fa fa-users"></i>SUPPLIER</a></li>
            <li><a href="currency.php"><i class="fa fa-usd"></i>CURRENCY</a></li>  
            <li><a href="location.php"><i class="fa fa-map-marker"></i>LOCATION</a></li> 
            <li><a href="staff.php"><i class="fa fa-user-o"></i>STAFF</a></li> 
            <li><a href="user.php"><i class="fa fa-user"></i>USER</a></li>        
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
            <li><a href="#">EXCHANGE REPORT</a></li>
            <li><a href="stockbalance.php">STOCK REPORT</a></li>       
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
  <script src="../../www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/pie.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/plugins/animate/animate.min.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/themes/patterns.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>   
  <!-- webticker -->
  <script src="../../assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js"></script>
  <script src="../../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>  
  <!-- Crypto_Admin App -->
  <script src="../js/template.js"></script>  
  <!-- Crypto_Admin dashboard demo (This is only for demo purposes) -->
  <script src="../js/pages/dashboard.js"></script>
  <script src="../js/pages/dashboard-chart.js"></script>  
  <!-- Crypto_Admin for demo purposes -->
  <script src="j../s/demo.js"></script>
  <script src="../js/pages/advanced-form-element.js"></script>

  <script src="../../assets/vendor_components/jquery/dist/jquery.min.js"></script>
  
  <!-- popper -->
  <script src="../../assets/vendor_components/popper/dist/popper.min.js"></script>
  
  <!-- Bootstrap 4.0-->
  <script src="../../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
  
  <!-- Select2 -->
  <script src="../../assets/vendor_components/select2/dist/js/select2.full.js"></script>
  
  <!-- InputMask -->
  <script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
  
  <!-- date-range-picker -->
  <script src="../../assets/vendor_components/moment/min/moment.min.js"></script>
  <script src="../../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <!-- bootstrap datepicker -->
  <script src="../../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  
  <!-- bootstrap color picker -->
  <script src="../../assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  
  <!-- bootstrap time picker -->
  <script src="../../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
  
  <!-- SlimScroll -->
  <script src="../../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  
  <!-- iCheck 1.0.1 -->
  <script src="../../assets/vendor_plugins/iCheck/icheck.min.js"></script>
  
  <!-- FastClick -->
  <script src="../../assets/vendor_components/fastclick/lib/fastclick.js"></script>
  <script type="text/javascript" src="../js/transaction.js"></script> 

  <script src="../../assets/vendor_components/jquery/dist/jquery.min.js"></script>
  
  <!-- popper -->
  <script src="../../assets/vendor_components/popper/dist/popper.min.js"></script>
  
  <!-- Bootstrap 4.0-->
  <script src="../../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
  
  <!-- Select2 -->
  <script src="../../assets/vendor_components/select2/dist/js/select2.full.js"></script>
  
  <!-- InputMask -->
  <script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
  
  <!-- date-range-picker -->
  <script src="../../assets/vendor_components/moment/min/moment.min.js"></script>
  <script src="../../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <!-- bootstrap datepicker -->
  <script src="../../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  
  <!-- bootstrap color picker -->
  <script src="../../assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  
  <!-- bootstrap time picker -->
  <script src="../../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
  
  <!-- SlimScroll -->
  <script src="../../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  
  <!-- iCheck 1.0.1 -->
  <script src="../../assets/vendor_plugins/iCheck/icheck.min.js"></script>
  
  <!-- FastClick -->
  <script src="../../assets/vendor_components/fastclick/lib/fastclick.js"></script>
  
  <!-- Crypto_Admin App -->
  <script src="../js/transaction.js"></script>
  
  <!-- Crypto_Admin for demo purposes -->
  <script src="../js/demo.js"></script>
  <script src="../js/template.js"></script>  
  
  <!-- Crypto_Admin for advanced form element -->
  <script src="../js/pages/advanced-form-element.js"></script>

  <script>
    $(document).ready(function(){
        var now = moment().format("MM/DD/YYYY");
        $("#datepicker").val(now);
        $('#qty').val('1');
        $('#totalqty').val('0');

      $('#qty').keyup(function(){
          var qty = $('#qty').val();
      });
      $('#qty').keypress(function(e){
        if(e.which == 13)
        {
          AddRow();
          e.preventDefault();
        }
      });
      $('#btnsave').click(function(){  
         var voucher = $('#voucherno').val();
         var date = $('#datepicker').val();
         var totalqty = $('#totalqty').val();
         var type = $('#type').val();
         var table = document.getElementById("adjustmenttable");
         var count = table.rows.length;
      
        if(count > 0)
        { 
          var header={type:type,voucher:voucher,date:date,totalqty:totalqty};
          var body = new Array();
          for(var i =1;i < count;i++)
          {   
              var row={id:i,code:table.rows[i].cells[1].innerHTML,currency:table.rows[i].cells[2].innerHTML,qty:table.rows[i].cells[3].innerHTML};
              body.push(row);    
          }
          var jsonheader = JSON.stringify(header);
          var jsondetail = JSON.stringify(body);
          $.ajax({
            url:"../dao/transaction.php",
            method:"post",
            data:{aheader:jsonheader,adetail:jsondetail},
            success:function(data){
                    window.location.href="adjustment.php";
                    //window.open("adjustmentvoucher.php?syskey=data");
                    alert(data);
            }
        });
      }
      else{
          alert("Please Fill Information!");
        return;
       }
     });
   });

function DeleteRow()
{
  var index,table = document.getElementById("adjustmenttable");
  var totamount = 0;var delamt = 0;var qty=0;var amount=0;
  var totqty = parseFloat($("#totalqty").val());
    for(var i = 1; i< table.rows.length;i++)
    {
      qty = table.rows[i].cells[3].innerHTML;
      table.rows[i].cells[4].onclick=function()
      {
        index=this.parentElement.rowIndex;
        table.deleteRow(index);
      }
    }
    totqty-=qty;
    $('#totalqty').val(totqty);
  }
  function showDialog(){
  document.getElementById("overlay").style.display="block";
  document.getElementById("ratedialog").style.display="block";
    }

function hideDialog(){
    document.getElementById("overlay").style.display="none";
    document.getElementById("ratedialog").style.display="none";
  }
  function AddRow()
  {
      var table = document.getElementById("adjustmentlist");
      var newid = table.rows.length+1;
      var qty = $("#qty").val();
      var currency=$("#currency option:selected").text();
      var code=$("#currency").val();      
      var totqty = parseFloat($("#totalqty").val());
      totqty += parseFloat(qty);
      var str='<tr class="bg-pale-dark">\n\
      <td>' + newid + '</td>\n\
      <td>' + code + '</td>\n\
      <td>' + currency + '</td>\n\
      <td>' + qty + '</td>\n\
      <td><a class="fa fa-close" id="delbtn" href="#" onclick="DeleteRow()">Delete</a></td></tr>';
        $("#adjustmentlist").append(str); 
        $("#qty").val("1"); 
        $('#totalqty').val(totqty);
        $('#currency').focus();
  }
  function QtyFocus(){
        $('#qty').focus();         
    }
  </script>
</body>
</html>
