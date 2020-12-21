<?php session_start() ?>

<?php
    if(!isset($_SESSION["adminusername"]) || !isset($_SESSION["isAdminLoggedIn"]) || !isset($_SESSION["adminLoginId"])){
        header("location:../index.php");
    }
?>


<?php include("../database/AObjects.php"); ?>

<?php include("partials/_header.php"); ?>

<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_REQUEST["reportsubmit"])){
            $startDate = $_REQUEST["start-date"];
            $endDate = $_REQUEST["end-date"];

            echo $startDate."<br>";
            echo $endDate."<br>";

        }
    }
?>


<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-8">
            <table class="table table-borderless">
                <form action="" method="POST">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group mr-4">
                                    <input type="date" class="form-control" name="start-date">
                                </div>
                            </td>
                            <td>
                                <div class="form-group mr-4">
                                    <input type="date" class="form-control" name="end-date">
                                </div>
                            </td>
                            <td><button type="submit" name="reportsubmit" class="btn btn-primary">Search</button></td>
                        </tr>
                    </tbody>
                </form>
            </table>
        </div>
    </div>
</div>




<?php include "../partials/_footer.php"; ?>