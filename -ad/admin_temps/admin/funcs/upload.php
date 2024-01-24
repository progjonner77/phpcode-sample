<?php

include '../../config/initiate.php';
 

$data = array();
$error= '';
$success = '';

if (!empty($_FILES['file'])) {

    $image = $_FILES['file'];
    $allowedExts = array("gif", "jpeg", "jpg", "png", "webp");

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }


    $image_name = $image['name'];
    //get image extension
    $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    //assign unique name to image
    $name = $_SESSION['Account_id'].rand(10,999).$ext;

    //$name = $image_name;
    //image size calcuation in KB
    $image_size = $image["size"] / 1024;
    $image_flag = true;
    //max image size
    $max_size = 1512;

    //create directory if not exists
    if (!file_exists('../../../includes/data/images/')) {
        mkdir('../../../includes/data/images/', 0777, true);
     // echo "true";
    }
    
    array_map('unlink', glob("../../../includes/data/images/". getField('account', 'id', $_SESSION['Account_id'], 'Image_Name')));
    
    // echo $ext;
     // die();

    if (in_array($ext, $allowedExts)) {
        $image_flag = true;
    } else {
        $image_flag = false;
        $error = 'Maybe ' . $image_name . ' incorrect file extension';
    }

    if ($image["error"] > 0) {
        $image_flag = false;
        
        $error .= '<br/> ' . $image_name . ' Image contains error - Error Code : ' . $image["error"];
    }

    if ($image_flag) {
        move_uploaded_file($image["tmp_name"], "../../../includes/data/images/" . $name);
        $src = "../../../includes/data/images/" . $name;
        $dist = "../../../includes/data/images/thumbnail_" . $name;
        $success = $thumbnail = 'thumbnail_' . $name;
        $_SESSION['Image_Name'] = $name;

        $_id = $_SESSION['Account_id'];

        $where = [
            'id' => $_id
        ];
        $data = [
            'Image_Name' => $name
        ];
        $statement_pass = selectUpdate($con, "account", $data, $where);
        if (!$statement_pass) {
           // die('Error: ' . mysqli_error($con));
            $error = 'DB Error';
        }else{
             $success = 1;
        }
        
    }

    mysqli_close($con);

} else {
    echo $data['error'] = 'No Image Selected..';
    }
    
$details = [
    'output1'             =>  $success,
    'error'               =>  $error
];
echo json_encode($details);


