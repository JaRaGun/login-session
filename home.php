<?php
    require('./session.php');
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
        }
        body{
            color:#FBC5C5;
        }
        .home-main{
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url("./images/bg-2.jpg");
            background-size: cover;
        }
        .btn{
            background-color: #FBC5C5;
            color: #377D71;
         }
         .btn:hover{
            color: white;
         }
         h1{
            font-size: 5rem;
            font-weight: 900;
            text-align: center;
            margin-top: 50px;
         }
         .intro{
            color:#FBC5C5;
            padding: 30px;
         }
         p{
            font-size: 1.5rem;
         }
    </style>
</head>
<body>
    <div class="home-main text-white">
        <div class="container-fluid d-flex justify-content-between p-4">
            <div class="d-flex align-items-center">
            <img src="https://c.tenor.com/_xr0HcLB4fAAAAAi/sticker.gif" alt="bye"class="img-fluid"style="height:100px;"> <h2>Welcome</h2>
            </div>
            
            <form action='/login session/logout.php' method="post">
                <button class="btn btn-lg">Log Out</button>
            </form>
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column intro"> 
            <h1>Welcome <?php echo $_SESSION['username'];?></h1>
            
            <p class="text-center text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt delectus quia, nemo sit, cum voluptas odio modi, dolorum tempore illo nesciunt obcaecati. Minus voluptas facilis aliquam quod modi consequatur debitis?</p>
        </div>
</body>
</html>