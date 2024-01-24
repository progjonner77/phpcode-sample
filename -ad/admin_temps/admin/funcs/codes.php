<?php
include '../../config/initiate.php';
$output = "";
$pre = "";
$post = "";
if (!empty($_POST)) {

    $post = "SBN";
    if ($_POST["codeType"] == "COT") {
        $pre = "COT";
    } else if ($_POST["codeType"] == "OTP") {
        $pre = "OTP";
    } else if ($_POST["codeType"] == "OTA") {
        $pre = "OTA";
    } else if ($_POST["codeType"] == "TOKEN") {
        $pre = "TOK";
    }

    if ($_POST["process"] == "generate") {
        $query_CODE = "
        SELECT * FROM codes 
        WHERE(User_Name = '" . $_POST["customer"] . "'
        AND
        Code_Name = '" . $_POST["codeType"] . "')
        ORDER BY id ASC
        ";
        $statement_CODE = mysqli_query($con, $query_CODE);
        $i = '';
        $count_name = mysqli_num_rows($statement_CODE);
        if ($count_name == 0) {
            $output = $pre . "-" . Track() . $post;
        } else {
            while ($row = mysqli_fetch_assoc($statement_CODE)) {
                //onye noya mbu
                // $output =  $row["Code"];
                //me odo
                $output = $pre . "-" . Track() . $post;
            }
        }
    } elseif ($_POST["process"] == "COT_send") {
        //dewe code
        if (empty($_POST) === false) {
            // echo 90909;
            $codeType = strip_tags(htmlspecialchars($_POST['codeType']));
            $customer = strip_tags(htmlspecialchars($_POST['customer']));
            $Code = strip_tags(htmlspecialchars($_POST['Code']));
            $query_CODE = "
                SELECT * FROM codes 
                WHERE(User_Name = '" . $customer . "'
                AND
                Code_Name = '" . $codeType . "')
                ORDER BY id ASC
                ";
            $statement_CODE = mysqli_query($con, $query_CODE);
            $i = '';
            $count_name = mysqli_num_rows($statement_CODE);
            if ($count_name == 0) {
                
                // echo ($row['Image_Name']);
                if (mysqli_query($con, "INSERT INTO codes
                            (`id`,                            
                             `User_Name`,
                             `Code_Name`,
                             `Code`,
                             `Usage`,
                             `Token`) 
                             VALUES 
                             ('',
                             '" . $customer . "',
                             '" . $codeType . "',
                             '" . $Code . "',
                             '0',
                             'null') ")) {

                    //echo 9990909;
                    $output = true;
                } else {
                    $output = mysqli_error($con);
                }
            } else {
                //echo $Code;
                $result = mysqli_query($con, "
                        UPDATE `codes`
                            SET                            
                            `Usage` = '" . 0 . "',
                            `Code` = '" . $Code . "'
                            WHERE(User_Name = '" . $customer . "' 
                            AND
                            Code_Name = '" . $codeType . "'
                            )
                             
                            ");
                //echo (mysqli_error($con));
            }
            
            
             $query_CODE = "
                SELECT * FROM codes 
                WHERE(User_Name = '" . $customer . "'
                AND
                Code_Name = 'OTA')
                ORDER BY id ASC
                ";
            $statement_CODE = mysqli_query($con, $query_CODE);
            $i = '';
            $count_name = mysqli_num_rows($statement_CODE);
            if ($count_name == 0) {
                 $code = "OTA" . "-" . Track() . $post;
                mysqli_query($con, "INSERT INTO codes
                            (`id`,                            
                             `User_Name`,
                             `Code_Name`,
                             `Code`,
                             `Usage`,
                             `Token`) 
                             VALUES 
                             ('',
                             '" . $customer . "',
                             'OTA',
                             '".$code."',
                             '0',
                             'null') ");
            }
            
        }
    }
} else {
    $output = 0;
}
$details = [
    'output1'             =>  $output,
];

echo  json_encode($details);
