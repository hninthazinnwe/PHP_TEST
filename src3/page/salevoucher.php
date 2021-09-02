<?php
include("../confs/config.php");
require("../pdf/fpdf.php");
$syskey = $_GET['syskey'];
$hresult=mysqli_query($conn,"SELECT b.voucherDate, b.voucherNo, b.customerName, b.totalQty, b.totalAmount FROM sale b INNER JOIN saledetail bd on b.syskey = bd.hsyskey WHERE b.syskey = '$syskey' and b.status <> 4 GROUP BY b.voucherDate, b.voucherNo, b.customerName, b.totalQty, b.totalAmount");
$hrow = mysqli_fetch_assoc($hresult);

$dresult=mysqli_query($conn,"SELECT bd.no, bd.times, bd.code, bd.description, bd.amount, bd.ratio, bd.totalamount, bd.qty FROM saledetail bd INNER JOIN sale b on b.syskey = bd.hsyskey WHERE b.syskey = '$syskey' and b.syskey <> 4 and bd.status <> 4 GROUP BY bd.no, bd.times, bd.code, bd.description, bd.amount, bd.ratio, bd.totalamount, bd.qty");

$sresult=mysqli_query($conn,"SELECT bs.alpha, bs.number,bd.description FROM saleserial bs INNER JOIN saledetail bd on bd.syskey = bs.dsyskey INNER JOIN buy b on b.syskey = bd.hsyskey WHERE b.syskey = '$syskey' and bs.status <> 4 GROUP BY bs.alpha, bs.number,bd.description");
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="content" id="content"> 
      <div class="box">
        <div class="box-header with-border">
           <div class="row">
                <h3>မိုးယံေရႊလမင္းႏွင့္ျမတ္ဆုကုေဋ</h3>
                <h5>ဆုမဲေဘာက္ခ်ာ</h5>
            </div>
        </div>
        <div class="box-body">
          <div class="row">
            <label>Voucher :</label><label value="<?php echo$hrow['voucherNo'] ?>"><?php echo$hrow['voucherNo'] ?></label>
            <label>Date :</label><label value="<?php echo$hrow['voucherDate'] ?>"><?php echo date("d-m-Y",strtotime($hrow['voucherDate'])); ?></label>
            <label>Customer :</label><label value="<?php echo$hrow['customerName'] ?>"><?php echo$hrow['customerName'] ?></label>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid">
              <thead>
                <tr class="bg-dark">
                  <td class="text-lighter">စဥ္</td>
                  <td class="text-lighter">အၾကိမ္</td>
                  <td class="text-lighter">ဆုမဲအမ်ိဳးအစား</td>
                  <td class="text-lighter">ဆုမဲေငြပမာဏ</td>
                  <td class="text-lighter">အေရအတြက္</td>
                  <td class="text-lighter">စုစုေပါင္းေငြ</td>
                </tr>
              </thead>
                <tbody>
            <?php $i=1; ?>
            <?php while($row = mysqli_fetch_assoc($dresult)):  ?>
                  <tr>
                    <td><?php  echo $i; ?></td>
                    <td><?php  echo $row['times']; ?></td>
                    <td><?php  echo $row['description']; ?></td>
                    <td><?php  echo $row['amount']; ?></td>
                    <td><?php  echo $row['qty']; ?></td>
                    <td><?php  echo $row['totalamount']; ?></td>                    
                </tr>
            <?php $i++;endwhile; ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<button id="cmd">generate PDF</button>
    <div id="editor"></div>
</body>
<script src="../js/jspdf.js"></script>  
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script>
var doc = new jsPDF();

$('#cmd').click(function () {   
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>
</html>