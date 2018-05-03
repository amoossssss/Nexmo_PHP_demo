<?php

require_once "vendor/autoload.php";

$userName=$_POST["userName"];
$phoneNum=$_POST["phoneNumber"];
$moneyGTN=$_POST["moneyGoToName"];
$money=$_POST["money"];

$line='--------------------';

// enter KEY & SECRET before use
$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic("",""));
$verification = $client->verify()->start([
	'number' => $phoneNum ,
	'brand'  => 'Test',
	'code_length' => '6'
]);

$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
$txt = $userName.PHP_EOL.$phoneNum.PHP_EOL.$moneyGTN.PHP_EOL.$money.PHP_EOL.$verification->getRequestId().PHP_EOL.$line.PHP_EOL ;
fwrite($myfile, $txt);
fclose($myfile);

$req_id=$verification->getRequestId();
// modify ~amos_mac to your apache root file name
header("Location: http://localhost/~amos_mac/Nexmo_test/sms?id=$req_id&name=$userName");

?>