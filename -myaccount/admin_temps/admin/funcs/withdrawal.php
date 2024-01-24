<?php
include '../../config/initiate.php';
 

$error = "";
$output = "";

//var_dump($_POST);
$missing = array();
foreach ($_POST as $key => $value) {
    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $error =  "Please Fill all Fields";
} else {
    //  echo 000;
    unset($missing);
    $_id = $_SESSION['Account_id'];
    $_User_Account_Name =  $_SESSION['Account_Name'];

    @$Reference = Track();

    $extra = [
        "User_Name" => $_User_Account_Name,
        "Reference" => $Reference,
        "date" => date("Y:m:d"),
        "User_id" => $_id,
        "remark" => "Please hold on while we review you request"
    ];

    //this creates an extra array level 
    array_push($_POST, $extra);

    //so this loop will level it before it can be used
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST_DATA[] = implode(",", $value);
        } else {
            $_POST_DATA[] = $value;
        }
    }
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST_DATA_key[] = implode(",", array_keys($value));
        } else {
            $_POST_DATA_key[] = $key;
        }
    }

    $data = explode(",", implode(",", $_POST_DATA));
    $keys = explode(",", implode(",", $_POST_DATA_key));

    // var_dump($data);
    // return;




    //check balance
  
    $statement_pass = qField("account","id",$_id);
    $count = mysqli_num_rows($statement_pass);

    if ($count > 0) {
       
        while ($row = mysqli_fetch_assoc($statement_pass)) {
            $_User_Name = $row["Account_Name"];
            $db_Bal = strval($row["Account_Balance"]);
            $_Account_no = $row['Account_Number'];
            $db_Curr = $row['Currency'];
        }

        if ($_POST["Amount"] < $db_Bal) {
            if ($db_Curr ===$_POST["Currency"]) {
            //    echo insert($con, "withdrawal", $keys, $data);
            //    echo 90909;
                // do your stuff here with the $_POST
                if (insert($con, "withdrawal", $keys, $data)) {
                    $output = true;
                } else {
                    // echo 90909;
                    $error = mysqli_error($con);
                }
            } else {
                $error = "The Currency " . $_POST["Currency"] . " Dose not Match with" . $db_Curr;
            }
        } else {
            $error = "Insufficient Balance";
        }
    }else{
        $error = "Insufficient Balance";
    }

}
$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
