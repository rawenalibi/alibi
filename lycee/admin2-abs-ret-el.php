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
    <title>admin 2</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<style>
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
    color: #555;
    background-color: #A9D0F5
}  </style>
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
      <a class="navbar-brand" href="#">Binvenu Admin2</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li ><a href="admin2.php">Gestion eleves<span class="sr-only">(current)</span></a></li>
        <li  style="background-color:#CEECF5"><a href="admin2-abs-ret-el.php">Boite abscance/ retard</a></li>
        <li><a href="admin2-emp.php">emploie de temps/examen</a></li>
        <li ><a href="admin2-res.php">Resultat</a></li>
         <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" >note<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin2-note-1.php">1ere anne</a></li>
            <li><a href="admin2-note-2.php">2eme anneé</a></li>
            <li><a href="admin2-note-3.php">3eme annee</a></li>
            <li><a href="admin2-note-4.php">bac</a></li>
          </ul>
        </li>
        
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
<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert nouvelle eleve</button>
<br>
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">ajoute eleve</h4>
      </div>

      <?php

$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');

if(isset($_POST['btn']))
{   
 
    $duree = $_POST['ad'];
    $type = $_POST['type'];
    $jour = $_POST['jour'];
    $heur = $_POST['h'];
    $num = $_POST['nume'];
  
        $stmt = $db->prepare("insert into abs values ('',?,?,?,?,?) ");
        $stmt->bindParam(1,$duree);
        $stmt->bindParam(2,$type);
        $stmt->bindParam(3,$jour);
        $stmt->bindParam(4,$heur);
        $stmt->bindParam(5,$num);
        $stmt->execute();
  
  header('Location: admin2-abs-ret-el.php');
                        
}

if(isset($_POST['btn1']))
{   
  $stmt = $db->prepare("delete from abs ");
  $stmt->execute();
  header('Location: admin2-abs-ret-el.php');
                        
}
?>
	  <form method="post" enctype="multipart/form-data"  data-toggle="validator" >
	    <div class="modal-body">
		

        <button name="btn1" class="btn btn-primary">restt</button>

   <div class="form-group">
   <?php

$stmt2 = $db->prepare("select  * from abs  ");
$stmt2->execute();
$row2 = $stmt2->fetch();
?>
  
    <label for="ad"  class="control-label">Dureé</label>
    <input type="text" class="form-control"  name="ad" value="<?php echo $row2['duree'] ?>" placeholder="dureé" >
  </div>
  
  <div class="form-group">
    <label for="11">Type</label>
    <select class="form-control" id="mystuff" name="type">
    <option value="R">retard</option>  
      <option value="A" >absance</option>
      <option value="E" >Exclu</option>
  
    </select>
  </div>

   <div class="form-group">
    <label for="11">jours</label>
    <select class="form-control" id="mystuff" name="jour">
    <option value="lundi">lundi</option>  
      <option value="mardi" >mardi</option>
      <option value="mercredi">mercredi</option>  
      <option value="jeudi" >jeudi</option>
      <option value="vendredi">vendredi</option>  
      <option value="samdi" >samdi</option>
  
    </select>
  </div>
  
  <div class="form-group">
    <label for="11">Heur</label>
    <select class="form-control" id="mystuff" name="h">
    <option value="8-9">8-9</option>  
    <option value="9-10">9-10</option> 
      <option value="10-11">10-11</option>  
      <option value="11-12" >11-12</option>
      <option value="14-15">14-15</option>  
      <option value="15-16" >15-16</option>
      <option value="16-17">16-17</option> 
      <option value="17-18">17-18</option> 
  
    </select>
  </div>
  
 
  <div class="form-group">
    <label for="ad"  class="control-label">Num eleve</label>
    <input type="text" class="form-control" id="ad" name="nume"  placeholder="num eleve" >
  </div>
  
     
      



 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="btn" class="btn btn-primary">Enregistrer</button>
  </div>

                   </div><!--form-->

	  </form>

    </div>
  </div>
</div>

<br>

 <?php

$stmt2 = $db->prepare("select  * from abs  ");
$stmt2->execute();
$row2 = $stmt2->fetch();
?>
<div class="alert alert-success">
  <strong> <?php echo $row2['duree'] ?></strong>
</div>
<br>
<?php
?>


 <table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
	         
			  <th>num eleve</th>
			
	
        <th>type</th>
        <th>jour</th>
    
        <th>heur</th>
        
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from abs");
                $stmt->execute();
                while($row = $stmt->fetch()){
                 
                    ?>
                     
                    
                    <tr>
          
              
               <td><?php echo $row['num_e'] ?></td>
               <td><?php echo $row['type'] ?></td>
               
               <td><?php echo $row['jour'] ?></td>
               <td><?php echo $row['heure'] ?></td>
               
               
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier absnce</h4>
    </div>
    <form>
    <div class="modal-body">

        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
 
        <div class="form-group">
    <label for="11">Type</label>
    <select class="form-control" id="mystuff" name="type">
    <option value="R">retard</option>  
      <option value="A" >absance</option>
  
    </select>
  </div>



<div class="form-group">
    <label for="11">jours</label>
    <select class="form-control" id="mystuff" name="jour">
    <option value="lundi">lundi</option>  
      <option value="mardi" >mardi</option>
      <option value="mercredi">mercredi</option>  
      <option value="jeudi" >jeudi</option>
      <option value="vendredi">vendredi</option>  
      <option value="samdi" >samdi</option>
  
    </select>
  </div>



 <div class="form-group">
    <label for="11">Heur</label>
    <select class="form-control" id="mystuff" name="h">
    <option value="8-9">8-9</option>  
    <option value="9-10">9-10</option> 
      <option value="10-11">10-11</option>  
      <option value="11-12" >11-12</option>
      <option value="14-15">14-15</option>  
      <option value="15-16" >15-16</option>
      <option value="16-17">16-17</option> 
      <option value="17-18">17-18</option> 
  
    </select>
  </div>
  
  <div class="form-group">
    <label for="ad"  class="control-label">Num eleve</label>
    <input type="text" class="form-control" id="se-<?php echo $row['id'] ?>" value="<?php echo $row['num_e'] ?>" >
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
        
        
    }
  
?>

      </tbody>
  </table>	  



</div><!--container-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>


	


function modifierdata (str)
	 {  
   

	 var id= str;
var se = $('#se-'+str).val();
	 $.ajax({type: "POST",
		url:"s1.php?p=modifier-abs",
		data: "&se="+se+"&id="+id,
		success: function(data){
      window.location.reload(true);
		}

	 });
}
 
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
		url:"s1.php?p=sup-abs",
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