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

  .navbar {
      height: auto;
}

</style>
 
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
  
  <nav class="navbar navbar-default" style="background-color:#A9D0F5;">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only" >Toggle navigation</span>
        <span class="icon-bar" ></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><font color="SlateGrey "><B>Lycée ibnou roched </B></font> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li  ><a href="eleve.php"><B>Actualiteé</B> <span class="sr-only">(current)</span></a></li>
        
		<li><a href="eleve-emploie.php"><B>Emploie</B></a></li>
        <li ><a href="eleve-notes.php"><B>Notes</B></a></li>
		<li  style="background-color:	#AFEEEE"><a href="eleve_bib.php"><B>Bibliotheque</B></a></li>

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
        <li ><a href="#"><B><font color="blue"><?php echo $_SESSION['name'] ?></font></B></a></li>
        <li class="dropdown" >
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"><B>Option</B><span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li>
<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">profile</button></center>


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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        
    <center>
      <?php
$a=$_SESSION['name'];
$stmt = $db->prepare("select * from eleve where name= '$a'");


                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>
<td> <?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  style="border-radius: 50%;"  width="300" height="300"/>' ?></td>

<br><br>
                
             
              
              <B><font color="red" >
            <h1><td><?php echo $row['name'] ?></td></font></h1>
            </B>
              <br>
                           <h4>adresse:</h4><?php echo $row['adr'] ?>
            
                           <h4>Numero tel:</h4>    <?php echo $row['numtel'] ?>
          
                           <h4>Niveau:  <?php echo $row['niveau'] ?>
            
                           <h4>specaliteé: <?php echo $row['section'] ?>
              <br>
              <h4>Anneé : <?php echo $row['annee'] ?>
              <br>
              

               <?php
                }

?>


     </center>


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>

    </div>
  </div>
</div>


<br>
<center>
<I><font size="5" color="Blue"> Bibliothque </font></I>
<br>
</center>
<br>
<br>
<div class="form-group row col-md-3">
  <input class ="form-control col-md-3" type="text" id="search1" placeholder="chercher ..."/>
</div>
 <table class="table table-bordered table-striped" id="table1">
        <thead>
            <tr>
                <th>Num livre</th>
                <th>Titre de livre</th>
                <th>nom éditeur</th>
                <th>Etat</th>
                <th>Image</th>
               
            </tr>
        </thead>
        <tbody>
        <?php
$a=$_SESSION['name'];
$stmt = $db->prepare("select * from livre");


                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>

          
            <tr align="center">
                <td> <?php echo $row['num_l'] ?></td>
                <td> <?php echo $row['titre_l'] ?></td>
                <td> <?php echo $row['nom_e'] ?></td>
                <td> <?php echo $row['etat'] ?></td>
                <td data-toggle="modal" data-target="#exa" > <?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img_l'] ).'" width="70" height="70"/>' ?></td>
                
                <div class="modal fade" id="exa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  <div class="modal-body">

      <?php
$e=  $row['num_l'] ;
$stmt1 = $db->prepare("select * from livre where num_l='$e'");


                $stmt1->execute();
              $row1 = $stmt1->fetch();
                    ?>
                    <center>
    <?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row1['img_l'] ).'"    width="300" height="350"/>' ?>
         
         </center>
          <?php

                
                ?>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>


    </div>
  </div>
</div>
             
            </tr>


            <?php
                }

                ?>
        </tbody>
      
    </table>




<div class="modal fade" id="exa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
      <?php
$stmt = $db->prepare("select * from livre ");


                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>

    <?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img_l'] ).'"   border-radius: 50%;  width="60" height="60"/>' ?>


          <?php
                }
                ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>


    </div>
  </div>
</div>



  <hr>
    <div class="col-lg-12"  style="background-color:#F5F5F5">
      <div class="col-md-8">
        <p>Lyceé Ibnou Roched Maknsssy</p>  
      </div>
      <div class="col-md-4">
        <p class="muted pull-right">© 2018 Tous droits réservés</p>
      </div>
 

</div>

</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>





<script>
$(document).ready( function () {

  var elements1 = $('#table1>tbody>tr');
  $('#search1').on('input',function(){
    var search = $('#search1').val(); 
    $('#table1>tbody').html('');
    for(var i = 0;i<elements1.length;i++)
      if(elements1[i].innerHTML.indexOf(search)>=0)
        $('#table1>tbody').append(elements1[i]); 
  })
    
} );
</script>


</script>
  </body>
</html>