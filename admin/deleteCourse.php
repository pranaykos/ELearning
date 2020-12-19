<?php

session_start();

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