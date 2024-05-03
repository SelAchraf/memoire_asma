<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
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
    
    <?php
        include('db/dbConnection.php');
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            ?>
            <div class="col-sm-9 mt-5" style="margin-left: 17rem;">
                <!--table-->
                <p class="bg-dark text-white p-2">List of courses</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Language</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = $result->fetch_assoc()){ 
                                echo '<tr>';
                                echo '<th scope="row">'.$row['course_id'].'</th>';
                                echo '<td>'.$row['course_name'].'</td>';
                                echo '<td>'.$row['course_lang'].'</td>';
                                echo  
                                '<td>
                                    <form action="editCourse.php" method="Post" class="d-inline">
                                        <input type="hidden" name="id" value='.$row["course_id"].'>
                                        <button
                                        type="submit"
                                        class="btn btn-info mr-3"
                                        name="view"
                                        value="View">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </form>
                                    <form action="" method="Post" class="d-inline">
                                        <input type="hidden" name="id" value='.$row["course_id"].'>
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
        else {
            echo "<div class='col-sm-9 mt-5' style='margin-left: 17rem;'>";
            echo "<div class='alert alert-danger' role='alert'>0 Result</div>";
            echo "</div>";
        } 

        if(isset($_REQUEST['delete'])){
            $sql="DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
            if($conn->query($sql)==TRUE){
                echo '<mete http-equiv="refresh" content="0;URL=?deleted" />';   
            }
            else{
                echo"Unable to delete data";
            }
        }
    ?>
    
    <div>
        <a class="btn btn-success box" href="addCourse.php">
            <i class="fas fa-plus fa-2x"></i>
        </a>
    </div>
</body>
</html>