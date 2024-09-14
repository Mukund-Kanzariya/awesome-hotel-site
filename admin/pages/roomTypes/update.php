<?php

// session_start();

// if(!isset($_SESSION['userId'])){
//     header("Location:../authentication/login.php");
// }


require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$id=$_GET['updateId'];

$query = "SELECT * FROM category WHERE Id = $id";

$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);//aa ek j row return karse 


?>


<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Category</a></li>
                            <li class="breadcrumb-item" aria-current="page">Update Category</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Update Category</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-xl-6">
                <form action="../../api/category/update.php" method="post">

                    <div class="card">
                        <div class="card-header">
                            <h5>Category Details</h5>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?= $row['Id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category" value="<?= $row['CategoryName'] ?>" autofocus/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn btn-primary mb-0">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php

include pathOf("includes/footer.php");
include pathOf("includes/script.php");
include pathOf("includes/pageEnd.php");

?>