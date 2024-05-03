<?php
    // Retrieve the POST data
    $requestPayload_2 = file_get_contents("php://input");
    $quiz_btn_etat = json_decode($requestPayload_2);

    // obtain the course_id 
    $quiz_id = $_GET['quiz_id'];
    
    // Include the database connection
    include("admin/db/dbConnection.php");

    // Update the progres_value in the database
    $sql_update = "UPDATE questions SET quiz_btn_etat = '$quiz_btn_etat' WHERE quiz_id = '$quiz_id'";
    $conn->query($sql_update);
    



