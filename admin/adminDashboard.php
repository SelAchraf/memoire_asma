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
    <div class="col-sm-9 mt-5" style="margin-left: 17rem; ">
        <div class="row mx-5 text-center" style="margin-top: 10rem; ">
            <div class="col-sm-4 mt-5" >
                <div class="card text-white bg-danger mb-3" bstyle="max-width: 18rem;">
                    <div class="card-header">Courses</div>
                    <div class="card-body">
                        <h4 class="card-title">5</h4>
                        <a class="btn text-white" href="#">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Students</div>
                    <div class="card-body">
                        <h4 class="card-title">5</h4>
                        <a class="btn text-white" href="#">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Sold</div>
                    <div class="card-body">
                        <h4 class="card-title">5</h4>
                        <a class="btn text-white" href="#">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>