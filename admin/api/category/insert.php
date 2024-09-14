<?php

require '../../includes/init.php';

$category=$_POST['category'];

$query="INSERT INTO `category`(`CategoryName`) VALUES('$category')";

$result=mysqli_query($conn,$query);

if($result){
    echo "<script>
        alert('category successfully added');
        window.location.href='".urlOf('pages/category/categoryList')."';
    </script>";
}else{
    echo "<script>
    alert('Failed to add category');
    window.location.href='".urlOf('pages/category/addCategory')."';
</script>";
}


?>