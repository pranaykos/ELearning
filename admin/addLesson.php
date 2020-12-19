<?php include("partials/_header.php"); ?>

<?php include "../database/AObjects.php";
session_start();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_REQUEST["add-lesson"])) {
    if (!empty(trim($_REQUEST["name"])) && !empty(trim($_REQUEST["description"]))) {
        $data["courseid"] = $_SESSION["cid_lesson_add"];
        $data["name"] = $_REQUEST["name"];;
        $data["description"] = $_REQUEST["description"];

        $filename        = $_FILES["videofile"]["name"];
        $source_location = $_FILES["videofile"]["tmp_name"];
        if(isset($filename) && !empty($filename)){
            $desination_location = "../lectures/".$filename;
            if (move_uploaded_file($source_location, $desination_location)) {
                $data["video"] = $desination_location;
                if ($lesson->addLesson($data)) {
                    $cid = $_SESSION["cid_lesson_add"];
                    header("location:lessons.php?cid=$cid");
                }
            } else {
                $alert = "Somwthing went wrong";
                echo $alert;
            }
        }
    }
}
?>

<?php if (isset($_SESSION["cid_lesson_add"]) && !empty($_SESSION["cid_lesson_add"])) { ?>

    <h1 class="display-4 text-center my-4">Add Lesson to the Course</h1>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course ID</label>
                        <input type="text" readonly class="form-control" id="exampleInputEmail1" value="<?= $_SESSION["cid_lesson_add"] ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lesson name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                    <div class="input-group mb-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="videofile" name="videofile" aria-describedby="inputGroupFileAddon04">
                            <label class="custom-file-label" for="inputGroupFile04">Choose Video Lecture file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add-lesson">Submit</button>
                </form>
            </div>
        </div>
    </div>


<?php } else {
    header("location:../index.php");
}
?>

<?php include("partials/_footer.php"); ?>