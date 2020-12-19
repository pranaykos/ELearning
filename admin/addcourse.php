<?php

include "../database/AObjects.php";


// if ($_SERVER["REQUEST_METHOD"] === "POST") {
if (isset($_REQUEST["course_add"])) {


    if (!empty($_REQUEST["name"]) && !empty($_REQUEST["description"]) && !empty($_REQUEST["author"]) && !empty($_REQUEST["duration"]) && !empty($_REQUEST["oprice"]) && !empty($_REQUEST["name"])) {
        $newcourse["name"] = $_REQUEST["name"];
        $newcourse["description"] = $_REQUEST["description"];
        $newcourse["author"] = $_REQUEST["author"];
        $newcourse["duration"] = $_REQUEST["duration"];
        $newcourse["oprice"] = $_REQUEST["oprice"];
        $newcourse["sprice"] = $_REQUEST["sprice"];
        // $newcourse["catagory"] = $_REQUEST["catagory"];
        $newcourse["catagory"] = $_REQUEST["catagory"];


        $name       = $_FILES['course_thumbnail']['name'];
        $source_file_location = $_FILES["course_thumbnail"]["tmp_name"];

        if (isset($name) && !empty($name)) {
            $dest_file_location = "../images/" . $name;
            if (move_uploaded_file($source_file_location, $dest_file_location)) {
                $newcourse["image"] = $dest_file_location;
                $course->addCourse($newcourse);
                $addStatus = "Succesfully added new course";
            } else {
                // file couldnt uploaded
                $addStatus = "Something went wrong";
            }
        } else {
            $addStatus = "Invalid file uploaded";
        }
    }
}



?>

<?php include("partials/_header.php"); ?>



<?php
if (isset($addStatus)) {
    if ($addStatus) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> Course Added succesfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Failled! </strong> Failled.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
}
?>





<div class="container my-4">
    <h1 class="display-4 my-4 text-center">Course details</h1>
    <div class="row justify-content-md-center">
        <div class="col-md-7">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Course name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Course description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course author</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="author">
                    </div>
                    <div class="dropdown my-4">
                        <label for="exampleInputEmail1" class="mr-4">Course Catagory</label>
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="cat-btn">Dropdown button
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-item" href="#">Computer Science</li>
                            <li class="dropdown-item" href="#">Digital Markting</li>
                            <li class="dropdown-item" href="#">Music Theory</li>
                        </ul>
                        <input type="text" value="" hidden id="course-cat" name="catagory">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course duration</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="duration">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course oroginal price</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="oprice">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course selling price</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sprice">
                    </div>
                    <div class="input-group mt-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="course_thumbnail" aria-describedby="inputGroupFileAddon04" name="course_thumbnail">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-4" name="course_add">Add Course</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("partials/_footer.php"); ?>