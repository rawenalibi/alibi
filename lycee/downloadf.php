<?php
include "config.php";
if(isset($_GET['dow']))
{
$path = $_GET['dow'];
$stat = $db->prepare("select * from documents where path=?");
$stat->bindParam(1, $id);
$stat->execute();
  header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachement; filename="'.basename($path).'"');
    header('Content-Length:'.filesize($path));
    readfile($path);
   


}
?>