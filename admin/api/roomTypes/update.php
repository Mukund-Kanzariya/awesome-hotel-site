<?php

require '../../includes/init.php';

$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];

$query="UPDATE `roomTypes` SET Name=?, Price=? WHERE Id=?";
$param=[$name,$price,$id];

execute($query,$param);

?>