<?php 
include("../confs/config.php");

if(isset($_POST['GetPrize'])){
  $code = $_POST['GetPrize'];
  $sql = "SELECT  code, description, amount FROM prizetype WHERE code = '$code' and status <>4";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
}

if(isset($_POST['keysearch'])){
  $code = $_POST['keysearch'];
  $h = json_decode($code,true);
  foreach($h as $item) {
   $length = strlen($item);
   $alpha = substr($item,0,$length-6);
   $num = substr($item,strlen($alpha),7);

  $sql = "SELECT code, description, alpha, number FROM prizeserial WHERE status <> 4 and alpha = '$alpha' and number = '$num'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
}
echo json_encode($row);
//echo $alpha;
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

  mysqli_query($conn,"INSERT INTO lotteryprize(syskey, createdDate, modifiedDate, createdUser, modifiedUser, lotteryDate, formNo, times, n1, n2, n3, t1, t2, t3, status) VALUES ('$syskey',now(),now(),1,1,now(),'$h[voucher]','$h[times]','$h[totalqty]',0,0,'','','',1)");

  foreach($a as $item) {
  $drand = rand(1000,9999); 
  $dsyskey = $date.$drand;
  mysqli_query($conn,"INSERT INTO lotteryprizedetail(syskey, hsyskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, amount, qty, n1, n2, t1, t2, status) VALUES ('$dsyskey','$syskey',now(),now(),1,1,'$i','$item[code]','$item[description]','$item[amount]','$item[qty]',0,0,'','',1)");
  $i++;
}
  foreach($s as $item1) {
  mysqli_query($conn,"INSERT INTO prizeserial(dsyskey, hsyskey, createdDate, createdUser, code, description, alpha, number, n1, n2, t1, t2, status) VALUES ('$dsyskey','$syskey',now(),1,'$item1[code]','$item1[description]','$item1[alpha]','$item1[number]',0,0,'','',1)");
}
echo$syskey;
}

else if(isset($_POST['syskey'])){
  $syskey = $_POST['syskey'];

  $header = mysqli_query($conn,"SELECT lp.id, lp.syskey, lp.createdDate, lp.modifiedDate, lp.createdUser, lp.modifiedUser, lp.lotteryDate, lp.formNo, lp.times, lp.n1, lp.n2, lp.n3, lp.t1, lp.t2, lp.t3, lp.status FROM lotteryprize lp INNER JOIN lotteryprizedetail lpd on lp.syskey = lpd.hsyskey WHERE lp.syskey = '$syskey' and lp.status <> 4 GROUP BY lp.id, lp.syskey, lp.createdDate, lp.modifiedDate, lp.createdUser, lp.modifiedUser, lp.lotteryDate, lp.formNo, lp.times, lp.n1, lp.n2, lp.n3, lp.t1, lp.t2, lp.t3, lp.status");
 
  $detail = mysqli_query($conn,"SELECT ed.no, ed.code, ed.description, ed.qty, ed.amount,(SELECT GROUP_CONCAT(CONCAT(alpha,number)) AS serial FROM prizeserial WHERE dsyskey = ed.syskey) as serial FROM lotteryprizedetail ed INNER JOIN lotteryprize e on e.syskey = ed.hsyskey WHERE e.syskey = '$syskey' and ed.status <> 4");

  $d = array();$i = 0;

  while($row = mysqli_fetch_assoc($detail)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['code'],'description'=>$row['description'],'amount'=>$row['amount'],'qty'=>$row['qty'],'serial'=>$row['serial']);
  endwhile;

 $h = mysqli_fetch_assoc($header);

 echo json_encode(array($h,$d));
 //echo json_encode($h);
}

else if(isset($_GET['lpdel'])){
  $syskey = $_GET['lpdel'];

  $header = mysqli_query($conn,"UPDATE lotteryprize SET status=4 WHERE syskey='$syskey'");
 
  $detail = mysqli_query($conn,"UPDATE lotteryprizedetail SET status=4 WHERE hsyskey='$syskey'");

  $serial = mysqli_query($conn,"UPDATE prizeserial SET status=4 WHERE hsyskey='$syskey'");
header('location:../page/lotteryprize.php');
} 

?>