<?php
include '../init.php';
extract($_POST);

$error = '';
$success = '';

if (!getField_count('user', 'email',  $email)) {
        $sql = "UPDATE user SET  name = '" . $user . "', email = '" . $email . "' WHERE id = '" . $_SESSION['Account_id'] . "';";
        if (!mysqli_query($conn, $sql)) {
            // die('Error: ' . mysqli_error($con));
            $error = 'DB Error';
        } else {
            $success = 1;
        }
} else {
    $error = "Email Not available";
}
$details = [
    'output1'             =>  $success,
    'error'               =>  $error
];
echo json_encode($details);
