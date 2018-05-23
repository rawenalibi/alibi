<?php
include("config.php");
if(isset($_POST['btn']))
{
    $doc_name = $_POST['doc_name'];
    $name = $_FILES['myfile']['name'];
$tmp_name = $_FILES['myfile']['tmp_name'];
    if($name)
    {
        
        $Location = "documents/$name";
        move_uploaded_file($tmp_name, $Location);
        $stmt = $db->prepare("insert into documents values ('',?,?) ");
        $stmt->bindParam(1,$doc_name);
        $stmt->bindParam(2,$Location);
        $stmt->execute();
        header('Location:admin2-emp.php');
    
    }
    else die("please");
}





?>
<html>
<head>
</head>
<body>
<form method="post" enctype="multipart/form-data"  data-toggle="validator" >
<label>doculnt name</label>
<input type="text" name="doc_name">
<input type="file" name="myfile">
<button name="btn" class="btn btn-primary">Enregistrer</button>
</form>
</body>
</html>