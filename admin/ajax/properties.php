<?php 

require('../inc/essentials.php');
require('../inc/db_config.php');
adminLogin();

if (isset($_POST['get_all_property'])) {
    $res = selectAll('property'); // Fetch all property data

    // Check if the query was successful
    if (!$res) {
        echo "Error fetching data.";
        exit;
    }

    $i = 1; // Start row numbering from 1
    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {
        // Set the status based on the property status
        if( $row['status'] == 0){
            $status =" <button onclick='toggle_status($row[pr_id],0)' class='btn btn-dark btn-sm shadow-none' >hide</button>"; 
        }else{
            $status ="<button onclick='toggle_status($row[pr_id],1)' class='btn btn-danger btn-sm shadow-none' >post</button>";
        }





        $data .= '
            <tr class="align-middle">
                <td>' . $i . '</td>
                <td>' . $row['pr_id'] . '</td>
                <td>' . $row['description'] . '</td>
                <td>' . $row['type'] . '</td>
                <td>' . $row['price'] .' L.E'.'</td>
                <td>' . $row['location'] . '</td>
                <td>' . $row['bedroom'] . '</td>
                <td>' . $row['bathroom'] . '</td>
                <td>'  .$row['area'].'sq. m.'.  '</td>
                <td>'.$status.'</td>
            </tr>
        ';
        $i++; // Increment the counter
    }

    echo $data;
}

if (isset($_POST['toggle_status'])) {
    $frm_data = filtration($_POST); // Ensure filtration is correct
    
    // Ensure value is cast to integer
    $status = (int)$frm_data['value']; 
    $pr_id = (int)$frm_data['toggle_status']; // pr_id from POST
    
    // Update query
    $q = "UPDATE `property` SET `status`=? WHERE `pr_id`=?";
    $values = [$status, $pr_id];

    // Execute update and return the result
    if (update($q, $values, 'ii')) {
        echo 1; // Successful toggle
    } else {
        echo 0; // Failed toggle
    }
}












?>
