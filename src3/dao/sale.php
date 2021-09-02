<?php 
include("../confs/config.php");

if(isset($_POST['GetPrize'])){
  $code = $_POST['GetPrize'];
  $sql = "SELECT  code, description, amount FROM prizetype WHERE code = '$code' and status <>4";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
}

else if(isset($_POST['Issale'])){
  $alpha = $_POST['alpha'];
  $number = $_POST['number'];
  $sql = "SELECT  count(id) as count FROM buyserial WHERE alpha = '$alpha' and number = '$number' and n1 <> 1 and status <> 4";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
}

else if(isset($_POST['header'])){
  $header = $_POST['header'];
  $detail = $_POST['detail'];
  $serial = $_POST['serial'];
  $h = json_decode($header,true);
  $a = json_decode($detail,true);
  $s = json_decode($serial,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));
  $date = date("Ymdhi");   
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
 
  $i = 1;

  mysqli_query($conn,"INSERT INTO sale(syskey, createdDate, modifiedDate, voucherDate, createdUser, modifiedUser, voucherNo, customerId, totalQty, totalAmount, n1, n2, n3, t1, t2, t3, locationId, status) VALUES ('$syskey',now(),now(),now(),1,1,'$h[voucher]','$h[customer]','$h[totalqty]','$h[totalamount]',0,0,0,'','','',0,1)");

  foreach($a as $item) {
  $drand = rand(1000,9999); 
  $dsyskey = $date.$drand;
  mysqli_query($conn,"INSERT INTO saledetail(syskey, hsyskey, createdDate, modifiedDate, createdUser, modifiedUser, no, times, code, description, amount, ratio, totalamount, qty, n1, n2, t1, t2, status) VALUES ('$dsyskey','$syskey',now(),now(),1,1,'$i','$item[times]','$item[code]','$item[description]','$item[prizeamount]','$item[ratio]','$item[amount]','$item[qty]',0,0,'','',1)");
  $i++;
}
  foreach($s as $item1) {
  mysqli_query($conn,"INSERT INTO saleserial(dsyskey, hsyskey, createdDate, createdUser, code, description, alpha, number, n1, n2, t1, t2, status) VALUES ('$dsyskey','$syskey',now(),1,'$item1[code]','$item1[description]','$item1[alpha]','$item1[number]',0,0,'','',1)");
}
echo$syskey;
}

else if(isset($_POST['syskey'])){
  $syskey = $_POST['syskey'];

  $header = mysqli_query($conn,"SELECT b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, s.mmName as customerName, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status FROM sale b INNER JOIN saledetail bd on b.syskey = bd.hsyskey INNER JOIN customer s on s.syskey = b.customerId WHERE b.syskey = '$syskey' and b.status <> 4 GROUP BY b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, b.customerId, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status");
 
  $detail = mysqli_query($conn,"SELECT ed.no, ed.code, ed.description, ed.qty, ed.ratio, ed.amount, ed.totalamount, ed.n1, (SELECT GROUP_CONCAT(CONCAT(alpha,number)) AS serial FROM saleserial WHERE dsyskey = ed.syskey) as serial FROM saledetail ed INNER JOIN sale e on e.syskey = ed.hsyskey WHERE e.syskey = '$syskey' and ed.status <> 4");

  $d = array();$i = 0;

  while($row = mysqli_fetch_assoc($detail)):
    $i++;
     $d[] = array('id'=>$i,'no'=>$row['no'],'code'=>$row['code'],'description'=>$row['description'],'ratio'=>$row['ratio'],'amount'=>$row['amount'],'qty'=>$row['qty'],'totalamount'=>$row['totalamount'],'serial'=>$row['serial']);
  endwhile;

 $h = mysqli_fetch_assoc($header);

 echo json_encode(array($h,$d));
}

else if(isset($_GET['buydel'])){
  $syskey = $_GET['buydel'];

  $header = mysqli_query($conn,"UPDATE buy SET status=4 WHERE syskey='$syskey'");
 
  $detail = mysqli_query($conn,"UPDATE buydetail SET status=4 WHERE hsyskey='$syskey'");

  $serial = mysqli_query($conn,"UPDATE buyserial SET status=4 WHERE hsyskey='$syskey'");
header('location:../page/buy.php');
} 

?>