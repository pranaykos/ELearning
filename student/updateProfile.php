<?php include "../partials/_header.php"; ?>

<?php session_start(); 
include "../database/AObjects.php";?>

<?php
    if(isset($_REQUEST["updatebtn"]) && $_SERVER["REQUEST_METHOD"] === "POST"){
        $data["id"] = $_SESSION["userid"];
        $data["email"] = $_REQUEST["email"];
        $data["username"] = $_REQUEST["username"];
        $data["password"] = $_REQUEST["password"];

        if($users->changeUserDetails($data)){
            $alert = "Profile updated succesfully";
        }else{
            $alert = "Profile updated failled";
        }
    }
?>


<?php
if (isset($_SESSION["username"]) && $_SESSION["isLoggedIn"]) {
    $userId = $_SESSION["userid"];
    $myuser = $users->getUserById($userId);
} else [
    header("location:../index.php")
]
?>

<?php include "_navbar.php"; ?>

<?php
    if(isset($alert)){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Message!</strong> '.$alert.'.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
?>

<div class="container-fluid mt-4 ml-0">
    <h1 class="display-4">HI, <?= $myuser->username ?></h1>
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item justify-content-center border-light">
                    <div class="card border-light">
                        <img class="card-img-top rounded-circle w-75 mx-auto" src="https://source.unsplash.com/200x200/?people" alt="Card image cap">
                    </div>
                </li>
                </li>
                <li class="list-group-item"><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
                <li class="list-group-item"><a href=""><i class="fas fa-book-open"></i> My courses</a></li>
                <li class="list-group-item"><a href=""><i class="fas fa-user-edit"></i> Update profile</a></li>
                <li class="list-group-item"><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
        <div class="col-sm-5">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" class="form-control" readonly value="<?= $myuser->id ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $myuser->email ?>" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Usernamne</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $myuser->username ?>" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" value="<?= $myuser->password ?>"  class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-warning" name="updatebtn">Update</button>
            </form>
        </div>
    </div>
</div>

<?php include "../partials/_footer.php"; ?>