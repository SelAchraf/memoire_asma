<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">       
                    <!-------------      image     ------------->
                    <img src="dark.png" width:"45%" height:"100%" >  
                </div>
                <div class="col-md-6 right">
                    <?php
                        include("admin/db/dbConnection.php");
                        if(isset($_POST['submit'])){
                            $name=$_POST['name'];
                            $email = $_POST['email'];
                            $password=$_POST['password'];
                            $verify_query = mysqli_query($conn,"SELECT email FROM student WHERE email='$email'");
                            if(mysqli_num_rows($verify_query) !=0 ){
                                echo 
                                "<div class='message'>
                                    <p>this email is used </p>
                                </div>
                                <br>";
                            }
                            else{
                                mysqli_query($conn, "INSERT INTO student(name,email,password) VALUES('$name','$email','$password')") or die("error");
                                header("Location:dashboard.php");
                            }
                        }
                        else{
                            ?>
                            <form id="form" method="post" action="inscription.php">
                                <div class="input-box">
                                    <header>Create account</header>
                                    <div class="input-field">
                                        <input type="text" class="input" id="name" name="name" required="" autocomplete="off">
                                        <label for="name">Name</label> 
                                    </div> 
                                    <div class="input-field">
                                        <input type="text" class="input"  id="email" name="email" required="" autocomplete="off">
                                        <label for="email">Email</label> 
                                    </div>
                                    <div class="input-field">
                                        <input type="password" class="input" id="pass" name="password" required="">
                                        <label for="pass">Password</label>
                                    </div> 
                                    <div class="input-field">
                                        <input type="submit" class="submit" value="Sign Up" name="submit">
                                    </div> 
                                    <div class="signin">
                                        <span>Already you have an account? <a href="connexio.php" >Log in here</a></span>
                                    </div>
                                </div>  
                            </form>
                            <?php 
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="inscription.js"></script>
</body>
</html>