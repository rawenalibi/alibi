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
        <li style="background-color:#CEECF5"><a href="admin2-emp.php">emploie de temps/examen</a></li>

        <li><a href="admin2-res.php">Resultat</a></li>
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


    <center>
<h1>emploie de temps</h1>

    </center>
  <br>
<div class="container">
<button class="btn btn-primary" data-toggle="modal" data-target="#addData" onClick="$('#error-box').html('')'">Insert emploie du temps</button>
<br>
<div id="error-box" style="display:none">

</div>
<br>

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
  $doc_name = $_POST['niveau'];
  $doc_namee = $_POST['sec'];
  $name = $_FILES['myfile']['name'];
  $tmp_name = $_FILES['myfile']['tmp_name'];

  $stmt = $db->prepare("select count(*) from documents WHERE niveau = ? AND section = ?");
  $stmt->bindParam(1,$doc_name);
  $stmt->bindParam(2,$doc_namee);
  
  $stmt->execute();
  $number_of_rows = $stmt->fetchColumn(); 

if($number_of_rows==0)
{
  if($t = $_POST['11']=="fichier")
{
 
        
        $Location = "documents/$name";
        move_uploaded_file($tmp_name, $Location);
        $stmt = $db->prepare("insert into documents values ('',?,?,?) ");
        $stmt->bindParam(1,$doc_name);
        $stmt->bindParam(2,$doc_namee);
        $stmt->bindParam(3,$Location);
        $stmt->execute();
        header('Location:admin2-emp.php');
}
if($t = $_POST['11']=="opt1")
{
  $doc_name = $_POST['niveau'];
  $doc_namee = $_POST['sec'];
  $doc_nameee = $_POST['sem'];
  $name = $_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];

      
      $Location = "documents/$name";
      move_uploaded_file($tmp_name, $Location);
      $stmt = $db->prepare("insert into empt values ('',?,?,?,?) ");
      $stmt->bindParam(1,$doc_name);
      $stmt->bindParam(2,$doc_namee);
      $stmt->bindParam(3,$doc_nameee);
      $stmt->bindParam(4,$Location);
      $stmt->execute();
      header('Location:admin2-emp.php');
}
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
    <label for="11">Type de table</label>
    <select class="form-control" id="mystuff" name="11">
    <option value="fichier">temps</option>  
      <option value="opt1" >examan</option>
  
    </select>
  </div>



  <div class="form-group mystaff_hide mystaff_opt1">
    <label  class="control-label">Sem</label>
      <input type="text" class="form-control" name="sem"  placeholder="semster" >
  </div>

  <div class="form-group">
    <label  class="control-label">Niveau</label>
      <input type="text" class="form-control" name="niveau"  placeholder="title de actualiteé" >
  </div>
  
  <div class="form-group has-feedback">
    <label class="control-label">section</label>
    <input type="text" name="sec" placeholder="Mot de passe" class="form-control">
  </div>

  
   <div class="form-group">
    <label >fichier</label>
    <input type="file" name="myfile">
  </div>


 <div class="modal-footer">
        <button type="reset" id="reset-btn" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="btn" class="btn btn-primary">Enregistrer</button>
        
  </div>

                   </div><!--form-->

	  </form>

    </div>
  </div>
</div>


 <div class="alert alert-success" id="passwordsNoMatch" role="alert"  >
Primer anneé
</div>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
			  <th>Section</th>
        <th>name</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from documents");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['niveau']=="1")
                  {
                    ?>
                    <tr>
              <td><?php echo $row['section'] ?></td>
              <td><?php echo $row['path'] ?></td>
              <td>
              <button  onclick="supprimerdataa(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
</td>
</tr>
<?php
                  }
  }
?>
</tbody>
</table>
<div class="alert alert-success" id="passwordsNoMatch" role="alert" >
deuxieme anneé
</div>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
			  <th>Section</th>
        <th>name</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from documents");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['niveau']=="2")
                  {
                    ?>
                    <tr>
              <td><?php echo $row['section'] ?></td>
              <td><?php echo $row['path'] ?></td>
              <td>
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
</td>
</tr>
<?php
                  }
  }
?>
</tbody>
</table>
<br>
<div class="alert alert-success" id="passwordsNoMatch" role="alert"  >
Troisieme anneé
</div>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
			  <th>Section</th>
        <th>name</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from documents");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['niveau']=="3")
                  {
                    ?>
                    <tr>
              <td><?php echo $row['section'] ?></td>
              <td><?php echo $row['path'] ?></td>
              <td>
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
</td>
</tr>
<?php
                  }
  }
?>
</tbody>
</table>
<br>
<div class="alert alert-success" id="passwordsNoMatch" role="alert"  >
bac
</div>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
			  <th>Section</th>
        <th>name</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from documents");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['niveau']=="4")
                  {
                    ?>
                    <tr>
              <td><?php echo $row['section'] ?></td>
              <td><?php echo $row['path'] ?></td>
              <td>
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
</td>
</tr>
<?php
                  }
  }
?>
</tbody>
</table>
</div>
<center>

<h1>emploie du examns</h1>

    </center>
  <br>
  <div class="container">
  <div class="alert alert-success" id="passwordsNoMatch" role="alert"  >
Semster 1
</div>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
          <th>Niveau</th>
			  <th>Section</th>
        <th>name</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from empt");
                $stmt->execute();
                while($row = $stmt->fetch()){
                  if($row['sem']=="1")
                  {
                    ?>
                    <tr>
              <td><?php echo $row['niveau'] ?></td>
              <td><?php echo $row['section'] ?></td>
              <td><?php echo $row['filename'] ?></td>
              <td>
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
</td>
</tr>
<?php
                  }
  }
?>
</tbody>
</table>
<div class="alert alert-success" id="passwordsNoMatch" role="alert"  >
2eme anneé
</div>
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>
          <th>Niveau</th>
			  <th>Section</th>
        <th>name</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from empt");
$stmt->execute();
while($row = $stmt->fetch()){
  if($row['sem']=="2")
  {
    ?>
    <tr>
<td><?php echo $row['niveau'] ?></td>
<td><?php echo $row['section'] ?></td>
<td><?php echo $row['filename'] ?></td>
              <td>
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
</td>
</tr>
<?php
                  }
  }
?>
</tbody>
</table>



    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- <?php
    include('config.php');
 
    $stmt = $db->prepare("select * from documents");
    $stmt->execute();

    ?>
    <a href ="upload.php">add new document</a><br>
    <?php
    while ($row = $stmt->fetch())
    {
      $id = $row['id'];
      $name = $row['name'];
      $path =$row['path'];
      
echo $id. "" . $name . "<a href='download.php?dow=$path'>download</a><br>";
    }

?> -->

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
		url:"s1.php?p=sup-emp",
		data: "id="+id,
		success: function(data){
      window.location.reload(true);

		}
	 });

})


  
}
function supprimerdataa(str)
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
		url:"s1.php?p=sup-doc",
		data: "id="+id,
		success: function(data){
      window.location.reload(true);

		}
	 });

})


  
}
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
</script>


  </body>
</html>