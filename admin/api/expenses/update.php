<?php

require '../../includes/init.php';

$id=$_POST['id'];
$name=$_POST['name'];
$amount=$_POST['amount'];

$query="UPDATE `expenses` SET Name=?, Amount=? WHERE Id=? ";
$param=[$name,$amount,$id];

execute($query,$param);

?>