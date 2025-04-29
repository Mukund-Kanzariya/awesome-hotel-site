<?php

require '../../includes/init.php';

$name=$_POST['name'];

// $query="INSERT INTO `roles`(name) VALUES(?)";
// $param=[$name];

// execute($query,$param);

$sql="INSERT INTO `roles`(name) VALUES(:name)";

$smtp=$conn->prepare($sql);

$smtp->bindparam(':name',$name);

$smtp->execute();

?>


