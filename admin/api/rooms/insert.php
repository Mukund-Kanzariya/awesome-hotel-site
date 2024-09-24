<?php

require '../../includes/init.php';

$roomTypeId=$_POST['roomTypeId'];
$roomNo=$_POST['roomNo'];
$description=$_POST['description'];
$capacity=$_POST['capacity'];

$isAvailable=true;

$query="INSERT INTO `rooms`(RoomTypeId,RoomNumber,Description,Capacity,IsAvailable) VALUES(?,?,?,?,?)";
$param=[$roomTypeId,$roomNo,$description,$capacity,$isAvailable];

execute($query,$param);

?>