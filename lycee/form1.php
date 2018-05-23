<?php
if(isset($_POST['btn']))
{
$name = $_POST['cin'];
  $stmt = $db->prepare("select count(*) from eleve WHERE id = ? ");
  $stmt->bindParam(1,$name);

  $stmt->execute();
  $number_of_rows = $stmt->fetchColumn(); 
  if($number_of_rows!=0)
  {
     
    ?>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
      $(function(){
        $('#error-box').html('<label class="alert alert-danger"> Row exist !!! </label>').fadeIn().delay(3000).fadeOut();
      })
    </script>
  
    <?php
  }
}

 ?>
<?php
$db = new PDO ('mysql:host=localhost;dbname=lycee','root','0000');
if(isset($_POST['submit']))
{  
    $mo=$_POST['m2'];
 $cin = $_POST['cin'];
 $nb = $_POST['nb'];
 $sem = $_POST['sem'];
 $abs = $_POST['abs'];
 $notes = $_POST['not'];
 require("fpdf/fpdf.php");

class myPDF extends FPDF{
function header(){
    $today = getdate();
    
    $cin = $_POST['cin'];
    $db = new PDO ('mysql:host=localhost;dbname=lycee','root','0000');
    $stmt = $db->prepare("select  * from eleve where id='$cin' ");
    $stmt->execute();
    $row = $stmt->fetch();
    $id=$row['id'];
    $nom=$row['name'];
    $sem = $_POST['sem'];
    $niveau=$row['niveau'];
    $section=$row['section'];
    $this->SetFont("Arial","B",14);
    $this->Cell(276,5,"bultin de semester numero : $sem  " ,0,0,"C");
   
    $this->Ln();
    $this->Ln();
    $this->Ln();
    $this->Ln();

    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"date :",0,0,"C");
    // $this->Cell(40,5,date("Y/m/d") ,0,0,"C");
    // $this->Ln();
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"",0,0,"C");
    // $this->Cell(40,5,"num inscription :",0,0,"C");
    // $this->Cell(40,5,$id,0,0,"C");
    // $this->Ln();
    
    
    $this->Cell(40,5,"nom :  $nom  " ,0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"date :",0,0,"C");
    $this->Cell(40,5,date("Y/m/d") ,0,0,"C");

    $this->Ln();
    $this->Cell(40,5,"niveau :  $niveau  " ,0,0,"C");
    $this->Ln();
    $this->Cell(40,5,"section :  $section  " ,0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"",0,0,"C");
    $this->Cell(40,5,"num inscription :",0,0,"C");
    $this->Cell(40,5,$id,0,0,"C");
    $this->Ln();
    
}

function headerTable()
{
    $this->SetFont("Times","B",12);
    $this->Cell(40,10,"nom matier",1,0,"C");
    $this->Cell(40,10,"coif",1,0,"C");
    $this->Cell(40,10,"oral",1,0,"C");
    $this->Cell(40,10,"dev 1",1,0,"C");
    $this->Cell(40,10,"dev 2",1,0,"C");
    $this->Cell(40,10,"dev 3",1,0,"C");
    $this->Cell(40,10,"moyenne matier",1,0,"C");

    $this->Ln();
}


function viewTable($db)
{

    $cin = $_POST['cin'];
    $mo=$_POST['m2'];
 $nb = $_POST['nb'];
 $sp = $_POST['sp'];
 $sem = $_POST['sem'];
 $abs = $_POST['abs'];
 $notes = $_POST['not'];
    if($nb==0)
   {$nbn=9;}
    else
{$nbn=$nb+1;}

    $this->SetFont("Times","B",12);
    $stmt = $db->prepare("select  * from eleve where id='$cin'  ");
    $stmt->execute();
    $row = $stmt->fetch(); 
    $som=0;
    $co=0;
   for($i=1;$i<$nbn;$i++)
   {
       $n=0;
    $name=$_POST['name-'.$i.''];
    $coif=$_POST['coif-'.$i.''];
    $oral=$_POST['oral-'.$i.''];
    $dev1=$_POST['dev1-'.$i.''];
    $dev2=$_POST['dev2-'.$i.''];
    $exam=$_POST['exam-'.$i.''];
    $a=intval($coif);
    $b=intval($oral);
    $c=intval($dev1);
    $d=intval($dev2);
    $e=intval($exam);
$co=$co+$a;

if($b!="")
$n=$n+1;
if($c!="")
$n=$n+1;
if($d!="")
$n=$n+1;
if($e!="")
$n=$n+1;
    $v=$a*($b+$c+$d+$e)/$n;
    $this->Cell(40,10,$name,1,0,"C");
    $this->Cell(40,10,$coif,1,0,"C");
    $this->Cell(40,10,$oral,1,0,"C");
    $this->Cell(40,10, $dev1,1,0,"C");
    $this->Cell(40,10,$dev2,1,0,"C");
    $this->Cell(40,10,$exam,1,0,"C");
    $this->Cell(40,10,$v,1,0,"C");
    $this->Ln();
$som=$som+$v;
}
$this->SetFont("Times","B",12);
$this->Cell(40,5,"",0,0,"C");
$this->Cell(40,5,"",0,0,"C");
$this->Cell(40,5,"",0,0,"C");
$this->Cell(40,5,"",0,0,"C");
$this->Cell(40,5,"",0,0,"C");
$this->Cell(40,5,"moyenne generale",1,0,"C");
$this->Cell(40,5,$som,1,0,"C");
$this->Ln();
$this->Ln();
if($sem=="1")
{
$this->SetFont("Times","B",12);
$this->Cell(40,10,"absance",1,0,"C");
$this->Cell(40,10,"note",1,0,"C");
$this->Cell(40,10,"moyenne",1,0,"C");
$this->Cell(40,10,"chhada",1,0,"C");
$this->Ln();
$this->Cell(40,10,$abs,1,0,"C");
$this->Cell(40,10,$notes,1,0,"C");
$ge=$som/$co;
$this->Cell(40,10, $ge,1,0,"C");
if($ge<10)
$s="Mauvais";
if($ge>=10 && $ge <=12)
$s="passable";
if($ge>12 && $ge <=15)
$s="assez bien";
if($ge >15)
$s="bien";
$this->Cell(40,10,$s,1,0,"C");
}
if($sem=="2")
{
    $this->SetFont("Times","B",12);
$this->Cell(40,10,"absance",1,0,"C");
$this->Cell(40,10,"note",1,0,"C");
$this->Cell(40,10,"moyenne sem 1",1,0,"C");
$this->Cell(40,10,"moyenne sem 2 ",1,0,"C");
$this->Cell(40,10,"ch hada",1,0,"C");
$this->Cell(80,10,"Resultat",1,0,"C");
$this->Ln();
$this->Cell(40,10,$abs,1,0,"C");
$this->Cell(40,10,$notes,1,0,"C");
$ge=$som/$co;
$this->Cell(40,10, $ge,1,0,"C");
$this->Cell(40,10, $mo,1,0,"C");
if($ge<10)
$s="Mauvais";
if($ge>=10 && $ge <=12)
$s="passable";
if($ge>12 && $ge <=15)
$s="assez bien";
if($ge >15)
$s="bien";
$this->Cell(40,10,$s,1,0,"C");

$gena=($ge+$mo)/2;
if($gena<10)
$this->Cell(40,10,"double",1,0,"C");
if($gena>=10)
$this->Cell(80,10,"Admis, envoyer vers : $sp",1,0,"C");

}



}
}
$pdf=new myPDF();

$pdf->AliasNbPages();

$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Image('https://previews.123rf.com/images/dxinerz/dxinerz1507/dxinerz150700073/41967060-school-institute-high-school-icon-vector-image-can-also-be-used-for-education-academics-and-science--Stock-Photo.jpg',10,10,30,20,'JPG');

$pdf->Output('C:\xampp\htdocs\lycee\exemple\buullllttiiiinn.pdf');


$file = 'exemple/1_1_.pdf';
$date = date_create();
$date = date_format($date, 'Y-m-d H:i:s');

 $stmt = $db->prepare("insert into resultat values ('',?,?,?,?) ");
 
				  $stmt->bindParam(1,$sem );
                  $stmt->bindParam(2,$date);
                  $stmt->bindParam(3,$cin);
                  $stmt->bindParam(4,$file);
                 
                
                  $stmt->execute();

}


?>
