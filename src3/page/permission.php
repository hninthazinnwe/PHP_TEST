<?php  
include("../confs/config.php");

$location=mysqli_query($conn,"select * from location where status <>4 ");
$staff=mysqli_query($conn,"select * from staff where status <>4 ");

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
    <title>Moe Yan Ledger</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
<!-- Bootstrap 4.0-->
  <!-- Bootstrap 4.0-->
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
  <link rel="stylesheet" href="../css/Styles.css">
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
        PERMISSION
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">User Permission</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <div class="row">       
      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
           <div class="row">         
              <div class="col-lg-3 col-12">
                  <label class="mr-25">Choose Staff</label>
                  <select class="form-control" id="staff">
                    <option value="0" selected="selected" disabled="disabled">Default</option>
                    <?php while($row = mysqli_fetch_assoc($staff)):  ?>
                    <option value="<?php echo $row['syskey']; ?>"><?php echo $row['name']; ?></option>
                    <?php endwhile; ?>s
                  </select>
                  <input type="checkbox" id="c" class="filled-in chk-col-yellow" checked />
              </div>

              <div class="col-lg-3 col-12">
                  <label class="mr-25">Choose Location</label>
                  <select class="form-control" id="location">
                    <option value="0" selected="selected" disabled="disabled">Default</option>
                    <?php while($row = mysqli_fetch_assoc($location)):  ?>
                    <option value="<?php echo $row['syskey']; ?>"><?php echo $row['description']; ?></option>
                    <?php endwhile; ?>s
                  </select>
                  <input type="checkbox" id="c" class="filled-in chk-col-yellow" checked />
              </div> 

            <div class="col-lg-4 col-12">
              <label>.</label>
              <div class="row">
              <ul id="list"></ul>
            </div>
            </div>
          </div>

            <div class="row">
              <div class="col-lg-2">
              <label>.</label>
              <button class="btn btn-block btn-md btn-info" id="btncheckall"><i class="fa fa-file-excel-o"></i>&nbsp;CheckAll</button>
              </div>

              <div class="col-lg-2">
              <label>.</label>
              <button class="btn btn-block btn-md btn-info" id="btnuncheckall"><i class="fa fa-file-excel-o"></i>&nbsp;UnCheckAll</button>
              </div>

              <div class="col-lg-2">
              <label>.</label>  
              <button class="btn btn-block btn-md btn-info" id="btnsave"><i class="fa fa-file-excel-o"></i>&nbsp;Save</button>
              </div>

            </div>
          </div>
          <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid">
              <thead>
                <tr class="bg-dark">
                  <th style="width: 50px;" class="text-lighter">No</th>
                  <th style="width: 150px;" class="text-lighter">Code</th>
                  <th style="width: 500px;" class="text-lighter">Rule</th>
                  <th class="text-lighter">View</th>
                  <th class="text-lighter">Create/Edit</th>
                  <th class="text-lighter">All</th>
                </tr>
              </thead>
                <tbody id="permission">
                 <tr>
                    <td> 1</td>
                    <td>R-001</td>
                    <td style="width: 500px;">Lottery Prize/ထီေပါက္စဥ္</td>
                    <td style="width: 100px;"><div class="demo-checkbox">
                        <input type="checkbox" id="lp1" class="filled-in chk-col-blue"  /><label for="lp1">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="lp2" class="filled-in chk-col-blue"  /><label for="lp2">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="lp3" class="filled-in chk-col-blue"  /><label for="lp3">&nbsp;</label>
                    </div></td>                   
                </tr>

                <tr>
                    <td> 2</td>
                    <td>R-002</td>
                    <td style="width: 500px;">Buy/ဆုမဲအ၀ယ္</td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="b1" class="filled-in chk-col-blue"  /><label for="b1">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="b2" class="filled-in chk-col-blue"  /><label for="b2">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="b3" class="filled-in chk-col-blue"  /><label for="b3">&nbsp;</label>
                    </div></td>                   
                </tr>

                <tr>
                    <td> 3</td>
                    <td>R-003</td>
                    <td style="width: 500px;">Sale/ဆုမဲအေရာင္း</td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="s1" class="filled-in chk-col-blue"  /><label for="s1">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="s2" class="filled-in chk-col-blue"  /><label for="s2">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="s3" class="filled-in chk-col-blue"  /><label for="s3">&nbsp;</label>
                    </div></td>                   
                </tr>

                <tr>
                    <td> 4</td>
                    <td>R-004</td>
                    <td style="width: 500px;">Transfer/ဆုမဲအလဲအလွယ္</td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="t1" class="filled-in chk-col-blue"  /><label for="t1">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="t2" class="filled-in chk-col-blue"  /><label for="t2">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="t3" class="filled-in chk-col-blue"  /><label for="t3">&nbsp;</label>
                    </div></td>                   
                </tr>

                <tr>
                    <td> 5</td>
                    <td>R-005</td>
                    <td style="width: 500px;">Setup</td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="st1" class="filled-in chk-col-blue"  /><label for="st1">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="st2" class="filled-in chk-col-blue"  /><label for="st2">&nbsp;</label>
                    </div></td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="st3" class="filled-in chk-col-blue"  /><label for="st3">&nbsp;</label>
                    </div></td>                   
                </tr>

                <tr>
                    <td> 6</td>
                    <td>R-006</td>
                    <td style="width: 500px;">Report</td>
                    <td style="width: 50px;"><div class="demo-checkbox">
                        <input type="checkbox" id="r1" class="filled-in chk-col-blue"  /><label for="r1">&nbsp;</label>
                    </div></td>                 
                </tr>
                
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
    
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
  <!-- jQuery 3 -->
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
  <script src="../js/template.js"></script>
  
  <!-- Crypto_Admin for demo purposes -->
  <script src="../js/demo.js"></script>
  
  <!-- Crypto_Admin for advanced form element -->
  <script src="../js/pages/advanced-form-element.js"></script>

  <script>
  $(document).ready(function(){
  });
  $('#location').on('change',function(){
    var locsys = $('#location option:selected').val();
    var locname = $('#location option:selected').html();
    var str="";
    str += "<li class='btn btn-sm btn-info divpad' name='"+locsys+"' >"+locname+"</li>";
    $('#list').append(str);
  });
  $('#btnsave').on('click',function(){
    var table = document.getElementById("permission");
    var rule = new Array();
      if($('#lp1'). prop("checked") == true){
           var row={code:table.rows[0].cells[1].innerHTML,description:table.rows[0].cells[2].innerHTML,rule:1};
           rule.push(row);      
        }
      if($('#lp2'). prop("checked") == true){
           var row={code:table.rows[0].cells[1].innerHTML,description:table.rows[0].cells[2].innerHTML,rule:2};
           rule.push(row);    
        }
      if($('#lp3'). prop("checked") == true){
           var row={code:table.rows[0].cells[1].innerHTML,description:table.rows[0].cells[2].innerHTML,rule:3};
           rule.push(row);    
        }
      if($('#b1'). prop("checked") == true){
           var row={code:table.rows[1].cells[1].innerHTML,description:table.rows[1].cells[2].innerHTML,rule:1};
           rule.push(row);    
        }
      if($('#b2'). prop("checked") == true){
           var row={code:table.rows[1].cells[1].innerHTML,description:table.rows[1].cells[2].innerHTML,rule:2};
           rule.push(row);    
        }
      if($('#b3'). prop("checked") == true){
           var row={code:table.rows[1].cells[1].innerHTML,description:table.rows[1].cells[2].innerHTML,rule:3};
           rule.push(row);    
        }
      if($('#s1'). prop("checked") == true){
           var row={code:table.rows[2].cells[1].innerHTML,description:table.rows[2].cells[2].innerHTML,rule:1};
           rule.push(row);    
        }
      if($('#s2'). prop("checked") == true){
           var row={code:table.rows[2].cells[1].innerHTML,description:table.rows[2].cells[2].innerHTML,rule:2};
           rule.push(row);    
        }
      if($('#s3'). prop("checked") == true){
           var row={code:table.rows[2].cells[1].innerHTML,description:table.rows[2].cells[2].innerHTML,rule:3};
           rule.push(row);    
        }
      if($('#t1'). prop("checked") == true){
           var row={code:table.rows[3].cells[1].innerHTML,description:table.rows[3].cells[2].innerHTML,rule:1};
           rule.push(row);    
        }
      if($('#t2'). prop("checked") == true){
           var row={code:table.rows[3].cells[1].innerHTML,description:table.rows[3].cells[2].innerHTML,rule:2};
           rule.push(row);    
        }
      if($('#t3'). prop("checked") == true){
           var row={code:table.rows[3].cells[1].innerHTML,description:table.rows[3].cells[2].innerHTML,rule:3};
           rule.push(row);    
        } 
      if($('#st1'). prop("checked") == true){
           var row={code:table.rows[4].cells[1].innerHTML,description:table.rows[4].cells[2].innerHTML,rule:1};
           rule.push(row);    
        }
      if($('#st2'). prop("checked") == true){
           var row={code:table.rows[4].cells[1].innerHTML,description:table.rows[4].cells[2].innerHTML,rule:2};
           rule.push(row);    
        }
      if($('#st3'). prop("checked") == true){
           var row={code:table.rows[4].cells[1].innerHTML,description:table.rows[4].cells[2].innerHTML,rule:3};
           rule.push(row);    
        } 
      if($('#r1'). prop("checked") == true){
           var row={code:table.rows[5].cells[1].innerHTML,description:table.rows[5].cells[2].innerHTML,rule:1};
           rule.push(row);    
        }
      var location = [];
      $('ul#list li').each(function(){
        var value = $(this).attr("name");
        var name = $(this).html(); 
        var row = {locationId:value,locationName:name};
        location.push(row);
      }); 
      var user = $('#staff option:selected').val();
      var jsonrule = JSON.stringify(rule);  
      var jsonlocation = JSON.stringify(location);
      $.ajax({
              url:"../dao/setup.php",
              method:"post",
              data:{permission:'',user:user,rule:jsonrule,location:jsonlocation},
              success:function(){
                    window.location.href="../page/permission.php";
                   }  
            });                 
  });
  $('#staff').on('change',function(){
      var user = $('#staff option:selected').val();
      $.ajax({
              url:"../dao/setup.php",
              method:"post",
              data:{findpermission:'',user:user},
              success:function(data){
                    var result = JSON.parse(data);
                    var location = result[0];
                    var rule = result[1];
                    for(var i=0;i<location.length;i++)
                    {
                      var locsys = location[i].locationId;
                      var locname = location[i].locationName;
                      var str = "<li class='btn btn-sm btn-info divpad' value='"+locsys+"'>"+locname+"</li>";
                      $('#list').append(str);

                    }

                    for(var i=0;i<rule.length;i++)
                    {
                      var code = rule[i].code;
                      var rule = rule[i].rule;
                      if(code == 'R-001')
                      {
                        if(rule == '1')
                        {
                          document.getElementById("lp1").checked = true;
                        }
                       if(rule == '2')
                        {
                          document.getElementById("lp2").checked = true;
                        }
                       if(rule == '3')
                        {
                          document.getElementById("lp3").checked = true;
                        }
                      }
                     if(code == 'R-002')
                      {
                        if(rule == '1')
                        {
                          document.getElementById("b1").checked = true;
                        }
                        if(rule == '2')
                        {
                          document.getElementById("b2").checked = true;
                        }
                        if(rule == '3')
                        {
                          document.getElementById("b3").checked = true;
                        }
                      }
                      if(code == 'R-003')
                      {
                        if(rule == '1')
                        {
                          document.getElementById("s1").checked = true;
                        }
                        if(rule == '2')
                        {
                          document.getElementById("s2").checked = true;
                        }
                        if(rule == '3')
                        {
                          document.getElementById("s3").checked = true;
                        }
                      }
                      if(code == 'R-004')
                      {
                        if(rule == '1')
                        {
                          document.getElementById("t1").checked = true;
                        }
                        if(rule == '2')
                        {
                          document.getElementById("t2").checked = true;
                        }
                        if(rule == '3')
                        {
                          document.getElementById("t3").checked = true;
                        }
                      }
                      if(code == 'R-005')
                      {
                        if(rule == '1')
                        {
                          document.getElementById("st1").checked = true;
                        }
                        if(rule == '2')
                        {
                          document.getElementById("st2").checked = true;
                        }
                        if(rule == '3')
                        {
                          document.getElementById("st3").checked = true;
                        }
                      }
                      if(code == 'R-006')
                      {
                        if(rule == '1')
                        {
                          document.getElementById("r1").checked = true;
                        }                        
                      }
                    }
                  }  
            });
  });
  </script>
</body>
</html>
