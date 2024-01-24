<?php

include '../../config/initiate.php';

if (!empty($_POST['id'])) {
    $operation = $_POST['operation'];

    array_pop($_POST);

    $result = qFields($con, $operation, "*", $_POST);
    $i = 0;
    if (!$result) {
    } else {
        while ($row_pro = mysqli_fetch_assoc($result)) {
            ++$i;
            echo json_encode($row_pro);
        }
    }
} else {
    echo 2;
}
