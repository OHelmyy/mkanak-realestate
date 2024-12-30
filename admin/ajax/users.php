<?php 

require('../inc/essentials.php');
require('../inc/db_config.php');
adminLogin();

if (isset($_POST['get_all_users'])) {
    $res = selectAll('user_cred'); // Fetch all property data

    // Check if the query was successful
    if (!$res) {
        echo "Error fetching data.";
        exit;
    }

    $i = 1; // Start row numbering from 1
    $data = "";
    
    while ($row = mysqli_fetch_assoc($res)) {
        // Set the status based on the property status
        $delete ="<button onclick='delete_user($row[id])' class='btn btn-dark btn-sm shadow-none' >delete</button>";





        $data .= '
            <tr class="align-middle">
                <td>' . $i . '</td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['phonenum'] . '</td>
                <td>' . $delete . '</td>
            
            </tr>
        ';
        $i++; // Increment the counter
    }

    echo $data;
}

if (isset($_POST['delete_user'])) {
    $frm_data = filtration($_POST); // Sanitize input

    $sql = "DELETE FROM user_cred WHERE id = ?";
    $values = [$frm_data['delete_user']];
    $datatypes = "i";

    $result = delete($sql, $values, $datatypes); // Call the delete function

    if ($result > 0) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}








?>
