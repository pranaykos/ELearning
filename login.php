<?php

include_once "/database/Objects.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    $myadmin = $admin->getAdminsByUsername($username);


        $count = $admin->getAdminsCount();
        if($count === 1){
            if($myadmin->a_password === $password){
                session_start();
                $_SESSION["adminusername"] = $myadmin->a_username;
                $_SESSION["isAdminLoggedIn"] = true;
                $_SESSION["adminLoginId"] = $myadmin->a_id;
                header("location:admin/admin.php");
                exit();
            }
        }
        $_SESSION["isLoggedIn"] = false;

        header("location:index.php");
}

?>