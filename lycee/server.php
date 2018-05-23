<?php
$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
$page = isset($_GET['p'])?$_GET['p']:'';

if($page=='at')
{
	$id= $_POST['id'];

	$stmt = $db->prepare("select count(*) from attestation WHERE num_e = ? ");
  $stmt->bindParam(1,$id);
  $stmt->execute();
  $number_of_rows = $stmt->fetchColumn(); 
  if($number_of_rows==0)
{
	$date = date_create();
	$date = date_format($date, 'Y-m-d H:i:s');
$id= $_POST['id'];
$d="enatnte";
 $stmt = $db->prepare("insert into attestation values ('',?,?,?) ");
					$stmt->bindParam(1,$date);
					$stmt->bindParam(2,$d);
					$stmt->bindParam(3,$id);
					$stmt->execute();
}

}


if($page=='msginsert')
{
$titre = $_POST['d'];
$description= $_POST['s'];
$date = $_POST['m'];
$datee = $_POST['id'];
 $stmt = $db->prepare("insert into message values ('',?,?,?,?) ");
 
				  $stmt->bindParam(1,$titre);
				  $stmt->bindParam(2,$description);
					$stmt->bindParam(3,$date);
					$stmt->bindParam(4,$datee);
				  if($stmt->execute()){
			echo "hhh";
					}
					else
					{echo "fail";  }
					
}




if($page=='add')
{
$titre = $_POST['tt'];
$description= $_POST['dd'];
$date = $_POST['da'];
 $stmt = $db->prepare("insert into actualite values ('',?,?,?) ");
 
				  $stmt->bindParam(1,$titre);
				  $stmt->bindParam(2,$description);
				  $stmt->bindParam(3,$date);
				  if($stmt->execute()){
			echo "hhh";
					}
					else
					{echo "fail";  }
					
}


			  else if($page=='modifier'){
				  $id = $_POST['id'];
$titre = $_POST['tt'];
$description= $_POST['dd'];
$date = $_POST['da'];
 $stmt = $db->prepare("update actualite set titre=?, description=?, date=? where id=?");
 
				  $stmt->bindParam(1,$titre);
				  $stmt->bindParam(2,$description);
				  $stmt->bindParam(3,$date);
				   $stmt->bindParam(4,$id);
				  if($stmt->execute()){
					  echo "suce modifer date";
				  }else
				  {echo "fail modifier";
			  }
			  
			  
			  
			  }
			  
			  
			  
			  
			  else if ($page=='sup'){
				  $id = $_GET['id'];
				  $stmt = $db->prepare("delete from actualite where id=?");
				    $stmt->bindParam(1,$id);
				  if($stmt->execute()){
						echo "suce supp date";
						
				  }
				  else
				  {echo "fail supp";
				}
				
			  }
			  else{
				  $stmt = $db->prepare("select * from actualite");
				  $stmt->execute();
				  while($row = $stmt->fetch()){
					  ?>
					  <tr>
						<td><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  width="50" height="50"/>' ?></td>
			    <td><?php echo $row['titre'] ?></td>
			    <td><?php echo $row['description'] ?></td>
				 <td><?php echo $row['date'] ?></td>
			    <td>
				<button class="btn btn-warning" data-toggle="modal" data-target="#modifier-<?php echo $row['id'] ?>">Modifier</button>
				<!-- Modal -->
<div class="modal fade" id="modifier-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modifierLabel-<?php echo $row['id'] ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modifierLabel-<?php echo $row['id'] ?>">Modifier Actualiteé</h4>
      </div>
	  <form>
      <div class="modal-body">

			<div class="alert alert-success" id="passwordsNoMatch" role="alert" style="display:none;" >
Actualieé modifier avec suceé
</div>

      	<input type="hidden"  id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" >
  <div class="form-group">
    <label for="tt">Title</label>
      <input type="text" class="form-control" id="tt-<?php echo $row['id'] ?>" value="<?php echo $row['titre'] ?>">
  </div>
  
  <div class="form-group">
    <label for="dd">Description</label>
    <input type="text" class="form-control" id="dd-<?php echo $row['id'] ?>" value="<?php echo $row['description'] ?>">
  </div>
  
   <div class="form-group">
    <label for="da">Date</label>
    <input type="text" class="form-control" id="da-<?php echo $row['id'] ?>" value="<?php echo $row['date'] ?>">
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
				<button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
				</td>
				</tr>
				<?php
			  }
			  


			  }

				
?>
