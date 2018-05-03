<?php

require_once "vendor/autoload.php";

$req_id = $_POST["req_id"];
$code = $_POST["smsCode"];
$userName=$_POST["userName"];

// enter KEY & SECRET before use
$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic("",""));
$verification = new \Nexmo\Verify\Verification($req_id);

$try = "try";

try {
    $client->verify()->check($verification, $code);
    // modify ~amos_mac to your apache root file name
    header("Location: http://localhost/~amos_mac/Nexmo_test/success");
} catch (Exception  $e) {
	// modify ~amos_mac to your apache root file name
    header("Location: http://localhost/~amos_mac/Nexmo_test/sms?id=$req_id&name=$userName&try=$try");
}

?>