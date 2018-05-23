<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="style2.css"/>
    <!-- Bootstrap CSS -->
	
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
  
  <nav class="navbar navbar-default" style="background-color:#A9D0F5" >
  <div class="container-fluid" >
   
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Lyceé Ibno Roched</a>
    </div>

   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
      <ul class="nav navbar-nav">
	  
        <li  style="background-color:#CEECF5"><a href="index.php">Accueil <span class="sr-only">(current)</span></a></li>
        <li><a href="apropos.php">A propos</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
	          <?php
			  include "config.php";
			  if(isset($_POST['email']) && isset($_POST['password']))
			  {
				  $username = $_POST['email'];
				  $password = md5($_POST['password']);
				  $stmt = $db->prepare("select * from login where username=? and password=? ");
				  $stmt->bindParam(1,$username);
				  $stmt->bindParam(2, $password);
				  $stmt->execute();
				  $row = $stmt->fetch();
				  $user = $row['username'];
				  $pass = $row['password'];
				  $id   = $row['id'];
				  $type  = $row['type'];
				   $adr  = $row['adr'];
				   $img  = $row['img'];
				  if($username==$user && $pass==$password && $type=='Administrator')
				  {
					  session_start();
					  $_SESSION['username'] = $user;
					  $_SESSION['password'] = $pass;
					  $_SESSION['id'] = $id;
					  $_SESSION['type'] = $type;
					  	  $_SESSION['adr'] = $adr;
						    $_SESSION['img'] = $img;
					  ?>
					 
					  <script>window.location.href='admin.php'</script>
					  <?php
				  }
				  else if($username==$user && $pass==$password && $type=='Member')
				  {
					  session_start();
					  $_SESSION['username'] = $user;
					  $_SESSION['password'] = $pass;
					  $_SESSION['id'] = $id;
					  $_SESSION['type'] = $type;
					   $_SESSION['adr'] = $adr;
					     $_SESSION['img'] = $img;
					  ?>
					 
					  <script>window.location.href='user.php'</script>
					  <?php
				  }
			
			else{
				?>
				<?php
			     }
			
			  }
			  ?>
	  
                        <form method="post" class="navbar-form navbar-right" >
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email Address">                                        
                          </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">                                        
                        </div>

                               <button type="submit" class="btn btn-primary" >Login</button>
                         </form>
     
	 
	 
	 
    </div>
  </div>
</nav>

<div class="six-slider"><!--fix slider-->

<div class="slider" >
     <div id="slider1" class="carousel slide" date-ride="carousel">
         <ol class="carousel-indicators">
       <li data-target="#slider1" data-slide-to="0" class="active"></li>
       <li data-target="#slider1" data-slide-to="1"></li>
       <li data-target="#slider1" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">

                      <div class="item active">  <img src="img/i3.jpg" alt="image"  "> 
                           <div class="carousel-caption">
						  <br><br><br><br><br><br><br><br>
						  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Bibliothèque des Resources Unversitaires</b>
                           </div>
                      </div>

                      <div class="item">  <img src="img/i2.jpg" alt="image"> 
                        <div class="carousel-caption">
                                <b>hi2</b>
                        </div>                    
                     </div>

                      <div class="item">  <img src="img/i1.jpg" alt="image">
                        <div class="carousel-caption">
                                <b>hi3</b>
                               </div>
                     </div>
          </div>
         <a href="#slider1" class="left carousel-control" data-slide="prev">
             <span class="glyphicon glyphicon-chevron-left" ></span>
         </a>
         <a href="#slider1" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" ></span>
            </a>

     </div>


</div>




</div><!--fin fix slider-->



<div class="container">
 <center> <h1>Hello World!</h1></center>
  <div class="row">
    <div class="col-sm-3">
     <img src="http://www.academie-nice.fr/office/ADI/cke_standard/filemanager/userfiles/bibliotheque/icones_raccourcis/Address.png" title="Notes" class="hp-highlight-img" style="width:32px;height:32px;"/>
					<h3><a href="http://notes.clg-django-reinhardt.ac-nice.fr:8036/" title="Notes" target="_blank">Notes</a></h3>
					<p>Suivez en ligne la scolarité de votre enfant. Consultez ses notes, emploi du temps, absences, retards ...</p>
    </div>
	<div class="col-sm-3" >
    <img src="http://www.academie-nice.fr/office/ADI/cke_standard/filemanager/userfiles/bibliotheque/icones_raccourcis/Dictionary.png" title="Nous Contacter" class="hp-highlight-img" style="width:32px;height:32px;"/>
					<h3><a href="index.php?id_menu=74" title="Nous Contacter" target="">Nous Contacter</a></h3>
					<p>Retrouvez ici toutes nos coordonnées, adresse, téléphone, horaires d'ouverture, plan d'accès ...</p>
    </div>
	<div class="col-sm-3" >
   <img src="http://www.academie-nice.fr/office/ADI/cke_standard/filemanager/userfiles/bibliotheque/icones_raccourcis/Coda.png" title="Menus Cantine" class="hp-highlight-img" style="width:32px;height:32px;"/>
					<h3><a href="index.php?id_menu=136" title="Menus Cantine" target="">Menus Cantine</a></h3>
					<p>Semaine après semaine, les menus de la cantine servis à  votre enfant sont disponibles sur notre site internet</p>
    </div>
    <div class="col-sm-3">
   <img src="http://www.academie-nice.fr/office/ADI/cke_standard/filemanager/userfiles/bibliotheque/icones_raccourcis/Airport.png" title="Le Collège" class="hp-highlight-img" style="width:32px;height:32px;"/>
					<h3><a href="index.php?id_menu=73" title="Le Collège" target="">Le Collège</a></h3>
					<p>Implantation, infrastructures, équipements, tour d'horizon ...</p>
    </div>
  </div>
</div>



  
  
  
  
  
 <footer>
    <div class="footerHeader" ></div>
    <div class="container">
		<div class="col-md-4" >
		    <h3>About us</h3>
		    <p>
		        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
		    </p>
		</div>
		
		<div class="col-md-4">
		    <h3>Our Location </h3>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2060.1938041216745!2d10.804686793669653!3d35.764025085900016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130212a605692b09%3A0xe2d25160aeaab630!2sFacult%C3%A9+des+sciences+de+Monastir!5e0!3m2!1sfr!2stn!4v1523363621295" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="col-md-4" >
		    <h3>Contact Us</h3>
		    <ul>
		        <li>Phone : 123 - 456 - 789</li>
		        <li>E-mail : info@comapyn.com</li>
		        <li>Fax : 123 - 456 - 789</li>
		    </ul>
		    <p>
		        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
		    </p>
		    <ul class="sm">
		        <li><a href="#" ><img src="https://www.facebook.com/images/fb_icon_325x325.png" class="img-responsive"></a></li>
		        <li><a href="#" ><img src="https://lh3.googleusercontent.com/00APBMVQh3yraN704gKCeM63KzeQ-zHUi5wK6E9TjRQ26McyqYBt-zy__4i8GXDAfeys=w300" class="img-responsive" ></a></li>
		        <li><a href="#" ><img src="http://playbookathlete.com/wp-content/uploads/2016/10/twitter-logo-4.png" class="img-responsive"  ></a></li>
		    </ul>
		</div>
    </div>
</footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  </body>
</html>