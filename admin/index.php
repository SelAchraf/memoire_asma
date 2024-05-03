<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login Page</title>
    <style>
        body{
            background-color: #1d2630;
        }
        .container{
            margin-top: 150px;
            
        }
        .input{
            min-width: 60px;
            min-height: 50px;
        }
        .btn-success{
            margin-left: 200px;
            margin-top: 30px;
            width: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3 align="center">
                <form action="login.php" method="POST">
                    <div style="align-items: center; color: white; font-size: 60px; margin-left: 100px; margin-bottom: 40px;">Admin Login</div>
                    <input type="text" name="username" class="form-control input" placeholder="Entre username"><br />
                    <input type="password" name="password" class="form-control input" placeholder="Entre password">
                    <input type="submit" value="Login" class="btn btn-success" style="font-size: 20px;" >
                </form>
            </div>
        </div>
    </div>
</body>
</html>
