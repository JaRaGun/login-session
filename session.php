<?php
    session_start();

    if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
        $_SESSION['status'] = 'invalid';

        unset($_SESSION['username']);

        pathTo('login');
    }

    function pathTo($destination) {
        echo "<script>window.location.href = '/login session/$destination.php'</script>";
      }
?>