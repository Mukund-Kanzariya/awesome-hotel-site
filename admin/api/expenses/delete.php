<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM `expenses` WHERE Id = ?";

$param=[$id];

execute($query,$param);

header("location:../../pages/expenses/expenseList");

?>