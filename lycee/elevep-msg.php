<?php
include "config.php";
session_start();

if(!isset($_SESSION['name']))
{
	header('location: index.php');
}

?>

	<?php
				$a=$_SESSION['id'];
				$stmt = $db->prepare("select * from eleve where id= '$a'");
               $stmt->execute();
               $row = $stmt->fetch();
 ?>      





<html>
    <head><title> Résultat </title>

</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<style>
/***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/
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
body {
  background: #fff;

}

/* Profile container */
.profile {
  margin: 0px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 30px 0 10px 0;
  background: #F1F3FA;
  
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 60%;
  height: 25%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 80% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 50px;
  background: #F1F3FA;
  min-height: 460px;
}

#imaginary_container{
    margin-top:0%;
    width:400px;
}
.stylish-input-group .input-group-addon{
    background: white !important; 
}
.stylish-input-group .form-control{
    border-right:0; 
	box-shadow:0 0 0; 
	border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}
.vl {
    border-left: 3px solid green;
width:850px;

}
    </style>

<body>



<div class="container">
    <table width="100%" > 
        <tr>
            <td align="right">
            <a href="elevep.php"><img src="https://mobile-cdn.123rf.com/300wm/arcady31/arcady311512/arcady31151200073/49893569-student-icon.jpg?ver=6"  width="100" weight="50"/></a>
</td>

<td><B style="color:#5a7391;"><font size="5" > Lycee Ibnou roched </font></B>
<B  style="color:#5a7391;"><font size="5" >maknssy</font></B>
</td>
<td > 
<div class="col-sm-9 col-sm-offset">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group input-append">
                    <input type="text" class="form-control"  placeholder="Chercher" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </div>
        </td>
        
<td align="left"> <a href=""  data-toggle="modal" data-target="#ModalMessage" >Contact <span class="
glyphicon glyphicon-link"></span></a></td>
<td align="center" > <a href="logout.php" >déconnexion <span class="glyphicon glyphicon-log-out"></span></a></td>

<!-- Modal -->
<div class="modal fade" id="ModalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  
        <div class="modal-content">
        <div class="modal-header btn-primary">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="text-center"  id="myModalLabel">Message</h4>
        </div>
        <div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
        message envoyé avec succès
</div>

        <form  id="FormMessage" method="post" enctype="multipart/form-data"  data-toggle="validator" >

        <div class="modal-body">

          <br />

          <!-- input Sujet -->
          <div class="control-group">
            <label for="destinataire">date</label>
            <input  type="text" class="form-control" id="d" placeholder="jj/mm/aaaa" >
          </div>
          <br />

          <!-- input Sujet -->
          <div class="control-group">
            <label for="destinataire">Sujet</label>
            <input  type="text" class="form-control" id="s" placeholder="titre du sujet">
          </div>
          <br />

          <!-- TextArea Message -->
          <div class="control-group">
            <label for="destinataire">Message</label>
            <textarea id="FormMessageMessage"  id="m" class="form-control" rows="5" placeholder="description"></textarea>
          </div>
          <br />
        </div>

        <div class="modal-footer">
          <div class="text-center">

                      <button type="button"   onclick="insertdata(<?php echo $row['id'] ?>)"  class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-send"></span> Envoyer</button>
            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Fermer</button>
          </div>
        </div>
        </form>
      </div>
  </div>
</div>
<!--fin modal-->

</tr>
</table>
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
                <?php echo '<img  class="img-responsive" alt="" src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"    />' ?>

				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
                    <?php echo $row['name'] ?>
					</div>
					<div class="profile-usertitle-job">
                    <?php echo $row['section'] ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">

					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">voir profile</button>
  <!-- Modal -->

  <div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier Profile</h4>
    </div>
    <form>
    <div class="modal-body">
  
        <input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
<div class="form-group">
  <label for="na">name</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['name'] ?>">
</div>
<div class="form-group">
  <label for="na">mots de passe</label>
    <input type="text" class="form-control" id="mo-<?php echo $row['id'] ?>" value="<?php echo $row['pass'] ?>">
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
  <label for="nu">Anneé </label>
  <input type="text" class="form-control" id="an-<?php echo $row['id'] ?>" value="<?php echo $row['annee'] ?>">
</div>

<div class="form-group">
  <label class="control-label" for="disabledInput">Section</label>
  <input class="form-control" id="disabledInput"  value="<?php echo $row['section'] ?>" disabled="" type="text">
</div>

<div class="form-group">
  <label class="control-label" for="disabledInput">Niveau</label>
  <input class="form-control" id="disabledInput"  value="<?php echo $row['niveau'] ?>" disabled="" type="text">
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




				</div><!--fin userbutton-->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li >
							<a href="elevep.php">
							<i class="glyphicon glyphicon-home"></i>
							Actualités </a>
						</li>
						<li>
							<a href="elevep-prof.php">
							<i class="glyphicon glyphicon-user"></i>
              Enseignant </a>
						</li>
						<li >
							<a href="elevep-emp.php" >
							<i class="glyphicon glyphicon-calendar"></i>
							Emplois</a>
             
						</li>
   
						<li>
							<a href="elevep-bib.php">
							<i class="glyphicon glyphicon-ok"></i>
							Bibliothèque</a>
						</li>
            <li  >
							<a href="elevep-res.php">
							<i class="glyphicon glyphicon-tags"></i>
							résultats</a>
						</li>
            <li>
            <a href="elevep-abs.php">
							<i class="glyphicon glyphicon-flag"></i>
              absences-retard</a>
						</li>
            <li class="active">
							<a href="elevep-msg.php">
							<i class="glyphicon glyphicon-envelope"></i>
							Message</a>
						</li>

                        <li>
            <a href="elevep-note.php">
							<i class="glyphicon glyphicon-pencil"></i>
							Note</a>
						</li>
            
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9 ">
                 <div class="profile-content vl">
                 <img src="img/2.jpg" class="img-rounded" alt="Cinque Terre" width="680" height="150" style="margin-left:30px;"> 
                                    <div class="page-header ">
                                    <h3 style="color:#20B2AA" ><small class="pull-right"></small><span class="glyphicon glyphicon-envelope"></span> Messages </h3>
                                    </div> 

<?php
$s=$row['id'];
$stmt = $db->prepare("select * from notes where id=$s");
$stmt->execute();
while($row = $stmt->fetch()){
    ?>
 <div class="notice notice-info">
        <strong><?php echo $row['titre'] ?></strong>   <span class="pull-right text-info readMore"><?php echo$row['date'] ?></span>
       
        
           <p> <br /><?php echo $row['contenu'] ?>  </p>
   

    </div>
   <?php
}
?>

        


                 </div><!--fin container 2-->
		</div><!--fin col md 9-->
	</div><!--row profilr-->

 <div class="row">
  <hr>
    <div class="col-lg-12">
      <div class="col-md-4">
				<a href="#">Page Facebook</a> | <a href="#">Youtube</a> 
				</div>
      <div class="col-md-8">
        <p class="muted pull-right">© 2018 Lyceé Ibnou Roched. Tous les droits sont réservés
</p>
      </div>
    </div>
	</div>
</div><!--fin container-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
    function modifierdata (str)
	 {  
   

	 var id= str;
var name = $('#na-'+str).val();
var pass = $('#mo-'+str).val();
var adr = $('#ad-'+str).val();
var numtel = $('#nu-'+str).val();
var annee = $('#an-'+str).val();

	 $.ajax({type: "POST",
		url:"s1.php?p=modifier",
		data: "na="+name+"&mo="+pass+"&ad="+adr+"&nu="+numtel+"&an="+annee+"&id="+id,
		success: function(data){
      window.location.reload(true);
		}

	 });
}
function insertdata(str )
	 {  
     $('#passwordsNoMatch').show();


	 var date = $('#d').val();
	 var sujet = $('#s').val();
	 var des = $('#m').val();
var id =str;
 
	 $.ajax({type: "POST",
		url:"server.php?p=msginsert",
		data: "&d="+date+"&s="+sujet+"&m="+des+"&id="+id,
		success: function(data){
		}
	 });
       setTimeout(function(){  
    window.location.reload(1);},2000);
    
}


    </script>

    <script>
$(document).ready( function () {

  var elements1 = $('#table1>tbody>tr');
  $('#search1').on('input',function(){
    var search = $('#search1').val(); 
    $('#table1>tbody').html('');
    for(var i = 0;i<elements1.length;i++)
      if(elements1[i].innerHTML.indexOf(search)>=0)
        $('#table1>tbody').append(elements1[i]); 
  })
    
} );
</script>

</body>
</head>