<?php
require 'inc/db_config.php'; 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/find.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    .filter-section {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .property-section {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 20px;
    }

    #property-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start;
    }

    #property-cards .card {
        width: 300px;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }


    .contact-buttons .btn {
        background-color: #dc3545;
        color: #fff;
        border: none;
        transition: background-color 0.3s, color 0.3s;
    }

    .contact-buttons .btn:hover {
        background-color: #fff;
        color: #dc3545;
        border: 1px solid #dc3545;
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .form-check-label {
        margin-left: 10px;
    }

    .price-range input[type="radio"] {
        margin-right: 8px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .checkbox-label input[type="checkbox"] {
        margin-right: 10px;
        accent-color: #0d6efd;
    }
    </style>
</head>

<body>


    <?php
    require 'inc/header.php';
    ?>

    <!-- Main Container -->
    <div class="container-fluid mt-2">
        <div class="row">
            <!-- Filters Section -->

            <div class="col-lg-3 filter-section">

                <h5>SORT</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="buy"
                        onchange="get_all_property()">
                    <label class="form-check-label" for="buy">Buy</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortOptions" id="rent"
                        onchange="get_all_property()">
                    <label class="form-check-label" for="rent">Rent</label>
                </div>

                <br>


                <div class="card-body ">

                    <div class="card-body ">
                        <div class="col-md-3">
                            <h6>Type</h6>
                            <hr>
                            <?php
    $con = mysqli_connect("localhost", "root", "", "mkanakdb");
    $query = "SELECT * FROM filter_type";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $type) {
            echo '<label class="checkbox-label">
                            <input type="checkbox" name="brands[]" value="' . $type['id'] . '" onchange="get_all_property()">
                            ' . $type['type'] . '
                        </label>';
        }
    } else {
        echo "No Property Types Found.";
    }
    ?>
                        </div>




                    </div>

                </div>
            </div>

            <!-- Property Section -->

            <div class="col-lg-8 col-md-4 property-section">
                <div id="property-cards">
                    
                </div>
            </div>



        </div>
    </div>

    </div>

    <?php
    require 'inc/footer.php';
    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-XyYi53CX7RTpPTFp+VgMdIwPHGp5P1UVTu8JkDzi4srdIksKl3vfGr8KGK2MNOan" crossorigin="anonymous">
    </script>
    <script>
    function get_all_property() {
        const selectedTypes = Array.from(document.querySelectorAll('input[name="brands[]"]:checked'))
            .map(input => input.value)
            .join(',');
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'admin/ajax/find.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('property-cards').innerHTML = this.responseText;
        };
        xhr.send(`selectedTypes=${selectedTypes}`);
    }


    window.onload = function() {
        get_all_property();
    };
    </script>





</body>

</html>