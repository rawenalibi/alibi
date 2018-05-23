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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>admin 1</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </head>

  <body>
  

  <div class="container" id="alertplaceholder">
  
  </div>
  
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
      <a class="navbar-brand" href="#">Binvenu Admin1</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="admin1.php">Gestion Actualiteé<span class="sr-only">(current)</span></a></li>
       
        <li  ><a href="admin1-notes.php">notes chere eleve</a></li>
        <li  ><a href="admin1-bib.php">gestion bibliotheque</a></li>
        <li ><a href="admin1-msg.php">Boite de messsage</a></li>
        <li ><a href="admin1-fichier.php">fichier</a></li>
        
        <li style="background-color:#CEECF5"><a href="admin1-prof.php">gestion profff</a></li>


      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_SESSION['name'] ?></a></li>
        <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">Option<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Quiteé</a></li>
           
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<center>
  <img src="img/2.jpg" class="img-rounded" alt="Cinque Terre" width="1000" height="250" style="margin-left:30px;"> 
		</center> 
<div class="container">
<br>
<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert nouvelle proff</button>
<!-- Modal -->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">ajoute proff</h4>
      </div>
      <?php

$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
if(isset($_POST['btn']))
{

$nom = $_POST['nom'];
$spe= $_POST['spe'];
$num = $_POST['num_tel'];
$email = $_POST['email'];
$img = file_get_contents($_FILES['img']['tmp_name']);

 $stmt = $db->prepare("insert into prof values ('',?,?,?,?,?) ");
 $stmt->bindParam(1,$nom);        
 $stmt->bindParam(2,$spe);
				  $stmt->bindParam(3,$num);
          $stmt->bindParam(4,$email);
          $stmt->bindParam(5,$img);
        	  $stmt->execute();
     header('Location: admin1-prof.php');                       
}
?>
      <form method="post" enctype="multipart/form-data"  data-toggle="validator" >
	    <div class="modal-body">


<div class="alert alert-success" id="passwordsNoMatchRegister" role="alert" style="display:none;" >
ajoute suceé
</div>

  <div class="form-group">
    <label for="tt">Nom prof</label>
      <input type="text" class="form-control" id="tt" name="nom" placeholder="No prof">
  </div>

 
  <div class="form-group">
    <label for="dd">Specialteé</label>
    <textarea type="text" class="form-control" id="dd" name="spe" placeholder="Specialteé"></textarea>
  </div>
  
   <div class="form-group">
    <label for="da">Num telephone</label>
    <input type="text" class="form-control" id="da"  name="num_tel" placeholder="numero du telephone">
  </div>
  <div class="form-group">
    <label for="da">E-mail</label>
    <input type="text" class="form-control" id="da"  name="email" placeholder="email">
  </div>
  
  <div class="form-group">
    <label for="img">images</label>
    <input type="file" class="form-control" name="img" placeholder="Date" required>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="btn" class="btn btn-primary">Enregistrer</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<div id="result"></div>
<p></p>
 
 <table class="table table-bordered table-striped">
      <thead>
          <tr>
	          <th >nom</th>
			  <th>specalteé</th>
			  <th>numero tel</th>
			  <th>email</th>
              <th>image</th>
              
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from prof");
                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>
                   
                    <tr>
              <td><?php echo $row['nom'] ?></td>
              <td><?php echo $row['spe'] ?></td>
              <td><?php echo $row['num_tel'] ?></td>
               <td><?php echo $row['email'] ?></td>
               <td><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  width="50" height="50"/>' ?></td>
             
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier Proff</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
Actualieé modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >

<div class="form-group">
  <label for="t">nom</label>
    <input type="text" class="form-control" id="nom-<?php echo $row['id'] ?>" value="<?php echo $row['nom'] ?>">
</div>


<div class="form-group">
  <label for="na">Specialteé</label>
    <input type="text" class="form-control" id="spe-<?php echo $row['id'] ?>" value="<?php echo $row['spe'] ?>">
</div>



<div class="form-group">
  <label for="ad">numero tel</label>
  <input type="text" class="form-control" id="num_tel-<?php echo $row['id'] ?>" value="<?php echo $row['num_tel'] ?>">
</div>
<div class="form-group">
  <label for="nu">email</label>
  <input type="text" class="form-control" id="email-<?php echo $row['id'] ?>" value="<?php echo $row['email'] ?>">
</div>
</div>
       <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button"   onclick="modifierdata(<?php echo $row['id'] ?>)" class="btn btn-primary">ok</button>
    </div>
    </form>
  </div>
</div>
</div>
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
              </td>
              </tr>
              <?php
        
        
    }
  
?>
      </tbody>
  </table>	 



</div><!--fin container-->

























    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>

  	function supprimerdata(str)
	 {
    swal({
  title: "tu est sure ?",
  text: "tu ne requipre pas cette fich",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "OUI, supprimer!",
  
  
},
function(){

 

	 var id= str;
	 $.ajax({type: "GET",
		url:"s1.php?p=sup-prof",
		data: "id="+id,
		success: function(data){
      window.location.reload(true);

		}
	 });

})


  
}

    
    function modifierdata (str)
	 {  
  

	 var id= str;
var nom = $('#nom-'+str).val();
var spe = $('#spe-'+str).val();
var num_tel = $('#num_tel-'+str).val();
var email = $('#email-'+str).val();


	 $.ajax({type: "POST",
		url:"s1.php?p=modifier-prof",
		data: "nom="+nom+"&spe="+spe+"&num_tel="+num_tel+"&email="+email+"&id="+id,
		success: function(data){
      window.location.reload(true);
		}

	 });
}
 
</script>

  </body>
</html>