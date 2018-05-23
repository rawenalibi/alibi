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
  <style>
  .ff { 
 
   
  background: url("https://ak3.picdn.net/shutterstock/videos/6573083/thumb/1.jpg?i10c=img.resize(height:160)") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

    background-attachment: fixed;
    background-position: center; 
    margin-left: 30px;
    margin-right: 30px;
    height: 720px;
}
.ds{ position:fixed;}
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #efefef;

}
  .navbar {
      height: auto;
}
.kk
{ opacity: 0.7;
  width:1000px;
  height: 100px;
  background:white;
}
</style>
  <link rel="stylesheet" type="text/css" href="style1.css"/>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>eleve</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<style>
  ul {
list-style:none;
margin-right:0;
padding-left:20px;

}


	.clickable
{
    cursor: pointer;
}

.clickable .glyphicon
{
    background: rgba(0, 0, 0, 0.15);
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px
}

.panel-heading span
{
    margin-top: -23px;
    font-size: 15px;
    margin-right: -9px;
}
a.clickable { color: inherit; }
a.clickable:hover { text-decoration:none; }
</style>
  </head>
  <body>
  
  <nav class="navbar navbar-default" style="background-color:#778899;">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only" >Toggle navigation</span>
        <span class="icon-bar" ></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" ><font color="SlateGrey ">   <B style="color:white;">Lycée ibnou roched </B></font> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li  style="background-color:	#808080" ><a href="eleve.php"><B  style="color:white;">Actualiteé</B> <span class="sr-only">(current)</span></a></li>
        
		<li><a href="eleve-emploie.php"><B  style="color:white;">Emploie</B></a></li>
        <li ><a href="eleve-notes.php"><B  style="color:white;">Notes</B></a></li>
		<li><a href="eleve_bib.php"><B  style="color:white;">Bibliotheque</B></a></li>

    <li><a href="eleve-resultat.php"><B  style="color:white;">Resultat</B></a></li>
    <li><a href="eleve-prof.php"><B  style="color:white;">liste de proff</B></a></li>
    <li><a href="eleve-abs.php"><B  style="color:white;">absanc retard</B></a></li>
    <li><a href="eleve-contact.php"><B  style="color:white;">contact</B></a></li>











    
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
$a=$_SESSION['name'];
$stmt = $db->prepare("select * from eleve where name= '$a'");


                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>
<li> <?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"   border-radius: 50%;  width="60" height="60"/>' ?></td></li>
<?php
                }
?>
        <li ><a href="#"><B 	style="color:#4B0082;"><?php echo $_SESSION['name'] ?></B></a></li>
        <li class="dropdown" >
         <a class="dropdown-toggle"   data-toggle="dropdown" href="#"><B   style="color:white;">Option</B><span class="caret"></span></a>
          <ul class="dropdown-menu" >

            <li>
            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          profile    </button></center>



</li>
         
           
           <center>
            <li><a href="logout.php" class="btn btn-secondary">Quitter</a></li>
            </center>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="ff">

<div class="container">



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        
    <center>
      <?php
$a=$_SESSION['name'];
$stmt = $db->prepare("select * from eleve where name= '$a'");


                $stmt->execute();
                while($row = $stmt->fetch()){
                    ?>
<td> <?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"   border-radius: 50%;  width="300" height="300"/>' ?></td>

<br><br>
                
             
              
              <B><font color="red" >
            <h1><td><?php echo $row['name'] ?></td></font></h1>
            </B>
              <br>
                           <h4>adresse:</h4><?php echo $row['adr'] ?>
            
                           <h4>Numero tel:</h4>    <?php echo $row['numtel'] ?>
          
                           <h4>Niveau:  <?php echo $row['niveau'] ?>
            
                           <h4>specaliteé: <?php echo $row['section'] ?>
              <br>
              <h4>Anneé : <?php echo $row['annee'] ?>
              <br>
              

               <?php
                }

?>


     </center>


      </div>

      <div class="modal-footer">
      <?php
$a=$_SESSION['name'];
$stmt = $db->prepare("select * from eleve where name= '$a'");


                $stmt->execute();
                $row = $stmt->fetch();
                    ?>
     
 <button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>

    </div>
  </div>
</div>


              <!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier Information</h4>
    </div>
    <form>
    <div class="modal-body">
          <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
Actualieé modifier avec suceé
</div>
        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
<div class="form-group">
  <label for="na">name</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
</div>
<div class="form-group">
  <label for="ad">adresse</label>
  <input type="text" class="form-control" id="ad-<?php echo $row['id'] ?>" value="<?php echo $row['adr'] ?>">
</div>
<div class="form-group">
  <label for="nu">numero  tel</label>
  <input type="text" class="form-control" id="nu-<?php echo $row['id'] ?>" value="<?php echo $row['numtel'] ?>">
</div>
<div class="form-group">
  <label for="ni">niveau</label>
  <input type="text" class="form-control" id="ni-<?php echo $row['id'] ?>" value="<?php echo $row['niveau'] ?>">
</div>

<div class="form-group">
  <label for="se">section</label>
  <input type="text" class="form-control" id="se-<?php echo $row['id'] ?>" value="<?php echo $row['section'] ?>">
</div>
<div class="form-group">
  <label for="an">annee</label>
  <input type="text" class="form-control" id="an-<?php echo $row['id'] ?>" value="<?php echo $row['annee'] ?>">
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

<?php

?>





<br>
<center>
<I><font size="8" color="black">Actualités</font></I>
</center>

<center>
<br>

<br>
 	<?php
				 $stmt = $db->prepare("select * from actualite order by id DESC");
				  $stmt->execute();
				  while($row = $stmt->fetch()){
					  ?>
            <div class="kk">

        						<p><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  width="50" height="50"/>' ?></p>

<h1>	 <?php echo $row['titre'] ?></h1>
<p>	 <?php echo $row['description'] ?>
<p>	 <?php echo $row['date'] ?></p>
</div>
<?php
				  }
				  ?>




</center>

<br><br>


                        

</div>
</div>
<br>

                      <div style="width:100">
                            <div class="col-lg-12" >
                              <div class="col-md-4">
                                <p>Lyceé Ibnou Roched Maknsssy</p>  
                              </div>
                              <div class="col-md-4">
                              <a href="ee">facebook</a>
                              </div>
                              <div class="col-md-4">
                                <p class="muted pull-right">© 2018 Tous droits réservés</p>
                              </div>
                            </div>
                        </div>
               

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
	$(document).on('click', '.panel-heading span.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).ready(function () {
    $('.panel-heading span.clickable').click();
    $('.panel div.clickable').click();
});




</script>
<script>

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