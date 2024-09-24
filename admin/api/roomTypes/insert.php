<?php

require '../../includes/init.php';

$name=$_POST['name'];
$price=$_POST['price'];

$query="INSERT INTO `roomTypes`(Name,Price) VALUES(?, ?)";

$param=[$name,$price];

execute($query,$param);

?>