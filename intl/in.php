
<?php
//check if form is submitted
global $val, $details, $errormsg;
 session_start();

if (isset($_POST['password'])) {
    
    include 'includes/dbconnect.php';
    if($_POST['account_num'] != "null"):
        
    	@$account_num = mysqli_real_escape_string($con, $_POST['account_num']);
    	$password = mysqli_real_escape_string($con, $_POST['password']);
        $result = mysqli_query($con, "SELECT * FROM account WHERE Account_Number  = '" . $account_num. "' and Newpassword = '" . $password . "'");
        $details = "Account Number";
        $output = login($result,$details);
        //var_dump($result);
    elseif($_POST['email'] != "null"):
        @$email = mysqli_real_escape_string($con, $_POST['email']);
    	$password = mysqli_real_escape_string($con, $_POST['password']);
        $result = mysqli_query($con, "SELECT * FROM account WHERE Account_Email_Address  = '" . $email. "' and Newpassword = '" . $password . "'");
        $details = "Account Email";
        $output = login($result,$details);
        
    else:
      $errormsg = "Enter your Details";
      $val = 1;
      
      $output = [
        'error' => $errormsg,
        'output' => $val
        ];
    
    endif;
        
//echo($output);

}else{
      $errormsg = "Enter your Password!!!";
      $val = 1;
      
      $output = [
        'error' => $errormsg,
        'output' => $val
        ];
}

    function login($result,$details){
        if ($row = mysqli_fetch_array($result)) {
    	    
    	    if($row["Status"] === "Deactivated"){
    	    $errormsg = "Your Account is Inactive. Please contact customer Service";
    		$val = 1;
    		$output = [
                    'error' => $errormsg,
                    'output' => $val
                    ];
    		return $output;
    	    }else{
    		 $_SESSION['Account_id'] = $row['id'];
             $_SESSION['Account_Name'] = $row['Account_Name'];
             $_SESSION['Image_Name'] = $row['Image_Name'];
      
            $errormsg = "";
    		$val = 0;
    		$output = [
                    'error' => $errormsg,
                    'output' => $val
                    ];
    		return $output;
    	    }
    	} else {
    		$errormsg = "Incorrect {$details} or Password!!!";
    		$val = 1;
    		$output = [
                    'error' => $errormsg,
                    'output' => $val
                    ];
    		return $output;
    	}
}


  echo json_encode($output)

?>
