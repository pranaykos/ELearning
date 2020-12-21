<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./PaytmKit/lib/config_paytm.php");
require_once("./PaytmKit/lib/encdec_paytm.php");

$ORDER_ID = "";
$requestParamList = array();
$responseParamList = array();

if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

    // In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
    $ORDER_ID = $_POST["ORDER_ID"];

    // Create an array having all required parameters for status query.
    $requestParamList = array("MID" => PAYTM_MERCHANT_MID, "ORDERID" => $ORDER_ID);

    $StatusCheckSum = getChecksumFromArray($requestParamList, PAYTM_MERCHANT_KEY);

    $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

    // Call the PG's getTxnStatusNew() function for verifying the transaction status.
    $responseParamList = getTxnStatusNew($requestParamList);
}

?>


<?php include("partials/_header.php") ?>

<?php include "partials/_navbar.php"; ?>


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6 shadow p-3 mb-5 bg-white rounded">
            <form action="" method="POSt">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>
                                <label for="colFormLabel" class="col-form-label">Order ID</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" aria-describedby="emailHelp" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
                                </div>
                            </td>
                            <td><button type="submit" class="btn btn-primary">Submit</button></td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <?php
            if (isset($responseParamList) && count($responseParamList) > 0) {
            ?>
                <h2 class="text-center">Payment Receipt:</h2>
            <?php } ?>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-6">
            <?php
            if (isset($responseParamList) && count($responseParamList) > 0) {
            ?>

                <table class="table table-bordered">
                    <tbody>
                    <?php
                        foreach ($responseParamList as $paramName => $paramValue) {
                            if ($paramName === "TXNID" || $paramName === "ORDERID" || $paramName === "TXNAMOUNT" || $paramName === "STATUS" || $paramName === "GATEWAYNAME" || $paramName === "TXNDATE") {
                        ?>
                                <tr>
                                    <td><label><?php echo $paramName ?></label></td>
                                    <td><?php echo $paramValue ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-block text-center">
                    <button class="btn btn-success" onclick="javascript:window.print();">Print</button>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include("partials/_footer.php") ?>