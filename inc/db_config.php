<?php
$hname='localhost';
$uname='root';
$pass='';
$db='mkanakdb';

$con =mysqli_connect($hname,$uname,$pass,$db);

if (!$con) {
  die("Connection failed: ". mysqli_connect_error());
}

function filtration($data) {
    foreach ($data as $key => $val) {
        if (is_string($val)) {
            $data[$key] = trim($val);
            $data[$key] = htmlspecialchars($data[$key], ENT_QUOTES, 'UTF-8');
            $data[$key] = stripslashes($data[$key]);
            $data[$key] = strip_tags($data[$key]);
        }
    }
    return $data;
}


function select($sql,$values,$datatypes){
    $con =$GLOBALS['con'];

    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, $datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res=mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die('query cannot be excecuted -select');
        }
    }
    else{
        die('prepare failed -select');
    }
}

function update($sql,$values,$datatypes){
    $con =$GLOBALS['con'];

    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, $datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res=mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die('query cannot be excecuted -update');
        }
    }
    else{
        die('prepare failed -update');
    }
}



?>
