
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">       
                    <!-------------      image     ------------->
                    <img src="white.png" width:"45%" height:"100%" >
                </div>
                <?php
                    include("admin/db/dbConnection.php");   
                    if(isset($_POST['submit'])){
                        $email = $_POST['email'];
                        $password=$_POST['password'];
                        $result= mysqli_query($conn,"SELECT * FROM student WHERE email='$email' AND password='$password'") or die("erreur");
                        if(mysqli_num_rows($result)>0){
                            header('Location:Dashboard.php');
                        }
                        else{
                            echo 
                            "<script>
                                swal({
                                    title: 'Failed',
                                    text: 'Email or password is incorrect. Try Again.',
                                    icon: 'error',
                                });
                            </script>";
                        }
                    }
                ?>
                <div class="col-md-6 right">
                    <form id="form" action="connexion.php" method="post">
                        <div class="input-box">
                            <header>Sign in</header>
                            <div class="input-field">
                                <input type="text" class="input" id="email" name="email" required="" autocomplete="off">
                                <label for="email">Email</label> 
                                <span id="name_error"></span>
                            </div> 
                            <div class="input-field">
                                <input type="password" class="input" id="pass" name="password" required="">
                                <label for="pass">Password</label>
                                <span  id="name_error"></span>
                            </div>  
                            <div class="input-field">
                                <input type="submit" class="submit" value="Log In" name="submit">
                            </div> 
                            <div class="signin">
                                <span>Don't have an account? <a href="inscription.php">Sign up here</a></span>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="connexion.js"></script>
</body>
</html>