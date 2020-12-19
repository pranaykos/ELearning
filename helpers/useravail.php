<?php

include "../database/Objects.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_REQUEST["username"];

    // echo "<script>alert('dad')</script>";

    $user->getUserByUsername($username);

    if($user->getUserCount() > 0){
        echo json_encode(true);
    }else{
        return json_encode(false);
    }
}

?>