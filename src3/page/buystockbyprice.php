<?php  
include("../confs/config.php");
//include("../confs/auth.php");
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
<!-- Select2 -->
  <link rel="stylesheet" href="../../assets/vendor_components/select2/dist/css/select2.min.css">
<!-- Bootstrap extend-->
  <link rel="stylesheet" href="../css/bootstrap-extend.css">
<!-- Theme style -->
  <link rel="stylesheet" href="../css/master_style.css">
  <!-- theme style -->
  <link rel="stylesheet" href="../css/Styles.css">

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

  <!-- numpad -->
  <link href="../docs/css/jquery-ui.min.css" rel="stylesheet">
  <link href="../css/keyboard.css" rel="stylesheet">
  <link rel="stylesheet" href="../docs/css/bootstrap.min.css">
  <link rel="stylesheet" href="../docs/css/font-awesome.min.css">
  <link href="../docs/css/demo.css" rel="stylesheet">
  <link href="../docs/css/tipsy.css" rel="stylesheet">
  <link href="../docs/css/prettify.css" rel="stylesheet">

</head>
<body class="hold-transition skin-yellow sidebar-mini">
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
            <div class="app-search" style="display: none;">
                <input type="text" class="form-control" id = "search" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
            </div>
          </li>     
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../image/moeyan.jpg" class="user-image rounded-circle" alt="User Image">
            </a>
          </li>
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
        ေစ်းနုတ္းအလိုက္ဆုမဲအ၀ယ္စာရင္း
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Report</li>
        <li class="breadcrumb-item active">ေစ်းနုတ္းအလိုက္ဆုမဲအ၀ယ္စာရင္း</li>
      </ol>
    </section>



    <section class="content"> 
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-lg-4">
              <label>Date range:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
              </div>
            <div class="col-lg-2">
              <label>Round/အၾကိမ္:</label>
              <select class="form-control" id="times">
                <option value="0" selected="selected">ALL</option>
                <option value="1">Sale</option>
                <option value="2">Buy</option>
              </select>
            </div>
            <div class="col-lg-2">
              <label>Location/ဆိုင္:</label>
              <select class="form-control" id="location">
                <option value="0" selected="selected">ALL</option>
                <option value="1">Cash</option>
                <option value="2">Credit</option>
              </select>
            </div>
              <div class="col-lg-1">
              <label>  .</label>
              <button class="btn btn-block btn-lg btn-success" id="btnsearch"><i class="fa fa-search"></i></button>
            </div>
            <div class="col-lg-1">
              <label>  .</label>
              <button class="btn btn-block btn-lg btn-success" id="btnreport" onclick="Clickheretoprint();"><i class="fa fa-print"></i></button>
            </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="box-body" id="content">
          <div class="row" style="justify-content: center;">
            <label>ဆုမဲအ၀ယ္စာရင္း(၀ယ္ေစ်းအလုိက္)</label>
          </div>
          <div class="row"> 
          <div class="col-12">             
            <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid" id="salegrid">
              <thead>
                <tr class="bg-dark">
                  <th class="text-lighter">စဥ္</th>
                  <th class="text-lighter">ေန့စြဲ</th>
                  <th class="text-lighter">ဆုမဲအမ်ိဳးအစား</th> 
                  <th class="text-lighter">ေငြပမာဏ</th>                  
                  <th class="text-lighter">အေရအတြက္</th>
                  <th class="text-lighter">စုစုေပါင္းေငြပမာဏ</th>
                </tr>
              </thead>
            </table>
            </div>
          </div>
        </div>  
      </div>
    </section>


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
  <script src="../js/demo.js"></script>
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
  
  <!-- Crypto_Admin for demo purposes -->
  <script src="../js/demo.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/lotteryprize.js"></script>  
  
  <!-- Crypto_Admin for advanced form element -->
  <script src="../js/pages/advanced-form-element.js"></script>

  <script language="javascript">
    $(document).ready(function(){
      alert();
    });

    $('#btnsearch').on('click',function(){
      var date = $('#reservation').val();//$('#type option:selected').val();
      var d = date.split("-");
      var fdate = d[0].trim();
      var tdate = d[1].trim();
      var times = $('#times').val();
      var location = $('#location').val(); 

      $.ajax({
      url:"../dao/cashbook.php",
      method:"post",
      data:{buystock:'',fdate:fdate,tdate:tdate,times:times,location:location},
      success:function(data){
          var header = JSON.parse(data);
          var str = "";var saletotal= 0;
          for(var i = 0; i < header[0].length; i++){
              str += '<tr class="bg-pale-dark">\n\
                  <td>' + i + '</td>\n\
                  <td>' + header[0][i].date + '</td>\n\
                  <td>' + header[0][i].description + '</td>\n\
                  <td>' + header[0][i].amount + '</td>\n\
                  <td>' + header[0][i].qty + '</td>\n\
                  <td>' + header[0][i].qty*header[0][i].amount + '</td></tr>'; 
                  saletotal += header[0][i].qty*header[0][i].amount; 
          }
          str += '<tr class="bg-pale-dark">\n\
                  <td colspan="5">Total Amount</td><td>' + saletotal + '</td>';      
          $("#salegrid").append(str);
        }
      });
    });

  function Clickheretoprint()
  { 
    var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=100, height=400, left=10, top=25"; 
    var content_vlue = document.getElementById("content").innerHTML; 
  
    var docprint=window.open("","",disp_setting); 
    docprint.document.open(); 
    docprint.document.write('</head><body onLoad="self.print()" style="width: 100; font-size:11px; font-family:arial; font-weight:normal;">');          
    docprint.document.write(content_vlue); 
    docprint.document.close(); 
    docprint.focus(); 
}
</script>

</body>
</html>
