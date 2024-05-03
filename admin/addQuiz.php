<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
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
        if(!isset($_SESSION)){
            session_start();
        }    
        include('db/dbConnection.php');

        if ( isset($_POST["add_question"])) {
            // Validate and sanitize user inputs
            $course_name = $_REQUEST['course_name'];
            $course_id = $_REQUEST['course_id'];
            $quiz_name = $_REQUEST['quiz_name'];
            $new_question = htmlspecialchars(trim($_POST["new_question"]));
            $choices = array_map('htmlspecialchars', array_map('trim', $_POST["choices"])); // Sanitize choices
            $correct_choice = intval($_POST["correct_choice"]); // Convert to integer for safety
            // Check if the correct choice index is valid
            if ($correct_choice >= 0 && $correct_choice < count($choices)) {
                // Convert the choices array to JSON for storage in the database
                $choices_json = json_encode($choices);
                // Prepare and execute the SQL query using prepared statements
                $stmt = $conn->prepare("INSERT INTO questions (question, choices, correct_choice,course_name,course_id,quiz_name) VALUES (?, ?, ?,?,?,?)");
                $stmt->bind_param("ssisis", $new_question, $choices_json, $correct_choice,$course_name,$course_id,$quiz_name);
                if ($stmt->execute()) {
                    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Quiz Added Successfully</div>';
                } 
                else {
                    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add Lesson</div>';
                }
                // Close the statement
                $stmt->close();
            } 
            else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Index de choix correct invalide.</div>';   
            }
        }
    ?>
    <div class="col-sm-9 mt-5 mx-3 float-xl-right jumbotron " >
        <h1 class="text-center">Add New Quiz</h1>
        <?php
            if(isset($_SESSION['course_id'])) {
                $course_id = $_SESSION['course_id']; // Get course ID from session
            } 
            else {
                $course_id = ""; // Default value if session is not set
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="course_id">Course ID: </label>
                <input type="text" class="form-control" id="course_id" name="course_id" value="<?php echo $_SESSION['course_id'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($_SESSION
                ['course_name'])){echo $_SESSION['course_name'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="quiz_name">Quiz Name</label>
                <input class="form-control" id="quiz_name" name="quiz_name" >
            </div>
            <div class="form-group">
                <label for="new_question">Question :</label><br>
                <input class="form-control" id="new_question" name="new_question" >
            </div>
            <div class="form-group">
                <label for="choice1">Choix 1 :</label><br>
                <input class="form-control" id="choice1" name="choices[]"><br>
                <label for="choice2">Choix 2 :</label><br>
                <input class="form-control" id="choice2" name="choices[]"><br>   
                <label for="choice3">Choix 3 :</label><br>
                <input class="form-control" id="choice3" name="choices[]"><br>
            </div>
            <div class="form-group">
                <label for="correct_choice">Choix Correct :</label><br>
                <select id="correct_choice" name="correct_choice">
                    <option value="0">Choix 1</option>
                    <option value="1">Choix 2</option>
                    <option value="2">Choix 3</option>
                </select>
            </div>
            <?php if(isset($msg)) { echo $msg; } ?>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="quizSubmitBtn" name="add_question">Submit</button>
                <a href="Quizz.php" class="btn btn-secondary">Close</a>
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
