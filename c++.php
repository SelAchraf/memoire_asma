<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="c++.css">
</head>

<body>
    <form action='c++.php' method="post">
        <div class="topbar">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb" style="background:linear-gradient(to right,rgb(33, 28, 144),rgb(222, 222, 222))">
                    <li class="breadcrumb-item"><a href="#" style="color:rgb(252, 252, 252);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:white;">Your Course</li>
                </ol>
            </div>
        </div><br>
        <div class="progress-bar" style=" margin-left: 300px;background-color: white;width: 50rem; border: 1px solid gray; height: 35px;">   
            <div id="bar" class="progress" style="background-color: rgb(42, 56, 165); height: 100%;  display: flex; align-items: center; justify-content: center; padding-right: 2px; font-weight: bold; color:white;">
                <span id="progress_text"></span>
            </div> 
        </div><br>
        <div class="accordion" id="accordionExample">
            <!-- Chapitre 1 -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h1 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Chapitre 1 : LESSONS
                        </button>
                    </h1>
                </div>
                <?php
                    session_start();
                    include("admin/db/dbConnection.php");
                    if(isset($_GET['course_id'])){
                        $course_id=$_GET['course_id'];
                    }
                    $sql="SELECT * FROM lesson  WHERE course_id = '$course_id'";
                    $result=$conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $course_id = $row['course_id'];
                            $lesson_btn_etat = $row['lesson_btn_etat'];
                            $lesson_id = $row['lesson_id'];
                            $button_text = ($lesson_btn_etat == 0) ? 'Mark as done' : 'Done';
                            echo 
                            '<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <a href="actualvideocontent_formationvideo.php?video=1" style="margin-left: 10px; color: black; font-size: 19px;">
                                        <i class="fa fa-file-video-o fa-fw" style="color:rgb(91, 51, 252);"></i>     
                                        '.$row['lesson_name'].'
                                    </a>
                                    <br>
                                    <button type="button" value="'.$lesson_btn_etat.';'.$lesson_id.'" class="button lesson-btn" >'.$button_text.'</button><br>
                                </div>
                            </div>';                
                        }
                    }
                    $nlesson='';
                    $nlesson=$result->num_rows;
                ?>
            </div>
            <br>
            <!-- Chapitre 2 -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h1 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Chapitre 2 : QUIZ TIME
                        </button>
                    </h1>
                </div>
                <?php
                    include("admin/db/dbConnection.php");
                    if(isset($_GET['course_id'])){
                        $course_id=$_GET['course_id'];
                    }
                    $sql="SELECT * FROM questions  WHERE course_id = '$course_id'";
                    $result=$conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $course_id = $row['course_id'];
                            $quiz_btn_etat = $row['quiz_btn_etat'];
                            $quiz_id = $row['quiz_id'];
                            $button_text = ($quiz_btn_etat == 0) ? 'Mark as done' : 'Done';
                            echo 
                            '<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <a href="QuizAnswer.php?quiz_id='.$row['quiz_id'].'" style="margin-left: 10px; color: black; font-size: 19px;">
                                        <i class="fa fa-check-square-o fa-fw" style="color:rgb(187, 53, 202);"></i> 
                                        '.$row['quiz_name'].'
                                    </a>
                                    <br>
                                    <button type="button" value="'.$quiz_btn_etat.';'.$quiz_id.'" class="button quiz-btn" >'.$button_text.'</button><br>
                                </div>         
                            </div>';
                        }
                    }
                    $nquiz='';
                    $nquiz=$result->num_rows;

                    $noncompleted='';
                    $noncompleted=$nlesson+$nquiz; 
                    $sql_update = "UPDATE course SET course_total = '$noncompleted' WHERE course_id = '$course_id'";
                    $conn->query($sql_update);

                    $incrementation='';
                    $incrementation=100/$noncompleted;

                    $progres_value='';
                    $sql = "SELECT progres_value FROM course WHERE course_id = '$course_id'";
                    $result=$conn->query($sql);
                    $row = $result->fetch_assoc();
                    $progres_value = $row['progres_value'];
                    ?>
            </div>
        </div>
    </form>

    <nav>
        <ul>
            <li>
                <a href="#" id="logo" style=" text-align: center;
                display:flex;
                font-weight: bold;
                padding: 14px;
                font-size: 24px;
                text-transform:capitalize;
                top: 0;
                color: #031546;">
                    <img src="image/courseimg/logo.png" style="width: 65px; height: 65px;">
                    <span class="nav-item" style="color: #031546; font-size:24px;">Easylearn</span>
                </a>
            </li>
            <li><a href="#" class="b">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
            </a></li>
            <li><a href="#" class="b">
                <i class="fas fa-user"></i>
                <span class="nav-item">Profile</span>
            </a></li>
            <li><a href="#" class="b">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">wallet</span>
            </a></li>
            <li><a href="#" class="b">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Task</span>
            </a></li>
            <li><a href="#" class="b">
                <i class="fas fa-cog"></i>
                <span class="nav-item">Setting</span>
            </a></li>
            <li><a href="#" class="b">
                <i class="fas fa-question-circle"></i>
                <span class="nav-item">Help</span>
            </a></li>
            <li><a href="a" class="b" id="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
            </a></li>
        </ul>
    </nav>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var lessonButtons = document.querySelectorAll('.lesson-btn');
        var quizButtons = document.querySelectorAll('.quiz-btn');
        var incrementation = parseFloat("<?php echo $incrementation; ?>");
        var progres_value = parseFloat("<?php echo $progres_value; ?>");
        var course_id = parseInt("<?php echo $course_id; ?>");

        document.getElementById('progress_text').innerText = progres_value + '%';
        document.getElementById('bar').style.width = progres_value + '%';

        lessonButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var values = this.value.split(';');
                var lessonBtnEtat = values[0]; 
                var lessonBtnId = values[1]; 

                if (lessonBtnEtat == 1) {
                    progres_value -= incrementation;
                    lessonBtnEtat=0;
                }
                else {  
                    progres_value += incrementation;
                    lessonBtnEtat=1;
                } 
                if(progres_value <= 0){
                    progres_value = 0;
                    document.getElementById('bar').style.width = progres_value + '%'; 
                    document.getElementById('progress_text').innerText = progres_value + '%';
                }
                else{
                    document.getElementById('bar').style.width = progres_value + '%'; 
                    document.getElementById('progress_text').innerText = progres_value + '%';
                }

                var xhrSuccess = false;
                var xhr1Success = false;

                const jsonString=JSON.stringify(progres_value);
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "progres.php?course_id=" + course_id);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.send(jsonString);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        xhrSuccess = true;
                        checkRequests();
                    }
                };

                const jsonString_1=JSON.stringify(lessonBtnEtat);
                const xhr_1 = new XMLHttpRequest();
                xhr_1.open("POST", "lesson_btn.php?lesson_id=" + lessonBtnId);
                xhr_1.setRequestHeader("Content-Type", "application/json");
                xhr_1.send(jsonString_1);
                xhr_1.onreadystatechange = function() {
                    if (xhr_1.readyState === 4 && xhr_1.status === 200) {
                        xhr1Success = true;
                        checkRequests();
                    }
                };

                function checkRequests() {
                    if (xhrSuccess && xhr1Success) {
                        location.reload();        
                    }
                }
            });           
        });

        quizButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var values = this.value.split(';');
                var quizBtnEtat = values[0]; 
                var quizBtnId = values[1]; 

                if (quizBtnEtat == 1) {
                    progres_value -= incrementation;
                    quizBtnEtat=0;
                } 
                else {  
                    progres_value += incrementation;
                    quizBtnEtat=1;
                } 

                document.getElementById('bar').style.width = progres_value + '%'; 
                document.getElementById('progress_text').innerText = progres_value + '%';

                var xhrSuccess = false;
                var xhr2Success = false;

                const jsonString=JSON.stringify(progres_value);
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "progres.php?course_id=" + course_id);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.send(jsonString);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        xhrSuccess = true;
                        checkRequests();
                    }
                };

                const jsonString_2=JSON.stringify(quizBtnEtat);
                const xhr_2 = new XMLHttpRequest();
                xhr_2.open("POST", "quiz_btn.php?quiz_id=" + quizBtnId);
                xhr_2.setRequestHeader("Content-Type", "application/json");
                xhr_2.send(jsonString_2);
                xhr_2.onreadystatechange = function() {
                    if (xhr_2.readyState === 4 && xhr_2.status === 200) {
                        xhr2Success = true;
                        checkRequests();
                    }
                };

                function checkRequests() {
                    if (xhrSuccess && xhr2Success) {
                        location.reload();        
                    }
                }
            });
        });
    });
</script>

</html>
