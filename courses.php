<?php include "partials/_header.php"; ?>

<?php session_start() ?>

<?php include "partials/_navbar.php"; ?>

<?php include "database/AObjects.php"; ?>

<div class="jumbotron jumbotron-fluid py-0">
    <div class="container-fluid">
        <img src="images/jumbotron.jpg" class="d-block w-100" alt="">
    </div>
</div>


<div class="container">


    <?php

    $mycourses = $course->getCourseOrderByCatagories();
    $catagory = "";
    $different_cat = false;
    foreach ($mycourses as $mycourse) {
        $different_cat = !($catagory === $mycourse->c_catagory);
        if ($different_cat) {
            if (!empty(trim($catagory))) {
                echo '<div>';
            }
            $catagory = $mycourse->c_catagory;
    ?>
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4"><?= $mycourse->c_catagory ?></h1>
                    <hr class="style-three">
                </div>
            </div>
            <div class="row">
            <?php }  ?>

            <div class="col-sm-4">
                <a href="course.php?cid=<?= $mycourse->c_id ?>">
                    <div class="card my-4 border-light shadow p-3 mb-5 bg-white rounded" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <img src="images/ml.jpg" width="200px" class="card-img" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body pr-2 py-0 mt-0">
                                    <h5 class="card-title"><?= $mycourse->c_name ?></h5>
                                    <p class="card-text"><?= substr($mycourse->c_desc, 0 ,45) ?></p>
                                    <p class="card-text"><small class="text-muted"><?= $mycourse->c_duration ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>




        <?php }
        ?>


            </div>

            <!-- start including modals -->
            <?php
            include "partials/_login_modal.php";
            include "partials/_signup_modal.php";
            ?>
            <!-- end including all the modals -->

            <?php include "partials/_footer.php"; ?>