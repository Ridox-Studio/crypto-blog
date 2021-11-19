<?php

if (!isset($_POST['login'])) {
    # code...
    header('Location:../admin/');
    exit();
}

require "dbh.inc.php";
require "function.inc.php";
// foreach ($_POST as $key) {
//     # code...
//     $key = filter_var($key, FILTER_SANITIZE_STRING);
//     if (empty($key)) {
//         # code...
//         header('Location:../admin/login.php?error=emptyinput');
//     }
// }

$userName = filter_var($_POST['LoginUserName'], FILTER_SANITIZE_STRING);
$pwd = filter_var($_POST['LoginPwd'], FILTER_SANITIZE_STRING);

emptyInput($userName);
emptyInput($pwd);
login($conn, $userName, $pwd);
