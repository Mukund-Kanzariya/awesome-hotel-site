<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM `roles` WHERE `Id`=?";
$param=[$id];

execute($query,$param);

header("location:../../pages/role/roleList");

?>
