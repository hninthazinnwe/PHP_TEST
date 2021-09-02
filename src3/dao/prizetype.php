<?php
include("../confs/config.php");

if(isset($_POST['save'])){
  $info = $_POST['save'];
  $prizetype= json_decode($info,true);
  $date = date("Ymdhi");
  $rand = rand(1000,9999); 
  $syskey = $date.$rand;
  $sql="INSERT INTO prizetype(syskey, createdDate, modifiedDate, createdUser, modifiedUser, code, description, amount, n1, n2, t1, t2, status) VALUES ('$syskey',now(),now(),'','','$prizetype[code]','$prizetype[description]','$prizetype[amount]',0,0,'','',1)";
mysqli_query($conn,$sql);
}

else if(isset($_POST['update'])){
  $info = $_POST['update'];
  $prizetype= json_decode($info,true);
  $syskey = $prizetype['syskey'];
  $sql="UPDATE prizetype SET modifiedDate=now(),modifiedUser='',description='$prizetype[description]',amount='$prizetype[amount]',n1=0,n2=0,t1='',t2='',status=2 WHERE syskey = '$syskey'";
mysqli_query($conn,$sql);
}

else if(isset($_GET['del'])){
  $syskey = $_GET['del'];
  $sql="UPDATE prizetype  set status = 4 WHERE  syskey = '$syskey'";
mysqli_query($conn,$sql);
header("location:../page/prizetype.php" );
}
?>