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
    <title>admin prin</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </head>
  <style>
.navbar-nav > li{
  padding-left:30px;
  padding-right:30px;
}
  </style>

  <body >
  

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
      <a class="navbar-brand" href="#">Binvenu Admin</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li style="background-color:#CEECF5"><a href="admin.php">gestion admin<span class="sr-only">(current)</span></a></li>
      <li><a href="adminn.php">gestion note<span class="sr-only">(current)</span></a></li>
      <li><a href="adminp.php">gestion bultin<span class="sr-only">(current)</span></a></li>
      <li><a href="adminat.php">attestation <span class="sr-only">(current)</span></a></li>

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

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        
      </ul>
     
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>





<div class="container">

<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Ajouter nouvelle administrateur</button>

<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">Ajouter administrateur</h4>
      </div>

      <?php

$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');

if(isset($_POST['btn']))
{

  $name = $_POST['na'];
  $pass = $_POST['pa'];
  $t = $_POST['t'];
  
  $stmt = $db->prepare("select count(*) from admin WHERE name = ?");
  $stmt->bindParam(1,$name);
  $stmt->execute();
  $number_of_rows = $stmt->fetchColumn(); 
  if($number_of_rows==0)
  {
   
    $name = $_POST['na'];
    $pass = md5($_POST['pa']);
    $t = $_POST['t'];
 $stmt = $db->prepare("insert into admin values ('',?,?,?) ");
 
				  $stmt->bindParam(1,$name);
				  $stmt->bindParam(2,$pass);
                  $stmt->bindParam(3,$t);          
                  $stmt->execute();
                  header('Location: admin.php');
  }
  else
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
  $_POST['btn'] = null;
  }
  ?>
	  <form method="post" enctype="multipart/form-data"  data-toggle="validator" >
	    <div class="modal-body">
		
  <div class="form-group">
    <label for="na" class="control-label">Nom<font color="red">*</font> </label>
      <input type="text" class="form-control" name="na"  placeholder="nom administrateur" required>
  </div>
  
  <div class="form-group has-feedback">
    <label for="pa" class="control-label">Mot de passe <font color="red">*</font></label>
    
    <input type="password" name="pa" placeholder="Mot de passe"  class="form-control" required>
  </div>

  <div class="form-group">
    <label for="t">Type <font color="red">*</font></label>
    <select class="form-control"  name="t">
    <option value="admin">admin</option>  
      <option value="admin1" >admin1</option>
      <option value="admin2" >admin2</option>
  
    </select>
  </div>


     
      



 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button name="btn" class="btn btn-primary">Enregistrer</button>
  </div>

                   </div><!--form-->

	  </form>

    </div>
  </div>
</div>



<br>
<div id="error-box" style="display:none">

</div>
    <br><br>

    <table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>

			  <th>id</th>
        <th>nom</th>
        <th>type</th> 
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from admin");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['name'] != "admin"){
                    ?>
                 <tr>
            
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['name'] ?></td>
               <td><?php echo $row['type'] ?></td>               
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier administrateur</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
élève modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
<div class="form-group">
  <label for="na">name</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
</div>





  <div class="form-group has-feedback">
    <label for="pa" class="control-label">Mot de passe <font color="red">*</font></label>
    
    <input type="password"  id="mo-<?php echo $row['id'] ?>" placeholder="************"  class="form-control" required>
  </div>

  <div class="form-group">
    <label for="t">Type <font color="red">*</font></label>
    <select class="form-control"  id="t-<?php echo $row['id'] ?>">
    <option value="admin">admin</option>  
      <option value="admin1" >admin1</option>
      <option value="admin2" >admin2</option>
  
    </select>
  </div>





    </div>
    
    
    
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button"   onclick="modifierdata(<?php echo $row['id'] ?>)" class="btn btn-primary">Mise ajour</button>
    </div>
    </form>
  </div>
</div>
</div>
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
              </td>
              </tr>
              <?php
        
        
    }}
  
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
  title: "tu est sûre ?",
  text: "Une fois supprimé, vous ne pourrez pas récupérer ce fichier! ",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "OUI, supprimer!",
  
  
},
function(){

 

	 var id= str;
	 $.ajax({type: "GET",
		url:"s1.php?p=sup-admin",
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
var name = $('#na-'+str).val();
var pass = $('#mo-'+str).val();
var niveau = $('#t-'+str).val();


	 $.ajax({type: "POST",
		url:"s1.php?p=modifier-admin",
		data: "na="+name+"&mo="+pass+"&t="+niveau+"&id="+id,
		success: function(data){
      window.location.reload(true);
		}

	 });
}
 
  </script>
  
  
  </body>
</html>