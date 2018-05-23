
	<?php
	include "config.php";
	session_start();
				$a=$_SESSION['id'];
				$stmt = $db->prepare("select * from eleve where id= '$a'");
               $stmt->execute();
               $row = $stmt->fetch();
 ?>      





<html>
    <head><title>actualiteé</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<style>
/***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/



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
.modal-dialogg{
  width:1150px;
  
  margin-left:120px;
}

    </style>
</head>
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
            <label for="destinataire">Date</label>
            <input  type="date" class="form-control" id="d" placeholder="jj/mm/aaaa" >
          </div>
          <br />

          <!-- input Sujet -->
          <div class="control-group">
            <label for="destinataire">Sujet</label>
            <input  type="text" class="form-control" id="s" placeholder="Titre du sujet">
          </div>
          <br />

          <!-- TextArea Message -->
          <div class="control-group">
            <label for="destinataire">Message</label>
            <textarea   id="m" class="form-control" rows="5" placeholder="Description"></textarea>
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
    <input type="text" class="form-control" id="pa-<?php echo $row['id'] ?>" value="<?php echo $row['pass'] ?>">
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
						<li>
							<a href="elevep-emp.php" >
							<i class="glyphicon glyphicon-calendar"></i>
							Emplois</a>
             
						</li>
   
						<li>
						<a href="elevep-bib.php">
							<i class="glyphicon glyphicon-ok"></i>
							Bibliothèque</a>
						</li>
            <li>
						<a href="elevep-res.php">
							<i class="glyphicon glyphicon-tags"></i>
							résultats</a>
						</li>
            <li>
						<a href="elevep-abs.php">
							<i class="glyphicon glyphicon-flag"></i>
              absences-retard</a>
						</li>
            <li>
            <a href="elevep-msg.php">
							<i class="glyphicon glyphicon-envelope"></i>
							Message</a>
						</li>

             <li>
            <a href="elevep-note.php">
							<i class="glyphicon glyphicon-pencil"></i>
							Note</a>
						</li>
          <li class="active">
            <a href="elevep-chat.php">
							<i class="glyphicon glyphicon-comment"></i>
							chat</a>
						</li>
            <li >
            <a href="elevep-fichier.php">
							<i class="glyphicon glyphicon-folder-open"></i>
							fichier</a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9 " >
                 <div class="profile-content vl" id="div1">
                    <!--dispaly messages -->
                    <div id="chat-box">
                    </div>
  
                    <!--dispaly messages -->                    

                   <!-- <form method="post" enctype="multipart/form-data" action="form.php?var1=<?php  echo $no; ?> & var2=<?php  echo $ne; ?> & var3=<?php  echo $sec; ?> " data-toggle="validator" > -->

                   <!--send message-->
                    <div id="env" style="width:80%;display:flex;justify-content:space-between;align-items:center;position:absolute;bottom:0px;margin:20px;">
                        <input type="text" id="msg" name="msg" class="form-control" placeholder="message"/>
                        <input type="button" id="env" name="env" class="btn btn-default" value="envoyer"/>
                    </div>

										<script>
											$(function(){
												$('#env').click(function(){
													console.log('start');
													$.ajax({
													url:'/lycee/sendmsg.php?msg='+$('#msg').val(),
													type:'get',
													success:function(data){
														console.log("success -- "+data);

													},
													error:function(error){
														console.log("error--"+error)
													},
													complete:function(s){
															console.log(s);
													}
												})
												}))
											})
										</script>
                   <!--send message-->
                    

                                
        </div><!--fin container 2-->
    </div><!--fin col md 9-->


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

     
    </div>
  </div>
</div>
</div><!--fin container-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>


   $(function(){
     $('#chat-box').load('/lycee/chat.php')
   setInterval(function(){
     $('#chat-box').load('/lycee/chat.php') 
      console.log('--');
    },3000)
   })





    function modifierdata (str)
	 {  
   

	 var id= str;
var name = $('#na-'+str).val();
var pass = $('#pa-'+str).val();
var adr = $('#ad-'+str).val();
var numtel = $('#nu-'+str).val();
var annee = $('#an-'+str).val();

	 $.ajax({type: "POST",
		url:"s1.php?p=modifier-p",
		data: "na="+name+"&pa="+pass+"&ad="+adr+"&nu="+numtel+"&an="+annee+"&id="+id,
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
</body>
</html>