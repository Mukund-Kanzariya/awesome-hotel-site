<?php

require '../../includes/init.php';

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$msmessageg=$_POST['message'];

$query="INSERT INTO `contact`(Name,Mobile,Email,Message) VALUES(?,?,?,?)";

$param=[$name,$mobile,$email,$msmessageg];

execute($query,$param);

?>