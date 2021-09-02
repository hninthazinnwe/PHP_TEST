<?php 
include("../confs/config.php");
$username="";
$password="";
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT count(u.id) as count,u.userName,u.password,u.syskey as usersyskey,s.name as staff,s.syskey as staffsyskey FROM user  u INNER JOIN staff s on s.Syskey = u.staffId WHERE u.userName='$username' and u.password = '$password' and u.status <> 4 GROUP BY u.userName,u.password,u.syskey,s.name,s.syskey";

$rule="SELECT jun.code, jun.description, jun.recordstatus,s.name,u.userName  FROM jun002 jun inner join staff s on s.syskey = jun.userId inner join user u on u.staffId = s.syskey  WHERE u.userName='$username' and u.password = '$password' and u.status <> 4 GROUP BY  jun.code, jun.description, jun.recordstatus,s.name,u.userName ";

$loc="SELECT u.userName,l.syskey as locationSyskey,l.code as locationCode,l.address as locationAddress,l.description as locationName,s.name as staff FROM user  u INNER JOIN staff s on s.Syskey = u.staffId INNER JOIN jun001 j1 on j1.userId = s.syskey INNER JOIN location l on l.syskey = j1.locationId WHERE u.userName='$username' and u.status <> 4 GROUP BY u.userName,l.syskey,l.description,s.name,l.id";

$query=mysqli_query($conn,$sql)or die(mysql_error());
$query1=mysqli_query($conn,$loc)or die(mysql_error());
$r=mysqli_query($conn,$rule)or die(mysql_error());
$result=mysqli_fetch_assoc($query);
$locresult=mysqli_fetch_assoc($query1);
$num_rows = mysqli_num_rows($query1); 
if( $result['count'] == '1' and $num_rows == 1) 
 {
   session_start();

   $_SESSION["lotteryrule"]= 0;
   $_SESSION["buyrule"]= 0;
   $_SESSION["salerule"]= 0;
   $_SESSION["transferrule"]= 0;
   $_SESSION["setuprule"]= 0;
   $_SESSION["reportrule"]= 0;

   while($row = mysqli_fetch_assoc($r)){
      if($row['code'] == 'R-001')
      {
         $_SESSION["lotteryrule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-002')
      {
         $_SESSION["buyrule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-003')
      {
         $_SESSION["salerule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-004')
      {
         $_SESSION["transferrule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-005')
      {
         $_SESSION["setuprule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-006')
      {
         $_SESSION["reportrule"] = $row['recordstatus'];
      }
   }

   $_SESSION["user"] = $result['userName'];
   $_SESSION["usersyskey"] = $result['usersyskey'];
   $_SESSION["staff"] = $result['staff'];
   $_SESSION["staffsyskey"] = $result['staffsyskey'];
   $_SESSION["location"] = $locresult['locationName'];
   $_SESSION["locationsyskey"] = $locresult['locationSyskey'];
   $_SESSION["locationcode"] = $locresult['locationCode']; 
   $_SESSION["locationaddress"] = $locresult['locationAddress']; 
   header("location:home.php");
 }
 else if($result['count'] == '1' and $num_rows > 1)
 {

   session_start();
   
   $_SESSION["lotteryrule"]= 0;
   $_SESSION["buyrule"]= 0;
   $_SESSION["salerule"]= 0;
   $_SESSION["transferrule"]= 0;
   $_SESSION["setuprule"]= 0;
   $_SESSION["reportrule"]= 0;

   while($row = mysqli_fetch_assoc($r)){
      if($row['code'] == 'R-001')
      {
         $_SESSION["lotteryrule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-002')
      {
         $_SESSION["buyrule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-003')
      {
         $_SESSION["salerule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-004')
      {
         $_SESSION["transferrule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-005')
      {
         $_SESSION["setuprule"] = $row['recordstatus'];
      }
      else if($row['code'] == 'R-006')
      {
         $_SESSION["reportrule"] = $row['recordstatus'];
      }
   }
   $_SESSION["user"] = $result['userName'];
   $_SESSION["usersyskey"] = $result['usersyskey'];
   $_SESSION["staff"] = $result['staff'];
   $_SESSION["staffsyskey"] = $result['staffsyskey'];
   header("location:setlocation.php?username=".$username); 
 }
 else  header("location:../index.php");
}
else if(isset($_POST['chooseloc'])){
   $location=$_POST['chooseloc'];
   $l = json_decode($location,true);
   $_SESSION["location"] = $l['name'];
   $_SESSION["locationsyskey"] = $l['syskey'];
   $_SESSION["locationcode"] = $l['code']; 
   $_SESSION["locationaddress"] = $l['address']; 
}
?>
<script>
function showform(){

   document.getElementById("alertinput").style.display="block";
   document.getElementById("inputoverlay").style.display="block";
 }
</script>