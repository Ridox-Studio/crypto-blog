<?php
session_start();
if (!isset($_SESSION['admin'])) {
    # code...
    // header("../");
    session_unset();
    session_destroy();
    echo   $_SESSION['admin'];
}

if (isset($_POST['submit'])) {
    # code...
    $Title  = filter_var($_POST['Title'], FILTER_SANITIZE_STRING);
    $Descreption  = filter_var($_POST['Descreption'], FILTER_SANITIZE_STRING); 
    $Image  = filter_var($_POST['image'], FILTER_SANITIZE_STRING); 
    $postedBy = $_SESSION['admin'];

require_once "dbh.inc.php";
require_once "function.inc.php";
// echo "encrypted";

$NotEmpty = false;
if (empty($Image)) {
        echo '<div class="alert-box alert-warn">Random Image Fail to load</div>';
        exit();
        // $NotEmpty = true;
        

      
}
foreach ($_POST as $key) {
    # code...
    if (empty($key)) {
        echo '<div class="alert-box alert-warn">fill in all input</div>';
        exit();
        // $NotEmpty = true;
        

      
}



}
if (uploadtodb($conn, $Title, $Descreption, $Image, $postedBy)) {
    # code..

    echo '<div class="alert-box alert-success">This has been added to your blog</div>';
    echo '<script type="text/javascript"> 
            document.querySelectorAll("input").forEach(element => {
                element.value = "";
                document.querySelector("textarea").value = "";
                document.querySelector("#numberOf").innerHTML = "";
                
            });

            </script>';
}

else {
    echo '<div class="alert-box alert-warn">An Error occured</div>';
}


}
else {
    echo '<div class="alert-box alert-warn">An Error Occured</div>';
}
?>

