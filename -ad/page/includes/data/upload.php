<?php

include '../init.php';

$data = array();
$error= '';
$success = '';

//var_dump($_FILES['file']);
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
    $name = $_SESSION['Account_id'].'.'.$ext;

    //$name = $image_name;
    //image size calcuation in KB
    $image_size = $image["size"] / 1024;
    $image_flag = true;
    //max image size
    $max_size = 1512;

    //create directory if not exists
    if (!file_exists('images')) {
        mkdir('images', 0777, true);
     // echo "true";
    }
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
        move_uploaded_file($image["tmp_name"], "images/" . $name);
        $src = "images/" . $name;
        $dist = "images/thumbnail_" . $name;
        $success = $thumbnail = 'thumbnail_' . $name;
        $_SESSION['Image_Name'] = $name;

        $sql = "UPDATE user SET Image_Name = '" . $name . "' WHERE id = '".$_SESSION['Account_id']."';";
        if (!mysqli_query($conn, $sql)) {
           // die('Error: ' . mysqli_error($con));
            $error = 'DB Error';
        }else{
             $success = 1;
        }
        
    }

    mysqli_close($conn);

} else {
    echo $data['error'] = 'No Image Selected..';
}

$details = [
    'output1'             =>  $success,
    'error'               =>  $error
];
echo json_encode($details);


