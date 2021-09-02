<?php 
include("../confs/config.php");
include("../confs/auth.php");
  $user = $_SESSION['usersyskey'];
  $location = $_SESSION['locationsyskey'];

if(isset($_POST['GetCur'])){
  $code = $_POST['GetCur'];
  $sql = "SELECT  saleRate, buyRate, n1 FROM currency WHERE code = '$code' and status <>4";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
}

else if(isset($_POST['ss'])){
  $syskey = $_POST['ss'];

  $header = mysqli_query($conn,"SELECT  e.syskey,s.name as staff, e.exchangeDate, e.recordType, e.paymentType, c.engName as Customer, e.voucherNo, e.totalqty, e.totalAmount, l.description as Location, e.remark, e.n1, e.n2, e.n3, e.n4, e.t1, e.t2, e.t3, e.t4, e.status FROM exchange e INNER JOIN exchangedetail ed on e.syskey = ed.syskey INNER JOIN customer c on c.syskey = e.customerId INNER JOIN user u on u.syskey = e.createdUser INNER JOIN location l on l.syskey = e.locationId INNER JOIN  staff s on s.syskey = u.staffId  WHERE e.status <> 4 and e.locationId = '$location' and e.syskey = '$syskey' GROUP BY e.syskey,s.name , e.exchangeDate, e.recordType, e.paymentType, c.engName , e.voucherNo, e.totalqty, e.totalAmount, l.description , e.remark, e.n1, e.n2, e.n3, e.n4, e.t1, e.t2, e.t3, e.t4, e.status");
 
 $h = mysqli_fetch_assoc($header);
 echo json_encode($h);
} 

else if(isset($_POST['header'])){
  $header = $_POST['header'];
  $detail = $_POST['detail'];
  $h = json_decode($header,true);
  $a = json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));
  $date = date("Ymdhi");   
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;

  $i = 1;
  mysqli_query($conn,"INSERT INTO exchange(syskey, createdDate, modifiedDate, createdUser, modifiedUser, exchangeDate, recordType, paymentType, customerId, voucherNo, totalqty, totalAmount, locationId, remark, n1, n2, n3, n4, t1, t2, t3, t4, status) VALUES ('$syskey',now(),now(),'$user',0,'$edate','$h[type]','$h[payment]','$h[customer]','$h[voucher]','$h[totalqty]','$h[totalamount]','$location','','$h[location]',0,0,0,'','','','',1)");

  foreach($a as $item) {

  mysqli_query($conn,"INSERT INTO exchangedetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, rate, amount, n1, n2, n3, t1, t2, status) VALUES ('$syskey',now(),now(),'$user',0,'$i','$item[code]','$item[currency]','$item[qty]','$item[rate]','$item[amount]','$item[unit]',0,0,'','',1)");
  $i++;
}
echo$syskey;
}

else if(isset($_POST['uheader'])){
  $header = $_POST['uheader'];
  $detail = $_POST['detail'];
  $h = json_decode($header,true);
  $a = json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));

  $i = 1;
  mysqli_query($conn,"UPDATE exchange SET modifiedDate=now(),modifiedUser='$user',exchangeDate='$edate',recordType='$h[type]',paymentType='$h[payment]',customerId='$h[customer]',voucherNo='$h[voucher]',totalqty='$h[totalqty]',totalAmount='$h[totalamount]',locationId='$location',n1='$h[location]',n2=0,n3=0,n4=0,t1='',t2='',t3='',t4='',status=2 WHERE syskey='$h[syskey]'");

    mysqli_query($conn,"UPDATE exchangedetail SET status=4 WHERE syskey='$h[syskey]'");

  foreach($a as $item) {
       mysqli_query($conn,"INSERT INTO exchangedetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code,description, qty, rate, amount, n1, n2, n3, t1, t2, status) VALUES ('$h[syskey]',now(),now(),'$user',0,'$i','$item[code]','$item[currency]','$item[qty]','$item[rate]','$item[amount]','$item[unit]',0,0,'','',1)");
  $i++;
}
echo$h['syskey'];
}

else if(isset($_POST['creditheader'])){
  $header = $_POST['creditheader'];
  $h = json_decode($header,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;

  $i = 1;
  mysqli_query($conn,"INSERT INTO payforcredit(syskey, createdDate, modifiedDate, createdUser, modifiedUser, voucherDate, voucherNo, customerID, locationID, amount, recordType, n1, n2, n3, t1, t2, t3, status) VALUES ('$syskey',now(),now(),'$user','','$h[date]','$h[voucher]','$h[customer]','$location','$h[paidamount]','$h[type]',0,0,0,'','','',1)");

echo$syskey;
}

else if(isset($_POST['rcheader'])){
  $header = $_POST['rcheader'];
  $detail = $_POST['rcdetail'];
  $h = json_decode($header,true);
  $a = json_decode($detail,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $id = $date.$rand;
  $i = 1;
  mysqli_query($conn,"INSERT INTO changerate(syskey, createdDate, modifiedDate, createdUser, modifiedUser, voucherNo, location, n1, n2, n3, t1, t2, status) VALUES ('$id',now(),now(),'$user','$user','$h[voucher]','$location',0,0,0,'','',1)");

  foreach($a as $item) {  
  mysqli_query($conn,"INSERT INTO changeratedetail(syskey, createdDate, createdUser, code, description, saleRate, buyRate, n1, t1, status) VALUES ('$id',now(),'$user','$item[code]','$item[currency]','$item[salerate]','$item[buyrate]',0,'',1)");
  $i++;
  }

  foreach($a as $item) {  
  mysqli_query($conn,"UPDATE currency SET saleRate='$item[salerate]',buyRate='$item[buyrate]',status=3 WHERE code='$item[code]'");
  }
  
echo$id;
} 

else if(isset($_POST['syskey'])){
  $syskey = $_POST['syskey'];

  $header = mysqli_query($conn,"SELECT  e.syskey,s.name as staff, e.exchangeDate, e.recordType, e.paymentType,e.customerId, c.engName as Customer, e.voucherNo, e.totalqty, e.totalAmount, l.description as Location, e.remark, e.n1, e.n2, e.n3, e.n4, e.t1, e.t2, e.t3, e.t4, e.status FROM exchange e INNER JOIN exchangedetail ed on e.syskey = ed.syskey INNER JOIN customer c on c.syskey = e.customerId INNER JOIN user u on u.syskey = e.createdUser INNER JOIN location l on l.syskey = e.locationId INNER JOIN  staff s on s.syskey = u.staffId  WHERE e.status <> 4 and e.locationId = '$location' and e.syskey = '$syskey' GROUP BY e.syskey,s.name , e.exchangeDate, e.recordType, e.paymentType, e.customerId, c.engName , e.voucherNo, e.totalqty, e.totalAmount, l.description , e.remark, e.n1, e.n2, e.n3, e.n4, e.t1, e.t2, e.t3, e.t4, e.status");
 
  $detail = mysqli_query($conn,"SELECT ed.no, ed.code, ed.description, ed.qty, ed.rate, ed.amount,ed.n1 FROM exchangedetail ed INNER JOIN exchange e on e.syskey = ed.syskey WHERE e.syskey = '$syskey' and ed.status <> 4");

  $d = array();$i = 0;

  while($row = mysqli_fetch_assoc($detail)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['code'],'currency'=>$row['description'],'rate'=>$row['rate'],'unit'=>$row['n1'],'qty'=>$row['qty'],'amount'=>$row['amount']);
  endwhile;

 $h = mysqli_fetch_assoc($header);

 echo json_encode(array($h,$d));
}

else if(isset($_GET['exdel'])){
  $syskey = $_GET['exdel'];

  $header = mysqli_query($conn,"UPDATE exchange SET status=4 WHERE syskey='$syskey'");
 
  $detail = mysqli_query($conn,"UPDATE exchangedetail SET status=4 WHERE syskey='$syskey'");
header('location:../page/exchange.php');
} 

else if(isset($_POST['exchangefilter'])){

  $filter = $_POST['exchangefilter'];
  $f= json_decode($filter,true);

  $query = "SELECT  e.syskey,s.name as staff, e.exchangeDate, e.recordType, e.paymentType, c.engName as Customer, e.voucherNo, e.totalqty, e.totalAmount, l.description as Location, e.remark, e.n1, e.n2, e.n3, e.n4, e.t1, e.t2, e.t3, e.t4, e.status FROM exchange e INNER JOIN exchangedetail ed on e.syskey = ed.syskey INNER JOIN customer c on c.syskey = e.customerId INNER JOIN user u on u.syskey = e.createdUser INNER JOIN location l on l.syskey = e.locationId INNER JOIN  staff s on s.syskey = u.staffId  WHERE e.status <> 4 and e.createdUser = '$user' and e.locationId = '$location'";

  if($f['fdate'] != "" && $f['tdate'] != "")
  {
    $query.=" and  DATE_FORMAT(e.exchangeDate, '%m/%d/%Y') between '$f[fdate]' and '$f[tdate]'";
  }

  $query.=" and e.recordType = '$f[type]' and e.paymentType = '$f[payment]' and e.locationId = '$location' GROUP BY e.syskey,s.name , e.exchangeDate, e.recordType, e.paymentType, c.engName , e.voucherNo, e.totalqty, e.totalAmount, l.description , e.remark, e.n1, e.n2, e.n3, e.n4, e.t1, e.t2, e.t3, e.t4, e.status";

 $header = mysqli_query($conn,$query);
 $t = "";$pay = "";
 $data = "<table class='table table-bordered table-hover' role='grid' id='exchangehistory'>
              <thead>
                <tr class='bg-dark'>
                  <th class='text-yellow'>No</th>
                  <th class='text-yellow'>Date</th>
                  <th class='text-yellow'>Type</th>
                  <th class='text-yellow'>Payment</th>
                  <th class='text-yellow'>Voucher</th>
                  <th class='text-yellow'>Customer</th>
                  <th class='text-yellow'>Qty</th>
                  <th class='text-yellow'>Amount</th>
                  <th class='text-yellow'>Location</th>
                  <th class='text-yellow'>Action</th>
                </tr>
              </thead>
                <tbody>";
 $i=1;
 while ($row = mysqli_fetch_assoc($header)) {
      $date = $row['exchangeDate'];
      $a = date("d-m-Y", strtotime($date));
      if($row['recordType'] == '1') $t ='Sale'; else $t = 'Buy'; 
      if($row['payment'] == '1') $pay = 'Cash'; else  $pay = 'Credit';

   $data .= "<tr>
              <td><?php  echo $i; ?></td>
              <td><?php  echo $a; ?></td>
              <td><?php  echo $t; ?></td>
              <td><?php  echo $pay; ?></td>
              <td><?php  echo $row[voucherNo]; ?></td>
              <td><?php  echo $row[Customer]; ?></td>
              <td><?php  echo $row[totalqty]; ?></td>
              <td><?php  echo $row[totalAmount]; ?></td>
              <td><?php  echo $row[Location]; ?></td>
              <td>
                <a class='fa fa-edit'  href='user.php?edit=<?php echo $row[syskey] ?>' >View</a>
                <button class='fa fa-edit' onClick='exchangeEditView(<?php echo $row[syskey]; ?>);'>Edit</button>
                <a class='fa fa-times' href='../dao/exchange.php?exdel=<?php echo $row[syskey]; ?>'>Delete</a>
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