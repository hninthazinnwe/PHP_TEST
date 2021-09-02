<?php  
include("../confs/config.php");
//include("../confs/auth.php");
if(isset($_GET['username']))
{
    $username=$_GET['username'];
}
else $username="";

  $result=mysqli_query($conn,"SELECT u.userName,l.syskey as locationSyskey,l.address as address,l.code as locationCode,l.description as locationName,s.name as staff FROM user  u INNER JOIN staff s on s.Syskey = u.staffId INNER JOIN jun001 j1 on j1.userId = s.syskey INNER JOIN location l on l.syskey = j1.locationId WHERE u.userName='hh' and u.status <> 4 GROUP BY u.userName,l.syskey,l.description,s.name,l.id");
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
  <link rel="stylesheet" href="../css/wave.css">

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
<body>
<!-- Site wrapper -->
<div class="content">
    <!-- Content Header (Page header) -->
<div class="col-12" style="padding-top: 20px;">
  <div class="row">
   <div class="col-lg-4 col-12"></div>
    <div class="col-lg-4 col-12">      
     <section class=""> 
      <div class="box">
        <div class="box-header">
          <Label class="box-title">Location ေရြးပါ</Label>
        </div>
        <div class="box-body">
         <div class="row">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid" id="locationlist">
              <thead>
                <tr class="bg-dark">
                  <th class="text-lighter">စဥ္</th>
                  <th class="text-lighter">Location Code</th>
                  <th class="text-lighter">Location Name</th>
                  <th class="text-lighter">Address</th>
                  <th class="text-lighter">Action</th>
                </tr>
              </thead>
                <tbody>
            <?php $i=1; ?>
            <?php while($row = mysqli_fetch_assoc($result)):  ?>
                  <tr>
                    <td><?php  echo $i; ?></td>
                    <td><?php  echo $row['locationCode']; ?></td>
                    <td><?php  echo $row['locationName']; ?></td>
                    <td><?php  echo $row['address']; ?></td>
                    <td onclick="choose(this.parentElement.rowIndex,<?php echo $row['locationSyskey']; ?>);">
                      <a href="#" ><i class="fa fa-pointer"></i>Choose</a>
                    </td>                    
                </tr>
            <?php $i++;endwhile; ?>
                </tbody>
            </table>
          </div>
         </div>
        </div>
       </div>
      </section>
     </div>
    <div class="col-lg-4 col-12"></div>
   </div>
  </div>

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<div class="wave2"></div>
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
  <script src="../js/buy.js"></script>
  
  <!-- Crypto_Admin for advanced form element -->
  <script src="../js/pages/advanced-form-element.js"></script>

  <!-- numpad -->
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
  <script>
  function choose(index,syskey){
    alert(index);
   var table = document.getElementById("locationlist");
   var code = table.rows[index].cells[1].innerHTML;
   var name = table.rows[index].cells[2].innerHTML;
   var address = table.rows[index].cells[3].innerHTML;  

   var location={syskey:syskey,code:code,name:name,address:address};
   var loc = JSON.stringify(location);
   $.ajax({
          url:"login.php",
          method:"post",
          data:{chooseloc:loc},
          success:function(data){
          window.location.href="../page/home.php";
        }  
      });
  }
</script>
</body>
</html>
