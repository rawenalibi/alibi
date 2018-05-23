<?php
$db = new PDO ('mysql:host=localhost;dbname=lycee','root','0000');
if(isset($_POST['submit']))
{   $na=$_GET['var1'];
    $ne=$_GET['var2'];
    $se=$_GET['var3'];
 require("fpdf/fpdf.php");

class myPDF extends FPDF{
function header(){
    $today = getdate();
    $na=$_GET['var1'];
    $ne=$_GET['var2'];
    $se=$_GET['var3'];
    $this->SetFont("Arial","B",14);
    $this->Cell(276,5,"Relever de note " ,0,0,"C");
    $this->Ln(10);
    $this->Cell(276,5,"Matiere: $na " ,0,0,"C");
    $this->Ln(10);
    $this->Cell(276,5," Niveau: $ne " ,0,0,"C");
    $this->Ln(10);
    $this->Cell(276,5,"Section: $se " ,0,0,"C");
    $this->Ln(10);
    $this->Cell(276,5,date("Y/m/d") ,0,0,"C");
    $this->Ln(10);
}

function headerTable()
{
    $this->SetFont("Times","B",12);
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"num inscription",1,0,"C");
    $this->Cell(60,5,"nom eleve",1,0,"C");
    $this->Cell(20,5,"moyenne",1,0,"C");
    $this->Ln();
}


function viewTable($db)
{
    $na=$_GET['var1'];
    $ne=$_GET['var2'];
    $se=$_GET['var3'];
    
    $stmt = $db->prepare("select count(*) from eleve WHERE niveau = ? AND section = ?");
  $stmt->bindParam(1,$ne);
  $stmt->bindParam(2,$se);
  $stmt->execute();
  $number_of_rows = $stmt->fetchColumn(); 
    $r=array();
    $x=0;
 foreach ($_POST['tab'] as $key => $value)
    {  
    if($x< $number_of_rows)
    {
   $r[$x]=$value;
    }
    $x++;

}
$x=0;

    $this->SetFont("Times","B",12);
    $stmt = $db->prepare("select  * from eleve where niveau='$ne' and section='$se'");
    $stmt->execute();
 
    while($row = $stmt->fetch())
{
     $c= $r[$x];
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,10,$row['id'],1,0,"C");
    $this->Cell(60,10,$row['name'],1,0,"C");
    $this->Cell(20,10,$c,1,0,"C");
    $this->Ln();
    $x++;
}



}

}
$pdf=new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('C','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);

$pdf->Output('C:\xampp\htdocs\lycee\exemple\1_1_'.$na.'.pdf');

$file = "exemple/1_1_$na.pdf";
$ne=$_GET['var2'];
$se=$_GET['var3'];
 $stmt = $db->prepare("insert into note values ('',?,?,?,?) ");
 
				  $stmt->bindParam(1,$na);
                  $stmt->bindParam(2,$ne);
                 
                  $stmt->bindParam(3,$file);
                  $stmt->bindParam(4,$se);
                  $stmt->execute();

}

?>
