<?php 
require('./database.php');
function pathTo($destination)
{
    echo "<script>window.location.href = '/login session/$destination.php'</script>";
}
if(isset($_POST['register']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    if(empty($username) || empty($password) || empty($confirmPassword)){
       $errorMessage = "Please fill all the fields";
    }
    else{
        if($password != $confirmPassword){
           $errorMessage = "Password does not match.";
        }
        else{
            $queryValidate = "SELECT username FROM accounts WHERE username = '$username'";
            $sqlValidate = mysqli_query($connection, $queryValidate);

            if(mysqli_num_rows($sqlValidate) > 0){
                $errorMessage = "Username already exists.";
            }
            else{
                $queryRegister = "INSERT INTO accounts VALUES (null,'$username', md5('$password'))";
                $sqlRegister = mysqli_query($connection, $queryRegister);

                if($sqlRegister){
                    $accountCreated = "Account created successfully.";
                    pathTo('login');
                }
                else{
                   $errorMessage ="Something went wrong.";
                }
            }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            background: url('https://c4.wallpaperflare.com/wallpaper/15/542/473/anime-anime-girls-honkai-impact-yae-sakura-honkai-impact-wallpaper-preview.jpg') no-repeat center;
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
            <form action='/login session/logout.php' class="d-flex justify-content-end p-2" method="post">
                <input type="submit" class="btn btn-lg" value="Back to Login" />
            </form>
        <div class="container d-flex justify-content-center align-items-center">
            <form class="p-5 glass rounded" action="/login session/register.php" method="post">
            <div class="d-flex justify-content-between">
                    <h3>Register</h3>
                      <div><img src="https://c.tenor.com/IVFczHwctP4AAAAi/kawaii-anime.gif" alt="bunny"class="img-fluid" style="height:75px;"></div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password"class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmPassword"class="form-control <?php ?>" id="confirmPassword">
                </div>
                <?php
                        if(isset($errorMessage)){
                        echo '<div class="alert alert-danger" role="alert">'.$errorMessage.'</div>';
                        } 
                        else{
                            if(isset($accountCreated)){
                                echo '<div class="alert alert-success" role="alert">'.$accountCreated.'</div>';
                            }
                        }
                ?>
                <input type="submit" class="btn" name="register" value="Register">
            </form>
        </div>
       
    </div>
</body>
</html>
