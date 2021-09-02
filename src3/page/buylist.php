<?php
include("../confs/config.php");
require("../pdf/fpdf.php");

$result=mysqli_query($conn,"SELECT b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, s.mmName as customerName, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status FROM buy b INNER JOIN buydetail bd on b.syskey = bd.hsyskey INNER JOIN supplier s on s.syskey = b.customerId WHERE b.status <> 4 and  DATE_FORMAT(b.voucherDate, '%m/%d/%Y') between DATE_FORMAT(now(), '%m/%d/%Y') and DATE_FORMAT(now(), '%m/%d/%Y') GROUP BY b.id, b.syskey, b.createdDate, b.modifiedDate, b.voucherDate, b.createdUser, b.modifiedUser, b.voucherNo, b.customerId, b.totalQty, b.totalAmount, b.n1, b.n2, b.n3, b.t1, b.t2, b.t3, b.status");

$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();
/*$pdf->Addfont('Zawgyi-One','','zawgyione.php');*/
$pdf->SetFont('Arial','B',12);
//Cell(width,height,text,border,end line,align)
$pdf->Cell(65,5,'',0,0);
$pdf->Cell(130,5,'Star Moe Yan Trading Co.,Ltd.',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,5,'',0,0);
$pdf->Cell(60,5,'Moe Yan Exchange',0,1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(82,5,'',0,0);
$pdf->Cell(72,5,'Exchange List',0,1);

$pdf->Cell(79,5,'',0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(10,5,'Date :  ',0,0);
$fdate = $f['fdate'];
$tdate = $f['tdate'];
$fd = date("d-m-Y", strtotime($fdate));
$td = date("d-m-Y", strtotime($tdate));
$pdf->Cell(18,5,$fd,0,0);
$pdf->Cell(2,5,' / ',0,0);
$pdf->Cell(18,5,$td,0,0);

$pdf->Cell(1,5,',',0,0);

$pdf->Cell(25,5,'Exchange Type : ',0,0);
if($f['type']==1)
$pdf->Cell(10,5,'Sale',0,0);
else if($f['type']==2)
$pdf->Cell(10,5,'Buy',0,0);
else 
$pdf->Cell(5,5,'All',0,0);

$pdf->Cell(1,5,',',0,0);

$pdf->Cell(15,5,'Payment : ',0,0);
if($f['payment']==1)
$pdf->Cell(10,5,'Cash',0,0);
else if($f['payment']==2)
$pdf->Cell(10,5,'Credit',0,0);
else 
$pdf->Cell(5,5,'All',0,0);

$pdf->Cell(1,5,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,8,'',0,0);
$pdf->Cell(10,8,'No',1,0);
$pdf->Cell(20,8,'Date',1,0);
$pdf->Cell(10,8,'Type',1,0);
$pdf->Cell(20,8,'Payment',1,0);
$pdf->Cell(20,8,'Voucher',1,0);
$pdf->Cell(40,8,'Customer',1,0);
$pdf->Cell(15,8,'Qty',1,0);
$pdf->Cell(20,8,'Amount',1,0);
$pdf->Cell(25,8,'Location',1,1);

$pdf->SetFont('Arial','',10);
 
    $i=1;$totalqty=0;
    /*while($row = mysqli_fetch_assoc($d)):*/ 
    foreach($d as $row) 
{
    $pdf->Cell(5,6,'',0,0);
    $pdf->Cell(10,6,$i,1,0);
    $eDate = $row['date'];
    $ed = date("d-m-Y", strtotime($eDate));
    $pdf->Cell(20,6,$ed,1,0);
    $pdf->Cell(10,6,$row['type'],1,0);
    $pdf->Cell(20,6,$row['payment'],1,0);
    $pdf->Cell(20,6,$row['voucher'],1,0);
    $pdf->Cell(40,6,$row['customer'],1,0);
    $pdf->Cell(15,6,$row['qty'],1,0);
    $pdf->Cell(20,6,$row['amount'],1,0);
    $pdf->Cell(25,6,$row['location'],1,1);

    $totalqty+=$row['qty'];
    $i++; 
    /*endwhile;*/
}

$pdf->Cell(5,8,'',0,0);
$pdf->Cell(10,8,'',0,0);
$pdf->Cell(20,8,'',0,0);
$pdf->Cell(10,8,'',0,0);
$pdf->Cell(20,8,'',0,0);
$pdf->Cell(20,8,'',0,0);
$pdf->Cell(40,8,'Total : ',0,0);
$pdf->Cell(15,8,$totalqty,0,0);
$pdf->Cell(20,8,'',0,0);
$pdf->Cell(25,8,'',0,1);

$pdf->Output();
echo$d;

?>