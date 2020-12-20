<?php



include "../database/Objects.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    
    $myuser = $user->getUserByUsername($username);

    // return json_encode(true);

    if($user->getUserCount() > 0){
        if($myuser->password === $password){
            session_start();
            $_SESSION["username"] = $myuser->username;
            $_SESSION["userid"] = $myuser->id;
            $_SESSION["email"] = $myuser->email;
            $_SESSION["isLoggedIn"] = true;
            echo json_encode("OK");
            exit;
        }
    }
    echo json_encode("NOT");
}

?>