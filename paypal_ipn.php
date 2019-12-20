<?php
namespace Listener;
session_start();
error_reporting(E_ALL);

include('includes/config.php');
//include PayPal IPN Class file (https://github.com/paypal/ipn-code-samples/blob/master/php/PaypalIPN.php)
require('PaypalIPN.php');

//include configuration file
use PaypalIPN;
$ipn = new PaypalIPN();
if (true) {$ipn->useSandbox();}
$verified = true;

$ipn->verifyIPN();

//reading $_POST data from PayPal
$data_text = "";
foreach ($_POST as $key => $value) {
$data_text .= $key . " = " . $value . "\r\n";
}

$receiver_email_found = true;
// Checking if price was changed during payment.
// Get product price from database and compare with posted price from PayPal
$correct_price_found = false;

if (strtolower($_POST["receiver_email"]) == "sb-ifpvy601094@business.example.com") {
    $checking = $_POST['item_name'];
    if($checking == "forCart"){
        $paypal_ipn_status = "PAYMENT VERIFICATION FAILED";
        if ($verified) {
        $paypal_ipn_status = "Email address or price mismatch";
        if ($receiver_email_found || $correct_price_found) {
        $paypal_ipn_status = "Payment has been verified";

        $customer_pid = $_POST['item_number'];
        $payment_amount = $_POST['mc_gross'];
        $unitPrice = $_POST['mc_gross']/$_POST['quantity'];
        $status = 1;
        $customerAddress = $_POST['address_city'];
        $buyByName = "";
        $phoneNumber = 0;
        $quantity = $_POST['quantity'];
        $farmerID = "";

        $date=date_create();
        date_add($date,date_interval_create_from_date_string("3 days"));
        $shipmentDate = date_format($date,"Y/m/d");
        $paymentID = 0;
        
        $sql ="INSERT into payment (customerID,totalPrice,customerAddress,status,shipmentDate) values 
        ('$customer_pid','$payment_amount','$customerAddress',1,'$shipmentDate')";

        $query = $dbh->prepare($sql);
        $query -> execute();

        if(strpos($customer_pid,'F')!==false){
           echo $sql = "SELECT FullName,phoneNumber from farmer where pid='$customer_pid'";
        }
        else{
            $sql = "SELECT FullName,phoneNumber from customer where pid = '$customer_pid'";
        }
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        foreach($results as $result){
            $buyByName = $result['FullName'];
            $phoneNumber = $result['phoneNumber'];
        }

        $sql = "SELECT id from payment ORDER BY id DESC LIMIT 1";
        $query = $dbh->prepare($sql);
        $query -> execute();
        $results= $query->fetchAll();
        foreach($results as $result){
            $paymentID = $result['id'];
        }

    
        $sql = "SELECT farmerID,id,productID from cart where customerID='$customer_pid'";
        $query = $dbh->prepare($sql);
        $query -> execute();
        $results = $query->fetchAll();
        foreach($results as $result){
            $farmerID= $result ['farmerID'];
           $productID =$result['productID'];
           

            $sql1="INSERT into orderdetails(customerID,farmerID,productID,buyByName,quantity,unitPrice,status,paymentID,
            shipmentDate,phoneNumber,customerAddress) values
            ('$customer_pid','$farmerID','$productID','$buyByName','$quantity','$unitPrice',1,'$paymentID',
            '$shipmentDate','$phoneNumber','$customerAddress')";
            $query1 = $dbh->prepare($sql1);
            $query1 -> execute();
        }

        $sql = "DELETE from cart where customerID='$customer_pid'";
        $query = $dbh->prepare($sql);
        $query->execute();
        
        

    }}}
    else{
        $itemsid = $_SESSION['productIDs'];
        //Checking Payment Verification
        $paypal_ipn_status = "PAYMENT VERIFICATION FAILED";
        if ($verified) {
        $paypal_ipn_status = "Email address or price mismatch";
        if ($receiver_email_found || $correct_price_found) {
        $paypal_ipn_status = "Payment has been verified";
        
        // Check if payment has been completed and insert payment data to database
        // if ($_POST["payment_status"] == "Completed") {
        // uncomment upper line to exit sandbox mode
        
        echo $customer_pid = $_POST['item_name'];
        echo $payment_amount = $_POST['mc_gross'];
        $status = 1;
        $customerAddress = "";
        if(strpos($customer_pid,'F')!==false){
            $sql = "SELECT address from farmer where pid='$customer_pid";
        }
        else{
            $sql = "SELECT address from customer where pid = '$customer_pid'";
        }
        
        $query = $dbh->prepare($sql);
        $query -> execute();
        $result = $query->fetchAll();
        foreach($result as $results){
            $customerAddress =$results['address'];
        }

        $sql3 = "SELECT id from payment ORDER BY id DESC LIMIT 1";
        $query3 = $dbh->prepare($sql3);
        $query3 -> execute();
        $results3= $query3->fetchAll();
        foreach($results3 as $result){
            $paymentID = $result['id'];
        }
        
                $date=date_create();
                date_add($date,date_interval_create_from_date_string("3 days"));
                 $shipmentDate = date_format($date,"Y/m/d");
        echo  $sql = "INSERT INTO payment (customerID, totalPrice, customerAddress, status,paymentID,shipmentDate) VALUES ('$customer_pid', '$payment_amount' ,'$customerAddress', 1,'$paymentID','$shipmentDate')"    ;
        // Insert payment data to database
        if ( $insert_stmt = $dbh->prepare($sql)) {
        
        if (! $insert_stmt->execute()) {
        $paypal_ipn_status = "Payment has been completed but not stored into database";
        }
        $paypal_ipn_status = "Payment has been completed and stored to database";
        }
        // }
        // uncomment upper line to exit sandbox mode
        }
        } else {
        $paypal_ipn_status = "Payment verification failed";
        }
    }
  
}else{
//Checking Payment Verification
$paypal_ipn_status = "PAYMENT VERIFICATION FAILED";
if ($verified) {
$paypal_ipn_status = "Email address or price mismatch";
if ($receiver_email_found || $correct_price_found) {
$paypal_ipn_status = "Payment has been verified";

// Check if payment has been completed and insert payment data to database
// if ($_POST["payment_status"] == "Completed") {
// uncomment upper line to exit sandbox mode

echo $orderID = $_POST['item_number'];
echo "|";
echo $payment_amount = $_POST['mc_gross'];
echo "|";
echo $_POST['receiver_email'];
echo "|";
echo $farmerID=$_POST['item_name'];
 echo $sql = "UPDATE orderdetails set status=4 where id='$orderID'";
// Insert payment data to database
if ( $insert_stmt = $dbh->prepare($sql)) {
if (! $insert_stmt->execute()) {
$paypal_ipn_status = "Payment has been completed but not stored into database";
}
$paypal_ipn_status = "Payment has been completed and stored to database";
}
// }
// uncomment upper line to exit sandbox mode
}
} else {
$paypal_ipn_status = "Payment verification failed";
}
}


?>