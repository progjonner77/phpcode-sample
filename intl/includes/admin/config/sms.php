<?php
function sms($_Account_Balance, $_Account_Email_Address, $_Account_Number, $_Account_Name,$Purpose,$title,$Reference,$_Amount,$Account_Tel_No,$Reason,$db_Curr){

    require  'vendor/autoload.php';

    // $messagebird = new MessageBird\Client('TirV5d4SO40fm2wdYvay1WYsd');
     $messagebird = new MessageBird\Client('iBmDvTYspePmXA7ueRn3bg6MW');
   
    $message = new MessageBird\Objects\Message;
    $message->originator = 'RGBank';
    $date  = date("Y/m/d H:i:s");

    
if($title === 'Credit'):
         $recipient = $Account_Tel_No;
         $cmessage = "Credit alert >>>  Amt: {$_Amount} {$db_Curr}; By $Reason, and your Bal is: {$_Account_Balance}{$db_Curr}; dt: $date";
  else:
      
      $recipient = $Account_Tel_No;
         $cmessage = "Debit alert >>> Amt: {$_Amount} {$db_Curr}; for $Reason, and your Bal is: {$_Account_Balance}{$db_Curr}; dt: $date";
endif;      
   $message->recipients = [ $recipient ];
    $message->body = $cmessage;
     try {
          $response = $messagebird->messages->create($message);
          //die ($response->body);
          //if no errors
          if(!$response){
             throw new Exception("0");//=> if the number is wrong the $response will be " no (correct) recipients found" instead i want false 
          }
          
          //retry an exception incase of unsuccessful delivery
            try{
                //its sent
                   if ($response->recipients->items[0]->status != "sent"){
                       throw new Exception(false);  
                     }else{
                         return true;
                    }
                }catch (Execption $re){
                    $error =  $re->getMessage();
                    return false;
                }
                
     // for the first try           
    }catch(Exception $e){
        $error =  $e->getMessage();
        return false;
    }
        
    
    
    
    /***************** response object and where to find sent in array of itmes, under reciptients object***/
    /*
    {
      "id":"e8077d803532c0b5937c639b60216938",
      "href":"https://rest.messagebird.com/messages/e8077d803532c0b5937c639b60216938",
      "direction":"mt",
      "type":"sms",
      "originator":"MessageBird",
      "body":"The message to be sent",
      "reference":"the-client-reference",
      "validity":null,
      "gateway":240,
      "typeDetails":{
      },
      "datacoding":"plain",
      "mclass":1,
      "scheduledDatetime":null,
      "createdDatetime":"2016-04-29T09:42:26+00:00",
      "recipients":{
        "totalCount":1,
        "totalSentCount":1,
        "totalDeliveredCount":0,
        "totalDeliveryFailedCount":0,
        "items":[ ------------------------------------------------------------>
          {
            "recipient":31612345678,
            "status":"sent",
            "statusDatetime":"2016-04-29T09:42:26+00:00",
            "recipientCountry":"Netherlands",
            "recipientCountryPrefix":31,
            "recipientOperator":"Telfort",
            "messageLength":22,
            "statusReason":"successfully delivered",
            "price":{
                "amount":0.75,
                "currency":"EUR"
            },
            "mccmnc":"20412",
            "mcc":"204",
            "mnc":"12",
            "messagePartCount":1
          }
        ]
      }
    }
    
    
    //////////////////////////////////////// raw response//////////////////////////////
    
    MessageBird\Objects\Message Object ( [id:protected] => 29f9ea56b7e8405aa5f4036e031ff6ce [href:protected] => https://rest.messagebird.com/messages/29f9ea56b7e8405aa5f4036e031ff6ce [direction] => mt [type] => sms [originator] => StanderdBN [body] => Hi Mr. Eugene,,.. this's from your Programmer. SMS ALert. [reference] => [validity] => [gateway] => 10 [typeDetails] => stdClass Object ( ) [datacoding] => plain [mclass] => 1 [scheduledDatetime] => [createdDatetime:protected] => 2021-04-02T14:18:38+00:00 [recipients] => stdClass Object ( [totalCount] => 1 [totalSentCount] => 1 [totalDeliveredCount] => 0 [totalDeliveryFailedCount] => 0 [items] => Array ( [0] => MessageBird\Objects\Recipient Object ( [recipient] => 2349021002251 [status] => sent [statusDatetime] => 2021-04-02T14:18:38+00:00 ) ) ) [reportUrl] => )
    
    */

}
