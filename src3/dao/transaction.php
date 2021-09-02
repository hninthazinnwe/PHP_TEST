<?php
include("../confs/config.php");
include("../confs/auth.php");
  $user = $_SESSION['usersyskey'];
  $location = $_SESSION['locationsyskey'];

if(isset($_POST['iheader'])){
  $header = $_POST['iheader'];
  $detail = $_POST['idetail'];
  $h= json_decode($header,true);
  $a= json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;

  $i=1;
  mysqli_query($conn,"INSERT INTO transaction(syskey, createdDate, modifiedDate, createdUser, modifiedUser, voucherDate, voucherNo, recordType, totalQty, remark, n1, n2, n3, n4, t1, t2, t3, t4, locationId, status) VALUES ('$syskey',now(),now(),'$user','$user','$edate','$h[voucher]',11,'$h[totalqty]','',0,0,0,0,'','','','','$location',1)");

  foreach($a as $item) {  
  mysqli_query($conn,"INSERT INTO transactiondetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, n1, n2, t1, t2, t3, n3, status) VALUES ('$syskey',now(),now(),'$user','$user','$i','$item[code]','$item[currency]','$item[qty]',0,0,'','','',0,1)");
  $i++;
}
echo$syskey;
}

if(isset($_POST['uiheader'])){
  $header = $_POST['uiheader'];
  $detail = $_POST['idetail'];
  $h = json_decode($header,true);
  $a = json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));

  $i = 1;
  mysqli_query($conn,"UPDATE transaction SET modifiedDate=now(),modifiedUser='$user',voucherDate='$edate',voucherNo='$h[voucher]',recordType=11,totalQty='$h[totalqty]',remark='',n1=0,n2=0,n3=0,n4=0,t1='',t2='',t3='',t4='',locationId='$location',status=2 WHERE syskey='$h[syskey]'");

    mysqli_query($conn,"UPDATE transactiondetail SET status=4 WHERE syskey='$h[syskey]'");

  foreach($a as $item) {
       mysqli_query($conn,"INSERT INTO transactiondetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, n1, n2, t1, t2, t3, n3, status) VALUES ('$h[syskey]',now(),now(),'$user','$user','$i','$item[code]','$item[currency]','$item[qty]',0,0,'','','',0,1)");
  $i++;
}
echo$h['syskey'];
}

else if(isset($_POST['rheader'])){
  $header = $_POST['rheader'];
  $detail = $_POST['rdetail'];
  $h= json_decode($header,true);
  $a= json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;

  $i=1;
  mysqli_query($conn,"INSERT INTO transaction(syskey, createdDate, modifiedDate, createdUser, modifiedUser, voucherDate, voucherNo, recordType, totalQty, remark, n1, n2, n3, n4, t1, t2, t3, t4, locationId, status) VALUES ('$syskey',now(),now(),'$user','$user','$edate','$h[voucher]',10,'$h[totalqty]','',0,0,0,0,'','','','','$location',1)");

  foreach($a as $item) {  
  mysqli_query($conn,"INSERT INTO transactiondetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, n1, n2, t1, t2, t3, n3, status) VALUES ('$syskey',now(),now(),'$user','$user','$i','$item[code]','$item[currency]','$item[qty]',0,0,'','','',0,1)");
  $i++;
}
echo$syskey;
}

else if(isset($_POST['urheader'])){
  $header = $_POST['urheader'];
  $detail = $_POST['rdetail'];
  $h = json_decode($header,true);
  $a = json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));

  $i = 1;
  mysqli_query($conn,"UPDATE transaction SET modifiedDate=now(),modifiedUser='$user',voucherDate='$edate',voucherNo='$h[voucher]',recordType=10,totalQty='$h[totalqty]',remark='',n1=0,n2=0,n3=0,n4=0,t1='',t2='',t3='',t4='',locationId='$location',status=2 WHERE syskey='$h[syskey]'");

    mysqli_query($conn,"UPDATE transactiondetail SET status=4 WHERE syskey='$h[syskey]'");

  foreach($a as $item) {
       mysqli_query($conn,"INSERT INTO transactiondetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, n1, n2, t1, t2, t3, n3, status) VALUES ('$h[syskey]',now(),now(),'$user','$user','$i','$item[code]','$item[currency]','$item[qty]',0,0,'','','',0,1)");
  $i++;
}
echo$h['syskey'];
}

else if(isset($_POST['theader'])){
  $header = $_POST['theader'];
  $detail = $_POST['tdetail'];
  $h= json_decode($header,true);
  $a= json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;

  $i=1;
  if($h['type']=='1')
  {
  mysqli_query($conn,"INSERT INTO transaction(syskey, createdDate, modifiedDate, createdUser, modifiedUser, voucherDate, voucherNo, recordType, totalQty, remark, n1, n2, n3, n4, t1, t2, t3, t4, locationId, status) VALUES ('$syskey',now(),now(),'$user','$user','$edate','$h[voucher]',12,'$h[totalqty]','',0,'$h[location]',0,0,'','','','','$location',1)");
  }
  else{
  mysqli_query($conn,"INSERT INTO transaction(syskey, createdDate, modifiedDate, createdUser, modifiedUser, voucherDate, voucherNo, recordType, totalQty, remark, n1, n2, n3, n4, t1, t2, t3, t4, locationId, status) VALUES ('$syskey',now(),now(),'$user','$user','$edate','$h[voucher]',13,'$h[totalqty]','',0,'$h[location]',0,0,'','','','','$location',1)");    
  }

  foreach($a as $item) {  
  mysqli_query($conn,"INSERT INTO transactiondetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, n1, n2, t1, t2, t3, n3, status) VALUES ('$syskey',now(),now(),'$user','$user','$i','$item[code]','$item[currency]','$item[qty]',0,0,'','','',0,1)");
  $i++;
}
echo$syskey;
}

if(isset($_POST['utheader'])){
  $header = $_POST['utheader'];
  $detail = $_POST['tdetail'];
  $h = json_decode($header,true);
  $a = json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));

  $i = 1;
  mysqli_query($conn,"UPDATE transaction SET modifiedDate=now(),modifiedUser='$user',voucherDate='$edate',voucherNo='$h[voucher]',totalQty='$h[totalqty]',remark='',n1=0,n2='$h[location]',n3=0,n4=0,t1='',t2='',t3='',t4='',locationId='$location',status=2 WHERE syskey='$h[syskey]'");

    mysqli_query($conn,"UPDATE transactiondetail SET status=4 WHERE syskey='$h[syskey]'");

  foreach($a as $item) {
       mysqli_query($conn,"INSERT INTO transactiondetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, n1, n2, t1, t2, t3, n3, status) VALUES ('$h[syskey]',now(),now(),'$user','$user','$i','$item[code]','$item[currency]','$item[qty]',0,0,'','','',0,1)");
  $i++;
}
echo$h['syskey'];
}

else if(isset($_POST['aheader'])){
  $header = $_POST['aheader'];
  $detail = $_POST['adetail'];
  $h= json_decode($header,true);
  $a= json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;

  $i=1;
  if($h['type']=='1')
  {
  mysqli_query($conn,"INSERT INTO transaction(syskey, createdDate, modifiedDate, createdUser, modifiedUser, voucherDate, voucherNo, recordType, totalQty, remark, n1, n2, n3, n4, t1, t2, t3, t4, locationId, status) VALUES ('$syskey',now(),now(),'$user','$user','$edate','$h[voucher]',14,'$h[totalqty]','',0,0,0,0,'','','','','$location',1)");
  }
  else{
  mysqli_query($conn,"INSERT INTO transaction(syskey, createdDate, modifiedDate, createdUser, modifiedUser, voucherDate, voucherNo, recordType, totalQty, remark, n1, n2, n3, n4, t1, t2, t3, t4, locationId, status) VALUES ('$syskey',now(),now(),'$user','$user','$edate','$h[voucher]',15,'$h[totalqty]','',0,0,0,0,'','','','','$location',1)");    
  }

  foreach($a as $item) {  
  mysqli_query($conn,"INSERT INTO transactiondetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, n1, n2, t1, t2, t3, n3, status) VALUES ('$syskey',now(),now(),'$user','$user','$i','$item[code]','$item[currency]','$item[qty]',0,0,'','','',0,1)");
  $i++;
}
echo$syskey;
}

if(isset($_POST['uaheader'])){
  $header = $_POST['uaheader'];
  $detail = $_POST['adetail'];
  $h = json_decode($header,true);
  $a = json_decode($detail,true);
  $edate=date("Y-m-d H:i:s", strtotime($h['date']));

  $i = 1;
  mysqli_query($conn,"UPDATE transaction SET modifiedDate=now(),modifiedUser='$user',voucherDate='$edate',voucherNo='$h[voucher]',totalQty='$h[totalqty]',remark='',n1=0,n2=0,n3=0,n4=0,t1='',t2='',t3='',t4='',locationId='$location',status=2 WHERE syskey='$h[syskey]'");

    mysqli_query($conn,"UPDATE transactiondetail SET status=4 WHERE syskey='$h[syskey]'");

  foreach($a as $item) {
       mysqli_query($conn,"INSERT INTO transactiondetail(syskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, qty, n1, n2, t1, t2, t3, n3, status) VALUES ('$h[syskey]',now(),now(),'$user','$user','$i','$item[code]','$item[currency]','$item[qty]',0,0,'','','',0,1)");
  $i++;
}
echo$h['syskey'];
}

else if(isset($_POST['receivefilter'])){

  $filter = $_POST['receivefilter'];
  $f= json_decode($filter,true);

  $query = "SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType = 10 ";

  if($f['fdate'] != "" && $f['tdate'] != "")
  {
    $query.=" and  DATE_FORMAT(t.voucherDate, '%m/%d/%Y') between '$f[fdate]' and '$f[tdate]'";
  }

  $query.=" GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name";

  $header= mysqli_query($conn,$query);
  $t="";$pay="";
  $data="<table class='table table-bordered table-hover' role='grid' id='receivehistory'>
           <thead>
             <tr class='bg-dark'>
                <th class='text-yellow'>No</th>
                <th class='text-yellow'>Date</th>
                <th class='text-yellow'>Voucher</th>
                <th class='text-yellow'>Qty</th>
                <th class='text-yellow'>Location</th>
                <th class='text-yellow'>Staff</th>
                <th class='text-yellow'>Action</th>
              </tr>
            </thead>
          <tbody>";
  $i=1;
  while ($row = mysqli_fetch_assoc($header)) {
      $date = $row['voucherDate'];
      $a = date("d-m-Y", strtotime($date));

   $data.="<tr>
              <td><?php  echo $i; ?></td>
              <td><?php  echo $a; ?></td>
              <td><?php  echo $row[voucherNo]; ?></td>
              <td><?php  echo $row[totalQty]; ?></td>
              <td><?php  echo $row[location]; ?></td>
              <td><?php  echo $row[staff]; ?></td>
              <td><a class='fa fa-edit'  href='user.php?edit=<?php echo $row[syskey] ?>' >Edit</a>
                  <button class='fa fa-edit' onClick='receiveEditView(<?php echo $row[syskey] ?>);'>Delete</button>
                  <a class='fa fa-times' href='../dao/setup.php?usrdel=<?php echo $row[syskey]; ?>'>Delete</a>
              </td>                    
           </tr>
        "; 
   $i++;
 }
   $data.="
        </tbody>
      </table>
   ";
echo$data;
} 

else if(isset($_POST['issuefilter'])){

  $filter = $_POST['issuefilter'];
  $f= json_decode($filter,true);

  $query = "SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType = 11 ";

  if($f['fdate'] != "" && $f['tdate'] != "")
  {
    $query.=" and  DATE_FORMAT(t.voucherDate, '%m/%d/%Y') between '$f[fdate]' and '$f[tdate]'";
  }

  $query.=" GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name";

  $header= mysqli_query($conn,$query);
  $t="";$pay="";
  $data="<table class='table table-bordered table-hover' role='grid' id='issuehistory'>
           <thead>
             <tr class='bg-dark'>
                <th class='text-yellow'>No</th>
                <th class='text-yellow'>Date</th>
                <th class='text-yellow'>Voucher</th>
                <th class='text-yellow'>Qty</th>
                <th class='text-yellow'>Location</th>
                <th class='text-yellow'>Staff</th>
                <th class='text-yellow'>Action</th>
              </tr>
            </thead>
          <tbody>";
  $i=1;
  while ($row = mysqli_fetch_assoc($header)) {
      $date = $row['voucherDate'];
      $a = date("d-m-Y", strtotime($date));

   $data.="<tr>
              <td><?php  echo $i; ?></td>
              <td><?php  echo $a; ?></td>
              <td><?php  echo $row[voucherNo]; ?></td>
              <td><?php  echo $row[totalQty]; ?></td>
              <td><?php  echo $row[location]; ?></td>
              <td><?php  echo $row[staff]; ?></td>
              <td><a class='fa fa-edit'  href='user.php?edit=<?php echo $row[syskey] ?>' >View</a>
                  <button class='fa fa-edit' onClick='issueEditView(<?php echo $row[syskey] ?>);'>Edit</button>
                  <a class='fa fa-times' href='../dao/setup.php?usrdel=<?php echo $row[syskey]; ?>'>Delete</a>
              </td>                    
           </tr>
        "; 
   $i++;
 }
   $data.="
        </tbody>
      </table>
   ";
echo$data;
} 

else if(isset($_POST['transferfilter'])){

  $filter = $_POST['transferfilter'];
  $f= json_decode($filter,true);

  $query = "SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType = 12 ";

  if($f['fdate'] != "" && $f['tdate'] != "")
  {
    $query.=" and  DATE_FORMAT(t.voucherDate, '%m/%d/%Y') between '$f[fdate]' and '$f[tdate]'";
  }

  $query.=" GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name";

  $In= mysqli_query($conn,$query);
  $t="";$pay="";
  $data="<table class='table table-bordered table-hover' role='grid' id='issuehistory'>
           <thead>
             <tr class='bg-dark'>
                <th class='text-yellow'>No</th>
                <th class='text-yellow'>Date</th>
                <th class='text-yellow'>Voucher</th>
                <th class='text-yellow'>Qty</th>
                <th class='text-yellow'>Location</th>
                <th class='text-yellow'>Staff</th>
                <th class='text-yellow'>Action</th>
              </tr>
            </thead>
          <tbody>";
  $i=1;
  while ($row = mysqli_fetch_assoc($In)) {
      $date = $row['voucherDate'];
      $a = date("d-m-Y", strtotime($date));

   $data.="<tr>
              <td><?php  echo $i; ?></td>
              <td><?php  echo $a; ?></td>
              <td><?php  echo $row[voucherNo]; ?></td>
              <td><?php  echo $row[totalQty]; ?></td>
              <td><?php  echo $row[location]; ?></td>
              <td><?php  echo $row[staff]; ?></td>
              <td><a class='fa fa-edit'  href='user.php?edit=<?php echo $row[syskey] ?>' >View</a>
                  <button class='fa fa-edit' onClick='issueEditView(<?php echo $row[syskey] ?>);'>Edit</button>
                  <a class='fa fa-times' href='../dao/setup.php?usrdel=<?php echo $row[syskey]; ?>'>Delete</a>
              </td>                    
           </tr>
        "; 
   $i++;
 }
   $data.="
        </tbody>
      </table>
   ";

//Begin Out

  $query1 = "SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType = 13 ";

  if($f['fdate'] != "" && $f['tdate'] != "")
  {
    $query1.=" and  DATE_FORMAT(t.voucherDate, '%m/%d/%Y') between '$f[fdate]' and '$f[tdate]'";
  }

  $query1.=" GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name";

  $Out= mysqli_query($conn,$query1);
  $t="";$pay="";
  $data1 ="<table class='table table-bordered table-hover' role='grid' id='issuehistory'>
           <thead>
             <tr class='bg-dark'>
                <th class='text-yellow'>No</th>
                <th class='text-yellow'>Date</th>
                <th class='text-yellow'>Voucher</th>
                <th class='text-yellow'>Qty</th>
                <th class='text-yellow'>Location</th>
                <th class='text-yellow'>Staff</th>
                <th class='text-yellow'>Action</th>
              </tr>
            </thead>
          <tbody>";
  $i=1;
  while ($row = mysqli_fetch_assoc($Out)) {
      $date = $row['voucherDate'];
      $a = date("d-m-Y", strtotime($date));

   $data1.="<tr>
              <td><?php  echo $i; ?></td>
              <td><?php  echo $a; ?></td>
              <td><?php  echo $row[voucherNo]; ?></td>
              <td><?php  echo $row[totalQty]; ?></td>
              <td><?php  echo $row[location]; ?></td>
              <td><?php  echo $row[staff]; ?></td>
              <td><a class='fa fa-edit'  href='user.php?edit=<?php echo $row[syskey] ?>' >View</a>
                  <button class='fa fa-edit' onClick='issueEditView(<?php echo $row[syskey] ?>);'>Edit</button>
                  <a class='fa fa-times' href='../dao/setup.php?usrdel=<?php echo $row[syskey]; ?>'>Delete</a>
              </td>                    
           </tr>
        "; 
   $i++;
 }
   $data1.="
        </tbody>
      </table>
   ";
echo$data;
echo$data1;
} 

else if(isset($_POST['rsyskey'])){
  $syskey = $_POST['rsyskey'];

  $header=mysqli_query($conn,"SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType = 10 and t.syskey = '$syskey' GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name");
 
  $detail=mysqli_query($conn,"SELECT td.no, td.code, td.description, td.qty, td.n1, td.n2, td.t1, td.t2, td.t3, td.n3, td.status FROM transactiondetail td INNER JOIN transaction t on t.syskey = td.syskey WHERE td.syskey = '$syskey' and td.status <> 4");

  $d=array();$i=0;

  while($row = mysqli_fetch_assoc($detail)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['code'],'currency'=>$row['description'],'qty'=>$row['qty']);
  endwhile;

 $h=mysqli_fetch_assoc($header);

 echo json_encode(array($h,$d));
}

else if(isset($_POST['isyskey'])){
  $syskey = $_POST['isyskey'];

  $header=mysqli_query($conn,"SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType = 11 and t.syskey = '$syskey' GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name");
 
  $detail=mysqli_query($conn,"SELECT td.no, td.code, td.description, td.qty, td.n1, td.n2, td.t1, td.t2, td.t3, td.n3, td.status FROM transactiondetail td INNER JOIN transaction t on t.syskey = td.syskey WHERE td.syskey = '$syskey' and td.status <> 4");

  $d=array();$i=0;

  while($row = mysqli_fetch_assoc($detail)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['code'],'currency'=>$row['description'],'qty'=>$row['qty']);
  endwhile;

 $h=mysqli_fetch_assoc($header);

 echo json_encode(array($h,$d));
}

else if(isset($_POST['tsyskey'])){
  $syskey = $_POST['tsyskey'];

  $header=mysqli_query($conn,"SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType in (12,13) and t.syskey = '$syskey' GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name");
 
  $detail=mysqli_query($conn,"SELECT td.no, td.code, td.description, td.qty, td.n1, td.n2, td.t1, td.t2, td.t3, td.n3, td.status FROM transactiondetail td INNER JOIN transaction t on t.syskey = td.syskey WHERE td.syskey = '$syskey' and td.status <> 4");

  $d=array();$i=0;

  while($row = mysqli_fetch_assoc($detail)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['code'],'currency'=>$row['description'],'qty'=>$row['qty']);
  endwhile;

 $h=mysqli_fetch_assoc($header);

 echo json_encode(array($h,$d));
}

else if(isset($_POST['asyskey'])){
  $syskey = $_POST['asyskey'];

  $header=mysqli_query($conn,"SELECT t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description as location,s.name as staff FROM transaction t INNER JOIN transactiondetail td on t.syskey = td.syskey INNER JOIN location l on l.syskey = t.locationId INNER JOIN user u on u.syskey = t.createdUser INNER JOIN staff s on s.syskey = u.staffId WHERE t.status <>4 and t.createdUser = '$user' and t.locationId = '$location' and t.recordType in (14,15) and t.syskey = '$syskey' GROUP BY t.syskey, t.voucherDate, t.voucherNo, t.recordType, t.totalQty, t.remark, t.n1, t.n2, t.n3, t.n4, t.t1, t.t2, t.t3, t.t4, t.locationId,l.description,s.name");
 
  $detail=mysqli_query($conn,"SELECT td.no, td.code, td.description, td.qty, td.n1, td.n2, td.t1, td.t2, td.t3, td.n3, td.status FROM transactiondetail td INNER JOIN transaction t on t.syskey = td.syskey WHERE td.syskey = '$syskey' and td.status <> 4");

  $d=array();$i=0;

  while($row = mysqli_fetch_assoc($detail)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['code'],'currency'=>$row['description'],'qty'=>$row['qty']);
  endwhile;

 $h=mysqli_fetch_assoc($header);

 echo json_encode(array($h,$d));
}

else if(isset($_GET['rdel'])){
  $syskey = $_GET['rdel'];

  $header = mysqli_query($conn,"UPDATE transaction SET status=4 WHERE syskey='$syskey' and recordType = 10");
 
  $detail = mysqli_query($conn,"UPDATE transactiondetail SET status=4 WHERE syskey='$syskey'");
header('location:../page/receive.php');
}

else if(isset($_GET['idel'])){
  $syskey = $_GET['idel'];

  $header = mysqli_query($conn,"UPDATE transaction SET status=4 WHERE syskey='$syskey' and recordType = 11");
 
  $detail = mysqli_query($conn,"UPDATE transactiondetail SET status=4 WHERE syskey='$syskey'");
header('location:../page/receive.php');
}

else if(isset($_GET['tdel'])){
  $syskey = $_GET['tdel'];

  $header = mysqli_query($conn,"UPDATE transaction SET status=4 WHERE syskey='$syskey' and recordType in (12,13)");
 
  $detail = mysqli_query($conn,"UPDATE transactiondetail SET status=4 WHERE syskey='$syskey'");
header('location:../page/transfer.php');
}

else if(isset($_GET['adel'])){
  $syskey = $_GET['adel'];

  $header = mysqli_query($conn,"UPDATE transaction SET status=4 WHERE syskey='$syskey' and recordType in (14,15)");
 
  $detail = mysqli_query($conn,"UPDATE transactiondetail SET status=4 WHERE syskey='$syskey'");
header('location:../page/adjustment.php');
}

else if(isset($_POST['GetCur'])){
  $code = $_POST['GetCur'];
  $sql = "SELECT  saleRate, buyRate, n1 FROM currency WHERE code = '$code' and status <>4";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
}

?>