<?php

require '../../includes/init.php';

$id = $_GET['deleteId'];

// Step 1: Fetch the image paths from the database
$query = "SELECT Image FROM product WHERE Id='$id'"; // Replace 'Image' with the actual name of the image column
$result = mysqli_query($conn, $query);

if ($result) {
    $product = mysqli_fetch_assoc($result);
    $imageName = $product['Image']; // Get the image name from the database

    // Step 2: Construct the full paths for both images
    $withoutWatermarkPath = "../../assets/images/product_image/" . $imageName; // Path without watermark
    $withWatermarkPath = "../../assets/images/product/" . $imageName; // Path with watermark

    // Step 3: Delete the product from the database
    $deleteQuery = "DELETE FROM product WHERE Id='$id'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Step 4: Delete the image files from both folders
        if (file_exists($withoutWatermarkPath)) {
            unlink($withoutWatermarkPath); // Delete the image file without watermark
        }
        
        if (file_exists($withWatermarkPath)) {
            unlink($withWatermarkPath); // Delete the image file with watermark
        }

        echo "<script>
            alert('Product deleted successfully');
            window.location.href='" . urlOf('pages/product/productList') . "';
        </script>";
    } else {
        echo "<script>
            alert('Something went wrong while deleting the product.');
            window.location.href='" . urlOf('pages/product/productList') . "';
        </script>";
    }
} else {
    echo "<script>
        alert('Something went wrong while fetching the product.');
        window.location.href='" . urlOf('pages/product/productList') . "';
    </script>";
}

?>
