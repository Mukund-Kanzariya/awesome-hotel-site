<?php

require '../../includes/init.php';

$id=$_POST['id'];
$roomTypeId=$_POST['roomTypeId'];
$roomNo=$_POST['roomNo'];
$description=$_POST['description'];
$acnonac=$_POST['acnonac'];
$capacity=$_POST['capacity'];

$query="UPDATE `rooms` SET RoomTypeId=?, RoomNumber=?, Description=?, AcNonAc=?, Capacity=? WHERE Id=?";
$param=[$roomTypeId,$roomNo,$description,$acnonac,$capacity,$id];

execute($query,$param);

?>