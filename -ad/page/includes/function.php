<?php 

function qField($table, $field, $value){
   global $conn;
   $sql =  "SELECT * FROM `$table` WHERE $field = '".$value."' order by $field DESC";
   $query = $conn->query($sql);
   return  $query;
}

function getField_count($table, $field, $value){
    global $conn;
    $sql =  "SELECT COUNT(*) AS c FROM `$table` WHERE $field = '".$value."'";
    $query = $conn->query($sql);
    $res = mysqli_fetch_object($query);
    $count = $res->c;
    return $count;
    
}

function getField($table, $field, $value, $return){
    global $conn;
    $sql =  "SELECT `$return` FROM `$table` WHERE $field = '".$value."' order by $field DESC";
    $query = $conn->query($sql);

    $row2[] = "";
    while ($row = mysqli_fetch_assoc($query)) {
        $row2 = $row;
    }

    foreach ($row2 as $key => $value) {
        if($key == $return){
            $return_value =  $value;
        }
    }
    return $return_value;
    
}

function getFields($table){
    global $conn;
    $sql =  "SELECT * FROM `$table` order by id DESC";
    $query = $conn->query($sql);
    return  $query;
    
}
?>