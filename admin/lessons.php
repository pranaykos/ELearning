<?php session_start() ?>

<?php
    if(!isset($_SESSION["adminusername"]) || !isset($_SESSION["isAdminLoggedIn"]) || !isset($_SESSION["adminLoginId"])){
        header("location:../index.php");
    }
?>


<?php include("partials/_header.php"); ?>

<?php include "../database/AObjects.php";


unset($_SESSION["cid_lesson_add"]);

?>

<?php



if (isset($_REQUEST["cid"]) && !empty(trim($_REQUEST["cid"]))) {
    $cid = $_REQUEST["cid"];
    $_SESSION["cid_lesson_add"] = $cid;
    $mylessons = $lesson->getLessonByCourseId($cid);
    // echo var_dump($mylessons);
}
?>

<h1 class="display-4 text-center mt-4">Search Course to add Lessons</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="GET">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="cid" placeholder="Course id" value="<?= isset($cid) ? $cid : "" ?>">
                        </div>
                    </div>
                    <div class="col-md-4 pl-0">
                        <button class="btn btn-primary d-inline">search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <?php
        if (isset($mylessons) && empty($mylessons)) {
            echo "<h1>No Lessons found for this course</h1>";
        } else if (isset($mylessons) && !empty($mylessons)) {
            echo '<ul class="list-group col-sm-6">';
            foreach ($mylessons as $lesson) {
                // echo var_dump($lesson);
                echo '<li class="list-group-item">' . $lesson->l_name . '</li>';
            }
            echo '</ul>';
        }
        ?>
    </div>
</div>

<div>
    <?php 
        if(isset($_SESSION["cid_lesson_add"])){
            echo '<a class="lesson-add-button btn btn-danger" href="addLesson.php">Add</a>';
        }
    ?>
</div>


<?php include("partials/_footer.php"); ?>