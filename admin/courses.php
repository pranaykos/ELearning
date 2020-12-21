<?php session_start() ?>

<?php
    if(!isset($_SESSION["adminusername"]) || !isset($_SESSION["isAdminLoggedIn"]) || !isset($_SESSION["adminLoginId"])){
        header("location:../index.php");
    }
?>


<?php

include "../database/AObjects.php";

?>


<?php include "partials/_header.php"; ?>



    <div class="container my-4">
        <h1>List of courses</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Course name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $allCourses = $course->getCourses();
                if ($course->getCoursesCount() > 0) {
                    foreach ($allCourses as $course) {
                        echo '<tr>
                                <th scope="row">' . $course->c_id . '</th>
                                <td>' . $course->c_name . '</td>
                                <td>' . $course->c_author . '</td>
                                <td><a href="updateCourse.php?cid='.$course->c_id.'">Update</a> | <a href="deleteCourse.php?id=' . $course->c_id . '">Delete</a></td>
                            </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>


    <a type="button" class="btn btn-danger btn-add" href="addcourse.php"><i class="fas fa-plus"></i> </a>

   
    <?php include "partials/_footer.php"; ?>