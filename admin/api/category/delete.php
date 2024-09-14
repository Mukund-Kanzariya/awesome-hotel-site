<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM category WHERE Id='$id'";

$result = mysqli_query($conn, $query);

if($result){
    echo "<script>
        alert('Category deleted successfully');
        window.location.href='".urlOf('pages/category/categoryList')."';
    </script>";
}else{
    echo "<script>
        alert('Failed to delete Category');
        window.location.href='".urlOf('pages/category/categoryList')."';
    </script>";
}



?>