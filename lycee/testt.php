<?php $data = $_POST['data']; echo $data."<br>"; $array = unserialize($data); echo $array[0]." and value is :".$array[1]; ?>