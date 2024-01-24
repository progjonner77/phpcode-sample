<?php


//$_POST is a global variable
function justin($extra, $table)
{
    
    global $con, $output, $error;

  //this creates an extra array level 
  array_push($_POST, $extra);

  //so this loop will level it before it can be used
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST_DATA[] = implode(",", $value);
        } else {
            $_POST_DATA[] = $value;
        }
    }
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST_DATA_key[] = implode(",", array_keys($value));
        } else {
            $_POST_DATA_key[] = $key;
        }
    }

    $data = explode(",", implode(",", $_POST_DATA));
    $keys = explode(",", implode(",", $_POST_DATA_key));

    // var_dump($data);
    // return;

    if (insert($con, $table, $keys, $data)) {
        return true;
    } else {
        // echo 90909;
        return false;

        // $error = mysqli_error($con);
    }
}

function check_balance()
{

    $statement_pass = qField("account", "id", $_SESSION['Account_id']);
    $i = '';
    $count_name = mysqli_num_rows($statement_pass);
    if ($count_name > 0) {
        while ($row = mysqli_fetch_assoc($statement_pass)) {
            $i++;
            $bal = $row["Account_Balance"];
        }
        if ($bal > $_POST["Amount"]) {
            return  true;
        } else {
            return false;
        }
    }
}

function Code($code, $code_name)
{
    global $con;
    $count_ = 0;

    $name  = $_SESSION['Account_Name'];

    $statement_check = qField("codes", "User_Name", $name);
    $i = '';

    $count_n = mysqli_num_rows($statement_check);

    if ($count_n > 0) {

        $where_usage = [
            "User_Name" => $name,
            'Usage' => 0,
            'Code_Name' => "OTA",
        ];

        $statement_usage = qFields($con, "codes", "*", $where_usage);
        $count_ = mysqli_num_rows($statement_usage);

        if ($count_ > 0) {

            $where = [
                "User_Name" => $name,
                'Code_Name' => $code_name,
                'Code' => $code,
            ];

            $statement_pass = qFields($con, "codes", "*", $where);
            $i = '';

            $count_name = mysqli_num_rows($statement_pass);
            if ($count_name > 0) {
                    return  true;
                } else {
                    return false;
                }
            
        } else {
            return "used";
        }
    } else {
        return "Default";
    }
}
function deleteField($table, $field, $value){
    global $con;
    $sql =  "DELETE FROM `$table` WHERE $field = '" . $value . "'";
    $query = $con->query($sql);
    return  $query;
}
///operations 

function qField($table, $field, $value)
{
    global $con;
    $sql =  "SELECT * FROM `$table` WHERE $field = '" . $value . "' order by $field DESC";
    $query = $con->query($sql);
    return  $query;
}
function qField_all($table, $field)
{
    global $con;
    $sql =  "SELECT * FROM `$table` order by $field DESC";
    $query = $con->query($sql);
    return  $query;
}

function qFields($con, $table, $fields, $whereFields)
{
    $row = false;
    $where = array();
    // array_walk($whereFields, 'array_sanitize');

    // var_dump($whereFields);

    foreach ($whereFields as $field => $data) {

        $where[] = '`' . $field . '` = \'' . $data . '\'';
        // print_r($update);
    }

    $result1 = mysqli_query($con, "Select  {$fields} From {$table} WHERE " . implode(' and ', $where) . "ORDER BY `id` DESC");
    echo mysqli_error($con);

    $count = mysqli_num_rows($result1);



    $row = $result1;



    return $row;
}
function qFieldsOr($con, $table, $fields, $whereFields)
{
    $row = false;
    $where = array();
    // array_walk($whereFields, 'array_sanitize');

    // var_dump($whereFields);

    foreach ($whereFields as $field => $data) {

        $where[] = '`' . $field . '` = \'' . $data . '\'';
        // print_r($update);
    }

    $result1 = mysqli_query($con, "Select  {$fields} From {$table} WHERE " . implode(' or ', $where) . "ORDER BY `id` DESC");
    echo mysqli_error($con);

    $count = mysqli_num_rows($result1);



    $row = $result1;



    return $row;
}

function insert($con, $table, $field, $data)
{


    $_SESSION['message'] = '';


    // array_walk($register_data, 'array_sanitize');


    foreach ($data as $value) {
        $values[] = '\'' . $value . '\'';
    }

    foreach ($field as  $value) {
        $fields[] = '`' . $value . '`';
    }


    // var_dump($fields);
    // return;
    $fields = implode(',', $fields);
    $values = implode(',', $values);

    //echo "INSERT INTO $table ($fields) VALUES  ($values)";
    //dir();
    
    if ($sql = mysqli_query($con, "INSERT INTO $table ($fields) VALUES  ($values)")) {
        return true;
    } else {
        echo mysqli_error($con);
        return false;
    }
}


function selectUpdate($con, $table, $updateFields, $whereFields)
{

    $row = false;


    $where = array();
    // array_walk($whereFields, 'array_sanitize');

    // var_dump($whereFields);

    foreach ($whereFields as $fieldwhere => $datawhere) {

        $where[] = '`' . $fieldwhere . '` = \'' . $datawhere . '\'';
        // print_r($update);
    }

    foreach ($updateFields as $field => $data) {

        $update[] = '`' . $field . '` = \'' . $data . '\'';
        // print_r($update);
    }

    $data = array();


    $rquery =  mysqli_query($con, "UPDATE `{$table}` SET " . implode(',', $update) . " WHERE " . implode(' and ', $where));

    // echo mysqli_error($con);
    // return;

    if ($rquery)
        return true;
    else
        return false;
}

function selectJoin($con, $table, $table1, $fields)
{

    $row = false;
    // echo $table;
    $result1 = mysqli_query($con, "Select  {$fields} From $table JOIN $table1 ON  $table.user_id = $table1.id ORDER BY $table.user_id DESC");

    // Select * From account JOIN user ON account.user_id = user.id ORDER BY account.user_id DESC
    // echo mysqli_error($con);

    $count = mysqli_num_rows($result1);

    if ($count > 0) {

        $row = $result1;
    }

    return $row;
}

function selectJoinWhere($con, $table, $table1, $fields, $whereFields)
{

    $row = false;
    // echo $table;
    $where = array();
    array_walk($whereFields, 'array_sanitize');

    // var_dump($whereFields);

    foreach ($whereFields as $field => $data) {

        $where[] = '' . $table . '.' . $field .  '= \'' .  $data . '\'';
        //  print_r($where);
    }

    $sql = "Select  {$fields} From $table JOIN $table1 ON  $table.id = $table1.user_id  WHERE " . implode(' and ', $where) . " ORDER BY $table.user_id DESC";

    //   echo $sql;
    $result1 = mysqli_query($con, $sql);

    // Select * From account JOIN user ON account.user_id = user.id ORDER BY account.user_id DESC
    // Select * From user JOIN account ON user.id = account.user_id ORDER BY user.user_id DESC
    // Select * From user JOIN account ON user.id = account.user_id WHERE user.id = 1 ORDER BY user.id DESC

    echo mysqli_error($con);

    $count = mysqli_num_rows($result1);

    if ($count > 0) {

        $row = $result1;
    }

    return $row;
}

function getField_count($table, $field, $value)
{
    global $con;
    $sql =  "SELECT COUNT(*) AS c FROM `$table` WHERE $field = '" . $value . "'";
    $query = $con->query($sql);
    $res = mysqli_fetch_object($query);
    $count = $res->c;
    return $count;
}

function getAllField_count($table)
{
    global $con;
    $sql =  "SELECT COUNT(*) AS c FROM `$table` ";
    $query = $con->query($sql);
    $res = mysqli_fetch_object($query);
    $count = $res->c;
    return $count;
}

function getField($table, $field, $value, $return)
{
    global $con;
    $sql =  "SELECT `$return` FROM `$table` WHERE $field = '" . $value . "' order by $field DESC";

    $query = $con->query($sql);

    $row2[] = "";
    while ($row = mysqli_fetch_assoc($query)) {
        $row2 = $row;
    }

    foreach ($row2 as $key => $value) {
        if ($key == $return) {
            $return_value =  $value;
        }
    }
    return $return_value;
}

function getFields($table)
{
    global $con;
    $sql =  "SELECT * FROM `$table` order by id DESC";
    $query = $con->query($sql);
    return  $query;
}
