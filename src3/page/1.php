
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from crypto-admin-templates.multipurposethemes.com/src3/pages/currency-ex/exchange.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Sep 2018 04:34:56 GMT -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
    
  <!-- daterange picker --> 
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
   
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../assets/vendor_plugins/iCheck/all.css">
  
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">
  
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- numpad -->
  <link href="docs/css/jquery-ui.min.css" rel="stylesheet">
  <link href="css/keyboard.css" rel="stylesheet">
  <link href="docs/css/demo.css" rel="stylesheet">
  <link href="docs/css/tipsy.css" rel="stylesheet">
  <link href="docs/css/prettify.css" rel="stylesheet">

</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div id="overlay" onclick="hideDialog()"></div>
<div id="inputoverlay" onclick="hideInput()"></div>
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
                <input type="text" class="form-control" id = "search" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
      </form>
          </li>     
      
          <!-- Messages -->
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ဆုမဲအ၀ယ္စာရင္း
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">ဆုမဲအ၀ယ္</li>
      </ol>
    </section>

    <section class="content"> 
      <div class="box">
        <div class="box-header with-border">
           <div class="row">
              <div class="col-lg-2">
              <button class="col-md-10 btn btn-block btn-md btn-info" id="btnNew" onclick="Clear('<?php echo$formno; ?>');"><i class="fa fa-exchange"></i>&nbsp;New</button>
              </div>
              <div class="col-lg-2">
              <button class="col-md-10 btn btn-block btn-md btn-info" id="btnNew" onclick="Clear('<?php echo$formno; ?>');"><i class="fa fa-exchange"></i>&nbsp;Print</button>
              </div>
              <div class="col-lg-2">
              <button class="col-md-10 btn btn-block btn-md btn-info" id="btnNew" onclick="Clear('<?php echo$formno; ?>');"><i class="fa fa-exchange"></i>&nbsp;Excel</button>
              </div>
            </div>
        </div>

        <div class="box-body">
          <div class="col-12">
            <div class="clear"></div>
            <div class="row">
              <div class="form-group col-lg-2">
              <input type="hidden" id="sys" value="0" disabled>
              <label>Voucher No :</label>
              <input type="text" class="form-control" value="<?php echo$formno; ?>" disabled id="voucherno">
              </div>

              <div class="form-group col-lg-4">
              <label>Customer :</label><br>
                <input type="text" class="form-control" id="num">
              </div>
              
              <div class="form-group col-lg-2">
                <label>Exchange Date :</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" disabled>
                </div>
              </div>

            </div>
          <div class="clear"></div>
          <div class="col-12">
           <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid" id="exchangetable">
              <thead>
                <tr class="bg-blue">
                  <th class="text-secondary">No</th>
                  <th class="text-secondary">Code</th>
                  <th class="text-secondary">Description</th>
                  <th class="text-secondary">Rate</th>
                  <th class="text-secondary">Unit</th>
                  <th class="text-secondary">Qty</th>
                  <th class="text-secondary">Amount</th>
                  <th class="text-secondary">Action</th>
                </tr>
              </thead>
                <tbody id="exchangelist">
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
           <div class="form-group col-lg-2">
              <label>Total Amount :</label>
              <input type ="text" class="form-control" disabled id="totalamount">
           </div>
           <div class="col-lg-2">
              <label>.</label>
              <button type ="button" class="btn btn-block btn-md btn-info" id="btnsave"><i class="fa fa-exchange"></i>&nbsp;Exchange</button>
           </div>
           <div class="col-lg-2">
              <label>.</label>
              <button type ="button" class="btn btn-block btn-md btn-info" id="btnnew" onclick="Clear(<?php echo$formno; ?>)"><i class="fa fa-share-square-o"></i>&nbsp;New</button>
           </div>
           <div class="col-lg-2">
              <label>.</label>
              <button type ="button" class="btn btn-block btn-md btn-info" onclick="hideDialog()" id="btnclose"><i class="fa fa-close"></i>&nbsp;Close</button>
           </div>
         </div>
        </div>
      </div>
        </div>

      </div>
    </section>

  </div>

    <div id="dialog">
    </div>

 <div id="alertinput">
    <div class="box">
      <div class="col-12">
        <div class="form-group">
              <label>Enter Qty :</label>
              <input type ="text" class="form-control" id="editqty">
              <input type ="hidden" class="form-control" id="editindex">
        </div>
        <div class="form-group col-6">
              <button class="btn btn-block btn-md btn-warning" id="btnOK"><i class="fa fa-edit"></i>&nbsp;OK</button>
        </div>
      </div>
    </div>
  </div>


    <div class="block">
    <h2>
      <span class="tooltip-tipsy" title="Click, then scroll down to see this code">Num Pad</span>
    </h2>
    <input id="num" class="alignRight" type="text">
    <br>
    <small>
      * Input restricted.<br>
      * Pasting (ctrl-v) not allowed.<br>
      * Auto accept content.
    </small>
    <div class="code ui-corner-all">
      <h4>HTML</h4>
      <pre class="prettyprint lang-html">&lt;input id="num" class="alignRight" type="text"&gt;</pre>
      <h4>Script</h4>
      <pre class="prettyprint lang-js">$('#num')
  .keyboard({
    layout : 'num',
    restrictInput : true, // Prevent keys not in the displayed keyboard from being typed in
    preventPaste : true,  // prevent ctrl-v and right click
    autoAccept : true
  })
  .addTyping();</pre>
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
  <script src="../s/demo.js"></script>
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

  <script src="../js/template.js"></script>
  
  <!-- Crypto_Admin for advanced form element -->
  <script src="../js/pages/advanced-form-element.js"></script>

  <!-- numpad -->
  <script src="docs/js/jquery-latest.min.js"></script>
  <script src="docs/js/jquery-ui.min.js"></script>
  <script src="js/jquery.keyboard.js"></script>
  <script src="docs/js/demo.js"></script>
  <script src="docs/js/jquery.tipsy.min.js"></script>
  <script src="docs/js/prettify.js"></script> <!-- syntax highlighting -->
  <script src="js/jquery.mousewheel.js"></script>
  <script src="js/jquery.keyboard.extension-typing.js"></script>
  <script src="js/jquery.keyboard.extension-autocomplete.js"></script>
  <script src="js/jquery.keyboard.extension-caret.js"></script>

</body>

<!-- Mirrored from crypto-admin-templates.multipurposethemes.com/src3/pages/currency-ex/exchange.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Sep 2018 04:34:58 GMT -->
</html>
