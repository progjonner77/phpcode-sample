<?php
include '../init.php';
extract($_POST);

$error= '';
$success = '';

$date = date("d-m-Y");

$query = qField('pack', 'id',  $id);
$i = 0;
while ($row = mysqli_fetch_assoc($query)) {
    ++$i;
    extract($row);
     
}
if($i > 0){
    $sql = "UPDATE user SET  pack_id = '" . $id . "' WHERE id = '".$_SESSION['Account_id']."';";
    if(mysqli_query($conn, $sql)){
        $sql = "INSERT INTO request (`id`, `user_id` ,`pack_id`,`date`) VALUES ('','".$_SESSION['Account_id']."','".$id."','".$date."')";
        if (!mysqli_query($conn, $sql)) {
            // die('Error: ' . mysqli_error($conn));
             $error = 'DB Error';
         }else{
              $success = 1;
         }
    }else{
        $error = 'DB Error';
    }
}else{
    $error = 'DB Error 1';
}
   
 

$details = [
    'output1'             =>  $success,
    'error'               =>  $error
];
echo json_encode($details);
