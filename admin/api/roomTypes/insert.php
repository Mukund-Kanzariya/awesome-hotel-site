<?php

require '../../includes/init.php';

$name=$_POST['name'];
$Acprice=$_POST['acprice'];
$NonAcprice=$_POST['nonacprice'];

$query="INSERT INTO `roomtypes`(Name,Price_AC,Price_NonAC) VALUES(?, ?, ?)";

$param=[$name,$Acprice,$NonAcprice];

execute($query,$param);

?>