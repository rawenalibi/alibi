<?php
$db = new pdo('mysql:host=localhost;dbname=lycee','root','0000');
$page = isset($_GET['p'])?$_GET['p']:'';
 if ($page=='sup')
 {
  $id = $_GET['id'];
  $stmt = $db->prepare("delete from login where id=?");
    $stmt->bindParam(1,$id);
  if($stmt->execute()){
    echo "suce supp date";
    
  }
  else
  {echo "fail supp";
}

 }


 else if($page=='modifier'){
  $id = $_POST['id'];
  $name = $_POST['na'];
  $adr = $_POST['ad'];
  $numtel = $_POST['nu'];
  $niveau = $_POST['ni'];
  $section = $_POST['se'];
  $annee = $_POST['an'];

$stmt = $db->prepare("update login set username=?, adr=?, numtel=? , niveau=?,section=?,annee=? where id=?");

  $stmt->bindParam(1,$name);
  $stmt->bindParam(2,$adr);
  $stmt->bindParam(3,$numtel);
  $stmt->bindParam(4,$niveau);
  $stmt->bindParam(5,$section);
  $stmt->bindParam(6,$annee);
  $stmt->bindParam(7,$id);
  if($stmt->execute()){
    echo "suce modifer date";
  }else
  {echo "fail modifier";
}



}


                
              else{
                  
                $stmt = $db->prepare("select  * from login");
                $stmt->execute();
                while($row = $stmt->fetch()){
                    if($row['type']=='Member'){
                    ?>
                     
                    
                    <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['username'] ?></td>
               <td><?php echo $row['type'] ?></td>
               <td><?php echo $row['adr'] ?></td>
               <td><?php echo $row['numtel'] ?></td>
               <td><?php echo $row['niveau'] ?></td>
               <td><?php echo $row['section'] ?></td>
               <td><?php echo $row['annee'] ?></td>
               
               <td><?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'"  width="50" height="50"/>' ?></td>
               
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
  <label for="na">name</label>
    <input type="text" class="form-control" id="na-<?php echo $row['id'] ?>" value="<?php echo $row['username'] ?>">
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
              <button  onclick="supprimerdata(<?php echo $row['id'] ?>)" class="btn btn-danger">Supprimer</button>
              </td>
              </tr>
              <?php
            }
        }
    }
?>
