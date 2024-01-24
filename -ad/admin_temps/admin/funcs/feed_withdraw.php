<?php

include '../../config/initiate.php';
    // Check connection

//require "../config/initiate.php";

if(!empty($_POST['id'])){
    $id = $_POST['id'];

      
           /* $result1 = mysql_query("Select  * From Users as u  Join Quotation as q on u.Tracking_id = '".$Track_id."'");*
           the first query will only fetch everything in the secon table and repeat the filtered value first table,
           appending them the nuber of fields in the second table.
           
           NB the value returned from the other affected the other 
           /
           filter the second and the first table so that any value displayedin both table are filtered.
           */
                
                $result1 = mysqli_query($con, "Select  * From withdrawal WHERE   id ='".$id."' ORDER BY `id` DESC");
    
                   echo mysqli_error($con);

                        $count = mysqli_num_rows($result1);
                        
                        
                              
                     if($count > 0 ){ 
                        
                      while($row = mysqli_fetch_assoc($result1)){
                          
                          echo json_encode($row);
                      
                      }
                 
                     }
}else{
    echo 2;
}

 
?>