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
        if(isset($_REQUEST['courseUpdtbtn'])) {
            if($_REQUEST['lesson_name'] == "") {
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
            } 
            else {
                $lesson_id = $_REQUEST['lesson_id'];
                $lesson_name = $_REQUEST['lesson_name'];
                // You may remove these lines if you don't intend to update course_id and course_name
                $course_id = $_REQUEST['course_id'];
                $course_name = $_REQUEST['course_name'];
                // Update only lesson_name and lesson_link
                $link_folder='../lessonvid/'.$_FILES['lesson_link']['name']; 
                $sql= "UPDATE lesson SET lesson_name='$lesson_name', lesson_link='$link_folder' WHERE lesson_id='$lesson_id'";
                if($conn->query($sql) == TRUE) {
                    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Update successfully</div>';
                } 
                else {
                    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update</div>';
                }
            }
        }
    ?>

    <div class="col-sm-9 mt-5 mx-3 ml-3 float-xl-right jumbotron " >
        <h1 class="text-center">Update lesson</h1>
        <?php 
            if(isset($_REQUEST['view'])){
                $sql="SELECT * FROM lesson WHERE lesson_id ={$_REQUEST['id']}";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="lesson_id">Lesson ID</label>
                <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])){ echo $row['lesson_id'];} ?>" readonly>
            </div>   
            <div class="form-group">
                <label for="lesson_name">Lesson Name</label>
                <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])){ echo $row['lesson_name'];} ?>">
            </div>
            <div class="form-group">
                <label for="course_id">Course ID</label>
                <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){ echo $row['course_id'];} ?>" readonly>
            </div>   
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){ echo $row['course_name'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Lesson_link">Lesson Link    </label>
                <br><br><input type="file" class="form-control-file" id="Lesson_link" name="Lesson_link">   
            </div>
            <?php if(isset($msg)) { echo $msg; } ?>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="courseUpdtbtn" name="courseUpdtbtn">Update</button>
                <a href="lessons.php" class="btn btn-secondary">Close</a>
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
