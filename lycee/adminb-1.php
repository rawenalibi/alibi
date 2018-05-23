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

          <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" >gestion note<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin-1.php">1ere anne</a></li>
            <li><a href="admin2-note-2.php">2eme anneé</a></li>
            <li><a href="admin2-note-3.php">3eme annee</a></li>
            <li><a href="admin2-note-4.php">bac</a></li>
          </ul>
        </li>
        <li class="dropdown" style="background-color:#CEECF5">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" >gestion butlin<span class="caret"></span></a>
          <ul class="dropdown-menu" >
            <li style="background-color:#CEECF5"><a href="adminb-1.php">1ere anne</a></li>
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

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        
      </ul>
     
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




 
<div class="container">
<form method="post" enctype="multipart/form-data"  data-toggle="validator" >
<input type="text" placeholder="nom matiére" name="niveau">
<input type="text" placeholder="nom matiére" name="sec">
<input type="text" placeholder="nom matiére" name="nom">
 <button name="btn" class="btn btn-primary">Enregistrer</button>
 </form>
<br>
<?php
if(isset($_POST['btn']))
      {
        $ne = $_POST['niveau'];
        $sec = $_POST['sec'];
        $no = $_POST['nom'];
      }
      ?>


<form method="post" enctype="multipart/form-data" action="form.php?var1=<?php  echo $no; ?> & var2=<?php  echo $ne; ?> & var3=<?php  echo $sec; ?> " data-toggle="validator" >

<table class="table table-bordered table-striped" id="table1">
      <thead>
          <tr>

			  <th>id</th>
        <th>nom</th>
        <th>moy</th> 
		</tr>
      </thead>
      <tbody>
      <?php
      if(isset($_POST['btn']))
      {
        $ne = $_POST['niveau'];
        $sec = $_POST['sec'];
        $no = $_POST['nom'];

$stmt = $db->prepare("select  * from eleve where niveau='$ne' and section='$sec'");
                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>          
                    <tr>  
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><input type="text" placeholder="moy" name="tab[]"></td>
                    </tr>
                     <?php
                         }

  ?>

  <button name="submit" class="btn btn-primary">ok</button>

<?php
}
?>

      </tbody>
  </table>

  </form>

    
  </div><!--fin container-->
 






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  <script>


  </script>
</html>