<?php
    session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["userid"]) || !isset($_SESSION["email"]) || !isset($_SESSION["isLoggedIn"])){
        header("location:loginregister.php");
        exit();
    }
?>

<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // The request is using the POST method
    echo "not post";
    // header("location:index.php");
    exit();
} else if (isset($_SESSION["isLoggedIn"]) && isset($_SESSION["email"])) {
    
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");


    include "partials/_header.php";

    $_SESSION["cid"] = $_POST["cid"];

?>
    <div class="container mt-4 py-4">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 pr-0 py-4 shadow p-3 mb-5 bg-white rounded">
                <h5 class="text-center">Welcome to ELearning payment page</h5>
                <form method="post" action="PaytmKit/pgRedirect.php">
                    <table class="w-75 mx-auto mt-4">

                        <tbody>
                            <tr class="row">
                                <td class="col-sm-3">
                                    <label for="colFormLabel" class="col-form-label">Order ID</label>
                                </td>
                                <td class="col-sm-8 ">
                                    <div class="">
                                        <input id="ORDER_ID" tabindex="1" class="form-control" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" readonly value="<?php echo  "ORDS" . rand(10000, 99999999) ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-sm-3">
                                    <label for="colFormLabel" class="col-form-label">Student Email</label>
                                </td>
                                <td class="col-sm-8">
                                    <div class="">
                                        <input type="email" class="form-control" id="colFormLabel" value="<?= $_SESSION["email"] ?>" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-sm-3">
                                    <label for="colFormLabel" class="col-form-label">Amount (Rs.)</label>
                                </td>
                                <td class="col-sm-8">
                                    <div class="">
                                        <input class="form-control" title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?= $_REQUEST["price"] ?>" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr class="row mt-4">
                                <td class="col-sm-4 text-right pr-0">

                                </td>
                                <td class="col-sm-6 pl-1">
                                    <a type="submit" class="btn btn-sm btn-danger mr-0 text-light" href="course.php?cid=<?= $_REQUEST["cid"] ?>">Cancel</a>
                                    <button type="submit" class="btn btn-sm btn-primary ml-0">Submit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <input id="CUST_ID" hidden tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
                    <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" hidden>
                    <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" hidden>


                </form>
            </div>
        </div>
    </div>

    </body>

    </html>

<?php


} else {
    echo "it is get";
    header("location:index.php");
    exit();
}

?>