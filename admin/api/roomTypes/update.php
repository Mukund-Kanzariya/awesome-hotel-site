<?php

require '../../includes/init.php';

$id=$_POST['id'];
$name=$_POST['name'];
$acprice=$_POST['acprice'];
$nonacprice=$_POST['nonacprice'];

$query="UPDATE `roomTypes` SET Name=?, Price_AC=?, Price_NonAC=? WHERE Id=?";
$param=[$name,$acprice,$nonacprice,$id];

execute($query,$param);

?>