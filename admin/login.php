<?php

    // require "../inc/dbh.inc.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN AS LISTMINING ADMIN</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/warn.css">

</head>
<body>
    <main>
        <?php
        if (isset($_GET['error'])) {
            # code...
            $error = $_GET['error'];
            switch ($error) {
                case 'wrongpassword':
                    # code...
                    echo '<div class="alert-box alert-warn">Wrong password</div>';
                    break;
                    case 'wronglogin':
                    echo '<div class="alert-box alert-danger">User Not found</div>';
                        # code...
                        break;
                
                default:
                    # code...
                    break;
            }
        }
        ?>
        <div class="login_wrapper">
            <div class="bubble bubble_1"></div>
            <div class="bubble bubble_2"></div>
            <div class="loginBox">
                <div class="loginBox_header">
                    <h2>LOGIN AS ADMIN</h2>
                </div>
                <div class="loginBox_main">
                    <form action="../inc/login.inc.php" method="post">
                        <label for="LoginUserName">Username</label>
                        <input type="text" name="LoginUserName" Placeholder="UserName">
                        <label for="LoginPwd">Password</label>
                        <input type="password" name="LoginPwd" Placeholder="Password">
                        <label for="login"></label>
                        <button type="submit" name="login">Login</button>
                        <label for=""></label>
                    </form>
                </div>
            
            </div>
        </div>
    </main>
    
</body>
</html>