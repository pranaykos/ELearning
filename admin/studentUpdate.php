<?php include "partials/_header.php"; ?>



<?php
include "../database/AObjects.php";

if (($_SERVER["REQUEST_METHOD"] === "GET") && isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $userId = $_GET["id"];
    $myuser = $users->getUserById($userId);
    if ($users->getUserCount() <= 0) {
        header("location:students.php");
        exit();
    }
} else if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_REQUEST["updateUser"])){
    // echo "post";
    if(!empty($_REQUEST["id"]) && !empty($_REQUEST["email"]) && !empty($_REQUEST["username"]) && !empty($_REQUEST["password"])){
        $data["id"] = $_REQUEST["id"];
        $data["email"] = $_REQUEST["email"];
        $data["username"] = $_REQUEST["username"];
        $data["password"] = $_REQUEST["password"];
        
        // if(isset($_REQUEST["user_thumbnail"])){
        //     echo "thumbnail ".$_REQUEST["user_thumbnail"];
        // }
    
    
        $filename             = $_FILES['user_thumbnail']['name'];
        $source_file_location = $_FILES["user_thumbnail"]["tmp_name"];

        if(isset($filename) && !empty(trim($filename))){
            $deslocation = "../images/".$filename;
            
            if(move_uploaded_file($source_file_location, $deslocation)){
                $data["user_thumbnail"] = $deslocation;
                if($users->updateUser($data)){
                    $alert="Student updated succesfully";
                }else{
                    $alert="Student update failled";
                }
            }
        } 
    }
}


?>


<?php

    if(isset($alert) && !empty($alert)){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Message !</strong> '.$alert.'.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }

?>


<div class="container my-4">
    <h1 class="display-4 my-4 text-center">Students Details</h1>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <input type="text" hidden class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" value="<?= (isset($myuser->id) ? $myuser->id : "") ?>">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= (isset($myuser->email) ? $myuser->email : "") ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Username</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="username"><?= (isset($myuser->username) ? $myuser->username : "") ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" value="<?= (isset($myuser->password) ? $myuser->password : "") ?>">
                    </div>
                    <div class="input-group mt-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="user_thumbnail" aria-describedby="inputGroupFileAddon04" name="user_thumbnail" value="<?= isset($myuser->profile_photo) ? $myuser->profile_photo : "" ?>">
                            <label class="custom-file-label" for="inputGroupFile04"> <?= isset($myuser->profile_photo) ? $myuser->profile_photo : "" ?></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-4" name="updateUser">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "partials/_footer.php"; ?>