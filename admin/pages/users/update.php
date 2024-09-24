<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$id=$_GET['updateId'];

$query1 = "SELECT * FROM `roles`";
$rows1=select($query1);

$query=" SELECT 
users.Id,
users.Name,
users.Mobile,
users.Email,
users.Image,
users.Address,
users.City,
users.State,
users.Username,
users.Password, 
roles.Name as RoleId
FROM
users INNER JOIN roles ON users.RoleId = roles.Id
    WHERE users.Id=? ";

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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">User</a></li>
                            <li class="breadcrumb-item" aria-current="page">Update User</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Update User</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->

        <form enctype="multipart/form-data">
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>User Details</h5>
                        </div>



                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">Select Role</label>
                                <select class="form-select" id="role" require>
                                    <option disabled selected>Select Role</option>
                                    <option disabled selected><?= $row['RoleId'] ?></option>
                                    <?php foreach($rows1 as $row1) { ?>
                                    <option value="<?= $row1['Id'] ?>" require><?= $row1['Name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="hidden" id="id" value="<?= $row['Id'] ?>">
                                <input type="text" class="form-control" placeholder="Enter Name" id="name"
                                    value="<?= $row['Name'] ?>" require autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">MobileNumber</label>
                                <input type="text" class="form-control" placeholder="Enter Mobile No." id="mobile"
                                    value="<?= $row['Mobile'] ?>" require />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control" placeholder="Enter E-mail" id="email"
                                    value="<?= $row['Email'] ?>" require />
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>User image</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <p><span class="text-danger">*</span> Recommended Passport-Size Image</p>

                                <input type="hidden" class="form-control" id="oldimage" value="<?= $row["Image"]; ?>">
                                <img src="<?= "../../assets/images/users/" . $row["Image"]; ?>" width="150px">
                                <input type="file" class="form-control mb-3" id="image" require>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Addressing</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input class="form-control" placeholder="Enter Address" id="address"
                                    value="<?= $row['Address'] ?>" require></input>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" placeholder="Enter City" id="city"
                                    value="<?= $row['City'] ?>" require />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" placeholder="Enter State" id="state"
                                    value="<?= $row['State'] ?>" require />
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5> For Login </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">UserName</label>
                                <input type="text" class="form-control" placeholder="Enter UserName" id="username"
                                    value="<?= $row['Username'] ?>" require />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Enter Password" id="password"
                                    value="<?= $row['Password'] ?>" require />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn custom mb-0" onclick="sendDate()">Update User</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<?php

include pathOf("includes/footer.php");
include pathOf("includes/script.php");

?>

<script>
function sendDate() {
    var formData = new FormData();
    formData.append('id', $('#id').val());
    formData.append('role', $('#role').val());
    formData.append('name', $('#name').val());
    formData.append('mobile', $('#mobile').val());
    formData.append('email', $('#email').val());
    formData.append('oldimage', $('#oldimage').val());
    formData.append('image', $('#image')[0].files[0]); // Append the file
    formData.append('address', $('#address').val());
    formData.append('city', $('#city').val());
    formData.append('state', $('#state').val());
    formData.append('username', $('#username').val());
    formData.append('password', $('#password').val());

    $.ajax({
        url: '../../api/users/update',
        type: 'POST',
        data: formData,
        contentType: false, // Required for file upload
        processData: false, // Required for file upload
        success: function(response, status, xhr) {
            if (xhr.status == 200) {
                alert("User Updated Successfully");
                window.location.href = "../../pages/users/userList";
            } else {
                alert("User Update Error. Please try again.");
                window.location.href = "../../pages/users/userList";
            }
        }
    });
}
</script>

<?php

include pathOf("includes/pageEnd.php");

?>