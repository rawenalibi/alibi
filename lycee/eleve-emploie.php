<?php
include "config.php";
session_start();

if(!isset($_SESSION['name']))
{
	header('location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <style>

</style>
  <link rel="stylesheet" type="text/css" href="style1.css"/>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>eleve</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<style>
   ul {
list-style:none;
margin-right:0;
padding-left:20px;

}
	.clickable
{
    cursor: pointer;
}

.clickable .glyphicon
{
    background: rgba(0, 0, 0, 0.15);
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px
}

.panel-heading span
{
    margin-top: -23px;
    font-size: 15px;
    margin-right: -9px;
}
a.clickable { color: inherit; }
a.clickable:hover { text-decoration:none; }
</style>
  </head>
  <body>
  <nav class="navbar navbar-default" style="background-color:#A9D0F5">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><font color="SlateGrey "><B>Lycée ibnou roched </B></font> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="eleve.php"><B>Actualiteé</B> <span class="sr-only">(current)</span></a></li>
        
		<li style="background-color:	#AFEEEE"><a href="eleve-emploie.php"><B>Emploie</B></a></li>
        <li ><a href="eleve-notes.php"><B>Notes</B></a></li>
		<li><a href="eleve_bib.php"><B>Bibliotheque</B></a></li>
	
    <li><a href="eleve-resultat.php"><B>Resultat</B></a></li>
    <li><a href="eleve-prof.php"><B>liste de proff</B></a></li>
    <li><a href="eleve-abs.php"><B>absanc retard</B></a></li>
    <li><a href="eleve-contact.php"><B>contact</B></a></li>
      </ul>
       <ul class="nav navbar-nav navbar-right">
      <?php
$a=$_SESSION['name'];
$stmt = $db->prepare("select * from eleve where name= '$a'");


                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>
<li> <?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"   border-radius: 50%;  width="60" height="60"/>' ?></td></li>
<?php
                }
?>
        <li><a href="#"><B><font color="blue"><?php echo $_SESSION['name'] ?></font></B></a></li>
        <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"><B>Option</B><span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li>
            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          profile    </button></center>



</li>
         
           
           <center>
            <li><a href="logout.php" class="btn btn-secondary">Quitter</a></li>
            </center>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<table>
<tr>
<td width="13%" >
<ul><li><a href=""> <span class="glyphicon glyphicon-picture"></span> Images</a> </li>
<br>
<li><a href=""><span class="glyphicon glyphicon-film"></span> Video</a> </li>


</td>
<center>
<td >
 <img src="img/a1.png" class="img-rounded" alt="Cinque Terre" width="1000" height="280"> 
 </center>
  </td>
  <td width="13%" >
<ul><li ><a href="http://www.edunet.tn/index.php?id=196&lan=1"><span class="glyphicon glyphicon-briefcase"></span> Edunet</a> </li>
<br>
<li><a href="https://www.facebook.com/lycee.secondaire.ibn.rochd/"><span class="glyphicon glyphicon-paperclip"></span> page facebook</a> </li>
</ul>
</td>
  </table>
  <div class="container">
  <br>
  <center>
<I><font size="5" color="Blue"> Emploie</font></I>
</center>

<br>

 <table class="table table-bordered table-striped">
      <thead>
          <tr>  
			  <th class="text-center" >emploie du temps</th>
        <th class="text-center">view</th>
        <th class="text-center">download</th>
      </thead>
      <tbody>
     <tr>

              <td>vv</td>
              <?php
               include('config.php');

              $a=$_SESSION['name'];
              $stmt = $db->prepare("select * from eleve where name= '$a'");
              $stmt->execute();
              while($row = $stmt->fetch()){  
                $x =  $row['niveau'];
                $y =  $row['section'];
                  
              }
           
             
              $stmtt = $db->prepare("select * from documents where niveau='$x' and section='$y'");
              $stmtt->execute();
              while($row = $stmtt->fetch()){
              ?>
                 <td class="text-center"><a  href="<?php echo $row['path'] ?>"  class="btn btn-primary">view</a>  </td>

              <td class="text-center"><a  href="download.php?dow=<?php echo $row['path'] ?>"  class="btn btn-primary">download</a>  </td>
  <?php
              }
     ?>
              </tbody>
  </table>

  <br>
  <table class="table table-bordered table-striped">
      <thead>
          <tr>  
			  <th>emploie du examen</th>
        <th>view</th>
        <th>download</th>
      </thead>
      <tbody>
     <tr>
              <td>vv</td>
              <td>vv</td>
               <td>vv</td>
      </tbody>
  </table>
</div>

<br><br><br><br>
    
<div class="col-lg-12"  style="background-color:#F5F5F5">
      <div class="col-md-8">
        <p>Lyceé Ibnou Roched Maknsssy</p>  
      </div>
      <div class="col-md-4">
        <p class="muted pull-right">© 2018 Tous droits réservés</p>
      </div>
 

</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
	$(document).on('click', '.panel-heading span.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).ready(function () {
    $('.panel-heading span.clickable').click();
    $('.panel div.clickable').click();
});




</script>
  </body>
</html>
<!--<td class="text-center"><a  href="download.php?dow=<?php echo $row['path'] ?>"  class="btn btn-primary"> dowload </a>  </td>-->
