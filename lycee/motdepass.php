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

<html>
<head>
<title></title>

</head>
</body>
<div class="container">
<center>
<img src="https://mobile-cdn.123rf.com/300wm/arcady31/arcady311512/arcady31151200073/49893569-student-icon.jpg?ver=6"  width="150" weight="65"/>
<br>
<td><B style="color:#5a7391;"><font size="5" > Lycée Ibn Rochd  </font></B>
<br><br>
<td><B style="color:#5a7391;"><font size="5" > Meknassy </font></B>
<br><br><br>
</center>
<div class="row">
		<div class="span4 offset4 well">
<!--       
		<legend > <h4 style=" margin-left: 118px; ">Connexion</h4></legend> -->
      
              <div class="alert alert-error" style=" height: 40px;">
                <a class="close"  data-dismiss="alert" href="#">×</a>Identifiant ou mot de passe incorrect!

            </div>
			<form method="post" class="navbar-form navbar-right" >
			<input type="text" style=" height: 40px;" id="username" class="span4" name="name" required placeholder="Nom d'utilisateur
">
			<input type="password" style=" height: 40px;" id="password" class="span4" name="pass" required placeholder="
Mot de passe">
           
           <br>
		   
<button type="submit" style=" height: 30px;" name="submit" class="btn btn-info btn-block">Connexion
</button>
			</form>    
		</div>
	</div>

</div>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>


</html>