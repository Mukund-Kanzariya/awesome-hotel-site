<?php

// session_start();

// if(!isset($_SESSION['userId'])){
//     header("Location:../authentication/login.php");
// }

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$id=$_GET['updateId'];

$query = "SELECT 
    product.Id,
    product.Name,
    product.Description,
    product.Price,
    product.Image,
    category.CategoryName as CategoryId
FROM product
INNER JOIN category ON product.CategoryId = category.Id WHERE product.Id='$id'";

$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

$query1="SELECT * FROM category";
$result1=mysqli_query($conn,$query1);

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                            <li class="breadcrumb-item" aria-current="page"> Update Product</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Update Product</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <form action="../../api/product/update" method="post" enctype="multipart/form-data">

            <div class="row">
                <!-- [ sample-page ] start -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Product description</h5>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?= $row['Id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Product Name" value="<?= $row['Name'] ?>"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category">
                                    <option disable selected><?= $row['CategoryId'] ?></option>
                                    <?php
                                while($row1=mysqli_fetch_assoc($result1)) {?>
                                    <option value="<?= $row1['Id'];?>"><?= $row1['CategoryName'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" placeholder="Enter Product Description"
                                    name="description" value="<?= $row['Description'] ?>"></textarea>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-xl-6">

                    <div class="card">
                        <div class="card-header">
                            <h5>Pricing</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label d-flex align-items-center">Price <i
                                                class="ph-duotone ph-info ms-1" data-bs-toggle="tooltip"
                                                data-bs-title="Price"></i></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" placeholder="Price" name="price" value="<?= $row['Price'] ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Product image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <!-- <p><span class="text-danger">*</span> Recommended resolution is 640*640 with file size -->
                                <!-- </p> -->
                                <!-- <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i> -->
                                <!-- Click to Upload</label> -->
                                <input type="hidden" class="form-control" name="oldimage" value="<?= $row["Image"]; ?>">
                                <img src="<?= "../../assets/images/product/" . $row["Image"]; ?>" width="150px">
                                <input type="file" class="form-control mb-3" name="product_image">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn btn-primary mb-0" name="submit" value="submit">Update product</button>
                        </div>
                    </div>
                </div>


                <!-- [ sample-page ] end -->
            </div>
        </form>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php

include pathOf("includes/footer.php");
include pathOf("includes/script.php");
include pathOf("includes/pageEnd.php");

?>