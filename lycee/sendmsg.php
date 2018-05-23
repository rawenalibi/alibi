<?php
include "config.php";
session_start();
$date = date_create();
$date = date_format($date, 'Y-m-d H:i:s');

$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
if(isset($_POST['env']))
{
    $ms=$_POST['msg'];
     $niveau = $_SESSION['niveau'];
     $section =  $_SESSION['section'];
     $ns= $niveau.'_'.$section;
     
 $stmt = $db->prepare("insert into chat values (0,?,?,?,?) ");
 
				  $stmt->bindParam(1,$_SESSION['id']);
          $stmt->bindParam(2,$ms);
          $stmt->bindParam(3,$date);
          $stmt->bindParam(4,$ns); 
          $stmt->execute();
          $_POST['env'] = null;
        
  }
 
  ?>