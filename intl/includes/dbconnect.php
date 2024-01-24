<?php
    $con = mysqli_connect("localhost", "u846125412_Siln","#Sil124823", "u846125412_Sil");

    if(!$con){
        
        die('Could not connect');
    }
    function passCrypt($inpt,$round=9){
        $salt="";
        $saltChars=  array_merge(range('A','Z'),range('a','z'),range(0,9));
        for($i=0;$i<22;$i++){;
        $salt.=$saltChars[array_rand($saltChars)];
        
        }
        return crypt($inpt,  sprintf('$2y$%02d$',$round).$salt);
    }
    function check_pass($password, $dbpas){
        if (Crypt($password, $dbpas) == $dbpas){
            return true;    
        }else{
            return false;
        }
    }
