<?php session_start();
include "../database/Objects.php";

if (!isset($_REQUEST["cid"])) {
    header("location:../index.php");
}

$mylessons = $lesson->getLessonByCourseId($_REQUEST["cid"]);
$courseName = $course->getCourseNameById($_REQUEST["cid"]);

?>

<?php include("_header.php"); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="#">
        <h1 class="display-4 text-light"><?= $courseName->c_name ?></h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                
            </li>
        </ul>   
    </div>
</nav>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">

                <?php

                if (empty($mylessons)) {
                    echo '<li class="list-group-item bg-secondary text-light">No lessson available</li>';
                } else {
                    foreach ($mylessons as $lesson) {
                        echo '<li class="list-group-item" videoUrl="' . $lesson->l_vid . '">' . $lesson->l_name . '</li>';
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-md-9">
            <video id="video" width="700" controls style="outline: none" src="<?= empty($mylessons) ? ''  : '../videos/featureVideo.mp4' ?>">
            </video>
        </div>
    </div>
</div>


<?php include("_footer.php") ?>
<script src="script.js"></script>