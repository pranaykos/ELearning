<?php session_start() ?>

<?php
    if(!isset($_SESSION["adminusername"]) || !isset($_SESSION["isAdminLoggedIn"]) || !isset($_SESSION["adminLoginId"])){
        header("location:../index.php");
    }
?>




<?php



include "../database/AObjects.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(!empty($_REQUEST["name"]) && !empty($_REQUEST["cid"]) && !empty($_REQUEST["description"]) && !empty($_REQUEST["author"]) && !empty($_REQUEST["duration"]) && !empty($_REQUEST["oprice"]) && !empty($_REQUEST["sprice"])){
        $data["id"] = $_REQUEST["cid"];
        $data["name"] = $_REQUEST["name"];
        $data["author"] = $_REQUEST["author"];
        $data["description"] = $_REQUEST["description"];
        $data["duration"] = $_REQUEST["duration"];
        $data["oprice"] = $_REQUEST["oprice"];
        $data["sprice"] = $_REQUEST["sprice"];

        if($course->updateCourse($data)){
            echo "update sucess";
            header("location:courses.php");

        }else{
            echo "update failled";
            $alert = "all fields are required";
        }
        
    }else{
        $alert = "all fields are required";
    }
}


?>


<?php if(!empty($_REQUEST["cid"])){
    
    $cid = $_REQUEST["cid"];
    $mycourse = $course->getCourseById($cid);
    // echo $cid;

    ?>

    <?php include("partials/_header.php"); ?>

    <div class="container my-4">
        <h1 class="display-4 my-4 text-center">Update Course details</h1>
        <div class="row justify-content-md-center">
            <div class="col-md-7">
                <div class="p-4 form">
                    <form action="" method="POST">
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Course ID</label>
                            <input type="text" class="form-control" readonly id="exampleInputEmail1" aria-describedby="emailHelp" name="cid" value="<?= $mycourse->c_id ?>">
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Course name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?= $mycourse->c_name ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Course description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?= $mycourse->c_desc ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course author</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="author" value="<?= $mycourse->c_author ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course duration</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="duration" value="<?= $mycourse->c_duration ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course oroginal price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="oprice" value="<?= $mycourse->c_original_price ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course selling price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sprice" value="<?= $mycourse->c_selling_price ?>">
                        </div>
                        <button type="submit" class="btn btn-primary my-4">Add Course</button>
                        <?php if(isset($alert)){ ?>
                            <p class="text-center d-inline text-danger ml-4"> * All fields are required</p>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>