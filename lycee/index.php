<html>
<head><title>lycee Ibnou Roched</title>


<link rel="stylesheet" type="text/css" href="style.css"/>

<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  




<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<!------ Include the above in your HEAD tag ---------->
<style>
	
	.slider{
    width: 100%;
padding: 0px;margin:0px;
}
.carousel-caption{
    color: #fff;position: absolute;top:35%;left:-20px;
}

b{font-size: 40px;border-bottom-style: ridge;font-weight: bold;border-bottom-color: #82c434;}
.slider .carousel-inner .item>img{height:350px;width: 1200px;}
#Objectifs{

    font-size: 45px;
    border-bottom-style: ridge;
    font-weight: bold;border-bottom-color: #82c434
}
.col1{


border-style: solid;border-color:#999999;border-width: 1px;min-height: 350px;

}
.icons{
    width: 130px;font-size: 60px;background-color: #d9d9d9;padding: 5px 10px; height: 110px;margin-top: -50px;color: #82c434;

}
#containerb{
    background-color: black;
    width: 100%;
    position: absolute;
    bottom: 570px;
    

}

select.models{
    display:none;
  }
  select.models.active{
    display:inline-block;
  }
 
	</style>
<body>

<nav class="navbar navbar-default" style="background-color:#48D1CC" >
  <div class="container-fluid" >
   
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><font size="6" color="MintCream ">Lycée Ibn Rochd</font></a>
    </div>

   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
      <ul class="nav navbar-nav">
	  
        <li  style="background-color:#20B2AA"><a href="index.php"><font size="4" color="MintCream ">Page d'accueil </font><span class="sr-only">(current)</span></a></li>
				<li ><a href="fichier_e.php"><font size="4" color="MintCream ">Plus</font><span class="sr-only">(current)</span></a></li>

      </ul>
	          <?php
			  include "config.php";
			  if(isset($_POST['name']) && isset($_POST['pass']))
			  {
				  $name = $_POST['name'];
				  $pass = ($_POST['pass']);
				  $stmt = $db->prepare("select * from eleve where name=? and pass=? ");
				  $stmt->bindParam(1,$name);
				  $stmt->bindParam(2, $pass);
					$stmt->execute();		
					$row = $stmt->fetch();
					$id   = $row['id'];
				  $user = $row['name'];
				  $pass = $row['pass'];
				  $numtel   = $row['numtel'];
				   $niveau  = $row['niveau'];
					 $section  = $row['section'];
					 $annee   = $row['annee'];
					 $img   = $row['img'];
				  if($name==$user && $pass==$pass)
				  {
						session_start();
						$_SESSION['id'] = $id;
					  $_SESSION['name'] = $user;
						$_SESSION['pass'] = $pass;
						$_SESSION['img'] = $img;
						$_SESSION['niveau'] = $niveau;
						$_SESSION['section'] = $section;
					  ?>
					 
					  <script>window.location.href='elevep.php'</script>
					  <?php
					}
					else
					
				if(isset($_POST['name']) && isset($_POST['pass']))
			  {
				  $name = $_POST['name'];
				  $pass = md5($_POST['pass']);
				  $stmt = $db->prepare("select * from admin where name=? and pass=? ");
				  $stmt->bindParam(1,$name);
				  $stmt->bindParam(2, $pass);
					$stmt->execute();

					$row = $stmt->fetch();
					$id   = $row['id'];
				  $user = $row['name'];
					$pass = $row['pass'];
					$type = $row['type'];

				   if($name==$name && $pass==$pass&& $type=='admin')
				  {
					  session_start();
					  $_SESSION['name'] = $user;
					  $_SESSION['pass'] = $pass;
					  $_SESSION['id'] = $id;
					  $_SESSION['type'] = $type;
		
					  ?>
					 
					  <script>window.location.href='admin.php'</script>
					  <?php
					}
					else
					
				if(isset($_POST['name']) && isset($_POST['pass']))
			  {
				  $name = $_POST['name'];
				  $pass = md5($_POST['pass']);
				  $stmt = $db->prepare("select * from admin where name=? and pass=? ");
				  $stmt->bindParam(1,$name);
				  $stmt->bindParam(2, $pass);
					$stmt->execute();

					$row = $stmt->fetch();
					$id   = $row['id'];
				  $user = $row['name'];
					$pass = $row['pass'];
					$type = $row['type'];

				   if($name==$name && $pass==$pass&& $type=='admin1')
				  {
					  session_start();
					  $_SESSION['name'] = $user;
					  $_SESSION['pass'] = $pass;
					  $_SESSION['id'] = $id;
					  $_SESSION['type'] = $type;
		
					  ?>
					 
					  <script>window.location.href='admin1.php'</script>
					  <?php
					}
					else
					
				if(isset($_POST['name']) && isset($_POST['pass']))
			  {
				  $name = $_POST['name'];
				  $pass = md5($_POST['pass']);
				  $stmt = $db->prepare("select * from admin where name=? and pass=? ");
				  $stmt->bindParam(1,$name);
				  $stmt->bindParam(2, $pass);
					$stmt->execute();

					$row = $stmt->fetch();
					$id   = $row['id'];
				  $user = $row['name'];
					$pass = $row['pass'];
					$type = $row['type'];

				   if($name==$name && $pass==$pass&& $type=='admin2')
				  {
					  session_start();
					  $_SESSION['name'] = $user;
					  $_SESSION['pass'] = $pass;
					  $_SESSION['id'] = $id;
					  $_SESSION['type'] = $type;
		
					  ?>
					 
					  <script>window.location.href='admin2.php'</script>
					  <?php
					}

					else
					{?>
						<script>window.location.href='motdepass.php'</script>
						<?php
					}
					
				}}}
				}

			  ?>
	  
                        <form method="post" class="navbar-form navbar-right" >
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="text" class="form-control" name="name" value="" placeholder="Nom d'utilisateur" required="required">                                        
                          </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="pass" value="" placeholder="Mot de passe" required>                                        
                        </div>

                               <button type="submit" class="btn btn-primary" >Connexion</button>
                         </form>
     
	 
	 
	 
    </div>
  </div>
</nav>



<div class="container">
	<!--**************-->
<div class="slider">
     <div id="slider1" class="carousel slide" date-ride="carousel">
         <ol class="carousel-indicators">
       <li data-target="#slider1" data-slide-to="0" class="active"></li>
       <li data-target="#slider1" data-slide-to="1"></li>
       <li data-target="#slider1" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">

                      <div class="item active">  <img src="img/ii2.jpg" alt="image"> 
                           <div class="carousel-caption">
														 <br><br>	 <br><br>	 <br><br>
                            <b style="margin-right:250px; color:#F0FFFF;">Ressource en ligne</b>
                           </div>
                      </div>

                      <div class="item">  <img src="img/ii2.jpg" alt="image"> 
                        <div class="carousel-caption">
												<br><br>	 <br><br>	 <br><br>
                                <b>hi2</b>
                        </div>                    
                     </div>

                      <div class="item">  <img src="img/a1.png" alt="image">
                        <div class="carousel-caption">
												<br><br>	 <br><br>	 <br><br>
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

<!--fin slider-->

 <center> <h1>Services</h1></center>
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
					<h3><a href="index.php?id_menu=136" title="Menus Cantine" target="">Résultat</a></h3>
					<p>Consultez le resultat de votre enfant après chaque semestre</p>
    </div>
    <div class="col-sm-3">
   <img src="http://www.academie-nice.fr/office/ADI/cke_standard/filemanager/userfiles/bibliotheque/icones_raccourcis/Airport.png" title="Le Collège" class="hp-highlight-img" style="width:32px;height:32px;"/>
					<h3><a href="index.php?id_menu=73" title="Le Collège" target="">bibliothèques</a></h3>
					<p>Faire une rapide consultation en ligne des livres de la bibliothèque afin d'éviter l'encombrement des bibliothèques. ...</p>
    </div>
  </div>
</div>


<br>

<div class="video-area py-5 bg-secondary text-white">
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<center> <h1>Videos</h1>		   </center>

		    
		</div>
	</div>
	<div class="row">
	    <div class="col-md-4">
	        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="356" height="200" 
					type="text/html" src="https://www.youtube.com/embed/1gpUEv2ymi4"><div><small><a href="https://youtubeembedcode.com/en">Find Out More</a></small></div><div><small><a href="http://promocode.com.ph/gobuy/">gobuy coupon</a></small></div></iframe>
	    </div>
			
	     <div class="col-md-4">
	        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="356" height="200" type="text/html" src="https://www.youtube.com/embed/Gu0U-Q8faRU"><div><small><a href="https://youtubeembedcode.com/en">Find Out More</a></small></div><div><small><a href="http://promocode.com.ph/gobuy/">gobuy coupon</a></small></div></iframe>
	    </div>
	     <div class="col-md-4">
	        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="356" height="200" type="text/html" src="https://www.youtube.com/embed/VUiUuoaat3s"><div><small><a href="https://youtubeembedcode.com/en">Find Out More</a></small></div><div><small><a href="http://promocode.com.ph/gobuy/">gobuy coupon</a></small></div></iframe>
	    </div>
	</div>
	<br>
	<div class="row pt-4">
	    <div class="col-md-12 text-center">
	        <button type="button"  style="background-color:#48D1CC; text-color:white;" class="btn btn-light">Plus de videos</button>
	    </div>
	</div>
</div>
</div>
<br>
             <footer>
    <div class="footerHeader" ></div>
    <div class="container">
		<div class="col-md-4" >
		    <h3>À propos</h3>
		    <p>
		        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
		    </p>
		</div>
		
		<div class="col-md-4">
		    <h3>Emplacement</h3>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.265638034688!2d9.608379512983461!3d34.59744378584054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12ff16ea3f646a1d%3A0xaa8258475747ad47!2sLyc%C3%A9e+Ibn+Rochd!5e0!3m2!1sfr!2stn!4v1523365802209" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="col-md-4" >
		    <h3>Contact</h3>
		    <ul>
		        <li>Phone : 123 - 456 - 789</li>
		        <li>E-mail : ibnouroched@gmail.com</li>
		        <li>Fax : 123 - 456 - 789</li>
		    </ul>
		  
		    <ul class="sm">
		        <li><a href="#" ><img src="https://www.facebook.com/images/fb_icon_325x325.png" class="img-responsive"></a></li>
		        <li><a href="#" ><img src="https://lh3.googleusercontent.com/00APBMVQh3yraN704gKCeM63KzeQ-zHUi5wK6E9TjRQ26McyqYBt-zy__4i8GXDAfeys=w300" class="img-responsive" ></a></li>
		        <li><a href="#" ><img src="http://playbookathlete.com/wp-content/uploads/2016/10/twitter-logo-4.png" class="img-responsive"  ></a></li>
		    </ul>
		</div>
    </div>
</footer>         
                      

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>