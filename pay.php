<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<title>payment</title>

<div class="container">
	<div class="row">
	<h2></h2>
	<br><br><br>
<?php
require('config.php');
require('razorpay-php/Razorpay.php');
ini_set('display_errors', 0);

// session_start();
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);
$orderData = [
    'receipt'         => 3456,
    'amount'          => 100 * 100,
    'currency'        => 'INR',
    'payment_capture' => 1
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];
if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => 'Ayurveda',
    "description"       => 'Ayurvedic Products',
    "image"             => "",
    "prefill"           => [
    "name"              => 'Customer_name',
    "email"             => 'cust123@gmail.com',
    "contact"           => 9876543210,
    ],
    "notes"             => [
    "address"           => 'Nanded, Maharashtra',
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];
// $data = [
//     "key"               => $keyId,
//     "amount"            => $amount,
//     "name"              => $_POST['item_name'],
//     "description"       => $_POST['item_description'],
//     "image"             => "",
//     "prefill"           => [
//     "name"              => $_POST['cust_name'],
//     "email"             => $_POST['email'],
//     "contact"           => $_POST['contact'],
//     ],
//     "notes"             => [
//     "address"           => $_POST['address'],
//     "merchant_order_id" => "12312321",
//     ],
//     "theme"             => [
//     "color"             => "#F37254"
//     ],
//     "order_id"          => $razorpayOrderId,
// ];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);


require("checkout/manual.php");
?>
</div>
