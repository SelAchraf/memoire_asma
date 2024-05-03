<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <script src="bar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <?php
        include('db/dbConnection.php');

        if(isset($_REQUEST['courseSubmitBtn'])){
            if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_lang'] == "") || ($_REQUEST['course_tut'] == "")){
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill All Fields</div>';
            } 
            else{
                $course_name = $_REQUEST['course_name'];
                $course_lang = $_REQUEST['course_lang'];
                $course_tut = $_REQUEST['course_tut'];
                $course_image = $_FILES['course_img']['name'];
                $course_image_temp = $_FILES['course_img']['tmp_name'];
                $img_folder='../image/courseimg/'.$course_image; 
                move_uploaded_file($course_image_temp, $img_folder);
                $sql= "INSERT INTO course (course_name, course_lang, course_tut,course_img )VALUES ('$course_name', '$course_lang', '$course_tut','$img_folder')";
                if($conn->query($sql) ==TRUE){
                    $msg = '<div class="alert alert-success col-sm-6 ml-5
                    mt-2">Course Added Succesfully</div>';
                }
                else{
                    $msg = '<div class="alert alert-danger col-sm-6 ml-5
                    mt-2">Unable to add Course</div>';
                }
            }
        }
    ?>  
    <div class="col-sm-9 mt-5 mx-3 float-xl-right jumbotron " >
        <h1 class="text-center">Add New Course</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name">
            </div>
            <div class="form-group">
                <label for="course_lang">Course Language</label>
                <input class="form-control" id="course_lang" name="course_lang">
            </div>
            <div class="form-group">
                <label for="course_tut">Course Tutorial</label>
                <input type="text" class="form-control" id="course_tut" name="course_tut">
            </div>
            <div class="form-group">
                <label for="course_img">Course Image</label>
                <input type="file" class="form-control-file" id="course_img" name="course_img">
            </div>
            <?php 
                if(isset($msg)) { echo $msg; } 
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-success" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
                <a href="courses.php" class="btn btn-secondary">Close</a>
            </div>
        </form>
    </div>

    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php" style="font-weight:bold;">E-Learning<small class="text-white">Admin Area</small></a>
    </nav>
    
    <div class="container-fluid mb-5" style="margin-top:40px; font-size: 20px; color: black; align-items: center;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none" style="position: fixed;height:100%;">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="adminDashboard.php" style="color: black;">
                                <i class="fas fa-tachometer-alt fa-fw"></i>Dashboard
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="Courses.php" style="color: black;">
                                <i class="fab fa-accessible-icon fa-fw"></i>Courses
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="Lessons.php" style="color: black;">
                                <i class="fab fa-accessible-icon fa-fw"></i>Lessons
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="Quizz.php" style="color: black;">
                                <i class="fa fa-question-circle fa-fw"></i>Quizz
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black;">
                                <i class="fas fa-cog fa-fw"></i>Settings
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black;">
                                <i class="fas fa-sign-out-alt fa-fw"></i>Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>
