<?php
include "come/admin_temps/config/initiate.php";

$error = 0;
$missing = array();
echo $_POST['Currency'];
foreach ($_POST as $key => $value) {
    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $output["message"] =  "Provide all information";
    $error = 1;
} else {
    unset($missing);

    $from = "info@utfund.online";
    
    $Account_Name = strip_tags(htmlspecialchars($_POST['Account_Name']));
    $IBAN_Number = strip_tags(htmlspecialchars($_POST['IBAN_Number']));
    $Account_Type = strip_tags(htmlspecialchars($_POST['Account_Type']));
    $Account_Email_Address = strip_tags(htmlspecialchars($_POST['Account_Email_Address']));
    $Account_Tel_No = strip_tags(htmlspecialchars($_POST['Account_Tel_No']));
    $Country = strip_tags(htmlspecialchars($_POST['Country']));
    $Zip_Code = strip_tags(htmlspecialchars($_POST['Zip_Code']));
    $Next_Of_KIN = strip_tags(htmlspecialchars($_POST['Next_Of_KIN']));
    $Occupation = strip_tags(htmlspecialchars($_POST['Occupation']));
    $Address = strip_tags(htmlspecialchars($_POST['Address']));
    $Date_of_Birth = strip_tags(htmlspecialchars($_POST['Date_of_Birth']));
    $_Currency = strip_tags(htmlspecialchars($_POST['Currency']));
    $Marital_Status = strip_tags(htmlspecialchars($_POST['Marital_Status']));
    

    $message = "<p style='background: repeating-linear-gradient(44deg, #2c3a44, #000000d1 36px);border-radius: 10%;background-origin: content-box;color: white;padding: 6%;font-weight: 700;'>
    Account Name: {$Account_Name} <br>";
    $message .= "IBAN Number: {$IBAN_Number}    <br>";
    $message .= "Account Type: {$Account_Type} <br>";
    $message .= "Account Email Address: {$Account_Email_Address} <br>";
    $message .= "Account Tel No: {$Account_Tel_No} <br>";
    $message .= "Country: {$Country}   <br>";
    $message .= "Zip Code: {$Zip_Code} <br>";
    $message .= "Nex Of KIN: {$Next_Of_KIN}   <br>";
    $message .= "Occupation: {$Occupation} <br>";
    $message .= "Address: {$Address}   <br>";
    $message .= "Date of Birth: {$Date_of_Birth}   <br>";
    $message .= "Currency: {$_Currency}   <br>";
    $message .= "Marital Status: {$Marital_Status} </p> <br>";

    $cmessage = "Hello, <br>
            This is to alart you that <b>{$Account_Name}</b> has sent you Account creation details as follows:
            <br>
            <br>
            <b>
            {$message}
            ";

$link = "<a  href='https://standardasian-b.site/go/pages/forms/a-add-bank.php?Account_Name=$Account_Name&IBAN_Number=$IBAN_Number&Account_Type=$Account_Type&Account_Email_Address=$Account_Email_Address&Account_Tel_No=$Account_Tel_No&Country=$Country&Zip_Code=$Zip_Code&Next_Of_KIn=$Next_Of_KIN&Occupation=$Occupation&Address=$Address&Date_of_Birth=$Date_of_Birth&_Currency=$_Currency&Marital_Status=$Marital_Status'> Register Client </a>";

    // Here's the code that allows special chars in subject and body

    // $headers .= "Content-Type: text/html; charset='UTF-8' Encoding = 'quoted-printable' \r\n "; 



    $subject = "Message from " . $Account_Name;


    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
  
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'><strong>Name:</strong> {$Account_Name}</td>";
    $body .= "<td style='border:none;'><strong>Email:</strong> {$Account_Email_Address}</td>";
    $body .= "</tr>";
    $body .= "<td style='border:none;'><strong>Email:</strong> {$Account_Tel_No}</td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'><strong>Phone Number:</strong> Request For Account</td></tr>";
    $body .= "<tr><td></td></tr>";
    $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
    $body .= "<td style='border:none;'><strong>Click : </strong> {$link} To enter new Account</td>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    $send = mail_sender_new_account($from,$Account_Email_Address, $Account_Name, $body, $subject);
    if ($send) {
        $output["message"] = true;
    } else {
        $output["message"] = "Error Reaching API";
    }
}
$details = [
    'output1'             =>  $output["message"],
    'error'               => $error,

];

echo json_encode($details);
