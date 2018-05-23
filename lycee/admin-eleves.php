<?php
include "config.php";
session_start();
if(!isset($_SESSION['username']))
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
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  </head>
  <body onload="viewData()">
   <nav class="navbar navbar-default"  style="background-color:#A9D0F5">
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
        <li><a href="admin.php">Gestion Actualiteé<span class="sr-only">(current)</span></a></li>
        <li style="background-color:#CEECF5"  ><a href="admin-eleves.php">Gestion Eleves</a></li>
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_SESSION['username'] ?></a></li>
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
  <img src="img/af2.jpg" class="img-rounded" alt="Cinque Terre" width="1000" height="250" style="margin-left:30px;"> 
		</center> 

<div class="container">

<p></p>
<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert nouvelle eleve</button>
<!-- Modal -->
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
$name = $_POST['na'];
$password= md5($_POST['pa']);
$type = $_POST['ty'];
$adr = $_POST['ad'];
$numtel = $_POST['nu'];
$niveau = $_POST['ni'];
$section = $_POST['se'];
$annee = $_POST['an'];
$img = file_get_contents($_FILES['img']['tmp_name']);

 $stmt = $db->prepare("insert into login values ('',?,?,?,?,?,?,?,?,?) ");
 
				  $stmt->bindParam(1,$name);
				  $stmt->bindParam(2,$password);
                  $stmt->bindParam(3,$type);
                  $stmt->bindParam(4,$adr);
                  $stmt->bindParam(5,$numtel);
                  $stmt->bindParam(6,$niveau);
                  $stmt->bindParam(7,$section);
                  $stmt->bindParam(8,$annee);
                  $stmt->bindParam(9,$img);
          
                  $stmt->execute();
                  
                  header('Location: admin-eleves.php');
                        

}

?>
	  <form method="post" enctype="multipart/form-data" >
	    <div class="modal-body">
		
  <div class="form-group">
    <label for="na">name</label>
      <input type="text" class="form-control" name="na" id="na" placeholder="title de actualiteé">
  </div>
  
  <div class="form-group">
    <label for="pa">password</label>
    <input type="text" class="form-control" name="pa" placeholder="Description">
  </div>
  
   <div class="form-group">
    <label for="ty">type</label>
    <input type="text" class="form-control" name="ty" placeholder="Date">
  </div>
  
  
   <div class="form-group">
    <label for="ad">adresse</label>
    <input type="text" class="form-control" id="ad" name="ad"  placeholder="Date">
  </div>
  
   <div class="form-group">
    <label for="nu">numero telephone</label>
    <input type="text" class="form-control" name="nu" id="nu" placeholder="Date">
  </div>
  
  <div class="form-group">
    <label for="ni">Niveau</label>
    <input type="text" class="form-control"name="ni" id="ni" placeholder="Date">
  </div>

   <div class="form-group">
    <label for="se">Section</label>
    <input type="text" class="form-control" name="se" id="se" placeholder="Date">
  </div>
  
  
   <div class="form-group">
    <label for="an">anneé </label>
    <input type="text" class="form-control" name="an" id="an" placeholder="Date">
  </div>
  
  
   <div class="form-group">
    <label for="im">images</label>
    <input type="file" class="form-control" name="img" placeholder="Date">
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
<div id="result"></div>
<p></p>
 
 <table class="table table-bordered table-striped">
      <thead>
          <tr>
	          <th width="40">ID</th>
			  <th>name</th>
			
			  <th>type</th>
        <th>adresse</th>
        <th>num tel</th>
        <th>niveau</th>
        <th>section</th>
        <th>annee</th>
        <th>image</th>
			  <th width="190">Action</th>
		</tr>
      </thead>
      <tbody>
      </tbody>
  </table>	  




</div>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
  function viewData()	{
	$.ajax({
	type	: "GET",
	url : "server1.php",
	success: function(data)
	{
		$('tbody').html(data);
	}
	
	});
	}

	


function modifierdata (str)
	 {  
   

	 var id= str;
var $name = $('#na-'+str).val();
var $adr = $('#ad-'+str).val();
var $numtel = $('#nu-'+str).val();
var $niveau = $('#ni-'+str).val();
var $section = $('#se-'+str).val();
var $annee = $('#an-'+str).val();




	 $.ajax({type: "POST",
		url:"server1.php?p=modifier",
		data: "na="+name+"&ad="+adr+"&nu="+numtel+"&ni="+niveau+"&se="+section+"&an="+annee+"&id="+id,
		success: function(data){
   
		}

	 });
}
function supprimerdata(str)
	 {
    swal({
  title: "Are you sure?",
  text: "Your will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
	 var id= str;
	 $.ajax({type: "GET",
		url:"server1.php?p=sup",
		data: "id="+id,
		success: function(data){
			viewData();
		}

	 });

}
)
}
	</script>



  </body>
</html>

