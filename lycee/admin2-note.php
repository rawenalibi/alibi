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
        <li ><a href="admin2-res.php">Resultat</a></li>
        <li  style="background-color:#CEECF5"><a href="admin2-note.php">gestion note</a></li>
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