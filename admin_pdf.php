<?php 
session_start();
    include_once 'creatdb.php';
    $admin = new Admin();

    $admin_id = $_SESSION['admin_id'];

    if (!$admin->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['logout'])){
        $admin->admin_logout();
        header("location:login.php");
    }
	$cser=mysqli_connect("localhost","root","","yatri_db");
					$query = "SELECT * from admin_account where admin_id='".$admin_id."'"; 
					$result = mysqli_query($cser, $query) or die ( mysqli_error());
					$row = mysqli_fetch_assoc($result);
					
					
					$bus_date = $_GET['date']; 
					$seat = $_GET['seat'];
					$query1="SELECT * FROM bus_seats where seat_date='$bus_date' and seat_name='$seat'";
					$result1 = mysqli_query($cser, $query1) or die ( mysqli_error());
					$row1 = mysqli_fetch_assoc($result1);
					$cmp=$row1["cmp_name"];
?>
<?php
require('fpdf/fpdf.php');
class PDF_Dash extends FPDF
{
    function SetDash($black=null, $white=null)
    {
        if($black!==null)
            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
}
$pdf=new FPDF();
$pdf=new PDF_Dash();
$pdf->AddFont('ColonnaMT','','COLONNA.php');
$pdf->AddPage();
$pdf->Rect(3, 8, 204, 92, 'D');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(70);
$pdf->Cell(90,10,'Yatri bus Ticket');
$pdf->Ln();
$pdf->Rect(5, 23, 200, 73, 'D');
$pdf->SetTextColor(29,25,198);
$pdf->SetFont('ColonnaMT','',48);
$pdf->Cell(50,19,'Yatri');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(90,19,''.$cmp);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(40,19,'Date: '.$bus_date);
$pdf->Ln();
$pdf->Rect(7, 40, 196, 53, 'D');
$pdf->Cell(100,14,'Bus No.: '.$row1["bus_num"]);
$pdf->Cell(50,14,'Ticket No.: '.$row1["seat_id"]);
$pdf->Ln();
$pdf->Cell(100,8,'Name : '.$row1["seat_uname"]);
$pdf->Cell(50,8,'User Name : '.$row1["username"]); 
$pdf->Ln();
$pdf->Cell(100,8,'From: '.$row1["bus_from"]);
$pdf->Cell(50,8,'To: '.$row1["bus_to"]);
$pdf->Ln();
$pdf->Cell(100,8,'Seat: '.$seat);
$pdf->Cell(50,8,'No. of seats: '.$row1["seat_num"]);
$pdf->Ln();
$pdf->Cell(100,8,'Time: '.date('h:i a', strtotime($row1["bus_time"])));
$pdf->Cell(50,8,'Total Price: '.$row1["total_price"]);
$pdf->Ln();
$pdf->Cell(100,8,'Phone: '.$row1["phone"]);
$pdf->SetLineWidth(0.8);
$pdf->SetDash(5,5);
$pdf->Line(0,110,210,110);

$pdf->Output();

?>