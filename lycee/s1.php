<?php
$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
$page = isset($_GET['p'])?$_GET['p']:'';
 if ($page=='sup')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from eleve where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supn";}

 }
 if ($page=='supn')
 {
  $id = $_GET['id_notes'];
  $stmt = $db->prepare("delete from notes where id_notes=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }


 if ($page=='sup-prof')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from prof where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }
 if ($page=='sup-doc')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from documents  where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }
 if ($page=='sup-admin')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from admin  where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }
 if ($page=='sup-abs')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from abs  where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }
 if ($page=='reset')
 {
 
  $stmt = $db->prepare("delete * from documents  ");
 
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }



 if ($page=='sup-liv')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from livre where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }
 if ($page=='ajou')
 {
  $stmt = $db->prepare("insert into attestation values ('',?) ");
           $stmt->bindParam(1,$_SESSION['id'])    ;
                   $stmt->execute();
 }

 
 if ($page=='sup-att')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from attestation where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }

 if ($page=='sup-f')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from fichiers where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }
 
 if ($page=='sup-emp')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from empt where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }


 if ($page=='sup-msg')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from message where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";}

 }


 if($page=='modifier'){
  $id = $_POST['id'];
  $name = $_POST['na'];
  $niveau = $_POST['ni'];
  $section = $_POST['se'];
$stmt = $db->prepare("update eleve set id=? ,name=? ,pass=? ,niveau=?,section=?  where id=?");
  $stmt->bindParam(1,$name);
  $stmt->bindParam(2,$name);
  $stmt->bindParam(3,$name);
  $stmt->bindParam(4,$niveau);
  $stmt->bindParam(5,$section);
  $stmt->bindParam(6,$id);
  if($stmt->execute()){
    echo "suce modifer date";
  }else
  {echo "fail modifier";
}
 }

 
 if($page=='modifier-p'){
  $id = $_POST['id'];
  $name = $_POST['na'];
  $pass = $_POST['pa'];
  $adr = $_POST['ad'];
  $numt = $_POST['nu'];
  $ann = $_POST['an'];
$stmt = $db->prepare("update eleve set name=? ,pass=?,adr=?, numtel=? ,annee=?  where id=?");
  $stmt->bindParam(1,$name);
  $stmt->bindParam(2,$pass);
  $stmt->bindParam(3,$adr);
  $stmt->bindParam(4,$numt);
  $stmt->bindParam(5,$ann);
  $stmt->bindParam(6,$id);
  if($stmt->execute()){
    echo "suce modifer date";
  }else
  {echo "fail modifier";
}
 }




 
 if($page=='modifier-admin'){
  $id = $_POST['id'];
  $name = $_POST['na'];
  $pass = md5($_POST['mo']);
  $adr = $_POST['t'];

$stmt = $db->prepare("update admin set name=? ,pass=?,type=?  where id=?");
  $stmt->bindParam(1,$name);
  $stmt->bindParam(2,$pass);
  $stmt->bindParam(3,$adr);

  $stmt->bindParam(4,$id);
  if($stmt->execute()){
    echo "suce modifer date";
  }else
  {echo "fail modifier";
}
 }


 if($page=='modifier-prof'){
  $id = $_POST['id'];
  $nom = $_POST['nom'];
  $spe = $_POST['spe'];
  $num = $_POST['num_tel'];
  $email = $_POST['email'];

$stmt = $db->prepare("update prof set nom=? ,spe=? ,num_tel=?, email=?  where id=?");

  $stmt->bindParam(1,$nom);
  $stmt->bindParam(2,$spe);

  $stmt->bindParam(3,$num);
  $stmt->bindParam(4,$email);
  $stmt->bindParam(5,$id);
  if($stmt->execute()){
    echo "suce modifer date";
  }else
  {echo "fail modifier";
}
 }

 
 if($page=='modifier-liv'){
  $id = $_POST['id'];
  $etat = $_POST['na'];


$stmt = $db->prepare("update livre set etat=?  where id=?");

  $stmt->bindParam(1,$etat);

  $stmt->bindParam(2,$id);
  if($stmt->execute()){
    echo "suce modifer date";
  }else
  {echo "fail modifier";
}
 }



 if($page=='modifiern'){
  $id = $_POST['id'];
  $name = $_POST['na'];
  $adr = $_POST['ad'];
  $numtel = $_POST['nu'];
  $t = $_POST['t'];
$stmt = $db->prepare("update notes set titre= ? , contenu=?, date=?, id=?   where id_notes=?");

$stmt->bindParam(1,$t);
  $stmt->bindParam(2,$name);
  $stmt->bindParam(3,$adr);
  $stmt->bindParam(4,$numtel);
  $stmt->bindParam(5,$id);
  if($stmt->execute()){
    echo "suce modifer date";
  }else
  {echo "fail modifier";
}
 }


 if($page=='modifier-abs'){
  $id = $_POST['id'];
  $nom = $_POST['se'];
 

$stmt = $db->prepare("update abs set num_e=?   where id=?");

  $stmt->bindParam(1,$nom);
 
  $stmt->bindParam(2,$id);
  if($stmt->execute()){
    echo "suce modifer date";
  }else
  {echo "fail modifier";
}
 }

 
 
              
?>
