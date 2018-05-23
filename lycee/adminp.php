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
      <li ><a href="admin.php">Gestion admins<span class="sr-only">(current)</span></a></li>
      <li ><a href="adminn.php">Gestion note<span class="sr-only">(current)</span></a></li>
      <li style="background-color:#CEECF5"><a href="adminp.php">Gestion bulletin<span class="sr-only">(current)</span></a></li>
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
<form method="post" enctype="multipart/form-data" action="form1.php" data-toggle="validator" >

    <div class="col-md-2">
    <label >Num élève : </label>
      <input type="text" class="form-control" name="cin" style="width:50%" placeholder="*******" required>
    </div>

  <div class="col-md-2">
    <label for="sem">Semester</label>
    <select class="form-control" style="width:40%" id="mystuff"  name="sem">
    <option value="1" selected>1</option>  
      <option value="2" >2</option>
    </select>
  </div>
  
  <div class="col-md-2  mystaff_hide mystaff_2">
    <label >Moyenne semester N°1 </label>
      <input type="text" class="form-control" name="m2" style="width:50%" placeholder="99.99">
    </div>
    <div class="col-md-2  mystaff_hide mystaff_2">
    <label >spécialté </label>
      <input type="text" class="form-control" name="sp" style="width:50%" placeholder="99.99">
    </div>
    

  <div class="col-md-2">
    <label >Absences : </label>
      <input type="text" class="form-control" name="abs" style="width:50%" placeholder="">
    </div>
    <div class="col-md-2">
    <label >Notes : </label>
      <input type="text" class="form-control" name="not" style="width:50%" placeholder="">
    </div>
   


<!-- <label >Num élève : </label>
  <input type="text" name="cin" style="width:10%" class="form-control"/>
  <label >Sem : </label>
  <input type="text" name="cin" style="width:10%" class="form-control"/> -->

  <input hidden type="number" id="number" name="nb" value="0"/>
  <table class="table table-hovered table-stripped" >
    <thead>
      <td>
      Nom matière
      </td>
      <td>
      coefficient
      </td>
      <td>
      Orale
      </td>
      <td>
      Note dev 1
      </td>
      <td>
      Note dev 2
      </td>
      <td>
      Note synthèse
      </td>
    </thead>
    <tbody id="tbody">
      
    </tbody>

  </table>


<button name="submit" style="margin-left:1100px;" class="btn btn-primary">Enregistrer</button>
</form>
<button class="btn btn-info" onClick="add()"> Nouvelle matière</button>


</div><!--fin container-->
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  <script>
  var i = 1;
    $(function(){
      for(i=1;i<9;i++)
      {  
        $('#tbody').append(getTr(i));    
      } 

    });
    function getTr(i){
      return `<tr>
        <td>
        
        <select class="form-control" style="width:100%"  id="mystuff" name="name-`+i+`" placeholder="nom matiere `+i+`" required>
    <option value="arabe"  selected>arabe</option>
    <option value="français">français</option>
    <option value="anglais">anglais</option>
    <option value="sport">sport</option>
    <option value="programmation">programmation</option>
    <option value="philosophie">philosophie</option>
    <option value="sciences de la vie">sciences de la vie</option>
    <option value="physique">physique</option>

      
    </select>       
     </td>
        <td>
        
 
        <select class="form-control" style="width:80%"  id="mystuff" name="coif-`+i+`" placeholder="coeff" >
    <option value="1" selected>1</option>  
      <option value="1.5" >1.5</option>
      <option value="2" >2</option>
      <option value="3" >3</option>
      <option value="4" >4</option>
    </select>         </td>
        <td>
          <input type="text" class="form-control" name="oral-`+i+`" placeholder="orale"/>
          
        </td>
        <td>
          <input type="text" class="form-control" name="dev1-`+i+`" placeholder="dev1"/>
          
        </td>
        <td>
          <input type="text" class="form-control" name="dev2-`+i+`" placeholder="dev2"/>
        
        </td>
        <td>
        <input type="text" class="form-control" name="exam-`+i+`" placeholder="N_S"/>
        </td>
      </tr> `  ;
      $('#number').val(i);
    }
    function add(){
      $('#tbody').append(getTr(i++));
      $('#number').val(i-1);
    }
	//add collapse to all tags hiden and showed by select mystuff
  $('.mystaff_hide').addClass('collapse');

//on change hide all divs linked to select and show only linked to selected option
$('#mystuff').change(function(){
    //Saves in a variable the wanted div
    var selector = '.mystaff_' + $(this).val();

    //hide all elements
    $('.mystaff_hide').collapse('hide');

    //show only element connected to selected option
    $(selector).collapse('show');
});

  </script>
</html>

<!-- $nb=$_post['nb'];
for($i->nb)
$name=$_post['name-'.$i]; 
-->
