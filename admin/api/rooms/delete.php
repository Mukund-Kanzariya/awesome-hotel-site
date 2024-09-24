<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM `rooms` WHERE `Id` = ?";
$param=[$id];

execute($query,$param);

header("Location:../../pages/rooms/roomList");

?>