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
        <li  ><a href="admin2-abs-ret-el.php">Boite abscance/ retard</a></li>
      
        <li><a href="admin2-emp.php">emploie de temps/examen</a></li>

        
        <li style="background-color:#CEECF5"><a href="admin2-res.php">Resultat</a></li>
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
<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert Resultat</button>
<br><br>
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">ajoute emploie du temps</h4>
      </div>


<?php
include("config.php");
if(isset($_POST['btn']))
{
  $t = $_POST['11'];
    $date = $_POST['date'];
    $id_e = $_POST['num_e'];
    $name = $_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];
 
        
        $Location = "documents/$name";
        move_uploaded_file($tmp_name, $Location);
        $stmt = $db->prepare("insert into resultat values ('',?,?,?,?) ");
        $stmt->bindParam(1,$t);
        $stmt->bindParam(2,$date);
        $stmt->bindParam(3,$id_e);
        $stmt->bindParam(4,$Location);
        $stmt->execute();
        header('Location:admin2-res.php');


}
?>
	  <form method="post" enctype="multipart/form-data"  data-toggle="validator" >
	    <div class="modal-body">
		

 <div class="form-group">
    <label for="11">Semester</label>
    <select class="form-control" id="mystuff" name="11">
    <option value="1">1</option>  
      <option value="2">2</option>
  
    </select>
  </div>


  <div class="form-group">
    <label  class="control-label">Date</label>
      <input type="text" class="form-control" name="date"  placeholder="date de debot" >
  </div>
  
  <div class="form-group">
    <label  class="control-label">num eleve</label>
      <input type="text" class="form-control" name="num_e"  placeholder="numero eleve" >
  </div>
  
  
   <div class="form-group">
    <label >fichier</label>
    <input type="file" name="myfile">
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

<center>
<div class="alert alert-success" >
Premiere semester

</div>
</center>
<br>
<h1>Primere anneé</h1>

<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
        <th>date de debot</th>
        <th>numero eleve</th>
        
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php

$stmt = $db->prepare("select  * from resultat ");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['sem']=="1" )
                  {

                                        ?>
                                          <tr>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['id_e'] ?></td>
                                   

                                    <td>
                                    <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
                                      <?php
                  }
                }

              

       ?>
       </tbody>
</table>
       <br>

<h1>2eme anneé</h1>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
        <th>date de debot</th>
        <th>numero eleve</th>
        <th>Section</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php

$stmt2 = $db->prepare("select  * from eleve  ");
$stmt2->execute();
while($row2 = $stmt2->fetch()){
  ?>

  <?php  $y = $row2['section'] ?>

  <?php
}
$stmt = $db->prepare("select  * from resultat  order by $y DESC");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  ?>
                  <?php  $x = $row['id_e'] ?>
                  <?php

        $stmt1 = $db->prepare("select  * from eleve   where id=$x  ");
        $stmt1->execute();
        $row1 = $stmt1->fetch();

                  if($row['sem']=="1" && $row1['niveau']=="2" )
                  {
                                          ?>
                                          <tr>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['id_e'] ?></td>
                                    <td><?php echo $row1['section'] ?></td>

                                    <td>
                                    <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
                            <?php
                  }

              }

       ?>
       </tbody>
</table>
<br>
<h1>3eme aneé</h1>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
        <th>date de debot</th>
        <th>numero eleve</th>
        <th>Section</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php

$stmt2 = $db->prepare("select  * from eleve  ");
$stmt2->execute();
while($row2 = $stmt2->fetch()){
  ?>

  <?php  $y = $row2['section'] ?>

  <?php
}
$stmt = $db->prepare("select  * from resultat  order by $y DESC");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  ?>
                  <?php  $x = $row['id_e'] ?>
                  <?php

        $stmt1 = $db->prepare("select  * from eleve   where id=$x  ");
        $stmt1->execute();
        $row1 = $stmt1->fetch();

                  if($row['sem']=="1" && $row1['niveau']=="3" )
                  {
                                          ?>
                                          <tr>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['id_e'] ?></td>
                                    <td><?php echo $row1['section'] ?></td>

                                    <td>
                                    <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
                            <?php
                  }

              }

       ?>
       </tbody>
</table>
<br>
<h1>bac</h1>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
        <th>date de debot</th>
        <th>numero eleve</th>
        <th>Section</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php

$stmt2 = $db->prepare("select  * from eleve  ");
$stmt2->execute();
while($row2 = $stmt2->fetch()){
  ?>

  <?php  $y = $row2['section'] ?>

  <?php
}
$stmt = $db->prepare("select  * from resultat  order by $y DESC");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  ?>
                  <?php  $x = $row['id_e'] ?>
                  <?php

        $stmt1 = $db->prepare("select  * from eleve   where id=$x  ");
        $stmt1->execute();
        $row1 = $stmt1->fetch();

                  if($row['sem']=="1" && $row1['niveau']=="4" )
                  {
                                          ?>
                                          <tr>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['id_e'] ?></td>
                                    <td><?php echo $row1['section'] ?></td>

                                    <td>
                                    <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
                            <?php
                  }

              }

       ?>
       </tbody>
</table>

<br />
<center>
<div class="alert alert-success" >
Premiere semester

</div>
</center>
<br>
<h1>Primere anneé</h1>

<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
        <th>date de debot</th>
        <th>numero eleve</th>
        
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php

$stmt = $db->prepare("select  * from resultat ");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['sem']=="2" )
                  {

                                        ?>
                                          <tr>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['id_e'] ?></td>
                                   

                                    <td>
                                    <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
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
var adr = $('#ad-'+str).val();
var numtel = $('#nu-'+str).val();
var section = $('#se-'+str).val();
var annee = $('#an-'+str).val();
var img = $('#img').val();




	 $.ajax({type: "POST",
		url:"s1.php?p=modifier",
		data: "na="+name+"&ad="+adr+"&nu="+numtel+"&se="+section+"&an="+annee+"&img="+img+"&id="+id,
		success: function(data){
      window.location.reload(true);
		}

	 });
}
 
</script>


  </body>
</html>