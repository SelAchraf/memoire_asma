<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="bar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="topbar">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb" style="background:linear-gradient(to right,rgb(33, 28, 144),rgb(222, 222, 222))">
                <li class="breadcrumb-item"  ><a href="#" style="color:rgb(252, 252, 252);">Dashboard</a></li>
            </ol>
        </div>
    </div>
    <div class="container" style="margin-left: 12rem;">
        <div class="row mt-3">
            <?php
                include("admin/db/dbConnection.php");
                $sql = "SELECT * FROM course";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $course_id = $row['course_id']; 
                        echo '<div class="column">'; // Adjust column width and margin
                            echo '<div class="card">';
                                echo '<img src="'. str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="...">';
                                echo '<div class="card-body">';
                                    echo '<p class="card-text">'.$row['course_name'].'</p>';
                                    echo '<p class="card-text details">Language: '.$row['course_lang'].'</p>';
                                    echo '<p class="card-text details">Tutor: '.$row['course_tut'].'</p>';
                                echo '</div>';
                                echo '<button><a href="c++.php?course_id='.$course_id.'" class="btn btn-primary">View Course !</a></button><br>';
                                echo '<div class="progress-bar">';
                                    echo '<div id="bar" class="progress">valeur</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
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
                <li>
                    <a href="#" class="b">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="b">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="b">
                        <i class="fas fa-wallet"></i>
                        <span class="nav-item">wallet</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="b">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Task</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="b">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Setting</span>
                    </a>
                </li>
                <li>   
                    <a href="#" class="b">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a>
                </li>
                <li>   
                    <a href="a" class="b" id="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>