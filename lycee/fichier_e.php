<html>
<head><title>lycee Ibnou Roched</title>


<link rel="stylesheet" type="text/css" href="style.css"/>

<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  




<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<!------ Include the above in your HEAD tag ---------->
<style>
	
	

b{font-size: 40px;border-bottom-style: ridge;font-weight: bold;border-bottom-color: #82c434;}
.slider .carousel-inner .item>img{height:250px;width: 1200px;}
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
  .notice:first-child{
    margin-top:10px;
    }
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}
.notice>.desc{
    display:none;
    }
.readMore{
    cursor:pointer;
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
	  
        <li ><a href="index.php"><font size="4" color="MintCream ">Page d'accueil </font><span class="sr-only">(current)</span></a></li>
				<li  style="background-color:#20B2AA" ><a href="fichier_e.php"><font size="4" color="MintCream ">Plus</font><span class="sr-only">(current)</span></a></li>

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
<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" id="stars" class="btn btn-default " href="#tab11" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <div class="hidden-xs">Fiche d'inscription</div>
                                </button>
                            </div>
       
                            <div class="btn-group" role="group">
                                <button type="button" id="following" class="btn btn-default " href="#tab12" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <div class="hidden-xs">Fiche d'orientation</div>
                                </button>
                            </div>

                           <div class="btn-group" role="group">
                                <button type="button" id="following" class="btn btn-default" href="#tab13" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <div class="hidden-xs">Autres fichiers</div>
                                </button>
                            </div>

                     </div>

                     <div class="tab-content">

          <div class="tab-pane fade in active" id="tab11">
          <?php
          $stmt1 = $db->prepare("select * from fichiers where type='fi'");
$stmt1->execute();       
while($row1 = $stmt1->fetch() )
{
?>
          <div class="notice notice-success">
        <strong><?php echo $row1['nom_f'] ?> </strong> <a  href="downloadf.php?dow=<?php echo $row1['path'] ?>" >Télécharger  <p class="glyphicon glyphicon-download-alt"></p></a> <span class="pull-right text-success readMore"><a   href="<?php echo $row1['path'] ?>"  > Voir   <span class="glyphicon glyphicon-zoom-in"> </a></span>
        </div>
  <?php

}
  ?>     
   

          </div>
          <div class="tab-pane fade in " id="tab12">
          hh            
          </div>
          <div class="tab-pane fade in " id="tab13">
          h           
          </div>
</div>

</div>

 
                      

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</body>
</html>