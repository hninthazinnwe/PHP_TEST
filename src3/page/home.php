<?php  
include("../confs/config.php");
//include("../confs/auth.php");

  $result=mysqli_query($conn,"SELECT lp.id, lp.syskey, lp.createdDate, lp.modifiedDate, lp.createdUser, lp.modifiedUser, lp.lotteryDate, lp.formNo, lp.times, lp.n1, lp.n2, lp.n3, lp.t1, lp.t2, lp.t3, lp.status FROM lotteryprize lp INNER JOIN lotteryprizedetail lpd on lp.syskey = lpd.hsyskey WHERE lp.status <> 4 GROUP BY lp.id, lp.syskey, lp.createdDate, lp.modifiedDate, lp.createdUser, lp.modifiedUser, lp.lotteryDate, lp.formNo, lp.times, lp.n1, lp.n2, lp.n3, lp.t1, lp.t2, lp.t3, lp.status");

  $vouchercount=mysqli_query($conn,"select count(id) as count from lotteryprize");
  $row=mysqli_fetch_assoc($vouchercount);
  $c= $row["count"];
  $formno = generate_numbers(++$c, 1, 6);
  $prizetype=mysqli_query($conn,"select * from prizetype where status <>4 ");  

  function generate_numbers($start, $count, $digits) {
    $num = str_pad($start, $digits, "0", STR_PAD_LEFT);
    return $num;
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
<!-- Select2 -->
  <link rel="stylesheet" href="../../assets/vendor_components/select2/dist/css/select2.min.css">
<!-- Bootstrap extend-->
  <link rel="stylesheet" href="../css/bootstrap-extend.css">
<!-- Theme style -->
  <link rel="stylesheet" href="../css/master_style.css">
  <!-- theme style -->
  <link rel="stylesheet" href="../css/Styles.css">

    <!--amcharts -->
  <link href="../../www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />
  
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

  <style>
    table#lotteryprizetable tr td:nth-child(2), td:nth-child(6),th:nth-child(2), th:nth-child(6)  {
   display: none;
   }

  #seraildialog{
  position: absolute;
  top: 5%;
  left: 30%;
  width: 30%;
  border-top: 5px solid #4286f4;
  background: #ddd;
  border-radius: 3px;
  display: none;
  z-index: 1013;
}
  </style>

</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div id="overlay" onclick="hideDialog()"></div>
<div id="serialoverlay" onclick="hideSerial()"></div>
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
          <li class="dropdown-toggle">
            <a class="btn btn-block btn-info btn-sm" id="btnsearch">ထီတိုက္ရန္</a>
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
<div class="content-wrapper" style="background-image: linear-gradient(#4286f4, #fff)">

  <section class="content-header">
      <h1>
        (၂၃) ၾကမ္ေျမာက္ ေအာင္ဘာေလ ထီေပါက္စဥ္
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">ဆုမဲအ၀ယ္</li>
      </ol>
  </section>

    <!-- Content Header (Page header) -->
    <section class="content"> 
    
    <div class="row" style="justify-content: center;">
      
      <div class="col-3 col-md-3 col-xl-5">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h1 class="mt-5 text-warning">က်ပ္သိန္း(၁၀၀၀၀)ဆု</h1>
          <h3 class="text-fade">ဏ၄၅၀၉၀၈</h3>
        </div>
        </a>
      </div>

    </div>
    <div class="clear"></div>
    <div class="row" style="justify-content: center;"> 
      
      <div class="col-4 col-md-4 col-xl-4">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h3 class="mt-5 text-dark">က်ပ္သိန္း(၅၀၀၀)ဆု</h3>
          <h5 class="text-fade">က၁၂၃၄၅၆</h5>
        </div>
        </a>
      </div>

      <div class="col-4 col-md-4 col-xl-4">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h3 class="mt-5 text-dark">က်ပ္သိန္း(၅၀၀၀)ဆု</h3>
          <h5 class="text-fade">မ၃၄၀၈၉၃</h5>
        </div>
        </a>
      </div>

      </div>
     <div class="clear"></div>
    <div class="row" style="justify-content: center;"> 
      
      <div class="col-4 col-md-6 col-xl-3">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h4 class="mt-5 text-dark">က်ပ္သိန္း(၃၀၀၀)ဆု</h4>
          <h5 class="text-fade">က၁၂၃၄၅၆</h5>
        </div>
        </a>
      </div>

      <div class="col-4 col-md-6 col-xl-3">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h4 class="mt-5 text-dark">က်ပ္သိန္း(၃၀၀၀)ဆု</h4>
          <h5 class="text-fade">မ၃၄၀၈၉၃</h5>
        </div>
        </a>
      </div>

      <div class="col-4 col-md-6 col-xl-3">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h4 class="mt-5 text-dark">က်ပ္သိန္း(၃၀၀၀)ဆု</h4>
          <h5 class="text-fade">မ၃၄၀၈၉၃</h5>
        </div>
        </a>
      </div>

      </div>

    <div class="clear"></div>
    <div class="row" style="justify-content: center;"> 
      
      <div class="col-4 col-md-6 col-xl-2">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h6 class="mt-5 text-dark">က်ပ္သိန္း(၁၀၀၀)ဆု</h6>
          <h5 class="text-fade">က၁၂၃၄၅၆</h5>
        </div>
        </a>
      </div>

      <div class="col-4 col-md-6 col-xl-2">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h6 class="mt-5 text-dark">က်ပ္သိန္း(၁၀၀၀)ဆု</h6>
          <h5 class="text-fade">မ၃၄၀၈၉၃</h5>
        </div>
        </a>
      </div>

      <div class="col-4 col-md-6 col-xl-2">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h6 class="mt-5 text-dark">က်ပ္သိန္း(၁၀၀၀)ဆု</h6>
          <h5 class="text-fade">က၁၂၃၄၅၆</h5>
        </div>
        </a>
      </div>

      <div class="col-4 col-md-6 col-xl-2">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h6 class="mt-5 text-dark">က်ပ္သိန္း(၁၀၀၀)ဆု</h6>
          <h5 class="text-fade">မ၃၄၀၈၉၃</h5>
        </div>
        </a>
      </div>      

      <div class="col-4 col-md-6 col-xl-2">
        <a class="box box-link-shadow text-center pull-up" href="javascript:void(0)">
        <div class="box-body py-25">
          <h6 class="mt-5 text-dark">က်ပ္သိန္း(၁၀၀၀)ဆု</h6>
          <h5 class="text-fade">မ၃၄၀၈၉၃</h5>
        </div>
        </a>
      </div>

      </div>
    </section>
</div>

   <div id="seraildialog">
    <div class="box">
      <div class="col-12">
        <div class="row">

          <ul  id="list">
          </ul>
        </div>
        <div class="row">
        <div class="form-group col-lg-4">
              <label>အကၡရာ :</label>
              <input type ="text" class="form-control" id="key">
        </div>
        <div class="form-group col-lg-4">  
              <label>ဂဏန္း :</label>
              <input type ="text" class="form-control" id="hex">
        </div>
        <div class="form-group col-lg-3" id="serial" style="display: none;">  
              <label>အေရအတြက္ :</label>
              <input type ="text" class="form-control" id="hex1">
        </div>
        <div class="form-group col-sm-2" style="display: none;">
              <label></label>
              <button class="btn btn-block btn-info" id="btnSerial"><i class="fa fa-plus"></i></button>
        </div> 
        </div>

        <div class="row">
          <div class="col-lg-4">
            <button class="btn btn-block btn-md btn-success" id="btnAdd"><i class="fa fa-save"></i>&nbsp;OK</button>
          </div>
          <div class="col-lg-4">
            <button class="btn btn-block btn-md btn-success" id="btnClose" onclick="hideSerial()"><i class="fa fa-search"></i>Search</button>
          </div>
          <div class="col-lg-3">
            <label class="mr-25" id='qty'>0</label><label class="mr-25">ခု</label>            
          </div>
        </div>      
    </div>
    <div class="clear"></div>
    </div>
  </div>


 <div id="alertinput">
    <div class="box">
      <div class="col-12">
        <div class="form-group">
              <label>အကၡရာနံပါတ္:</label>
              <input type ="text" class="form-control" id="input">
              <input type ="hidden" class="form-control" id="edittype">
              <input type ="hidden" class="form-control" id="editindex">
        </div>
        <div class="row">
        <div class="form-group col-6">
              <button class="btn btn-block btn-md btn-success" id="btninsert"><i class="fa fa-edit"></i>&nbsp;OK</button>
        </div>
        <div class="form-group col-6">
              <button class="btn btn-block btn-md btn-success" id="btninputdel"><i class="fa fa-times"></i>&nbsp;Delete</button>
        </div>
      </div>
      </div>
    </div>
  </div>

<div style="display: none;">
<div class="block" id="autocomplete">
    <input id="text" type="hidden" placeholder=" Enter something..." >
    <br>
    <div class="code ui-corner-all">
      <h4>HTML</h4>
      <pre class="prettyprint lang-html">&lt;input id="text" type="text" placeholder=" Enter something..."&gt;</pre>
      <h4>Script</h4>
      <pre class="prettyprint lang-js">// Autocomplete demo
var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure",
  "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript",
  "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme" ];

$('#text')
  .keyboard({ layout: 'qwerty' })
  .autocomplete({
    source: availableTags
  })
  // position options added after v1.23.4
  .addAutocomplete({
    position : {
      of : null,        // when null, element will default to kb.$keyboard
      my : 'right top', // 'center top', (position under keyboard)
      at : 'left top',  // 'center bottom',
      collision: 'flip'
    }
  })
  .addTyping();</pre>
    </div>
  </div>



  <div class="block">
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



    <div class="block">
    <h2>
      <span class="tooltip-tipsy" title="Click, then scroll down to see this code">Custom: Hex</span>
    </h2>
    <input id="hex" type="hidden">
    <br>
    <small>
      * maxLength = 6.<br>
      * Input restricted.<br>
      * Lowercase included.<br>
      * Valid @ length = 6.
    </small>
    <div class="code ui-corner-all">
      <h4>HTML</h4>
      <pre class="prettyprint lang-html">
&lt;input id="hex" type="text"&gt;</pre>
      <h4>Script</h4>
      <pre class="prettyprint lang-js">$('#hex')
  .keyboard({
    layout: 'custom',
    customLayout: {
      'normal' : [
        '1 2 3 {bksp}',
        '4 5 6 .',
        '7 8 9 +',
        '  0 , -',
        '  {a} {c} '
      ]
    },
    maxLength : 6,
    // Prevent keys not in the displayed keyboard from being typed in
    restrictInput : true,
    // include lower case characters (added v1.25.7)
    restrictInclude : 'a b c d e f',
    // don't use combos or A+E could become a ligature
    useCombos : false,
    // activate the "validate" callback function
    acceptValid : true,
    validate : function(keyboard, value, isClosing){
      // only make valid if input is 6 characters in length
      return value.length === 6;
    }
  })
  .addTyping();</pre>
    </div>
  </div>


    <div class="block">
    <h2>
      <span class="tooltip-tipsy" title="Click, then scroll down to see this code">Custom: Hex</span>
    </h2>
    <input id="hex" type="hidden">
    <br>
    <small>
      * maxLength = 6.<br>
      * Input restricted.<br>
      * Lowercase included.<br>
      * Valid @ length = 6.
    </small>
    <div class="code ui-corner-all">
      <h4>HTML</h4>
      <pre class="prettyprint lang-html">
&lt;input id="hex" type="text"&gt;</pre>
      <h4>Script</h4>
      <pre class="prettyprint lang-js">$('#hex')
  .keyboard({
    layout: 'custom',
    customLayout: {
      'normal' : [
        '1 2 3 {bksp}',
        '4 5 6 .',
        '7 8 9 +',
        '  0 , -',
        '  {a} {c} '
      ]
    },
    maxLength : 6,
    // Prevent keys not in the displayed keyboard from being typed in
    restrictInput : true,
    // include lower case characters (added v1.25.7)
    restrictInclude : 'a b c d e f',
    // don't use combos or A+E could become a ligature
    useCombos : false,
    // activate the "validate" callback function
    acceptValid : true,
    validate : function(keyboard, value, isClosing){
    // only make valid if input is 6 characters in length
    return value.length === 6;
    }
  })
  .addTyping();</pre>
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

    <!-- webticker -->
  <script src="../../assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js"></script>
    <!-- Slimscroll -->
  <script src="../../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
  
  <!-- Crypto_Admin for demo purposes -->
  <script src="../js/demo.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/lotteryprize.js"></script>  
  
  <!-- Crypto_Admin for advanced form element -->
  <script src="../js/pages/advanced-form-element.js"></script>

      <!--amcharts charts -->
  <script src="../../www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/gauge.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/pie.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/plugins/animate/animate.min.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/themes/patterns.js" type="text/javascript"></script>
  <script src="../../www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script> 

  <!-- numpad -->
  <script src="../docs/js/jquery-latest.min.js"></script>
  <script src="../docs/js/jquery-ui.min.js"></script>
  <script src="../js/jquery.keyboard.js"></script>
  <script src="../docs/js/bootstrap.min.js"></script>
  <script src="../docs/js/demo.js"></script>
  <script src="../docs/js/jquery.tipsy.min.js"></script>
  <script src="../docs/js/prettify.js"></script> <!-- syntax highlighting -->
  <script src="../js/jquery.mousewheel.js"></script>
  <script src="../js/jquery.keyboard.extension-typing.js"></script>
  <script src="../js/jquery.keyboard.extension-autocomplete.js"></script>
  <script src="../js/jquery.keyboard.extension-caret.js"></script>

  <script type="text/javascript">
      $('#btnsearch').click(function(){          
            document.getElementById('seraildialog').style.display="block";
            document.getElementById('serialoverlay').style.display="block";
        });

      $('#btnAdd').click(function(){
            var alpha = $('#key').val();
            var number = $('#hex').val();
            var other = $('#hex1').val();
            var d = other.split(",");
            var length = d.length;

            if(d[0]=='င္')
            {
               var c =  d[1];
               var str="<li class='btn btn-sm btn-info divpad'>"+alpha+number+"</li>";
               $("#list").append(str);
               for(var i = 1 ; i<= c ;i++)
                {
                    var serial = parseFloat(number)+i;
                    var str="<li class='btn btn-sm btn-info divpad'>"+alpha+serial+"</li>";
                    $("#list").append(str); 
                    alert(serial);
                }
            }
            else if(d[0]=='မႊာ')
            {
                var c =  d[1];
                var serial = parseFloat(number)+i;
                var str="<li class='btn btn-sm btn-info divpad'>"+alpha+number+"</li>";
                $("#list").append(str);
                for(var i = 1 ; i<= c ;i++)
                {
                    var alphabet = ["က","ခ","ဂ","ဃ","င","စ","ဆ","ဇ","ဈ","ည","ဋ","ဌ","ဍ","ဎ","ဏ","တ","ထ","ဒ","ဓ","န","ပ","ဖ","ဗ","ဘ","မ","ယ","ရ","လ","ဝ","သ","ဟ","ဠ","အ","ကက","ကခ","ကဂ","ကဃ","ကင","ကစ","ကဆ","ကဇ","ကဈ","ကည","ကဋ","ကဌ","ကဍ","ကဎ","ကဏ","ကတ","ကထ","ကဒ","ကဓ","ကန","ကပ","ကဖ","ကဗ","ကဘ","ကမ","ကယ","ကရ","ကလ","ကဝ","ကသ","ကဟ","ကဠ","ကအ"];
                    var a = alphabet.indexOf(alpha);
                    var serial = alphabet[a+i];
                    var str="<li class='btn btn-sm btn-info divpad'>"+serial+number+"</li>";
                    $("#list").append(str);                     
                }
            }
            else
            { 
                var str="<li class='btn btn-sm btn-info divpad'>"+alpha+number+"</li>";
                $("#list").append(str);
                var count = $("ul#list li").length;            
                $('#qty').html(count);
                $('#key').val('');
                $('#hex').val('');
                $('#hex1').val('');
                document.getElementById('serial').style.display='none';

                for(var i = 1 ; i<= length ;i++){
                  var num = d[i];
                  var l = number.length;
                  var n = num.length;
                  var res = number.substr(0, l-n);
                  var serail=res+num;
                  var str="<li class='btn btn-sm btn-info divpad'>"+alpha+serail+"</li>";
                  $("#list").append(str);
                  var count = $("ul#list li").length;            
                  $('#qty').html(count);
                  $('#key').val('');
                  $('#hex').val('');
                  $('#hex1').val('');
                  document.getElementById('serial').style.display='none';
                }                
            }

            var count = $("ul#list li").length;            
            $('#qty').html(count);
            $('#key').val('');
            $('#hex').val('');
            $('#hex1').val('');
            document.getElementById('serial').style.display='none';
        });

    function hideSerial(){
    var arr = [];

    $('ul#list li').each(function(){
      arr.push($(this).text());
    });
    var number = JSON.stringify(arr);
    for(var i = 0 ;i<arr.length;i++)
    {
      $.ajax({
            url:"../dao/lotteryprize.php",
            method:"post",
            data:{keysearch:number},
            success:function(data){
              var result = JSON.parse(data);
              if(result == null)
              {
                alert("ေက်းဇူးတင္ပါတယ္။");
              }
              else
              {
                alert(result.description+'ဆု');
              }
            }              
        });
    }

    document.getElementById("serialoverlay").style.display="block";
    document.getElementById("seraildialog").style.display="block";       
  }
  </script>
</body>
</html>
