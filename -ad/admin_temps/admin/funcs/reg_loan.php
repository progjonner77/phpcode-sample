
<?php

include '../../config/initiate.php';
$output["message"] = "";
$error = '';
if (empty($_POST) === false) {
    $Purpose = strip_tags(htmlspecialchars($_POST['Purpose']));
    $Loan_Amount = strip_tags(htmlspecialchars($_POST['Loan_amount']));
    $Interest = strip_tags(htmlspecialchars($_POST['Interest']));
    $Year = strip_tags(htmlspecialchars($_POST['Year']));
    $Monthly_Payment = strip_tags(htmlspecialchars($_POST['Monthly_Payment']));
    $Total_Payment = strip_tags(htmlspecialchars($_POST['Total_Payment']));
    $Total_Interest = strip_tags(htmlspecialchars($_POST['Total_Interest']));
    $date = date('Y:m:d');
    
    
    $query_email = "
	SELECT * FROM account 
	WHERE(Account_Email_Address = 'jogn@aga.com')
    ORDER BY id ASC
    ";
    $statement_email = mysqli_query($con, $query_email);
    $i = '';
    $count_name = mysqli_num_rows($statement_email);
    if($count_name > 0){
        while($row = mysqli_fetch_assoc($statement_email)){
            $i++;
            //echo ($row['Image_Name']);
            if (mysqli_query($con, "INSERT INTO loan
                            (`id`,                            
                             `User_id`, 
                             `User_Name`,
                             `Image_Name`,
                             `Purpose`,
                             `Loan_Amount`,
                             `Interest`,
                             `Year`,
                             `Monthly_Payment`, 
                             `Total_Payment`,
                             `Total_Interest`,
                             `date`,
                             `status`) 
                             VALUES 
                             ('',
                             'null',
                             'null',
                             '" . $row['Image_Name']."',
                             '" . $Purpose."',
                             '" . $Loan_Amount . "',
                             '" . $Interest . "',
                             '" . $Year . "',
                             '" . $Monthly_Payment . "', 
                             '" . $Total_Payment . "',
                             '" . $Total_Interest . "',
                             '" . $date . "',
                             'Deactive') ")) {

                //echo 090909;
                $output["message"] = true;
            } else {
                $error = 1;
                $output["message"] = mysqli_error($con);
            }
        }
  
    }
} else {
    $error = 1;

    $output["message"] = "Empty field(s) found";
}
$details = [
    'output1'             =>  $output["message"],
    'error'               =>  $error 
];
echo json_encode($details);
