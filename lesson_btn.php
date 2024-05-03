<?php
    // Retrieve the POST data
    $requestPayload_1 = file_get_contents("php://input");
    $lesson_btn_etat = json_decode($requestPayload_1);

    // obtain the course_id 
    $lesson_id = $_GET['lesson_id'];
    
    // Include the database connection
    include("admin/db/dbConnection.php");

    // Update the progres_value in the database
    $sql_update = "UPDATE lesson SET lesson_btn_etat = '$lesson_btn_etat' WHERE lesson_id = '$lesson_id'";
    $conn->query($sql_update);




