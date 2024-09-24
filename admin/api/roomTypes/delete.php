<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM `roomTypes` WHERE `id` = ?";
$param=[$id];

execute($query,$param);

header("Location:../../pages/roomTypes/roomList");

?>