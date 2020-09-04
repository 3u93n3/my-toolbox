<?php

function prepare($db, $arr, $pdo){
    $col = $param = $val = "";
    $len = count($arr);
    $arrVal = array();

    try{
        foreach($arr as $k => $v ){
            if(0 === --$len){
                $col .= $k;
                $param .= ":" . $k;
            }else{
                $col .= $k . ", ";
                $param .= ":" . $k . ", ";  
            }          
        }
    
        $sql = "INSERT INTO $db ($col) VALUES($param);";
        $stmt = $pdo->prepare($sql);
    
        foreach($arr as $k => $v){
            $stmt->bindParam(":$k", $arrVal[$k]); 
            $arrVal[$k] = $v;
        }    
        
        $stmt->execute(); 

        echo "Records inserted successfully.";
    }catch(PDOException $e){
        die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
    }    
    unset($stmt);    
    unset($pdo);
}