<?php
include "config.php";
if(isset($_GET['dow']))
{
$path = $_GET['dow'];
$stat = $db->prepare("select * from resultat where file=?");
$stat->bindParam(1, $path);
$stat->execute();
  header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachement; filename="'.basename($path).'"');
    header('Content-Length:'.filesize($path));
    readfile($path);
   


}
?>