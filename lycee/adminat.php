<?php
include "config.php";
session_start();
if(!isset($_SESSION['name']))
{
	header('location: index.php');
}

?>

<?php
$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
if(isset($_POST['btn']))
{}?>
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
      <li ><a href="admin.php">gestion admin<span class="sr-only">(current)</span></a></li>
      <li><a href="adminn.php">gestion note<span class="sr-only">(current)</span></a></li>
      <li><a href="adminp.php">gestion bultin<span class="sr-only">(current)</span></a></li>
      <li style="background-color:#CEECF5"><a href="adminat.php">attestation <span class="sr-only">(current)</span></a></li>

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
<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>

			  <th>id</th>
        <th>date</th>
   
			  <th width="200">Action</th>
		</tr>
      </thead>
      <tbody>
      <?php
$stmt = $db->prepare("select  * from attestation");
                $stmt->execute();
                while($row = $stmt->fetch()){
               
                    ?>
                 <tr>
            
              <td><?php echo $row['num_e'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td>
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
              <form method="post" enctype="multipart/form-data" action="for.php " data-toggle="validator" >

              <button   class="btn btn-danger">Accepter</button></form>
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
		url:"s1.php?p=sup-att",
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