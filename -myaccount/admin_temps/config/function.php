<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'sms.php';


function first($Account_Email_Address,$Account_Name)
{
    $csubject = "Complements !!!";
   $from = "support@intl.silveringb.online";
    $cmessage = "Hello there, Please find the Main Email body";

       //   var_dump($resp);
      //   die();
      
     $subject = $csubject;
      $body = $cmessage;
       
      
      try{ $mail = new PHPMailer(true);
      $mail-> isMail();
      //How long to wait for commands to complete, in seconds.
      
      // Set time out to any value
      $mail->Timeout       =   20000;
      //Set the encryption system to use - ssl (deprecated) or tls
      $mail->SMTPSecure = 'tls';
      // Here's the code that allows special chars in subject and body
      $mail->CharSet  = 'UTF-8';
      $mail->Encoding = 'quoted-printable';
      $mail->SMTPDebug = false;
      $mail->Host = 'smtp.hostinger.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->Username ="$from";
      $mail->Password = '@Intsil52023';
      $mail->Subject="$subject";
      $mail->Body = $body;
      $mail->setFrom("$from", "Intl silveringb ");
      
      //Replace the plain text body with one created manually
      $mail->AltBody = 'You email engiene do not support the email activation we sent to you.\n\n Do ensure you rech us at our head quarters';
      
      //Set an alternative reply-to address
      $mail->addReplyTo($Account_Email_Address, $Account_Name);
      //Set who the message is to be sent to
      $mail->addAddress($Account_Email_Address, $Account_Name);
      $mail->isHTML(true);
    //   $mail->addEmbeddedImage('images/image-1.png', 'images');

      $mail->send();
   
       $res="Email Sent Successfully";
       $message =[1, 1];
      }catch(Exception $e){
          
          $message = [2,1];
      }
      
    //   echo $res;
          $res="Mail Sent Error: $mail->ErrorInfo";
    //   die();
      
      return $res;  
    
}


function send_email_int($Bal_total, $_Amount, $Account_Email_Address, $_User_Account_Name, $Ben_Accno, $Ben_Bank, $Ben_Accname, $User_Tel_number, $db_Curr, $More_info, $type)
{
    // die($Account_Email_Address);

    // return;

    $from = "support@intl.silveringb.online";
    $name = $_User_Account_Name;
    $_Currency = $db_Curr;
    if ($type === "d") {
        $title = 'Debit';
        $csubject = "Debit Alert";
        $to = $Account_Email_Address;
        $cmessage = "
        <!DOCTYPE HTML PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
        <head>
        <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
          <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <meta name='x-apple-disable-message-reformatting'>
          <!--[if !mso]><!--><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]-->
          <title></title>
          
            <style type='text/css'>
              @media only screen and (min-width: 520px) {
          .u-row {
            width: 500px !important;
          }
          .u-row .u-col {
            vertical-align: top;
          }
        
          .u-row .u-col-33p13 {
            width: 165.65px !important;
          }
        
          .u-row .u-col-33p33 {
            width: 166.65px !important;
          }
        
          .u-row .u-col-66p67 {
            width: 333.35px !important;
          }
        
          .u-row .u-col-66p87 {
            width: 334.35px !important;
          }
        
          .u-row .u-col-100 {
            width: 500px !important;
          }
        
        }
        
        @media (max-width: 520px) {
          .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
          }
          .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
          }
          .u-row {
            width: 100% !important;
          }
          .u-col {
            width: 100% !important;
          }
          .u-col > div {
            margin: 0 auto;
          }
        }
        body {
          margin: 0;
          padding: 0;
        }
        
        table,
        tr,
        td {
          vertical-align: top;
          border-collapse: collapse;
        }
        
        p {
          margin: 0;
        }
        
        .ie-container table,
        .mso-container table {
          table-layout: fixed;
        }
        
        * {
          line-height: inherit;
        }
        
        a[x-apple-data-detectors='true'] {
          color: inherit !important;
          text-decoration: none !important;
        }
        
        table, td { color: #000000; } #u_body a { color: #0000ee; text-decoration: underline; }
            </style>
          
          
        
        <!--[if !mso]><!--><link href='https://fonts.googleapis.com/css2?family=Arvo&display=swap' rel='stylesheet' type='text/css'><!--<![endif]-->
        
        </head>
        
        <body class='clean-body u_body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: transparent;color: #000000'>
          <!--[if IE]><div class='ie-container'><![endif]-->
          <!--[if mso]><div class='mso-container'><![endif]-->
          <table id='u_body' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: transparent;width:100%' cellpadding='0' cellspacing='0'>
          <tbody>
          <tr style='vertical-align: top'>
            <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
            <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color: transparent;'><![endif]-->
            
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='500' style='background-color: #fcf9f9;width: 500px;padding: 0px;border-top: 0px dashed transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #fcf9f9;height: 100%;width: 100% !important;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px dashed transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
          <tr>
            <td style='padding-right: 0px;padding-left: 0px;' align='center'>
              
              <img align='center' border='0' src='cid:images' alt='' title='' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 121px;' width='121'/>
              
            </td>
          </tr>
        </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='500' style='background-color: #34495e;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #34495e;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h1 style='margin: 0px; color: #ffffff; line-height: 60%; text-align: center; word-wrap: break-word; font-family: arial black,AvenirNext-Heavy,avant garde,arial; font-size: 26px; font-weight: 700;'>Intl silveringb</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 16px; font-weight: 400;'>A  Smart Way to Bk</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='500' style='background-color: #ffffff;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h1 style='margin: 0px; color: #000000; line-height: 130%; text-align: center; word-wrap: break-word; font-family: arial black,AvenirNext-Heavy,avant garde,arial; font-size: 15px; font-weight: 700;'>Notification Alert</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #2e2b29; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 16px; font-weight: 700;'>Hello $_User_Account_Name, Your Account has be {$title}ed.</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <div style='font-size: 14px; line-height: 140%; text-align: center; word-wrap: break-word;'>
            <p style='line-height: 140%;'><strong>Details below</strong></p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <table height='0px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
            <tbody>
              <tr style='vertical-align: top'>
                <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                  <span>&#160;</span>
                </td>
              </tr>
            </tbody>
          </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='165' style='background-color: #ffffff;width: 165px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-33p13' style='max-width: 320px;min-width: 165.65px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #2e2b29; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 15px; font-weight: 400;'>Current Balance:</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align='center' width='334' style='background-color: #ced4d9;width: 334px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-66p87' style='max-width: 320px;min-width: 334.35px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ced4d9;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h1 style='margin: 0px; color: #000000; line-height: 130%; text-align: center; word-wrap: break-word; font-family: arial black,AvenirNext-Heavy,avant garde,arial; font-size: 15px; font-weight: 700;'>{$Bal_total} {$db_Curr}</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <table height='0px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
            <tbody>
              <tr style='vertical-align: top'>
                <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                  <span>&#160;</span>
                </td>
              </tr>
            </tbody>
          </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='166' style='background-color: #ffffff;width: 166px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-33p33' style='max-width: 320px;min-width: 166.67px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #2e2b29; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 16px; font-weight: 400;'>To :</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align='center' width='333' style='background-color: #ced4d9;width: 333px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-66p67' style='max-width: 320px;min-width: 333.33px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ced4d9;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h1 style='margin: 0px; color: #000000; line-height: 130%; text-align: center; word-wrap: break-word; font-family: arial black,AvenirNext-Heavy,avant garde,arial; font-size: 15px; font-weight: 700;'>$Ben_Accname</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='166' style='background-color: #ffffff;width: 166px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-33p33' style='max-width: 320px;min-width: 166.67px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #2e2b29; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 16px; font-weight: 400;'>Bk:</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align='center' width='333' style='background-color: #ced4d9;width: 333px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-66p67' style='max-width: 320px;min-width: 333.33px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ced4d9;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h1 style='margin: 0px; color: #000000; line-height: 130%; text-align: center; word-wrap: break-word; font-family: arial black,AvenirNext-Heavy,avant garde,arial; font-size: 15px; font-weight: 700;'>$Ben_Bank</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='166' style='background-color: #ffffff;width: 166px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-33p33' style='max-width: 320px;min-width: 166.65px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #2e2b29; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 15px; font-weight: 400;'>Account No:</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align='center' width='333' style='background-color: #ced4d9;width: 333px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-66p67' style='max-width: 320px;min-width: 333.35px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ced4d9;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h1 style='margin: 0px; color: #000000; line-height: 130%; text-align: center; word-wrap: break-word; font-family: arial black,AvenirNext-Heavy,avant garde,arial; font-size: 15px; font-weight: 700;'>$Ben_Accno</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='165' style='background-color: #ffffff;width: 165px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-33p13' style='max-width: 320px;min-width: 165.65px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #2e2b29; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 14px; font-weight: 400;'>Amount:</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align='center' width='334' style='background-color: #ced4d9;width: 334px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-66p87' style='max-width: 320px;min-width: 334.35px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ced4d9;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h1 style='margin: 0px; color: #000000; line-height: 130%; text-align: center; word-wrap: break-word; font-family: arial black,AvenirNext-Heavy,avant garde,arial; font-size: 15px; font-weight: 700;'>$_Currency $_Amount</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='165' style='background-color: #ffffff;width: 165px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-33p13' style='max-width: 320px;min-width: 165.65px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #2e2b29; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 14px; font-weight: 400;'>Narration:</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
        <!--[if (mso)|(IE)]><td align='center' width='334' style='background-color: #ced4d9;width: 334px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-66p87' style='max-width: 320px;min-width: 334.35px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ced4d9;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h1 style='margin: 0px; color: #000000; line-height: 130%; text-align: center; word-wrap: break-word; font-family: arial black,AvenirNext-Heavy,avant garde,arial; font-size: 15px; font-weight: 700;'>$More_info</h1>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='500' style='background-color: #ffffff;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <table height='0px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
            <tbody>
              <tr style='vertical-align: top'>
                <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                  <span>&#160;</span>
                </td>
              </tr>
            </tbody>
          </table>
        
              </td>
            </tr>
          </tbody>
        </table>
        
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <div style='font-family: Arvo; font-size: 14px; font-weight: 700; line-height: 140%; text-align: justify; word-wrap: break-word;'>
            <p style='line-height: 140%;'>This text is a warning not to share confidential information with anyone outside of the intended recipient.</p>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='500' style='background-color: #34495e;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #34495e;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <h4 style='margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-family: courier new,courier; font-size: 16px; font-weight: 400;'>For the management</h4>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
        
        <div class='u-row-container' style='padding: 0px;background-color: transparent'>
          <div class='u-row' style='Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'>
            <div style='border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;'>
              <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding: 0px;background-color: transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px;'><tr style='background-color: transparent;'><![endif]-->
              
        <!--[if (mso)|(IE)]><td align='center' width='500' style='background-color: #ffffff;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;' valign='top'><![endif]-->
        <div class='u-col u-col-100' style='max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;'>
          <div style='background-color: #ffffff;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'>
          <!--[if (!mso)&(!IE)]><!--><div style='box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;'><!--<![endif]-->
          
        <table style='font-family:arial,helvetica,sans-serif;' role='presentation' cellpadding='0' cellspacing='0' width='100%' border='0'>
          <tbody>
            <tr>
              <td style='overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;' align='left'>
                
          <div>
            <strong>Have a question? <a rel='noopener' href='mailto:support@intl.silveringb.online?subject=Have%20a%20question&body=Have%20a%20question' target='_blank'>support@intl.silveringb.online</a></strong>
          </div>
        
              </td>
            </tr>
          </tbody>
        </table>
        
          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
        </div>
        <!--[if (mso)|(IE)]></td><![endif]-->
              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        
        
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            </td>
          </tr>
          </tbody>
          </table>
          <!--[if mso]></div><![endif]-->
          <!--[if IE]></div><![endif]-->
        </body>
        
        </html>
         ";
    }

   $rst =  sms($Bal_total, $_Amount, $_User_Account_Name,$User_Tel_number, $Ben_Accno,$Ben_Accname,$db_Curr,$type);
    
    $subject = $csubject;
    $body = $cmessage;


    try {
        $mail = new PHPMailer(true);
        $mail->isMail();
        //How long to wait for commands to complete, in seconds.
        // Set time out to any value
        $mail->Timeout       =   20000;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        // Here's the code that allows special chars in subject and body
        $mail->CharSet  = 'UTF-8';
        $mail->Encoding = 'quoted-printable';
        $mail->SMTPDebug = false;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = '@Intsil52023';
        $mail->Subject = "$subject";
        $mail->Body = $body;

        //Replace the plain text body with one created manually
        $mail->AltBody = 'You email engiene do not support the email activation we sent to you.\n\n Do ensure you rech us at our head quarters';

        //Set who the message is to be sent from   
        $mail->setFrom($from, " Intl silveringb");

        //Set an alternative reply-to address
        $mail->addReplyTo($to, $name);

        //Set who the message is to be sent to
        $mail->addAddress($to, $name);

        $mail->isHTML(true);
        $mail->addEmbeddedImage('images/image-1.png', 'images');
        $mail->send();

        $res = "Email Sent Successfully";
        $message = [1, $rst];
    } catch (Exception $e) {

        $res = "Mail Sent Error: $mail->ErrorInfo";
        $message = [2, $rst];
    }

    // echo $res;
    // die();

    return $message;
}



global $connect;

$connect = new mysqli("localhost", "u846125412_Siln","#Sil124823", "u846125412_Sil");

function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);

        foreach ($objects as $object) {

            if ($object != "." && $object != "..") {

                if ($object) {
                    //                    echo 3;
                    //                    echo "deleted  -" . $object . '<br>';
                    unlink($dir . "/" . $object);
                }
            }
        }
    }
    reset($objects);
    // rmdir($dir);
}

function symbolToName($symbol)
{
    $curr = "";
    switch ($symbol) {
        case '$':
            $curr =  "USD";
            break;
        case 'C¥':
            $curr =  "CNY";
            break;
        case 'J¥':
            $curr =  "JPY";
            break;
        case '€':
            $curr =  "EUR";
            break;
        case '£':
            $curr =  "GBP";
            break;
        case 'AUD$':
            $curr =  "AUD";
            break;
        case '₣':
            $curr =  "CHF";
            break;
        case '₩':
            $curr =  "KRW";
            break;
        case 'R$':
            $curr =  "BRL";
            break;
        case 'Kč':
            $curr =  "CZK";
            break;
        case '₡':
            $curr =  "CRC";
            break;
        case 'ლ':
            $curr =  "GEL";
            break;
        case 'RP':
            $curr =  "IDR";
            break;
        case '₪':
            $curr =  "ILR";
            break;
        case '₴':
            $curr =  "UAH";
            break;
        case 'ރ.':
            $curr =  "NGN";
            break;
        case '฿':
            $curr =  "BAHT";
            break;
        case '₱':
            $curr =  "PESO";
            break;
        case '₫':
            $curr =  "VND";
            break;
        case 'Mex$':
            $curr =  "MXN";
            break;
        case '₽':
            $curr =  "RUB";
            break;
        default:
            break;
    }
    return $curr;
}
function nameToSymbol($name)
{
    $curr = "";
    switch ($name) {
        case 'USD':
            $curr =  "$";
            break;
        case 'CNY':
            $curr =  "C¥";
            break;
        case 'JPY':
            $curr =  "J¥";
            break;
        case 'EUR':
            $curr =  "€";
            break;
        case 'GBP':
            $curr =  "£";
            break;
        case 'AUD':
            $curr =  "AUD$";
            break;
        case 'CHF':
            $curr =  "₣";
            break;
        case 'KRW':
            $curr =  "₩";
            break;
        case 'BRL':
            $curr =  "R$";
            break;
        case 'CZK':
            $curr =  "Kč";
            break;
        case 'CRC':
            $curr =  "₡";
            break;
        case 'GEL':
            $curr =  "ლ";
            break;
        case 'IDR':
            $curr =  "RP";
            break;
        case 'ILR':
            $curr =  "₪";
            break;
        case 'UAH':
            $curr =  "₴";
            break;
        case 'VND':
            $curr =  "₫";
            break;
        case 'NGN':
            $curr =  "ރ.";
            break;
        case 'PESO':
            $curr =  "₱";
            break;
        case 'BAHT':
            $curr =  "฿";
            break;
        case 'MXN':
            $curr =  "Mex$";
            break;
        case 'RUB':
            $curr =  "₽";
            break;
        default:
            break;
    }
    return $curr;
}


function register_user($register_data)
{
    $_SESSION['message'] = '';
    $message = '';
    array_walk($register_data, 'array_sanitize');

    $passsha = $register_data['password'];

    $register_data['password'] =  passCrypt($register_data['password']);
    //the first two `` or \\  closses the array implode prefix ande the array sufix takes the last two but any other array that appeare at the middle share the last ' or \ by the left from the first two `` or \\ earlier and the first ` or \ by the right.

    foreach ($register_data as $field => $data) {

        $update[] = '`' . $field . '` = \'' . $data . '\'';
        // print_r($update);
    }





    if ($sql = config()->query("UPDATE `admin` SET " . implode(',', $update) . " WHERE `id`= '" . $_SESSION['user_id'] . "'")) {

        $message .= "1";

        $_SESSION['message'] = $message;
    } else {

        $message .= "Sorry we are experienced errors/b>";

        $_SESSION['message'] = $message;
    }


    return $_SESSION['message'];
}
function auditor_protect()
{
    global $user_data;

    if (access($user_data['id'], 4) === false) {

        echo 'Ooops!! you are not a an Auditor';
    }

    // or you just call $user_data['user'] directly
    /*if ($user_data['users'] == 0){
        echo 'you are not a an admin';
    }*/
}
function array_sanitize($array, $connect)
{
    echo  $connect . "999";
    die();

    $array = trim($array);
    $array = htmlentities(strip_tags(mysqli_real_escape_string($connect, $array)));
}
function sanitize($data)
{
    $data = trim($data);
    return  htmlentities(strip_tags(mysqli_real_escape_string(config(), $data)));
}
function ips()
{
    @$http_c = $_SERVER['HTTP_CLIENT_IP'];
    @$http_x = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote_addr = $_SERVER['REMOTE_ADDR'];
    if (!empty($http_c)) {

        $ip_address = $http_c;
    } elseif (!empty($http_x)) {
        $ip_address = $http_x;
    } else {
        $ip_address = $remote_addr;
    }
    return $ip_address;
}

function output($errors)
{

    /**foreach( $errors as $feedback){
        
  $output[] ='<li>'.$feedback.'</li>';
        
  }
     **/

    return "<ul style='margin:5px;list-style:none;padding:2px;'><li>" . implode('<li></li>', $errors) . "</li></ul>";
}

function output_res($errors)
{

    /**foreach( $errors as $feedback){
        
  $output[] ='<li>'.$feedback.'</li>';
        
  }
     **/

    return implode(',', $errors);
}
function protected_page()
{
    //if the user is not logged in yet
    if (logged_in() === false) {
        header('Location:../index.php');
    }
}
function protected_inner_page()
{
    //if the user is not logged in yet
    if (logged_in() === false) {
        header('Location:connector/Lhome.php?login');
        exit();
    }
}
function activate_your_account()
{
    session_start();
    session_destroy();
    header('Location:../connector/Lactivate.php?unactivate');
}
function logged_in_redirect()
{
    // restrict the user from registering if he alredy logged in 
    if (logged_in() === true) {
        header('Location:../index.php');
    }
}
/*.............................................................*/

function config()
{

    global $con;
    $con = new mysqli("localhost", "u846125412_Siln","#Sil124823", "u846125412_Sil");
    //return simply means pass any outpout in the you expect to use to process anohter out side 

    return $con;
}
function check_pass($password, $dbpas)
{
    if (Crypt($password, $dbpas) == $dbpas) {
        return true;
    } else {
        return false;
    }
}
function check_pass_in($password, $dbpas)
{
    if (Crypt($password, $dbpas) != $dbpas) {
        return false;
    } else {
        return true;
    }
}
function if_active($email, $email_code)
{
    $email = sanitize($email);
    $email_code = sanitize($email_code);


    $sql = config()->query("SELECT * FROM `users` WHERE email='$email'AND email_code='$email_code' AND active = 1 ");
    $count = $sql->num_rows;

    return ($count == 0) ? false : true;
}
function activate($email, $email_code)
{
    $email = sanitize($email);
    $email_code = sanitize($email_code);


    $sql = config()->query("SELECT * FROM `users` WHERE email='$email'AND email_code='$email_code' AND active = 0 ");
    $count = $sql->num_rows;
    if ($count != 0) {

        config()->query("UPDATE `users` SET `active` = 1 WHERE `email` = '$email'");

        return true;
    } else {

        return false;
    }
}
function email_exists($email, $username)
{

    $username = sanitize($username);


    $iquery = config()->query("select id from  admin where email = '$email' and username='$username' ");

    $count = $iquery->num_rows;

    return ($count == 0) ? false : true;
}
function valid_email($username)
{

    $username = sanitize($username);

    return (filter_var($username, FILTER_VALIDATE_EMAIL) == false) ? true : false;
}
function password_match($username, $username1)
{
    $username = sanitize($username);
    $username1 = sanitize($username1);
    $username = trim($username);
    $username1 = trim($username1);
    return (($username == $username1) == true) ? true : false;
}
function space_checker($username)
{
    $data = sanitize($username);
    $data = preg_match("/\\s/", $data);
    return ($data == true) ? true : false;
}
function strlenght($username)
{
    $data = sanitize($username);
    $data = strlen($data);
    return ($data < 3) ? true : false;
}
function user_count()
{


    $iquery = config()->query("select id from  users where active = 1  ");

    $count = $iquery->num_rows;

    return $count;
}
function logout()
{
    session_start();

    if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) && isset($_COOKIE["email"])) {
        setcookie("user", '', strtotime('-5 days'), '/');
        setcookie("pass", '', strtotime('-5 days'), '/');
        setcookie("email", '', strtotime('-5 days'), '/');
    }

    session_destroy();

    header('Location:index.php');
}
function logged_in()
{
    if (isset($_SESSION["user_id"]) == true) {
        return (isset($_SESSION['user_id'])) ? true : false;
    } else if (isset($_SESSION["user_id"]) == false) {

        if (isset($_COOKIE["user"]) && isset($_COOKIE["email"]) && isset($_COOKIE["pass"])) {

            $username = sanitize($_COOKIE['user']);
            $password = sanitize($_COOKIE['pass']);
            $email    = sanitize($_COOKIE['email']);

            $username = sanitize($username);


            $lquery = config()->query("select * from users where username='$username' AND email= '$email' ");
            //print_r($lquery);
            $num = $lquery->num_rows;
            //fetch_all for table display 
            if (!($num == 0)) {


                while ($rows = $lquery->fetch_assoc()) {
                    $dbid = $rows['id'];
                    $dbuser = $rows['username'];
                    $dbpas = $rows['password'];
                    $dbemail = $rows['email'];

                    if (crypt($password, $dbpas) == $dbpas) {

                        $_SESSION['user_id'] =  $dbid;

                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
function user_exists($username)
{

    $username = sanitize($username);



    $iquery = config()->query("select id from  admin where username = '$username' ");

    $count = $iquery->num_rows;

    return ($count == 0) ? false : true;
}
function sha()
{
    $sha = substr(md5(ips() * time() / time() . microtime() . rand($_SERVER['REMOTE_ADDR'] * $_SERVER['SCRIPT_NAME'] / time() * time() - $_SERVER['SCRIPT_NAME'] + time() * time() * $_SERVER['SCRIPT_NAME'] * $_SERVER['REMOTE_ADDR'], 100000)), 10, 8);
    return  $sha;
}
function name_exists($name)
{

    $name = sanitize($name);



    $iquery = config()->query("select id from  admin where name = '$name' ");

    $count = $iquery->num_rows;

    return ($count == 0) ? false : true;
}
function user_active($username)
{

    $username = sanitize($username);



    $iquery = config()->query("select * from  users where username = '$username' AND active = 1 ");

    $count = $iquery->num_rows;


    return ($count == 0) ? false : true;
}
function passCrypt($inpt, $round = 9)
{
    $salt = "";
    $saltChars =  array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
    for ($i = 0; $i < 22; $i++) {;
        $salt .= $saltChars[array_rand($saltChars)];
    }
    return crypt($inpt,  sprintf('$2y$%02d$', $round) . $salt);
}
function login($username, $password, $email)
{

    $username = sanitize($username);


    $lquery = config()->query("select * from admin where username='$username' AND email= '$email' ");
    //print_r($lquery);
    $num = $lquery->num_rows;
    //fetch_all for table display 
    if (!($num == 0)) {


        while ($rows = $lquery->fetch_assoc()) {

            $dbid = $rows['id'];
            $dbuser = $rows['username'];
            $dbpas = $rows['password'];
            $dbemail = $rows['email'];

            if (crypt($password, $dbpas) == $dbpas) {
                $_SESSION['user_id'] = $dbid;
                return true;
            } else {
                return false;
            }
        }
    } else {
        return false;
    }
}
function user_data($user_id)
{


    $data = array();
    $user_id = (int)$user_id;

    //number of arguments 
    $func_num_args = func_num_args();
    //get number of arguments
    $func_get_args = func_get_args();

    if ($func_get_args > 1) {
        unset($func_get_args[0]);
        $fields = '`' . implode('`,`', $func_get_args) . '`';

        $rquery = config()->query("select $fields from `users` where `id` = $user_id");

        while ($rows = $rquery->fetch_assoc()) {

            $data = $rows;
        }
        return $data;
    }
}


function check_user($username, $email)
{

    $username = sanitize($username);


    $lquery = config()->query("select * from users where username='$username' AND email= '$email' ");
    //print_r($lquery);
    $num = $lquery->num_rows;
    //fetch_all for table display 
    if (!($num == 0)) {


        while ($rows = $lquery->fetch_assoc()) {
            $dbid                      = $rows['id'];
            $_SESSION['change_name']   = $rows['name'];

            return $dbid;
        }
    } else {
        return false;
    }
}
function change_data($change_data)
{
    $_SESSION['message'] = '';
    $message = '';
    $update = array();
    array_walk($change_data, 'array_sanitize');

    $id = $change_data['id'];

    $passsha = $change_data['password'];

    $change_data['password'] =  passCrypt($change_data['password']);

    foreach ($change_data as $field => $data) {

        $update[] = '`' . $field . '` = \'' . $data . '\'';
        // print_r($update);
    }

    $to          = $change_data['email'];
    $user        = $change_data['name'];
    $username    = $change_data['username'];
    $email_code  = $change_data['email_code'];
    $passsha     = $passsha;

    if (mail_sender($to, $user, $username, $email_code, $passsha) === false) {
        $message .= "Sorry we are experienced errors while trying to send an email activation link to \n\n " . $change_data['name'];

        $_SESSION['message'] = $message;
    } else {


        if ($sql = config()->query("UPDATE `users` SET " . implode(',', $update) . " WHERE `id`= $id")) {

            $message .= "1";
            $_SESSION['message'] = $message;
        } else {

            $message .= "Sorry we are experienced errors while trying to reset \n\n" . $change_data['name'] . " details";

            $_SESSION['message'] = $message;
        }
    }
}

function addProduct($register_data)
{
    $_SESSION['message'] = '';
    $message = '';
    array_walk($register_data, 'array_sanitize');




    //what was escaped here was only ' per-slash in front whit the help of \'.

    $data = '\'' . implode('\',\'', $register_data) . '\'';

    /* $fields ='`'. implode('`.`',$register_data).'`'; */
    //line of code diplays the array data eg 'james' '@gmail.testddd' '1234' 

    $fields = '`' . implode('`,`', array_keys($register_data)) . '`';

    if ($sql = config()->query("INSERT INTO product($fields) VALUES ($data)")) {

        $message .= "1";

        $_SESSION['message'] = $message;
    } else {

        $message .= "Sorry we are experienced errors,<br> while trying Insert  \n\n<b><i> " . $register_data['name'] . "</i></b>";

        $_SESSION['message'] = $message;
    }


    return $_SESSION['message'];
}
