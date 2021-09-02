<?php
include("../confs/config.php");
if(isset($_POST["Import"])){

$filename=$_FILES["file"]["tmp_name"];
$date=$_POST['datepicker'];
$times=$_POST['times'];
$voucher=$_POST['voucherno'];
$date = date("Ymdhi");   
$rand = rand(1000,9999); 
$syskey = $date.$rand;
$i = 1;

if($_FILES["file"]["size"] > 0)
{
$file = fopen($filename, "r");

 mysqli_query($conn,"INSERT INTO lotteryprize(syskey, createdDate, modifiedDate, createdUser, modifiedUser, lotteryDate, formNo, times, n1, n2, n3, t1, t2, t3, status) VALUES ('$syskey',now(),now(),1,1,now(),'$voucher','$times',0,0,0,'','','',1)");

while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
{
//$sql = "INSERT into subject (`SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`,COURSE_ID, `AY`, `SEMESTER`) 
//values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";
//$result = mysqli_query($conn,$sql );
$drand = rand(1000,9999); 
$dsyskey = $date.$drand;

  $result = mysqli_query($conn,"INSERT INTO prizeserial(dsyskey, hsyskey, createdDate, createdUser, code, description, alpha, number, n1, n2, t1, t2, status) VALUES ('$dsyskey','$syskey',now(),1,'$emapData[1]','$emapData[2]','$emapData[4]','$emapData[5]',0,0,'','',1)");

  $result = mysqli_query($conn,"INSERT INTO lotteryprizedetail(syskey, hsyskey, createdDate, modifiedDate, createdUser, modifiedUser, no, code, description, amount, qty, n1, n2, t1, t2, status) VALUES ('$dsyskey','$syskey',now(),now(),1,1,'$i','$emapData[1]','$emapData[2]','$emapData[3]',0,0,0,'','',1)");
  $i++;

if(! $result )
{
echo "<script type='text/javascript'>
alert('Invalid File:Please Upload CSV File.');
window.location = 'index.php'
</script>";
}
}
fclose($file);
echo "<script type=\"text/javascript\">
alert(\"CSV File has been successfully Imported.\");
window.location = \"index.php\"
< /script>";
mysql_close($conn); 
}
} 
?> 
