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
    <link rel="stylesheet" href="style3.css">

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
        <li  ><a href="admin1-bib.php">gestion bibliotheque</a></li>
        <li style="background-color:#CEECF5"><a href="admin1-msg.php">Boite de messsage</a></li>
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
<div class="container">
    <center><p><B><h1>message</h1></B></p></center>

<section id="team" >
    <div class="container">
        <br>
        <?php
        $stmt = $db->prepare("select  * from message");
        $stmt->execute();
        while($row = $stmt->fetch())
        {
            ?>
            <?php  $x = $row['id_e'] ?>
  <?php
        $stmt1 = $db->prepare("select  * from eleve e , message m   where e.id=$x ");
        $stmt1->execute();
        $row1 = $stmt1->fetch();
?>
        <div class="row">
            <!-- Team member -->
    
<div class="col-xs-12 col-sm-6 col-md-4">


                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><?php echo '<img class=" img-fluid" src="data:img/jpg;base64,'.base64_encode( $row1['img'] ).'"    alt="card image">' ?></p>
                                    

                                    <h4 class="card-title"><?php echo $row1['name'] ?></h4>
                                    <p class="card-text"><?php echo $row['sujet'] ?>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php echo $row['sujet'] ?></h4>
                                    <p class="card-text"><?php echo $row['description'] ?>.</p>
                                    <br>
                                    <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
         

        </div>
        <?php

                }

                ?>
    </div>
</section>


<!-- Team -->

</div><!--fin container-->

























    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>

  
  function supprimerdata(str)
	 {
  

	 var id= str;
	 $.ajax({type: "GET",
		url:"s1.php?p=sup-msg",
		data: "id="+id,
		success: function(data){
      window.location.reload(true);

		}
	 });




  
     }
</script>

  </body>
</html>