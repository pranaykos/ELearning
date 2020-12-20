<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

include "../database/Objects.php";
session_start();
// $_SESSION["username"] = $_SESSION["username"];
// $_SESSION["userid"] = $_SESSION["userid"];
// $_SESSION["email"] = $_SESSION["email"];
// $_SESSION["isLoggedIn"] = $_SESSION["isLoggedIn"];

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");



$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if ($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		// $data["order_id"] = $_POST["ORDERID"];
		// $data["txn_id"] = $_POST["TXNID"];
		// $data["ammount"] = $_POST["TXNAMOUNT"];
		// $data["date"] = $_POST["TXNDATE"];
		// $data["status"] = $_POST["STATUS"];
		// $data["bank_name"] = $_POST["BANKNAME"];


		// $data["email"] = $_SESSION["email"];

		// $data["courseid"] = $_SESSION["cid"];

		// echo var_dump($data);

		// $transaction->addTransaction($data);


		if (isset($_POST) && count($_POST) > 0) {
			// echo "session exist ".var_dump($_SESSION);
			// header("location:../index.php");
			$data["order_id"] = $_POST["ORDERID"];
			$data["txn_id"] = $_POST["TXNID"];
			$data["ammount"] = $_POST["TXNAMOUNT"];
			$data["date"] = $_POST["TXNDATE"];
			$data["status"] = $_POST["STATUS"];
			$data["bank_name"] = $_POST["BANKNAME"];


			$data["email"] = $_SESSION["email"];

			$data["courseid"] = $_SESSION["cid"];

			echo var_dump($data);

			$transaction->addTransaction($data);

			header("location:../student/mycourses.php");
			exit();
		}
	} else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST) > 0) {
		foreach ($_POST as $paramName => $paramValue) {
			echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
} else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
