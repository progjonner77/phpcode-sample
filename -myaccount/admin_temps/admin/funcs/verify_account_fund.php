<?php
include '../../config/initiate.php';


$error = "";
$output = "";
$row = "";
$db_id = "";
$db_Bal = "";
$db_Bal_ben = "";
$db_id_ben = "";
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
    unset($missing);
    // do your stuff here with the $_POST



    $_Account_Name = stripslashes(strtoupper($_POST['Account_Name']));
    $_Account_Number = stripslashes(strtoupper($_POST['Account_Number']));


    // echo $_POST["status"];
    // die();

    //echo $dbpquantity;
    // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
    $result = mysqli_query(
        $con,
        " SELECT * FROM `account`
                 WHERE 
                 `Account_Name` = '" . $_SESSION['Account_Name'] . "'
                 AND
                 `id` = '" . $_SESSION['Account_id'] . "'
                 "
    );
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $db_Bal = $row['Account_Balance'];
            $db_id = $row['id'];
            $db_Curr = $row["Currency"];
        }

        if ($db_Curr == symbolToName($_POST["Currency"])) {

            $result_ben = mysqli_query(
                $con,
                " SELECT * FROM `account`
                            WHERE 
                            Account_Name = '" . $_Account_Name . "'
                            AND
                            Account_Number = '" . $_Account_Number . "'
                "
            );
            $count = mysqli_num_rows($result_ben);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($result_ben)) {
                    $db_Bal_ben = $row['Account_Balance'];
                    $db_id_ben = $row['id'];
                    $db_Curr_ben = $row["Currency"];
                }
                if ($db_Curr_ben == $db_Curr) {
                    $output = true;
                } else {
                    $error = "Currency mismatched with that of the Beneficiary. Try Currency Exchange ";
                }
            } else {
                $error = "Wrong Account Details Supplied";
            }
        } else {
            $error = 'The Currency ' . $_POST["Currency"] . ' Dose not match with ' . $db_Curr;
        }
    }

    //echo $dbcdestination."  ".$cDestination;
    //

}


//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;


$details = [
    'output1'             =>  $output,
    'id'                 =>   $db_id,
    'bal'                =>   $db_Bal,
    'id_ben'             =>   $db_id_ben,
    'bal_ben'            =>   $db_Bal_ben,
    'error'               =>  $error
];

echo json_encode($details);
