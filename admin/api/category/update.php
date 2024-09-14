<?php

require '../../includes/init.php';

$id=$_POST['id'];
$category=$_POST['category'];

$query="UPDATE `category` SET CategoryName='$category' WHERE Id='$id'";

$result=mysqli_query($conn,$query);

if ($result){
    echo "<script>
        alert('Category updated successfully');
        window.location.href='".urlOf('pages/category/categoryList')."';
    </script>";
}else{
    echo "<script>
    alert('Category not Updated');
    window.location.href='".urlOf('pages/category/categoryList')."';
    </script>";
}

?>