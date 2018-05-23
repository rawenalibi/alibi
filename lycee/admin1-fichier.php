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
        <li style="background-color:#CEECF5"><a href="admin1-fichier.php">fichier</a></li>
        
        <li><a href="admin1-prof.php">gestion profff</a></li>


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

 <div class="alert alert-info">
    <strong>Info!</strong> You should <a href="#" class="alert-link">read this message</a>.
  </div>
  <br>
  <button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert nouvelle fichiers</button>
<!-- Modal -->
<br>
<br>
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">ajoute Livres</h4>
      </div>
      <?php

$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
if(isset($_POST['btn']))
{
$t=$_POST['11'];
$nom = $_POST['nom_f'];
$name = $_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];
$Location = "documents/$name";
move_uploaded_file($tmp_name, $Location);
 $stmt = $db->prepare("insert into fichiers values ('',?,?,?) ");
 $stmt->bindParam(1,$nom);        
 $stmt->bindParam(2,$t);
 $stmt->bindParam(3,$Location);
     
      
        	  $stmt->execute();
     header('Location: admin1-fichier.php');                       
}



?>
      <form method="post" enctype="multipart/form-data"  data-toggle="validator" >
	    <div class="modal-body">
      
      <div class="form-group">
    <label for="11">Type</label>
    <select class="form-control" id="11" name="11">
      <option value="fi">fiche d'inscription</option>
      <option value="fo">fiche d'orientation</option>
      <option value="af">autre fichiers</option>
    
    </select>
  </div>


  <div class="form-group">
    <label for="tt">Nom fichier</label>
      <input type="text" class="form-control" id="tt" name="nom_f" placeholder="Nom fichier">
  </div>
  
  



 
  <div class="form-group mystaff_hide mystaff_opt1">
    <label >fichier</label>
    <input type="file" name="myfile">
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

<table class="table table-bordered table-striped" id="table1" width="50%">
      <thead>
          <tr>
  <th>nom fichier</th>
     
    
 <th width="30">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from fichiers");
                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>
                     
                    
                    <tr>
              <td><?php echo $row['nom_f'] ?></td>
           <td>
  
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
		url:"s1.php?p=sup-f",
		data: "id="+id,
		success: function(data){
      window.location.reload(true);

		}
	 });

})


  
}

</script>

  </body>
</html>