<?php

require '../../includes/init.php';

$name=$_POST['name'];
$amount=$_POST['amount'];

$query="INSERT INTO `expenses`(Name,Amount) VALUES(?,?)";

$param=[$name,$amount];

execute($query,$param);

?>