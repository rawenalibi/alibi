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
        <li style="background-color:#CEECF5" ><a href="admin1-bib.php">gestion bibliotheque</a></li>
        <li><a href="admin1-msg.php">Boite de messsage</a></li>
        <li><a href="admin1-fichier.php">fichier</a></li>
        
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



<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert nouvelle Livre</button>
<!-- Modal -->
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
if($t = $_POST['11']=="normale")
{
$titre = $_POST['titre'];
$source= $_POST['source'];
$dis = $_POST['dis'];
$etat ="disponible";
$t = $_POST['11'];
$name = $_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];
$img = file_get_contents($_FILES['img']['tmp_name']);

$Location = "";

 $stmt = $db->prepare("insert into livre values ('',?,?,?,?,?,?,?) ");
 $stmt->bindParam(1,$titre);        
 $stmt->bindParam(2,$source);
          $stmt->bindParam(3,$dis);
          $stmt->bindParam(4,$t);
          $stmt->bindParam(5,$etat);
          $stmt->bindParam(6,$Location);
          $stmt->bindParam(7,$img);
        	  $stmt->execute();
     header('Location: admin1-bib.php');                       
}
if($t = $_POST['11']=="virtuel")
{
$titre = $_POST['titre'];
$source= $_POST['source'];
$dis = $_POST['dis'];
$t = $_POST['11'];
$etat ="disponible";
$name = $_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];
$img = file_get_contents($_FILES['img']['tmp_name']);

$Location = "documents/$name";
move_uploaded_file($tmp_name, $Location);
 $stmt = $db->prepare("insert into livre values ('',?,?,?,?,?,?,?) ");
 $stmt->bindParam(1,$titre);        
 $stmt->bindParam(2,$source);
          $stmt->bindParam(3,$dis);
          $stmt->bindParam(4,$t);
          
          $stmt->bindParam(5,$etat);
          $stmt->bindParam(6,$Location);
          $stmt->bindParam(7,$img);
        	  $stmt->execute();
     header('Location: admin1-bib.php');                       
}
}


?>
      <form method="post" enctype="multipart/form-data"  data-toggle="validator" >
	    <div class="modal-body">

  <div class="form-group">
    <label for="tt">titre</label>
      <input type="text" class="form-control" id="tt" name="titre" placeholder="title de livre">
  </div>
  <div class="form-group">
    <label for="tt">Source</label>
      <input type="text" class="form-control" id="tt" name="source" placeholder="title de livre">
  </div>

 
  <div class="form-group">
    <label for="dis">discription</label>
    <textarea type="text" class="form-control" id="dis" name="dis" placeholder="Description"></textarea>
  </div>
  
   
  <div class="form-group">
    <label for="11">Type</label>
    <select class="form-control" id="mystuff" name="11">
    <option value="normale">Normale</option>  
      <option value="virtuel" >Virtuel</option>
  
    </select>
  </div>
 
  <div class="form-group mystaff_hide mystaff_virtuel">
    <label >fichier</label>
    <input type="file" name="myfile">
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


<br><br>
<div class="form-group row col-md-3">
  <input class ="form-control col-md-3" type="text" id="search1" placeholder="chercher ..."/>
</div>
 <table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
			  <th>titre</th>
        <th>Source</th>
        <th>description</th>
        <th>etat</th>
        <th>image</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from livre");
                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>
                     
                    
                    <tr>
              <td><?php echo $row['titre_l'] ?></td>
              <td><?php echo $row['nom_e'] ?></td>
               <td><?php echo $row['disc'] ?></td>
               <td><?php echo $row['etat'] ?></td>
               <td><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img_l'] ).'"  width="50" height="50"/>' ?></td>
               
              <td>
              <?php
              if($row['type']=="normale"){
              ?>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
      <?php
              }
       ?>
       
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier livre</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
Actualieé modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
<div class="form-group">
  <label for="na">Etat</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['etat'] ?>">
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


</div><!--fin container-->

























    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>


  	//add collapse to all tags hiden and showed by select mystuff
$('.mystaff_hide').addClass('collapse');

//on change hide all divs linked to select and show only linked to selected option
$('#mystuff').change(function(){
    //Saves in a variable the wanted div
    var selector = '.mystaff_' + $(this).val();

    //hide all elements
    $('.mystaff_hide').collapse('hide');

    //show only element connected to selected option
    $(selector).collapse('show');
});



$(document).ready( function () {

var elements1 = $('#table1>tbody>tr');
$('#search1').on('input',function(){
  var search = $('#search1').val(); 
  $('#table1>tbody').html('');
  for(var i = 0;i<elements1.length;i++)
    if(elements1[i].innerHTML.indexOf(search)>=0)
      $('#table1>tbody').append(elements1[i]); 
})
});
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
		url:"s1.php?p=supn",
		data: "id_notes="+id,
		success: function(data){
      window.location.reload(true);

		}
	 });

})


  
     }

    
function modifierdata (str)
	 {  
  

	 var id= str;
var etat = $('#na-'+str).val();


	 $.ajax({type: "POST",
		url:"s1.php?p=modifier-liv",
		data: "na="+etat+"&id="+id,
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
		url:"s1.php?p=sup-liv",
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