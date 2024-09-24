<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$id=$_GET['updateId'];

$query="SELECT * FROM `roles` WHERE Id=?";
$param=[$id];

$row=selectOne($query,$param);

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Role</a></li>
                            <li class="breadcrumb-item" aria-current="page">Update Role</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Update Role</h2>
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
                <form onsubmit="return false;">
                    <div class="card">
                        <div class="card-header">
                            <h5>Role Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="hidden" id="id" value="<?= $row['Id'] ?>">
                                <label class="form-label">Role Name</label>
                                <input type="text" class="form-control" placeholder="Enter Role Name" id="name"
                                    value="<?= $row['Name'] ?>" autofocus />
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn custom mb-0" onclick="sendData()">Update Role</button>
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
?>



<script>

function sendData() {
    $.ajax({
        url: '../../api/role/update',
        method: 'POST',
        data: {
            id: $('#id').val(),
            name: $('#name').val(),
        },
        success: function(response, status, xhr) {
            if (xhr.status == 200) {
                alert("Role Updated successfully!");
                window.location.href = "../../pages/role/roleList";
            } else {
                alert("Role not Updated. Please try again.");
                window.location.href = "../../pages/role/roleList";
            }
        }
    });
}

</script>

<?php
include pathOf("includes/pageEnd.php");
?>