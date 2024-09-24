<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location:../authentication/login");
}

require '../../includes/init.php';
include pathOf("includes/header.php");
include pathOf("includes/navbar.php");

$id=$_GET['updateId'];

$query="SELECT * FROM `expenses` WHERE Id=?";
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Expenses</a></li>
                            <li class="breadcrumb-item" aria-current="page">Update Expense</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Update Expense</h2>
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
                <form>

                    <div class="card">
                        <div class="card-header">
                            <h5>Expense Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Expense Name</label>
                                <input type="hidden" id="id" value="<?= $row['Id'] ?>">
                                <input type="text" class="form-control" placeholder="Enter Expense Name" id="name" value="<?= $row['Name'] ?>"
                                    autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Expense Amount</label>
                                <input type="text" class="form-control" placeholder="Enter Expense Amount" id="amount" value="<?= $row['Amount'] ?>"
                                    autofocus />
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-end btn-page">
                            <button class="btn custom mb-0" onclick="sendData()">Update Expense</button>
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
        url: '../../api/expenses/update',
        method: 'POST',
        data: {
            id: $('#id').val(),
            name: $('#name').val(),
            amount: $('#amount').val()
        },
        success: function(response, status, xhr) {
            if (xhr.status == 200) {
                alert("Expense updated successfully!");
                window.location.href = "../../pages/expenses/expenseList";
            } else {
                alert("Expense not updated. Please try again.");
                window.location.href = "../../pages/expenses/expenseList";
            }
        }
    });
}
</script>

<?php

include pathOf("includes/pageEnd.php");

?>