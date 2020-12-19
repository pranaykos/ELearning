<?php include "partials/_header.php"; 
session_start();
include "../database/AObjects.php";
?>



<?php 
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_REQUEST["updateAdmin"]) ){
    $data["id"] = $_SESSION["adminLoginId"];
    $data["password"] = $_REQUEST["password"];
    if($admin->updateAdmin($data)){
        $message = "Admin password updated succesfully";
    }else{
        $message = "Failled to update Admin password";
    }
}
?>

<?php

if(isset($_SESSION["adminLoginId"])){
    $adminId = $_SESSION["adminLoginId"];
    $myadmin = $admin->getAdminById($adminId);
?>



<?php
    if(isset($message)){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Message!</strong> '.$message.'.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }

?>

<div class="container my-4">
    <h1 class="display-4 my-4 pt-4 text-center">Update Admin Password</h1>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Admin name</label>
                        <input class="form-control" disabled id="exampleFormControlTextarea1" rows="3" name="username" placeholder="<?= (isset($myadmin->a_username) ? $myadmin->a_username : "") ?>"  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" value="<?= (isset($myadmin->a_password) ? $myadmin->a_password : "") ?>">
                    </div>
                    <button type="submit" class="btn btn-danger my-4" name="updateAdmin">Update Admin Password</button><small class="ml-4 text-danger">Changing the admin password can be risky.</small>
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>

<?php include "partials/_footer.php"; ?>