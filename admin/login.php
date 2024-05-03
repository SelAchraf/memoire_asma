<?php
    include('db/dbConnection.php');
    if(!isset($_SESSION)){
        session_start();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query ="SELECT *FROM login WHERE username='$username' AND password='$password'";
        $result =$conn->query($query);
        if($result->num_rows ==1){
            header("Location: adminDashboard.php");
            exit();
        }
        else{
            header("Location: error.html");
            exit();
        }
    }
