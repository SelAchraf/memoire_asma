<?php
    // Retrieve the POST data
    $requestPayload = file_get_contents("php://input");
    $progres_value = json_decode($requestPayload);

    // obtain the course_id 
    $course_id = $_GET['course_id'];
    
    // Include the database connection
    include("admin/db/dbConnection.php");

    // Update the progres_value in the database
    $sql_update = "UPDATE course SET progres_value = '$progres_value' WHERE course_id = '$course_id'";
    $conn->query($sql_update);
    



