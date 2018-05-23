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
       
        <li style="background-color:#CEECF5" ><a href="admin1-notes.php">notes chere eleve</a></li>
        <li><a href="admin1-bib.php">gestion bibliotheque</a></li>

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
		



<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Envouyeé Message cher eleves</button>

<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">Envoye message</h4>
      </div>

      <?php
$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
if(isset($_POST['btn']))
{
 

$con = $_POST['1'];
$date= ($_POST['2']);
$nume = $_POST['3'];
$t = $_POST['11'];

 $st= $db->prepare("select *  from eleve where id = $nume");
$st->bindParam(1,$nume);
 $st->execute();
  $x = $st->rowCount() ;

 if(true && $x==1)
 {
 
 $stmt = $db->prepare("insert into notes values ('',?,?,?,?) ");
 
       $stmt->bindParam(1,$t);
       $stmt->bindParam(2,$con);
				  $stmt->bindParam(3,$date);
                  $stmt->bindParam(4,$nume);
                      $stmt->execute();
               
                      header('Location: admin1-notes.php');
 }

 else {

header('Location: admin1-notes.php?msg');
}


}

?>




	  <form method="post" enctype="multipart/form-data"  data-toggle="validator" >
	    <div class="modal-body">
    
 <div class="form-group">
    <label for="11">Type</label>
    <select class="form-control" id="11" name="11">
      <option value="انذار">انذار</option>
      <option value="استدعاء ولي">استدعاء ولي</option>
      <option value="طرد">طرد</option>
    
    </select>
  </div>

    
  <div class="form-group">
    <label for="1" class="control-label">Contenu du    Message</label>
    <textarea  type="text" class="form-control" name="1" id="1" placeholder="title de actualiteé" ></textarea>
  </div>
  
  <div class="form-group has-feedback">
    <label for="2" class="control-label">Data </label>
    
    <input type="text" name="2"  placeholder="Date de depot"   class="form-control">
  </div>
  
   <div class="form-group">
    <label for="3"  class="control-label">num eleve</label>
    <input type="text" class="form-control" id="3" name="3"  placeholder="Num eleve" >
  </div>
  
  

   
      



 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="btn" class="btn btn-primary">Envoyeé message</button>
  </div>

                   </div><!--form-->

	  </form>

    </div>
  </div>
</div>


<br><br>
<h1>Priemier anneé</h1>
 <table class="table table-bordered table-striped">
      <thead>
          <tr>
	          <th width="40">ID</th>
            <th>Titre</th>
			  <th>Contenu</th>
              <th>date</th>
                <th>nom eleve</th>
                <th>num inscrip</th>
   
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from notes n , eleve e   where n.id=e.id and e.niveau=1");


                $stmt->execute();
               

                while($row = $stmt->fetch()){

                ?>
                          <?php  $x = $row['id'] ?>
                <?php

                    $stmt1 = $db->prepare("select  name  from eleve where id=$x");
                  
                    $stmt1->execute();
                   
                    $row1 = $stmt1->fetch();
                    ?>
                   
                    <tr>
              <td><?php echo $row['id_notes'] ?></td>
              <td><?php echo $row['titre'] ?></td>
              <td><?php echo $row['contenu'] ?></td>
               <td><?php echo $row['date'] ?></td>
               <td><?php echo $row1['name'] ?></td>
               <td><?php echo $row['id'] ?></td>
 
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id_notes'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id_notes'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id_notes'] ?>">Modifier Message</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
Actualieé modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id_notes'] ?>" value="<?php echo $row['id_notes'] ?>" >

<div class="form-group">
  <label for="t">titre</label>
    <input type="text" class="form-control" id="t-<?php echo $row['id_notes'] ?>" value="<?php echo $row['titre'] ?>">
</div>


<div class="form-group">
  <label for="na">contenu</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id_notes'] ?>" value="<?php echo $row['contenu'] ?>">
</div>



<div class="form-group">
  <label for="ad">date</label>
  <input type="text" class="form-control" id="ad-<?php echo $row['id_notes'] ?>" value="<?php echo $row['date'] ?>">
</div>
<div class="form-group">
  <label for="nu">numero eleve</label>
  <input type="text" class="form-control" id="nu-<?php echo $row['id_notes'] ?>" value="<?php echo $row['id'] ?>">
</div>
</div>
       <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button"   onclick="modifierdata(<?php echo $row['id_notes'] ?>)" class="btn btn-primary">modifer le message</button>
    </div>
    </form>
  </div>
</div>
</div>
              <button  onclick="supprimerdata(<?php echo $row['id_notes'] ?>)" class="btn btn-danger">Supprimer</button>
              </td>
              </tr>
              <?php
        
        
    }
  
?>

      </tbody>
  </table>	  

<h1>deuxiem anneé</h1>
 <table class="table table-bordered table-striped">
      <thead>
          <tr>
	          <th width="40">ID</th>
            <th>Titre</th>
			  <th>Contenu</th>
              <th>date</th>
                <th>nom eleve</th>
                <th>num inscrip</th>
   
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from notes n , eleve e   where n.id=e.id and e.niveau=2");


                $stmt->execute();
               

                while($row = $stmt->fetch()){

                ?>
                          <?php  $x = $row['id'] ?>
                <?php

                    $stmt1 = $db->prepare("select  name  from eleve where id=$x");
                    $stmt1->execute();
                    $row1 = $stmt1->fetch();
                    ?>
                   
                    <tr>
              <td><?php echo $row['id_notes'] ?></td>
              <td><?php echo $row['titre'] ?></td>
              <td><?php echo $row['contenu'] ?></td>
               <td><?php echo $row['date'] ?></td>
               <td><?php echo $row1['name'] ?></td>
               <td><?php echo $row['id'] ?></td>
 
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id_notes'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id_notes'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id_notes'] ?>">Modifier Message</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
Actualieé modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id_notes'] ?>" value="<?php echo $row['id_notes'] ?>" >

<div class="form-group">
  <label for="t">titre</label>
    <input type="text" class="form-control" id="t-<?php echo $row['id_notes'] ?>" value="<?php echo $row['titre'] ?>">
</div>


<div class="form-group">
  <label for="na">contenu</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id_notes'] ?>" value="<?php echo $row['contenu'] ?>">
</div>



<div class="form-group">
  <label for="ad">date</label>
  <input type="text" class="form-control" id="ad-<?php echo $row['id_notes'] ?>" value="<?php echo $row['date'] ?>">
</div>
<div class="form-group">
  <label for="nu">numero eleve</label>
  <input type="text" class="form-control" id="nu-<?php echo $row['id_notes'] ?>" value="<?php echo $row['id'] ?>">
</div>
</div>
       <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button"   onclick="modifierdata(<?php echo $row['id_notes'] ?>)" class="btn btn-primary">modifer le message</button>
    </div>
    </form>
  </div>
</div>
</div>
              <button  onclick="supprimerdata(<?php echo $row['id_notes'] ?>)" class="btn btn-danger">Supprimer</button>
              </td>
              </tr>
              <?php
        
        
    }
  
?>

      </tbody>
  </table>	  
  <h1>Troisieme anneé</h1>
 <table class="table table-bordered table-striped">
      <thead>
          <tr>
	          <th width="40">ID</th>
            <th>Titre</th>
			  <th>Contenu</th>
              <th>date</th>
                <th>nom eleve</th>
                <th>num inscrip</th>
   
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from notes n , eleve e   where n.id=e.id and e.niveau=3");
 $stmt->execute();
  while($row = $stmt->fetch()){
   ?>
                          <?php  $x = $row['id'] ?>
                <?php

                    $stmt1 = $db->prepare("select  name  from eleve where id=$x");
                    $stmt1->execute();
                    $row1 = $stmt1->fetch();
                    ?>
                   
                    <tr>
              <td><?php echo $row['id_notes'] ?></td>
              <td><?php echo $row['titre'] ?></td>
              <td><?php echo $row['contenu'] ?></td>
               <td><?php echo $row['date'] ?></td>
               <td><?php echo $row1['name'] ?></td>
               <td><?php echo $row['id'] ?></td>
 
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id_notes'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id_notes'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id_notes'] ?>">Modifier Message</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
Actualieé modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id_notes'] ?>" value="<?php echo $row['id_notes'] ?>" >

<div class="form-group">
  <label for="t">titre</label>
    <input type="text" class="form-control" id="t-<?php echo $row['id_notes'] ?>" value="<?php echo $row['titre'] ?>">
</div>


<div class="form-group">
  <label for="na">contenu</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id_notes'] ?>" value="<?php echo $row['contenu'] ?>">
</div>



<div class="form-group">
  <label for="ad">date</label>
  <input type="text" class="form-control" id="ad-<?php echo $row['id_notes'] ?>" value="<?php echo $row['date'] ?>">
</div>
<div class="form-group">
  <label for="nu">numero eleve</label>
  <input type="text" class="form-control" id="nu-<?php echo $row['id_notes'] ?>" value="<?php echo $row['id'] ?>">
</div>
</div>
       <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button"   onclick="modifierdata(<?php echo $row['id_notes'] ?>)" class="btn btn-primary">modifer le message</button>
    </div>
    </form>
  </div>
</div>
</div>
              <button  onclick="supprimerdata(<?php echo $row['id_notes'] ?>)" class="btn btn-danger">Supprimer</button>
              </td>
              </tr>
              <?php
        
        
    }
  
?>

      </tbody>
  </table>	  
  <h1>Bac</h1>
 <table class="table table-bordered table-striped">
      <thead>
          <tr>
	          <th width="40">ID</th>
            <th>Titre</th>
			  <th>Contenu</th>
              <th>date</th>
                <th>nom eleve</th>
                <th>num inscrip</th>
   
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from notes n , eleve e   where n.id=e.id and e.niveau=4");
$stmt->execute(); 
            while($row = $stmt->fetch()){

                ?>
                          <?php  $x = $row['id'] ?>
                <?php

                    $stmt1 = $db->prepare("select  name  from eleve where id=$x");
                    $stmt1->execute();
                    $row1 = $stmt1->fetch();
                    ?>
                   
                    <tr>
              <td><?php echo $row['id_notes'] ?></td>
              <td><?php echo $row['titre'] ?></td>
              <td><?php echo $row['contenu'] ?></td>
               <td><?php echo $row['date'] ?></td>
               <td><?php echo $row1['name'] ?></td>
               <td><?php echo $row['id'] ?></td>
 
              <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id_notes'] ?>">Modifier</button>
              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id_notes'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id_notes'] ?>">Modifier Message</h4>
    </div>
    <form>
    <div class="modal-body">

          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
Actualieé modifier avec suceé
</div>

        <input type="hidden"  id="<?php echo $row['id_notes'] ?>" value="<?php echo $row['id_notes'] ?>" >

<div class="form-group">
  <label for="t">titre</label>
    <input type="text" class="form-control" id="t-<?php echo $row['id_notes'] ?>" value="<?php echo $row['titre'] ?>">
</div>


<div class="form-group">
  <label for="na">contenu</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id_notes'] ?>" value="<?php echo $row['contenu'] ?>">
</div>



<div class="form-group">
  <label for="ad">date</label>
  <input type="text" class="form-control" id="ad-<?php echo $row['id_notes'] ?>" value="<?php echo $row['date'] ?>">
</div>
<div class="form-group">
  <label for="nu">numero eleve</label>
  <input type="text" class="form-control" id="nu-<?php echo $row['id_notes'] ?>" value="<?php echo $row['id'] ?>">
</div>
</div>
       <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button"   onclick="modifierdata(<?php echo $row['id_notes'] ?>)" class="btn btn-primary">modifer le message</button>
    </div>
    </form>
  </div>
</div>
</div>
              <button  onclick="supprimerdata(<?php echo $row['id_notes'] ?>)" class="btn btn-danger">Supprimer</button>
              </td>
              </tr>
              <?php
        
        
    }
  
?>

      </tbody>
  </table>	  

</div>





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
var name = $('#na-'+str).val();
var adr = $('#ad-'+str).val();
var numtel = $('#nu-'+str).val();
var t = $('#t-'+str).val();




	 $.ajax({type: "POST",
		url:"s1.php?p=modifiern",
		data: "na="+name+"&ad="+adr+"&nu="+numtel+"&t="+t+"&id="+id,
		success: function(data){
      window.location.reload(true);
		}

	 });
}
 

</script>

  </body>
</html>