<?php

require '../../includes/init.php';

$id=$_POST['id'];
$roomTypeId=$_POST['roomTypeId'];
$roomNo=$_POST['roomNo'];
$description=$_POST['description'];
$capacity=$_POST['capacity'];

$query="UPDATE `rooms` SET RoomTypeId=?, RoomNumber=?, Description=?, Capacity=? WHERE Id=?";
$param=[$roomTypeId,$roomNo,$description,$capacity,$id];

execute($query,$param);

?>