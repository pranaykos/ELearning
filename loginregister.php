<?php include "partials/_header.php"; ?>

<?php include "partials/_navbar.php"; ?>

<?php include "database/AObjects.php"; ?>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_REQUEST["login"])) {
        if (empty(trim($_REQUEST["lusername"])) || empty(trim($_REQUEST["lpassword"]))) {
            $alert = "All Credencials are required for login";
        } else {
            $username = $_REQUEST["lusername"];
            $password = $_REQUEST["lpassword"];

            $myuser = $users->getUserByUsername($username);
            // if(isset($myuser) && $myuser->password === $password){
            if (!($myuser)) {
                $alert = "Invalid Username or Password";
            } else if (isset($myuser) && $myuser->password !== $password) {
                $alert = "Invalid Username or Password";
            } else {
                session_start();
                $_SESSION["username"]   = $myuser->username;
                $_SESSION["userid"]     = $myuser->id;
                $_SESSION["email"]      = $myuser->email;
                $_SESSION["isLoggedIn"] = true;
                header("location:index.php");
            }
        }
    } else if (isset($_REQUEST["signup"])) {
        if (empty(trim($_REQUEST["semail"])) || empty(trim($_REQUEST["susername"])) || empty(trim($_REQUEST["spassword"]))) {
            $alert = "All Fields are required for Signup";
        } else {
            $data["email"]    = $_REQUEST["semail"];
            $data["username"] = $_REQUEST["susername"];
            $data["password"] = $_REQUEST["spassword"];
            if ($users->addUser($data)) {
                $success = true;
            } else {
                $alert   = "Something went wrong while signing up";
            }
        }
    }
}

?>

<?php

if (isset($alert)) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failled! </strong> ' . $alert . '.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
}

if (isset($success) && $success) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your account has been created succesfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
}

?>

<div class="container mt-4" style="padding-top: 50px">
    <div class="row">
        <div class="col-md-5 border border-danger border-left-0 border-top-0 border-bottom-0" style="padding-right: 70px">
            <h1 class="display-4">If allready Registered <br>Log in here</h1>
            <form action="" method="POST" class="mt-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><strong><i class="fa fa-user" aria-hidden="true"></i> Username</strong></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lusername">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><strong><i class="fa fa-key" aria-hidden="true"></i> Password</strong></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="lpassword">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
            </form>
        </div>
        <div class="col-md-6 offset-md-1">
            <h1 class="display-4">New User <br>Sign Up here</h1>
            <form action="" method="POST" class="mt-4">
                <div class="form-group">
                    <label for="exampleInputEmail1"><strong><i class="fa fa-envelope" aria-hidden="true"></i> Email </strong></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="semail">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><strong><i class="fa fa-user" aria-hidden="true"></i> Username</strong></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="susername" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><strong><i class="fa fa-key" aria-hidden="true"></i> Password</strong></label>
                    <input type="password" class="form-control" name="spassword" id="exampleInputPassword1">
                </div>
                <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
</div>



<?php
include "partials/_login_modal.php";
include "partials/_signup_modal.php";
?>

<?php include "partials/_footer.php"; ?>