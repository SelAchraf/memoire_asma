<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <script src="bar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php" style="font-weight:bold;">
            E-Learning<small class="text-white">Admin Area</small>
        </a>
    </nav>

    <div class="contrainer-fuild mb-5" style="margin-top:40px; font-size: 20px; color: black; align-items: center;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none" style="position: fixed;height:100%;">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="adminDashboard.php" style="color: black;">
                                <i class="fas fa-tachometer-alt fa-fw"  ></i>Dashboard
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="Courses.php" style="color: black;">
                                <i class="fab fa-accessible-icon fa-fw" ></i>Courses
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
                                <i class="fas fa-cog fa-fw" ></i>Settings
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black;">
                                <i class="fas fa-sign-out-alt fa-fw" ></i>Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div style="margin-left: 15rem;">
        <form action="" class="mt-3 form-inline d-print-none">
            <div class="form-group mr-3">
                <h5><label for="checkid">Enter Course ID: </label></h5>
                <input type="text" class="form-control ml-3" id="checkid" name="checkid">
            </div>
            <button type="submit" class="btn btn-info">Search</button>
            <br>
        </form>
    </div>
</body>
</html>
<?php
    include('db/dbConnection.php');
    if(!isset($_SESSION)){
        session_start();
    }

    $sql="SELECT course_id FROM course";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if(isset($_REQUEST['checkid'])&& $_REQUEST['checkid']==$row['course_id']){
            $sql="SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
            $result=$conn->query($sql);
            $row = $result->fetch_assoc();
            if(($row['course_id'])== $_REQUEST['checkid']){
                $_SESSION['course_id']=$row['course_id'];
                $_SESSION['course_name']=$row['course_name'];
                if(isset($_SESSION['course_id'])){
                    echo 
                    '<div>
                        <a class="btn btn-danger box" href="./addQuiz.php"><i class="fas fa-plus fa-2x"></i></a>
                    </div>';
                }
                ?>
                <br>
                <br>
                <div class="form-group row" style="margin-bottom: 5rem; width: 30rem;margin-left: 25rem;">
                    <div class="col">
                        <h5><label for="course_id">Course ID: </label></h5>
                        <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) { echo $row['course_id'];}?>" readonly>
                    </div>
                    <div class="col">
                        <h5><label for="course_name">Course Name: </label></h5>
                        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])) { echo $row['course_name'];}?>" readonly>
                    </div>
                </div>
                <div style="margin-left:215px;width:80%">
                    <?php
                        $sql = "SELECT * FROM questions WHERE course_id ={$_REQUEST['checkid']}";
                        $result = $conn->query($sql);
                        echo 
                        '<table class="table" style="margin-left:100px,width:40%;" >
                            <thead>
                                <tr>
                                    <th scope="col">Quiz ID</th>
                                    <th scope="col">Quiz Name</th>
                                    <th scope="col">Quiz Question</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                        while($row = $result->fetch_assoc()){ 
                            echo '<tr>';
                            echo'  <th scope="row">'.$row['quiz_id'].'</th>';
                            echo '<td>'.$row['quiz_name'].'</td>';
                            echo '<td>'.$row['question'].'</td>';
                            echo  
                            '<td>
                                <form action="editLesson.php" method="Post" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["quiz_id"].'>
                                    <button
                                    type="submit"
                                    class="btn btn-info mr-3"
                                    name="view"
                                    value="View">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </form>
                                <form action="" method="Post" class="d-inline">
                                    <input type="hidden" name="id" value='.$row["quiz_id"].'>
                                    <button
                                    type="submit"
                                    class="btn btn-secondary"
                                    name="delete"
                                    value="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>';
                        }
                    ?>
                    </tbody>        
                    </table>  
                </div>      
                <?php
            }
            else{
                // echo'<div class="alert alert_dark mt-4" role="alert">Course not found!</div>'; 
            }
            if(isset($_REQUEST['delete'])){
                $sql="DELETE FROM questions WHERE quiz_id = {$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<mete http-equiv="refresh" content="0;URL=?deleted" />';
                    exit();
                }
                else{
                    echo"Unable to delete data";
                }
            }
        }
    }
?>      