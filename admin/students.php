<?php session_start() ?>

<?php
    if(!isset($_SESSION["adminusername"]) || !isset($_SESSION["isAdminLoggedIn"]) || !isset($_SESSION["adminLoginId"])){
        header("location:../index.php");
    }
?>


<?php 
    
    if(isset($_SESSION["adminusername"]) && $_SESSION["isAdminLoggedIn"]){

    }else{
        header("location:../index.php");
    }
?>

<?php

include "../database/AObjects.php";

?>


<?php

if(isset($_REQUEST["delete"])){
    if(!empty($_REQUEST["sid"])){
        $studentId = $_REQUEST["sid"];
        $users->deletePost($studentId);
    }    
}

?>


<?php include "partials/_header.php"; ?>



    <div class="container my-4">
        <h1>List of courses</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $allUsers = $users->getUsers();
                if ($users->getUserCount() > 0) {
                    foreach ($allUsers as $user) { ?>
                            <tr>
                                <th scope="row"><?= $user->id ?></th>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td>
                                    <a href="studentUpdate.php?id=<?= $user->id ?>" class="btn btn-warning d-inline"><i class="fa fa-pen-alt" aria-hidden="true"></i> Update</a>
                                    <form action="" method="POST" class="d-inline">
                                        <input type="text" value="<?= $user->id ?>" name="sid" hidden>
                                        <button class="btn  btn-danger" name="delete"><i class="fa fa-user-slash" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>


    <!-- <a type="button" class="btn btn-danger btn-add" href="addcourse.php">Add</a> -->

   
    <?php include "partials/_footer.php"; ?>