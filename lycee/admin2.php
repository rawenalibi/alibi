<?php
include "config.php";
session_start();
if(!isset($_SESSION['name']))
{
	header('location: index.php');
}

?>


<!DOCTYPE html>
<html lang="fr">
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
      <a class="navbar-brand" href="#"><I><font size="5">Bienvenu Admin2</font></I></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li style="background-color:#CEECF5"><a href="admin2.php"><B>Gestion élèves</B><span class="sr-only">(current)</span></a></li>
        <li><a href="admin2-abs-ret-el.php"><B>Gestion absences/ retards</B></a></li>
        <li><a href="admin2-emp.php"><B>Gestion des emplois</B></a></li>
        <li><a href="admin2-res.php"><B>Résultat</B></a></li>
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><B><?php echo $_SESSION['name'] ?></B></a></li>
        <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"><B>Option</B><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Quiteé</a></li>
           
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<center>
  <img src="img/ad2el.jpg" class="img-rounded" alt="Cinque Terre" width="1000" height="250" style="margin-left:30px;"> 
		</center> 


<div class="container">
<br>
<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Ajouter nouvelle élève</button>

<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">Ajouter élève</h4>
      </div>

      <?php

$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');

if(isset($_POST['btn']))
{

  $name = $_POST['na'];
  $stmt = $db->prepare("select count(*) from eleve WHERE id = ? ");
  $stmt->bindParam(1,$name);
  $stmt->execute();
  $number_of_rows = $stmt->fetchColumn(); 
  if($number_of_rows==0)
  {
    $id_admin =  $_SESSION['id'];

$name = $_POST['na'];
$niveau = $_POST['ni'];
$section = $_POST['se'];
$img = file_get_contents($_FILES['img']['tmp_name']);

 $stmt = $db->prepare("insert into eleve(id,name,pass,niveau,section,img,id_admin) values (?,?,?,?,?,?,?) ");
 
				  $stmt->bindParam(1,$name);
          $stmt->bindParam(2,$name);
          $stmt->bindParam(3,$name);
                  $stmt->bindParam(4,$niveau);
                  $stmt->bindParam(5,$section);
                  $stmt->bindParam(6,$img);
                  $stmt->bindParam(7,$id_admin);
                  $stmt->execute();
                  header('Location: admin2.php');
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
    <label for="na" class="control-label">Num inscription<font color="red">*</font> </label>
      <input type="text" class="form-control" name="na" id="na" placeholder="Num inscription" required>
  </div>
  
  

  
  <div class="form-group">
    <label for="ni">Niveau <font color="red">*</font></label>
    <input type="text" class="form-control"name="ni" id="ni" placeholder="Niveau" required>
  </div>

   <div class="form-group">
    <label for="se">Section <font color="red">*</font></label>
    <input type="text" class="form-control" name="se" id="se" placeholder="Section" required>
  </div>
  
   <div class="form-group">
    <label for="im">Image <font color="red">*</font></label>
    <input type="file" class="form-control" name="img" placeholder="Date" required>
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
<br>
<div style="display:flex;justify-content:space-between;align-items:center;padding:0 10px;background:whitesmoke;border-left:3px solid salmon;margin:10px 0;">
  <h1>Première année</h1>
  <div class="form-group row col-md-3">
    <input class ="form-control col-md-3" type="text" id="search1" placeholder="chercher ..."/>
  </div>
</div>
 <table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>

			  <th>Num inscription</th>
        <th>Niveau</th>
        <th>Section</th> 
     
        <th>Image</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from eleve");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['niveau']=="1")
                  {
                    ?>
                     
                    
                    <tr>
            
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['niveau'] ?></td>
               <td><?php echo $row['section'] ?></td>
               
               <td><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  width="50" height="50"/>' ?></td>
               
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier élève</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
élève modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
<div class="form-group">
  <label for="na">Num inscription</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
</div>




<div class="form-group">
  <label for="an">Niveau</label>
  <input type="text" class="form-control" id="ni-<?php echo $row['id'] ?>" value="<?php echo $row['niveau'] ?>">
</div>

<div class="form-group">
  <label for="se">Section</label>
  <input type="text" class="form-control" id="se-<?php echo $row['id'] ?>" value="<?php echo $row['section'] ?>">
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
  }
?>

      </tbody>
  </table>	  
  <div style="display:flex;justify-content:space-between;align-items:center;padding:0 10px;background:whitesmoke;border-left:3px solid salmon;margin:10px 0;">

  <h1>Deuxieme anneé</h1>
  <div class="form-group row col-md-3">
  <input class ="form-control col-md-3" type="text" id="search2" placeholder="chercher ..."/>
</div>
</div>
 <table class="table table-bordered table-striped" id="table2">
      <thead>
          <tr>

			  <th>Num inscription</th>
        <th>Niveau</th>
        <th>Section</th> 
        
        <th>Image</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from eleve");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['niveau']=="2")
                  {
                    ?>
                     
                    
                    <tr>
            
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['niveau'] ?></td>
               <td><?php echo $row['section'] ?></td>
           
               <td><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  width="50" height="50"/>' ?></td>
               
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier élève</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
élève modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
<div class="form-group">
  <label for="na">Num inscription</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
</div>



<div class="form-group">
  <label for="an">Niveau</label>
  <input type="text" class="form-control" id="ni-<?php echo $row['id'] ?>" value="<?php echo $row['niveau'] ?>">
</div>

<div class="form-group">
  <label for="se">Section</label>
  <input type="text" class="form-control" id="se-<?php echo $row['id'] ?>" value="<?php echo $row['section'] ?>">
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
  }
?>

      </tbody>
  </table>
  <div style="display:flex;justify-content:space-between;align-items:center;padding:0 10px;background:whitesmoke;border-left:3px solid salmon;margin:10px 0;">

  <h1>Troisieme anneé</h1>	  
  <div class="form-group row col-md-3">
  <input class ="form-control col-md-3" type="text" id="search3" placeholder="chercher ..."/>
</div>
</div>
 <table class="table table-bordered table-striped" id="table3">
      <thead>
          <tr>

			  <th>Num inscription</th>
        <th>Niveau</th>
        <th>Section</th> 
       
        <th>image</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from eleve");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['niveau']=="3")
                  {
                    ?>
                     
                    
                    <tr>
            
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['niveau'] ?></td>
               <td><?php echo $row['section'] ?></td>
              
               <td><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  width="50" height="50"/>' ?></td>
               
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier élève</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
élève modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
<div class="form-group">
  <label for="na">Num inscription</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
</div>



<div class="form-group">
  <label for="an">Niveau</label>
  <input type="text" class="form-control" id="ni-<?php echo $row['id'] ?>" value="<?php echo $row['niveau'] ?>">
</div>

<div class="form-group">
  <label for="se">Section</label>
  <input type="text" class="form-control" id="se-<?php echo $row['id'] ?>" value="<?php echo $row['section'] ?>">
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
  }
?>

      </tbody>
  </table>	
  <div style="display:flex;justify-content:space-between;align-items:center;padding:0 10px;background:whitesmoke;border-left:3px solid salmon;margin:10px 0;">

<h1>Baccalauréat</h1>
<div class="form-group row col-md-3">
  <input class ="form-control col-md-3" type="text" id="search4" placeholder="chercher ..."/>
</div>
</div>
 <table class="table table-bordered table-striped" id="table4">
      <thead>
          <tr>

			  <th>Num inscription</th>
        <th>Niveau</th>
        <th>section</th> 
       
        <th>image</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from eleve");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['niveau']=="4")
                  {
                    ?>
                     
                    
                    <tr>
            
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['niveau'] ?></td>
               <td><?php echo $row['section'] ?></td>
           
               <td><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  width="50" height="50"/>' ?></td>
               
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier élève</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
élève modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
<div class="form-group">
  <label for="na">Num inscription</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
</div>




<div class="form-group">
  <label for="an">Niveau</label>
  <input type="text" class="form-control" id="ni-<?php echo $row['id'] ?>" value="<?php echo $row['niveau'] ?>">
</div>

<div class="form-group">
  <label for="se">Section</label>
  <input type="text" class="form-control" id="se-<?php echo $row['id'] ?>" value="<?php echo $row['section'] ?>">
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
  }
?>

      </tbody>
  </table>	

</div><!--container-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    
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

    var elements2 = $('#table2>tbody>tr');
    $('#search2').on('input',function(){
      var search = $('#search2').val();
      console.log(search);
      $('#table2>tbody').html('');
      for(var i = 0;i<elements2.length;i++)
        if(elements2[i].innerHTML.indexOf(search)>=0)
          $('#table2>tbody').append(elements2[i]); 
    })

    var elements3 = $('#table3>tbody>tr');
    $('#search3').on('input',function(){
      var search = $('#search3').val();
      console.log(search);
      $('#table3>tbody').html('');
      for(var i = 0;i<elements3.length;i++)
        if(elements3[i].innerHTML.indexOf(search)>=0)
          $('#table3>tbody').append(elements3[i]); 
    })

    var elements4 = $('#table4>tbody>tr');
    $('#search4').on('input',function(){
      var search = $('#search4').val();
      console.log(search);
      $('#table4>tbody').html('');
      for(var i = 0;i<elements4.length;i++)
        if(elements4[i].innerHTML.indexOf(search)>=0)
          $('#table4>tbody').append(elements4[i]); 
    })
     

} );
	
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
		url:"s1.php?p=sup",
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
var niveau = $('#ni-'+str).val();
var section = $('#se-'+str).val();

	 $.ajax({type: "POST",
		url:"s1.php?p=modifier",
		data: "na="+name+"&ni="+niveau+"&se="+section+"&id="+id,
		success: function(data){
      window.location.reload(true);
		}

	 });
}
 
</script>


  </body>
</html>