<?php
include "come/admin_temps/config/initiate.php";

$error = 0;
$missing = array();
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

    $to = "info@silveringb.online";
    $name   = $_REQUEST['First_Name'];
    $lname = $_REQUEST['Last_Name'];
    $phone   = $_REQUEST['Phone'];
    $email   = $_REQUEST['Email'];
    $message   = $_REQUEST['Message'];
  

    $name = $name."  ".$lname;
    $cmessage = "Dear Sir, <br>
            This is to alart you that <b>$name</b> has sent you message as follows
            <br>
            <br>
            <b>
            {$message}
            ";



    // Here's the code that allows special chars in subject and body
    // $headers .= "Content-Type: text/html; charset='UTF-8' Encoding = 'quoted-printable' \r\n ";



    $subject = "New Message";


    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
    $body .= "<td style='border:none;'><strong>Email:</strong> {$email}</td>";
    $body .= "</tr>";
    $body .= "<td style='border:none;'><strong>Phone Number::</strong> {$phone}</td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'><strong></strong></td></tr>";
    $body .= "<tr><td></td></tr>";
    $body .= "<tr><td colspan='2' style='background-color: #065384;color: white;padding: 6%;font-weight: 700;'>{$cmessage}</td></tr>";
    
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    $send = mail_sender($to, $name, $body, $subject);
    if ($send) {
        $output["message"] = true;
    } else {
        $output["message"] = "Error Reaching API";
        $error = 1;
    }
}
$details = [
    'output1'             =>  $output["message"],
    'error'               => $error,
];

echo json_encode($details);
