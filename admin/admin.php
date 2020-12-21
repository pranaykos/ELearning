

<?php include("partials/_header.php"); ?>

<?php session_start() ?>

<?php
    if(!isset($_SESSION["adminusername"]) || !isset($_SESSION["isAdminLoggedIn"]) || !isset($_SESSION["adminLoginId"])){
        header("location:../index.php");
    }
?>

<?php include("../database/AObjects.php"); ?>

<?php

// All courses count
$course->getCourses();
$total_courses_count = $course->getCoursesCount();

// All users count
$users->getUsers();
$total_user_count = $users->getUserCount();

// All transaction count
$allTransactions = $transaction->getAllTransactions();
$total_transaction_count = $transaction->getTransactionCount();

?>

<div class="container my-4">
    <div class="row">
        <div class="col-sm-4">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Courses</div>
                <div class="card-body">
                    <h1 class="card-text text-center"><?= $total_courses_count ?></h1>
                </div>
                <div class="card-footer text-center"><a href="courses.php" class="text-light" style="text-decoration: none">View</a></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Students</div>
                <div class="card-body">
                    <h1 class="card-text text-center"><?= $total_user_count ?></h1>
                </div>
                <div class="card-footer text-center"><a href="students.php" class="text-light" style="text-decoration: none">View</a></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Sold</div>
                <div class="card-body">
                    <h1 class="card-text text-center"><?= $total_transaction_count ?></h1>
                </div>
                <div class="card-footer text-center"><a href="sellReport.php" class="text-light" style="text-decoration: none">View</a></div>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <h1 class="text-center my-3" style="font-weight: 400">Recent Orders</h1>
    <div class="row">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($count = 0; $count < 5; $count++) { ?>

                    <tr>
                        <th><?= $allTransactions[$count]->order_id ?></th>
                        <td><?= $allTransactions[$count]->course_id ?></td>
                        <td><?= $allTransactions[$count]->email_id ?></td>
                        <td><?= $allTransactions[$count]->txn_date ?></td>
                        <td><?= $allTransactions[$count]->txn_amount ?></td>
                    </tr>


                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../partials/_footer.php"; ?>