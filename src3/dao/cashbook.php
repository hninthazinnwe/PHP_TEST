<?php 
include("../confs/config.php");

if(isset($_POST['cashbook'])){
  $from = $_POST['fdate'];
  $to = $_POST['tdate']; 
  $times = $_POST['times'];
  $location = $_POST['location'];     
  $d = array();$i = 0;

  $query = "SELECT 1 as code,'opening' as type,'' as date,'opening' as voucherNo,'' as customer,(select sum(totalamount) from sale where STATUS <> 4 and DATE_FORMAT(voucherDate, '%m/%d/%Y') < '$from')-(select sum(totalamount) from buy where STATUS <> 4 and DATE_FORMAT(voucherDate, '%m/%d/%Y') < '$from') as Amount UNION ALL
SELECT 2 as code,'sale' as type,s.voucherDate as date,s.voucherNo as voucherNo,c.engName as customer,s.totalAmount as Amount from sale s INNER JOIN customer c on c.syskey = s.customerId INNER JOIN saledetail sd on s.syskey = sd.hsyskey where s.STATUS <> 4 ";

  if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(s.voucherDate, '%m/%d/%Y') between '$from' and '$to' ";
  }

  $query .= "GROUP by s.voucherDate,s.voucherNo,c.engName,s.totalAmount UNION ALL
SELECT 3 as code,'buy' as type,s.voucherDate as date,s.voucherNo as voucherNo,c.engName as customer,s.totalAmount as Amount from buy s INNER JOIN supplier c on c.syskey = s.customerId INNER JOIN buydetail bd on s.syskey = bd.hsyskey where s.STATUS <> 4 ";

  if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(s.voucherDate, '%m/%d/%Y') between '$from' and '$to' ";
  }
    $query .= "GROUP BY s.voucherDate,s.voucherNo,c.engName,s.totalAmount";

  $header = mysqli_query($conn,$query);

  while($row = mysqli_fetch_assoc($header)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['code'],'type'=>$row['type'],'date'=>$row['date'],'voucher'=>$row['voucherNo'],'customer'=>$row['customer'],'amount'=>$row['Amount']);
  endwhile;

  echo json_encode(array($d));
  //echo $query;
}

else if(isset($_POST['buystock'])){
  $from = $_POST['fdate'];
  $to = $_POST['tdate']; 
  $times = $_POST['times'];
  $location = $_POST['location'];     
  $d = array();$i = 0;

  $query = "SELECT b.voucherNo,b.voucherDate,bd.times,bd.code,bd.description,bd.amount,sum(bd.qty) as qty FROM buy b INNER JOIN buydetail bd on b.syskey = bd.hsyskey WHERE b.status <> 4";

  if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(b.voucherDate, '%m/%d/%Y') between '$from' and '$to' ";
  }

    $query .= "GROUP by bd.amount";

  $header = mysqli_query($conn,$query);

  while($row = mysqli_fetch_assoc($header)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['code'],'description'=>$row['description'],'date'=>$row['voucherDate'],'voucher'=>$row['voucherNo'],'qty'=>$row['qty'],'amount'=>$row['amount']);
  endwhile;

  echo json_encode(array($d));
  //echo $query;
}

else if(isset($_POST['stockbalance'])){
  $from = $_POST['fdate'];
  $to = $_POST['tdate']; 
  $times = $_POST['times'];
  $location = $_POST['location'];     
  $d = array();$i = 0;

  $query = "select Code,Description,sum(Oqty) as Oqty,sum(Bqty) as Bqty,sum(TIqty) as TIqty,sum(Sqty) as Sqty,sum(TOqty) as TOqty from (
Select  s.Code,s.Description,ed.times,sum(ed.qty) as Oqty,0 as Bqty,0 as TIqty,0 as Sqty,0 as TOqty from buy e inner join buydetail ed on e.syskey = ed.hsyskey inner join prizetype s on s.code= ed.code WHERE e.status <> 4";

  if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(e.voucherDate, '%m/%d/%Y') < '$from' ";
  }

    $query .= "group by s.code,s.description,times
Union All
Select  s.Code,s.Description,ed.times,sum((-1)*ed.qty) as Oqty,0 as Bqty,0 as TIqty,0 as Sqty,0 as TOqty from sale e inner join saledetail ed on e.syskey = ed.hsyskey inner join prizetype s on s.code= ed.code WHERE e.status <> 4";

  if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(e.voucherDate, '%m/%d/%Y') < '$from' ";
  }

    $query .= "group by s.code,s.description,times 
Union All
Select  s.Code,s.Description,ed.times,0 as Oqty,sum(ed.qty) as Bqty,0 as TIqty,0 as Sqty,0 as TOqty from buy e inner join buydetail ed on e.syskey = ed.hsyskey inner join prizetype s on s.code= ed.code WHERE e.status <> 4";

if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(e.voucherDate, '%m/%d/%Y') between '$from' and '$to' ";
  }

    $query .= "group by s.code,s.description,times 
Union All
Select  s.Code,s.Description,ed.times,0 as Oqty,sum(ed.qty) as Bqty,0 as TIqty,0 as Sqty,0 as TOqty from buy e inner join buydetail ed on e.syskey = ed.hsyskey inner join prizetype s on s.code= ed.code WHERE e.status <> 4";

if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(e.voucherDate, '%m/%d/%Y') between '$from' and '$to' ";
  }

    $query .= "group by s.code,s.description,times
Union All
Select  s.Code,s.Description,ed.times,0 as Oqty,0 as Bqty,0 as TIqty,sum(ed.qty) as Sqty,0 as TOqty from sale e inner join saledetail ed on e.syskey = ed.hsyskey inner join prizetype s on s.code= ed.code WHERE e.status <> 4";

if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(e.voucherDate, '%m/%d/%Y') between '$from' and '$to' ";
  }

    $query .= " group by s.code,s.description,times) as a group by Code,Description";

  $header = mysqli_query($conn,$query);

  while($row = mysqli_fetch_assoc($header)):
    $i++;
     $d[] = array('id'=>$i,'code'=>$row['Code'],'description'=>$row['Description'],'Oqty'=>$row['Oqty'],'Bqty'=>$row['Bqty'],'TIqty'=>$row['TIqty'],'Sqty'=>$row['Sqty'],'TOqty'=>$row['TOqty']);
  endwhile;

  echo json_encode(array($d));
  //echo $query;
}

else if(isset($_POST['serialbalance'])){
  $from = $_POST['fdate'];
  $to = $_POST['tdate']; 
  $times = $_POST['times'];
  $location = $_POST['location'];     
  $d = array();$i = 0;

  $query = "SELECT ed.no, ed.code, ed.description,ed.times, ed.qty, ed.ratio, ed.amount, ed.totalamount, ed.n1, (SELECT GROUP_CONCAT(CONCAT(alpha,number)) AS serial FROM buyserial WHERE dsyskey = ed.syskey) as serial FROM buydetail ed INNER JOIN buy e on e.syskey = ed.hsyskey WHERE ed.status <> 4 and ed.n1 = 0";

  if($from != "" && $to != "")
  {
    $query.=" and  DATE_FORMAT(e.voucherDate, '%m/%d/%Y') between '$from' and '$to' ";
  }

  $query.="  GROUP BY ed.code, ed.description";
  $header = mysqli_query($conn,$query);

  while($row = mysqli_fetch_assoc($header)):
    $i++;
     $d[] = array('no'=>$i,'code'=>$row['code'],'description'=>$row['description'],'times'=>$row['times'],'serial'=>$row['serial']);
  endwhile;

  echo json_encode(array($d));
  //echo $query;
}
?>