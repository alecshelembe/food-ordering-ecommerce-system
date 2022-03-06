<?php
// Tell PayFast that this page is reachable by triggering a header 200
header( 'HTTP/1.0 200 OK' );
flush();

include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");


define( 'SANDBOX_MODE', true );
$pfHost = SANDBOX_MODE ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
// Posted variables from ITN
$pfData = $_POST;

// Strip any slashes in data
foreach( $pfData as $key => $val ) {
	$pfData[$key] = stripslashes( $val );
}

// Convert posted variables to a string
foreach( $pfData as $key => $val ) {
	if( $key !== 'signature' ) {
		$pfParamString .= $key .'='. urlencode( $val ) .'&';
	} else {
		break;
	}
}

$invoice = $pfData['m_payment_id'];
$name = return_info($conn,'orders','name','id',$invoice);
$email = return_info($conn,'orders','email','id',$invoice);
$number = return_info($conn,'orders','number','id',$invoice);
$address = return_info($conn,'orders','address','id',$invoice);
$address_2 = return_info($conn,'orders','address_2','id',$invoice);
$total = return_info($conn,'orders','total','id',"$invoice");
$name = return_info($conn,'orders','name','id',"$invoice");
$list = return_info($conn,'orders','list','id',"$invoice");
$list = str_replace(": ","<br>","$list");

$amount = "$total";

$pfParamString = substr( $pfParamString, 0, -1 );


function pfValidSignature( $pfData, $pfParamString, $pfPassphrase = null ) {
    // Calculate security signature
	if($pfPassphrase === null) {
		$tempParamString = $pfParamString;
	} else {
		$tempParamString = $pfParamString.'&passphrase='.urlencode( $pfPassphrase );
	}

	$signature = md5( $tempParamString );
	return ( $pfData['signature'] === $signature );
}

function pfValidIP() {
    // Variable initialization
	$validHosts = array(
		'www.payfast.co.za',
		'sandbox.payfast.co.za',
		'w1w.payfast.co.za',
		'w2w.payfast.co.za',
	);

	$validIps = [];

	foreach( $validHosts as $pfHostname ) {
		$ips = gethostbynamel( $pfHostname );

		if( $ips !== false )
			$validIps = array_merge( $validIps, $ips );
	}

    // Remove duplicates
	$validIps = array_unique( $validIps );
	$referrerIp = gethostbyname(parse_url($_SERVER['HTTP_REFERER'])['host']);
	if( in_array( $referrerIp, $validIps, true ) ) {
		return true;
	}
	return false;
}

function pfValidPaymentData( $cartTotal, $pfData ) {
	return !(abs((float)$cartTotal - (float)$pfData['amount_gross']) > 0.01);
}


function pfValidServerConfirmation( $pfParamString, $pfHost = 'sandbox.payfast.co.za', $pfProxy = null ) {
    // Use cURL (if available)
	if( in_array( 'curl', get_loaded_extensions(), true ) ) {
        // Variable initialization
		$url = 'https://'. $pfHost .'/eng/query/validate';

        // Create default cURL object
		$ch = curl_init();

        // Set cURL options - Use curl_setopt for greater PHP compatibility
        // Base settings
        curl_setopt( $ch, CURLOPT_USERAGENT, NULL );  // Set user agent
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );      // Return output as string rather than outputting it
        curl_setopt( $ch, CURLOPT_HEADER, false );             // Don't include header in output
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 2 );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, true );
        
        // Standard settings
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $pfParamString );
        if( !empty( $pfProxy ) )
        	curl_setopt( $ch, CURLOPT_PROXY, $pfProxy );

        // Execute cURL
        $response = curl_exec( $ch );
        curl_close( $ch );
        if ($response === 'VALID') {
        	return true;
        }
    }
    return false;
}

$check1 = pfValidSignature($pfData, $pfParamString);
$check2 = pfValidIP();
$check3 = pfValidPaymentData($amount, $pfData);
$check4 = pfValidServerConfirmation($pfParamString, $pfHost);

if($check1 && $check2 && $check3 && $check4) {

	update_info($conn,$dbname,'orders','payment_status','id','PAID',$invoice);

send_email('delivery@kingwebsites.co.za',"$email","$name",'Confirmation',"Hello $name, We're notifying you that your #$invoice payment was successful. <br><br><a href='https://kingwebsites.co.za/main/order-page.php?invoice=$invoice'>Your Invoice</a>");

send_to_store_email('delivery@kingwebsites.co.za',"admin@kingwebsites.co.za","$name",'Confirmation',"Successful Order 
	<br><br> Payment status: PAID
	<br> Invoice: #$invoice 
	<br> Name: $name 
	<br> Number: $number 
	<br> Total: R $total 
	<br> Address 1: $address
	<br> Address 2: $address_2 
	<br> $list   
	<br><br><a href='https://kingwebsites.co.za/main/order-page.php?invoice=$invoice'> Invoice</a>");

$location = "https://kingwebsites.co.za/main/order-page.php?invoice=$invoice";
		go_to($location);
	
	
    // All checks have passed, the payment is successful
} else {
	update_info($conn,$dbname,'orders','payment_status','id','UNSUCESSFUL',$invoice);

	send_email('delivery@kingwebsites.co.za',"$email","$name",'Confirmation',"Hello $name, We're notifying you that your #$invoice payment was not successful. <br><br><a href='https://kingwebsites.co.za/main/order-page.php?invoice=$invoice'>Your 
		Invoice</a>");

	$location = "https://kingwebsites.co.za/main/order-page.php?invoice=$invoice";
		go_to($location);

	update_info($conn,$dbname,'orders','notice','id',"$check1 && $check2 && $check3 && $check4",$invoice);
	// echo "<h2 style='color:red;'>Payment unsuccessful</h2>";
}
stop();