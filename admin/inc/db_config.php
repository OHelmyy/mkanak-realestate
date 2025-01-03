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
            $data[$key] = stripslashes($data[$key]);
            $data[$key] = htmlspecialchars($data[$key], ENT_QUOTES, 'UTF-8');
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


function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];

    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $insert_id = mysqli_insert_id($con); // Get the last inserted ID
            mysqli_stmt_close($stmt);
            return $insert_id;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - INSERT");
        }
    } else {
        die("Prepare failed - INSERT");
    }
}

function delete($sql, $values, $datatypes) {
    $con = $GLOBALS['con']; // Access the global database connection

    // Prepare the SQL statement
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Get the number of affected rows
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt); // Close the statement
            return $res; // Return the number of rows deleted
        } else {
            mysqli_stmt_close($stmt); // Close the statement
            die('Query cannot be executed - delete');
        }
    } else {
        die('Prepare failed - delete');
    }
}


function selectAll($table) {
    global $con; 
    $query = "SELECT * FROM `$table`";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($con));
    }

    return $result;
}



?>
