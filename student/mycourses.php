<?php include("_header.php"); ?>

<?php session_start();
include "../database/Objects.php"; ?>


<?php
if (isset($_SESSION["username"]) && $_SESSION["isLoggedIn"]) {
    $userId = $_SESSION["userid"];
    $myuser = $user->getUserById($userId);

    $myCourses = $course->getCoursesOfUserByEmail($_SESSION["email"]);
} else [
    header("location:../index.php")
]
?>

<?php include "_navbar.php"; ?>

<div class="container-fluid mt-4 ml-0">
    <h1 class="display-4">HI, <?= $myuser->username ?></h1>
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item justify-content-center border-light">
                    <div class="card border-light">
                        <img class="card-img-top rounded-circle w-75 mx-auto" src="https://source.unsplash.com/200x200/?people" alt="Card image cap">
                    </div>
                </li>
                </li>
                <li class="list-group-item"><a href=""><i class="fas fa-user"></i> Profile</a></li>
                <li class="list-group-item"><a href="mycourses.php"><i class="fas fa-book-open"></i> My courses</a></li>
                <li class="list-group-item"><a href="updateProfile.php"><i class="fas fa-user-edit"></i> Update Profile</a></li>
                <li class="list-group-item"><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-6">
            <?php

            if (empty($myCourses)) {
                echo "<h1 class='display-4'>Yout have not enrolled in any Course yet ...</h1>";
            } else {
                foreach ($myCourses as $myCourse) { ?>
                    <div class="card mb-3 my-4">
                        <div class="row no-gutters">
                            <div class="col-md-4 p-4">
                                <img src="<?= $myCourse->c_image ?>" width="50px" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $myCourse->c_name ?></h5>
                                    <p class="card-text"><?= substr($myCourse->c_desc, 0, 100) ?></p>
                                    <p class="card-text"><a class="btn btn-primary text-light" href="watchCourse.php?cid=<?= $myCourse->c_id ?>">View Course</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</div>

<?php include("_footer.php"); ?>