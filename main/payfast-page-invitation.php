<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

$invoice = get_check("invoice");
$invoice = sanitizeString($invoice);
$order_id = $invoice;

$home_link = "https://kingwebsites.co.za/main/store-front.php?";


$total = return_info($conn,'orders','total','id',"$invoice");
$date = return_info($conn,'orders','date','id',"$invoice");
$list = return_info($conn,'orders','list','id',$invoice);
$list = str_replace(": ","<br>","$list");
$payment_status = return_info($conn,'orders','payment_status','id',"$invoice");
$first_name = return_info($conn,'orders','name','id',"$invoice");
$last_name = '';
$email = return_info($conn,'orders','email','id',"$invoice");
$number = return_info($conn,'orders','number','id',"$invoice");
$item_description = 'Order (Please see email inbox for more, Invoice: #orderid";';
// $total = str_replace('R','',"$total");
// $total = str_replace(',','',"$total");
$amount = "$total";
$item_name = "Order (#$invoice)";

if ($payment_status == 'PAID') {
	$class = 'btn btn-outline-success btn-sm';
} else { 

	$class = 'btn btn-outline-secondary btn-sm';
}
?>
<body>
	<nav class='navbar sticky-top navbar-light bg-light'>
		<div class='container-fluid'>
			<a class='navbar-brand' href='<?php echo("$home_link"); ?>'><img src='https://kingwebsites.co.za/Standard-Pack/website_logo_transparent_background_site_icon.png' class='img-fluid rounded' style='width: 40px;'> &nbsp; <span class='fs-5'> Invoice #<?php echo "$invoice"; ?></span></a>
			<button name="" class='<?php echo("$class"); ?>'><?php echo("$payment_status") ?></button>

		</div>
	</nav>

<div class="top-space"></div>
	<center>
	<p><?php echo "$first_name"; ?> has asked you to pay</p>
	<table class="table table-borderless container">
  <tbody> 
    <tr>  
      <td>Date</td>
      <td><?php echo("$date"); ?></td>
    </tr>
    <tr>	
      <td>Name</td>
      <td><?php echo("$first_name"); ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo("$email"); ?></td>	
    </tr>
    <tr>
      <td>Number</td>
      <td><?php echo("$number"); ?></td>
    </tr>
    <tr>
      <td>Order</td>
      <td><?php echo("$list"); ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo("$total"); ?></td>
    </tr>
    <tr>
      <td colspan="2" class="grey">
        Please wait for conformation of order before payment. (whatsapp or Phone call)
      </td>
    </tr>
    <tr>
      <td colspan="2"><?php
/**
 * @param array $data
 * @param null $passPhrase
 * @return string
 */
function generateSignature($data, $passPhrase = null) {
    // Create parameter string
  $pfOutput = '';
  foreach( $data as $key => $val ) {
    if($val !== '') {
      $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
    }
  }
    // Remove last ampersand
  $getString = substr( $pfOutput, 0, -1 );
  if( $passPhrase !== null ) {
    $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
  }
  return md5( $getString );
}

// Construct variables
$cartTotal = "$amount"; // This amount needs to be sourced from your application
$data = array(
    // Merchant details
  'merchant_id' => '17393408',
  'merchant_key' => 'nn2tkc8asjvsi',
  // 'merchant_id' => '10000100',
  // 'merchant_key' => '46f0cd694581a',
  'return_url' => 'https://kingwebsites.co.za/payfast/return.php',
  'cancel_url' => 'https://kingwebsites.co.za/payfast/cancel.php',
  'notify_url' => 'https://kingwebsites.co.za/payfast/notify.php',
    // Buyer details
  'name_first' => "$first_name",
  'name_last'  => "$last_name",
  'email_address'=> "$email",
  'cell_number'=> "$number",

    // Transaction details
    'm_payment_id' => "$order_id", //Unique payment ID to pass through to notify_url
    'amount' => number_format( sprintf( '%.2f', $cartTotal ), 2, '.', '' ),
    'item_name' => "$item_name",
    'item_description'=> "$item_description",
    'custom_int1' => '2', 
    'custom_int2' => '4',
    'custom_int3' => '6',
    'custom_int4' => '8',
    'custom_int5' => '10',
    'custom_str1' => 'two', 
    'custom_str2' => 'four',
    'custom_str3' => 'six',
    'custom_str4' => 'eight',
    'custom_str5' => 'ten',
    'email_confirmation' => "1", 
    'confirmation_address' => "alecshelembe@gmail.com", 
    'payment_method' => ''
);

$signature = generateSignature($data);
$data['signature'] = $signature;

// If in testing mode make use of either sandbox.payfast.co.za or www.payfast.co.za
$testingMode = true;
$pfHost = $testingMode ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
$htmlForm = '<form action="https://'.$pfHost.'/eng/process" method="post">';
foreach($data as $name=> $value)
{
  $htmlForm .= '<input name="'.$name.'" type="hidden" value=\''.$value.'\' />';
}
$htmlForm .= '<button type="submit" class="btn btn-danger info"> <i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i> Pay Now</button></form>';

echo $htmlForm;

?>
</td>
    </tr>
  </tbody>
</table>
</center>


<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php");