<?php
include("../confs/config.php");
require("../pdf/pdfcrowd.php");
$syskey = $_GET['syskey'];
$hresult=mysqli_query($conn,"SELECT b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, b.customerId,s.mmName as customerName, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status FROM buy b INNER JOIN buydetail bd on b.syskey = bd.hsyskey INNER JOIN supplier s on s.syskey = b.customerId WHERE b.syskey = '$syskey' and b.status <> 4 GROUP BY b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, s.mmName, b.customerId, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status");
$hrow = mysqli_fetch_assoc($hresult);

$dresult=mysqli_query($conn,"SELECT ed.no, ed.times,ed.code, ed.description, ed.qty, ed.ratio, ed.amount, ed.totalamount, ed.n1, (SELECT GROUP_CONCAT(CONCAT(alpha,number)) AS serial FROM buyserial WHERE dsyskey = ed.syskey) as serial FROM buydetail ed INNER JOIN buy e on e.syskey = ed.hsyskey WHERE e.syskey = '$syskey' and ed.status <> 4");

/*try {
    $client = new \Pdfcrowd\HtmlToPdfClient("hninnwe", "fcb91006ee82d1c1fa31e3f46462639e");
  //  $uri = $_SERVER['REQUEST_URI'];
    $pdf = $client->convertUrl("https://sumal/src3/page/buyvoucher.php");

    header("Content-Type: application/pdf");
    header("Cache-Control: no-cache");
    header("Accept-Ranges: none");
    header("Content-Disposition: inline; filename=\"example.pdf\"");

    echo $pdf;
}
catch(\Pdfcrowd\Error $why) {
    error_log("Pdfcrowd Error: {$why}\n");
    throw $why;
}*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/Styles.css">
</head>
<body>
    <div class="content" id="content"> 
      <div class="box">
        <div class="box-header with-border">
           <div class="row">
                &nbsp;&nbsp;<label class="box-header" style="font-weight: 600;">မိုးယံေရႊလမင္းႏွင့္ျမတ္ဆုကုေဋ</label><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-weight: 600;">ဆုမဲေဘာက္ခ်ာ</label>
            </div>
        </div>
        <div class="box-body">
          <div class="row">
            <label class="small">Voucher :</label><label class="small" value="<?php echo$hrow['voucherNo'] ?>"><?php echo$hrow['voucherNo'] ?></label>
            <label class="small">Date :</label><label class="small" value="<?php echo$hrow['voucherDate'] ?>"><?php echo date("d-m-Y",strtotime($hrow['voucherDate'])); ?></label><br>
            <label class="small">Customer :</label><label class="small" value="<?php echo$hrow['customerName'] ?>"><?php echo$hrow['customerName'] ?></label>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover" role="grid">
              <thead>
                <tr class="bg-dark">
                  <td class="text-lighter small">No</td>
                  <td class="text-lighter small">Times</td>
                  <td class="text-lighter small">Description</td>
                  <td class="text-lighter small">Amount</td>
                  <td class="text-lighter small">Qty</td>
                  <td class="text-lighter small">Total</td>
                </tr>
              </thead>
                <tbody>            
            <?php while($row = mysqli_fetch_assoc($dresult)):  ?>
            <?php $i=1; ?>
                  <tr>
                    <td class="small"><?php  echo $i; ?></td>
                    <td class="small"><?php  echo $row['times']; ?></td>
                    <td class="small"><?php  echo $row['description']; ?></td>
                    <td class="small"><?php  echo $row['amount']; ?></td>
                    <td class="small"><?php  echo $row['qty']; ?></td>
                    <td class="small"><?php  echo $row['totalamount']; ?></td>                    
                </tr>
            <?php $i++;endwhile; ?>
                </tbody>
            </table>
          </div>
        </div>
        <div class="box-header">
          <?php while($row = mysqli_fetch_assoc($dresult)):  ?>
              <div class="row"><?php echo $row['description']; ?></div>
              <p class="small"><?php echo $row['serial']; ?></p>
          <?php $i++;endwhile; ?>  
        </div>
      </div>
    </div>

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