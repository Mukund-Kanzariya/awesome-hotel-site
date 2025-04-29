<?php

require '../../includes/init.php';

$roomTypeId=$_POST['roomTypeId'];
$roomNo=$_POST['roomNo'];
$description=$_POST['description'];
$acnonac=$_POST['acnonac'];
$capacity=$_POST['capacity'];

$isAvailable=true;

$query="INSERT INTO `rooms`(RoomTypeId,RoomNumber,Description, AcNonAc, Capacity,IsAvailable) VALUES(?,?,?,?,?,?)";
$param=[$roomTypeId,$roomNo,$description,$acnonac,$capacity,$isAvailable];

execute($query,$param);

?>