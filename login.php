<?php 
require('./database.php');
session_start();
function pathTo($destination)
{
    echo "<script>window.location.href = '/login session/$destination.php'</script>";
}

if(isset($_POST['register'])){
    pathTo('register');
}

if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
    $_SESSION['status'] = 'invalid';
}

if($_SESSION['status'] =='valid')
{
    pathTo('home');
}

if(isset($_POST['login']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($username) || empty($password)){
       $errorMessage = "Please fill all the fields.";
    }
    else{
        $queryValidate = "SELECT username FROM accounts WHERE username = '$username' AND password = md5('$password')";
        $sqlValidate = mysqli_query($connection, $queryValidate);
        $rowValidate = mysqli_fetch_array($sqlValidate);

        if(mysqli_num_rows($sqlValidate) > 0){
            $_SESSION['status'] = 'valid';
            $_SESSION['username'] = $rowValidate['username'];
            pathTo('home');
        }
        else{
            $errorMessage = "User does not exist.";
        }
    }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

        /* base styles */
        * {
            font-family: "Quicksand";
            color: #377D71;
        }
         body{
            background: url('https://c4.wallpaperflare.com/wallpaper/919/989/264/anime-anime-girls-honkai-impact-yae-sakura-honkai-impact-wallpaper-preview.jpg') no-repeat center;
            background-size: cover;
            height: 100vh;
         }
         .btn{
            background-color: #FBC5C5;
            color: #377D71;
         }
         .btn:hover{
            background-color: transparent;
            color: #8879B0;
         }
         .glass{
            background: rgba(255,255,255,0.3);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.15);
         }
    </style>
</head>
<body>
    <div class="home-main text-white">
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <form class="p-5 glass rounded" action="/login session/login.php" method="post">
                <div class="d-flex justify-content-between">
                    <h3>Login</h3>
                      <div><img src="https://c.tenor.com/N0nyO7NqjsoAAAAi/anime-bunny.gif" alt="bunny"class="img-fluid" style="height:75px;"></div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password"class="form-control" id="password">
                </div>
                <div>
                    <input type="submit" class="btn" name="login" value="Login">
                    <input type="submit" class="btn" name="register" value="Register">
                </div>
                    <?php
                        if(isset($errorMessage)){
                            echo '<div class="alert alert-danger mt-4" role="alert">'.$errorMessage.'</div>';
                        }
                    ?>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
