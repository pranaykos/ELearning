<?php include "partials/_header.php"; ?>

<?php session_start() ?>


<?php include "database/AObjects.php"; ?>

<?php include "partials/_navbar.php"; ?>


<div class="jumbotron jumbotron-fluid py-0">
    <div class="container-fluid">
        <img src="images/elearning-2.jpg" class="d-block w-100" alt="dasd">
    </div>
</div>

<?php
if (!empty(trim($_GET["cid"]))) {  
    $courseId = $_GET["cid"];
    $mycourse = $course->getCourseById($courseId);
?>



    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary"><strong>Course content</strong></li>
                    <?php
                        $mylessons = $lesson->getLessonByCourseId($courseId);
                        $count = 1;
                        foreach($mylessons as $lesson){
                             ?>
                            <li class="list-group-item">Lesson - <?php echo $count++." : "  ?> <?= $lesson->l_name ?></li>
                        <?php }
                    ?>
                </ul>
            </div>
            <div class="col-sm-5">
                <div class="card mb-3">
                    <img src="images/course.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $mycourse->c_name ?></h5>
                        <p class="card-text"> <?= substr($mycourse->c_desc, 0 ,170) ?></p>
                        <h3 class="my-0 mr-4 d-inline" style="text-decoration: line-through"><i class="fa fa-rupee-sign" aria-hidden="true"></i> <?= $mycourse->c_original_price ?>/-</h3>
                        <h3 class="my-0 d-inline text-danger"><i class="fa fa-rupee-sign" aria-hidden="true"></i> <?= $mycourse->c_selling_price ?>/-</h3>
                        <div class="d-inline bg-danger text-light p-3 ml-2 pl-3" id="offer"> Christmas offer</div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Coupon code">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-warning btn-block">Apply</button>
                            </div>
                        </div>
                    </div>
                    <div class="row"><button type="button" class="btn btn-primary mx-3 btn-block">Buy Now</button></div>
                </div>
            </div>
        </div>
    </div>
<?php }
?>

<!-- start including modals -->
<?php
include "partials/_login_modal.php";
include "partials/_signup_modal.php";
?>
<!-- end including all the modals -->

<?php include "partials/_footer_links.php"; ?>

<?php include "partials/_footer.php"; ?>