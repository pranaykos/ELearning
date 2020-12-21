<?php session_start() ?>

<?php
    if(!isset($_SESSION["adminusername"]) || !isset($_SESSION["isAdminLoggedIn"]) || !isset($_SESSION["adminLoginId"])){
        header("location:../index.php");
    }
?>


<?php

include "../database/AObjects.php";

    if(isset($_SESSION["adminusername"]) && $_SESSION["isAdminLoggedIn"]){
        $id = $_GET["id"];
        $course->deleteCourse($id);
        header("location:courses.php");
    }else{
        echo "i will nto do";
        // header("location:admin.php");
    }

?>