<?php 
include("../confs/config.php");

if(isset($_POST['GetPrize'])){
  $code = $_POST['GetPrize'];
  $sql = "SELECT  code, description, amount FROM prizetype WHERE code = '$code' and status <>4";
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

  mysqli_query($conn,"INSERT INTO buy(syskey, createdDate, modifiedDate, voucherDate, createdUser, modifiedUser, voucherNo, customerId, totalQty, totalAmount, n1, n2, n3, t1, t2, t3, locationId, status) VALUES ('$syskey',now(),now(),now(),1,1,'$h[voucher]','$h[customer]','$h[totalqty]','$h[totalamount]',0,0,0,'','','',0,1)");

  foreach($a as $item) {
  $drand = rand(1000,9999); 
  $dsyskey = $date.$drand;
  mysqli_query($conn,"INSERT INTO buydetail(syskey, hsyskey, createdDate, modifiedDate, createdUser, modifiedUser, no, times, code, description, amount, ratio, totalamount, qty, n1, n2, t1, t2, status) VALUES ('$dsyskey','$syskey',now(),now(),1,1,'$i','$item[times]','$item[code]','$item[description]','$item[prizeamount]','$item[ratio]','$item[amount]','$item[qty]',0,0,'','',1)");

  foreach($s as $item1) {
    if($item1['code']==$item['code'])
    {
      mysqli_query($conn,"INSERT INTO buyserial(dsyskey, hsyskey, createdDate, createdUser, code, description, alpha, number, n1, n2, t1, t2, status) VALUES ('$dsyskey','$syskey',now(),1,'$item1[code]','$item1[description]','$item1[alpha]','$item1[number]',0,0,'','',1)");
    }
  }
  $i++;
}
echo$syskey;
}

else if(isset($_POST['syskey'])){
  $syskey = $_POST['syskey'];

  $header = mysqli_query($conn,"SELECT b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo,  b.customerId,s.mmName as customerName, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status FROM buy b INNER JOIN buydetail bd on b.syskey = bd.hsyskey INNER JOIN supplier s on s.syskey = b.customerId WHERE b.syskey = '$syskey' and b.status <> 4 GROUP BY b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, s.mmName, b.customerId, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status");
 
  $detail = mysqli_query($conn,"SELECT ed.no, ed.times,ed.code, ed.description, ed.qty, ed.ratio, ed.amount, ed.totalamount, ed.n1, (SELECT GROUP_CONCAT(CONCAT(alpha,number)) AS serial FROM buyserial WHERE dsyskey = ed.syskey) as serial FROM buydetail ed INNER JOIN buy e on e.syskey = ed.hsyskey WHERE e.syskey = '$syskey' and ed.status <> 4");

  $d = array();$i = 0;

  while($row = mysqli_fetch_assoc($detail)):
    $i++;
     $d[] = array('id'=>$i,'no'=>$row['no'],'times'=>$row['times'],'code'=>$row['code'],'description'=>$row['description'],'ratio'=>$row['ratio'],'amount'=>$row['amount'],'qty'=>$row['qty'],'totalamount'=>$row['totalamount'],'serial'=>$row['serial']);
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

else if(isset($_POST['buyfilter'])){
  $filter = $_POST['buyfilter'];
  $f= json_decode($filter,true);
  $query = "SELECT b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, s.mmName as customerName, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status FROM buy b INNER JOIN buydetail bd on b.syskey = bd.hsyskey INNER JOIN supplier s on s.syskey = b.customerId WHERE b.status <> 4";

  if($f['fdate'] != "" && $f['tdate'] != "")
  {
    $query.=" and  DATE_FORMAT(b.voucherDate, '%m/%d/%Y') between '$f[fdate]' and '$f[tdate]'";
  }

  $query.=" GROUP BY b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, b.customerId, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status";

 $header = mysqli_query($conn,$query);
 $data = "<table class='table table-bordered table-hover' role='grid' id='buyhistory'>
              <thead>
                <tr class='bg-dark'>
                  <th class='text-lighter'>စဥ္</th>
                  <th class='text-lighter'>ေန့စြဲ</th>
                  <th class='text-lighter'></th>
                  <th class='text-lighter'>ေဘာက္ခ်ာ</th>
                  <th class='text-lighter'>ကိုယ္စားလွယ္အမည္</th>
                  <th class='text-lighter'>အေရအတြက္</th>
                  <th class='text-lighter'>ေငြပမာဏ</th>                  
                  <th class='text-lighter'>၀န္ထမ္းအမည္</th>
                  <th class='text-lighter'></th>
                  <th class='text-lighter'>Action</th>
                </tr>
              </thead>
                <tbody>";
 $i=1;
 while ($row = mysqli_fetch_assoc($header)) {
      $date = $row['voucherDate'];
      $a = date("d-m-Y", strtotime($date));

   $data .= "<tr>
              <td>$i</td>
              <td>$a</td>
              <td>$row[voucherNo]</td>
              <td>$row[customerName]</td>
              <td>$row[totalQty]</td>
              <td>$row[totalAmount]</td>
              <td></td>
              <td>
                <button class='button1' onclick='buyView($row[syskey]);'><i class='fa fa-edit'></i>View</button>
                <button class='button1' onclick='buyEdit($row[syskey]);'><i class='fa fa-edit'></i>Edit</button>
                <button class='button1' id='btnhdelete' value='$row[syskey]'><i class='fa fa-times'></i>Delete</button>
              </td>                    
           </tr>
        "; 
   $i++;
 }
   $data .= "
        </tbody>
      </table>
   ";
echo$data;
}

?>