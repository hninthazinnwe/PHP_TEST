<?php
include("../confs/config.php");

//filter to Custoemr
if(isset($_POST['cussave'])){
  $info = $_POST['cussave'];
  $customer= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
  $sql="INSERT INTO customer(syskey, createdDate, modifiedDate, createdUser, modifiedUser, code, engName, mmName, nrc, phone, address, email, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'','','$customer[code]','$customer[engname]','$customer[mmname]','$customer[nrc]','$customer[phone]','$customer[address]','$customer[email]',0,0,'','',1)";
mysqli_query($conn,$sql);
}

else if(isset($_POST['cusupdate'])){
  $info = $_POST['cusupdate'];
  $customer= json_decode($info,true);
  $syskey = $customer['syskey'];
  $sql="UPDATE customer SET modifiedDate=now(),modifiedUser=now(),engName='$customer[engname]',mmName='$customer[mmname]',nrc='$customer[nrc]',phone='$customer[phone]',address='$customer[address]',email='$customer[email]',n1=0,n2=0,t1='',t2='',status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['cusdel'])){
  $syskey = $_GET['cusdel'];
  $sql="UPDATE customer  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/customer.php" );
}

//filter to Supplier
else if(isset($_POST['supsave'])){
  $info = $_POST['supsave'];
  $customer= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
  $sql="INSERT INTO supplier(syskey, createdDate, modifiedDate, createdUser, modifiedUser, code, engName, mmName, nrc, phone, address, email, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'','','$customer[code]','$customer[engname]','$customer[mmname]','$customer[nrc]','$customer[phone]','$customer[address]','$customer[email]',0,0,'','',1)";
mysqli_query($conn,$sql);
}

else if(isset($_POST['supupdate'])){
  $info = $_POST['supupdate'];
  $customer= json_decode($info,true);
  $syskey = $customer['syskey'];
  $sql="UPDATE supplier SET modifiedDate=now(),modifiedUser=now(),engName='$customer[engname]',mmName='$customer[mmname]',nrc='$customer[nrc]',phone='$customer[phone]',address='$customer[address]',email='$customer[email]',n1=0,n2=0,t1='',t2='',status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['supdel'])){
  $syskey = $_GET['supdel'];
  $sql="UPDATE customer  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/supplier.php" );
}

//filter to location
else if(isset($_POST['locsave'])){
  $info = $_POST['locsave'];
  $customer= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999);
  $syskey = $date.$rand;
  $sql="INSERT INTO location(syskey, createdDate, modifiedDate, createdUser, modifiedUser, code, description,phone, address, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'','','$customer[code]','$customer[name]','$customer[phone]','$customer[address]',0,0,'','',1)";
mysqli_query($conn,$sql);
echo$sql;
}

else if(isset($_POST['locupdate'])){
  $info = $_POST['locupdate'];
  $customer= json_decode($info,true);
  $syskey = $customer['syskey'];
  $sql="UPDATE location SET modifiedDate=now(),modifiedUser='',description='$customer[name]',phone = '$customer[phone]',address='$customer[address]',n1=0,n2=0,t1='$customer[phone]',t2='',status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['locdel'])){
  $syskey = $_GET['locdel'];
  $sql="UPDATE location  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/location.php" );
}

//filter to staff
else if(isset($_POST['stfsave'])){
  $info = $_POST['stfsave'];
  $customer= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
  $sql="INSERT INTO staff(syskey, createdDate, modifiedDate, createdUser, modifiedUser, code, name, nrc, phone, address, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'','','$customer[code]','$customer[name]','$customer[nrc]','$customer[phone]','$customer[address]',0,0,'','',1)";
mysqli_query($conn,$sql);
}

else if(isset($_POST['stfupdate'])){
  $info = $_POST['stfupdate'];
  $customer= json_decode($info,true);
  $syskey = $customer['syskey'];
  $sql="UPDATE staff SET modifiedDate=now(),modifiedUser=now(),name='$customer[name]',nrc='$customer[nrc]',phone='$customer[phone]',address='$customer[address]',n1=0,n2=0,t1='',t2='',status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['stfdel'])){
  $syskey = $_GET['stfdel'];
  $sql="UPDATE staff  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/staff.php" );
}

//filter to Currency
else if(isset($_POST['cursave'])){
  $info = $_POST['cursave'];
  $customer= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
  $sql="INSERT INTO currency(syskey, createdDate, modifiedDate, createdUser, modifiedUser, code, description, country, image, saleRate, buyRate, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'$user','$user','$customer[code]','$customer[name]','','$customer[image]',0,0,'$customer[unit]','$customer[category]','','',1)";
mysqli_query($conn,$sql);
}

else if(isset($_POST['curupdate'])){
  $info = $_POST['curupdate'];
  $customer= json_decode($info,true);
  $syskey = $customer['syskey'];
  $sql="UPDATE currency SET modifiedDate=now(),modifiedUser='',description='$customer[name]',image='$customer[image]',n1='$customer[unit]',n2='$customer[category]', status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['curdel'])){
  $syskey = $_GET['curdel'];
  $sql="UPDATE currency  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/currency.php" );
}

//filter to user
else if(isset($_POST['usave'])){
  $info = $_POST['usave'];
  $customer= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
  $sql="INSERT INTO user(syskey, createdDate, modifiedDate, createdUser, modifiedUser, userName, password, staffId, roleId, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'','','$customer[code]','$customer[password]','$customer[staff]',0,0,0,'','',1)";  
mysqli_query($conn,$sql);
}

else if(isset($_POST['uupdate'])){
  $info = $_POST['uupdate'];
  $customer= json_decode($info,true);
  $syskey = $customer['syskey'];
  $sql="UPDATE user SET modifiedDate=now(),modifiedUser='',password='$customer[password]',staffId='$customer[staff]',n1=0,n2=0,t1='',t2='',status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['usrdel'])){
  $syskey = $_GET['usrdel'];
  $sql="UPDATE user  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/user.php" );
}

//filter to category
else if(isset($_POST['catsave'])){
  $info = $_POST['catsave'];
  $category= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
  $sql="INSERT INTO category(syskey, createdDate, modifiedDate, createdUser, modifiedUser, code, description, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'$user','$user','$category[code]','$category[description]',0,0,'','',1)";
mysqli_query($conn,$sql);
}

else if(isset($_POST['catupdate'])){
  $info = $_POST['catupdate'];
  $category= json_decode($info,true);
  $syskey = $category['syskey'];
  $sql="UPDATE category SET modifiedDate=now(),modifiedUser='$user',description='$category[description]',n1=0,n2=0,t1='',t2='',status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['catdel'])){
  $syskey = $_GET['catdel'];
  $sql="UPDATE category  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/category.php" );
}

//filter to location
else if(isset($_POST['rodsave'])){
  $info = $_POST['rodsave'];
  $customer= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
  $fdate=date("Y-m-d H:i:s", strtotime($customer[fdate]));
  $tdate=date("Y-m-d H:i:s", strtotime($customer[tdate]));
  $sql="INSERT INTO round(syskey, createdDate, modifiedDate, createdUser, modifiedUser, times, description, fromDate, toDate, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'','','$customer[times]','$customer[name]','$fdate','$tdate',0,0,'','',1)";
mysqli_query($conn,$sql);
}

else if(isset($_POST['rodupdate'])){
  $info = $_POST['rodupdate'];
  $customer= json_decode($info,true);
  $syskey = $customer['syskey'];
  $sql="UPDATE round SET modifiedDate=now(),modifiedUser='',times='$customer[times]',description='$customer[name]',fromDate='$customer[fdate]',toDate='$customer[tdate]',n1=0,n2=0,t1='',t2='',status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['roddel'])){
  $syskey = $_GET['roddel'];
  $sql="UPDATE round  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/round.php" );
}
//filter to Permission
else if(isset($_POST['permission'])){
  $user = $_POST['user'];
  $rule = $_POST['rule'];
  $location = $_POST['location'];
  $r= json_decode($rule,true);
  $l= json_decode($location,true);  
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;

  foreach($r as $item) {
  $sql="INSERT INTO jun002(createdDate, createdUser, userId, code, description, recordstatus, n1, t1, status) VALUES (now(),'','$user','$item[code]','$item[description]','$item[rule]',0,'',1)";
  mysqli_query($conn,$sql);
}
  foreach($l as $item) {
  $sql1="INSERT INTO jun001(createdDate, createdUser, userId, locationId, userName, locationName, n1, t1, status) VALUES (now(),'','$user','$item[locationId]','','$item[locationName]',0,'',1)";
  mysqli_query($conn,$sql1);
}
}

else if(isset($_GET['roddel'])){
  $syskey = $_GET['roddel'];
  $sql="UPDATE round  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/round.php" );
}
//filter to Permission
else if(isset($_POST['findpermission'])){
  $user = $_POST['user'];

  $loc = mysqli_query($conn,"SELECT userId, locationId, userName, locationName, n1, t1, status FROM jun001 WHERE userId = '$user'");
 
  $r = mysqli_query($conn,"SELECT userId, code, description, recordstatus FROM jun002 WHERE userId = '$user'");

  $location = array();$rule = array();$i = 0;

  while($row = mysqli_fetch_assoc($r)):
     $rule[] = array('code'=>$row['code'],'description'=>$row['description'],'rule'=>$row['recordstatus']);
  endwhile;

  while($row = mysqli_fetch_assoc($loc)):
     $location[] = array('locationId'=>$row['locationId'],'locationName'=>$row['locationName']);
  endwhile;

 echo json_encode(array($location,$rule));}
?>