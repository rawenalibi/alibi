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

  <body onload="viewData()">
  

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
        <li style="background-color:#CEECF5"><a href="admin1.php">Gestion Actualiteé<span class="sr-only">(current)</span></a></li>
        
        <li><a href="admin1-notes.php" >notes chere eleve</a></li>
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


<p></p>
<button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert nouvelle actualiteé</button>
<!-- Modal -->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">ajoute actualiteé</h4>
      </div>
      <?php

$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
if(isset($_POST['btn']))
{
  $img = file_get_contents($_FILES['img']['tmp_name']);
$titre = $_POST['tt'];
$description= $_POST['dd'];
$date = $_POST['da'];


 $stmt = $db->prepare("insert into actualite values ('',?,?,?,?) ");
 $stmt->bindParam(1,$img);        
 $stmt->bindParam(2,$titre);
				  $stmt->bindParam(3,$description);
          $stmt->bindParam(4,$date);
        	  $stmt->execute();
     header('Location: admin1.php');                       
}
?>
      <form method="post" enctype="multipart/form-data"  data-toggle="validator" >
	    <div class="modal-body">


<div class="alert alert-success" id="passwordsNoMatchRegister" role="alert" style="display:none;" >
ajoute suceé
</div>

  <div class="form-group">
    <label for="tt">Title</label>
      <input type="text" class="form-control" id="tt" name="tt" placeholder="title de actualiteé">
  </div>

 
  <div class="form-group">
    <label for="dd">Descccription</label>
    <textarea type="text" class="form-control" id="dd" name="dd" placeholder="Description"></textarea>
  </div>
  
   <div class="form-group">
    <label for="da">Date</label>
    <input type="text" class="form-control" id="da"  name="da" placeholder="Date">
  </div>
  
  <div class="form-group">
    <label for="img">images</label>
    <input type="file" class="form-control" name="img" placeholder="Date" >
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
	          <th width="40">image</th>
			  <th>titre</th>
			  <th>description</th>
			  <th>date</th>
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
//   	function saveData()
// 	{
 
    
//     $('#passwordsNoMatchRegister').show();
    
// 		var titre = $('#tt').val();
// 		var description = $('#dd').val();
// 		var date = $('#da').val();
// 	$.ajax({type: "POST",
// 		url:"server.php?p=add",
// 		data: "tt="+titre+"&dd="+description+"&da="+date,
// 		success: function(data){
     
//    	}
// 		});
//     setTimeout(function(){  
//     window.location.reload(1);},1500);
//  }
	
	
	function viewData()
	{

    setTimeout(function(){  
    window.location.reload(1);},600000);
    
	$.ajax({
	type	: "GET",
	url : "server.php",
	success: function(data)
	{
		$('tbody').html(data);
	}
	
	});

  
	}
	
	 function modifierdata (str)
	 {  
     $('#passwordsNoMatch').show();

	 var id= str;
	 var titre = $('#tt-'+str).val();
	 var description = $('#dd-'+str).val();
	 var date = $('#da-'+str).val();
	 $.ajax({type: "POST",
		url:"server.php?p=modifier",
		data: "tt="+titre+"&dd="+description+"&da="+date+"&id="+id,
		success: function(data){
   
     
		}
	 });

       setTimeout(function(){  
    window.location.reload(1);},1500);
    
     }




	 function supprimerdata(str)
	 {
    swal({
  title: "tu est sure ?",
  text: "tu ne requipre pas cette fiche",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "OUI, supprimer!",
  
  
},
function(){

 

	 var id= str;
	 $.ajax({type: "GET",
		url:"server.php?p=sup",
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