<html>
<head>
<style>
.msg{
  display:inline-block;
  padding:10px;
  background:white;
  margin:10px ;
  box-shadow: 0 5px 40px -10px #eee;
}

.msg-left{
  border-radius:0 10px 10px 10px;
}

.msg-right{
  border-radius:10px 10px 0px 10px;
}
</style>
</head>
<body>
</body>
</html>
<?php

include "config.php";
session_start();

$a=$_SESSION['name'];
$stmt = $db->prepare("select * from chat where niveau_section = '".$_SESSION["niveau"]."_".$_SESSION["section"]."'");

                $stmt->execute();
                while($row = $stmt->fetch()){
if($row["created_by"]==$_SESSION["id"])
echo "<div style='display:flex;justify-content:flex-end;' title='".$row["created_at"]."'><div class='msg msg-right'>".$row["content"]."</div></div>";
else
echo "<div  style='display:flex;justify-content:flex-start;' title='".$row["created_at"]."'><div class='msg msg-left'>".$row["content"]."</div></div>";

}
?>
