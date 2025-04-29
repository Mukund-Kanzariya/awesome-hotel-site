<?php

require '../../includes/init.php';

$name=$_POST['name'];
$Email=$_POST['email'];
$rating=$_POST['rating'];
$review=$_POST['review'];

$query="INSERT INTO `reviews`(Name,Email,Rating,Review) VALUES(?,?,?,?)";

$param=[$name,$Email,$rating,$review];

execute($query,$param);

?>