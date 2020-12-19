<?php

include_once "/database/Objects.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $data["email"] = $_REQUEST["email"];
    $data["username"] = $_REQUEST["username"];
    $data["password"] = $_REQUEST["password"];

    $user->addUser($data);

    header("location:index.php?success=1");
}

?>