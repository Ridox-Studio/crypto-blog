<?php

if (isset($_POST['postid'])) {
  require_once 'dbh.inc.php';
  require_once 'function.inc.php';
  $postId = $_POST['postid'];
//   postexist($conn, $prdid);
  if (!postexist($conn, $postId)) {
      # code...
      echo "LLK";
  }
  
 else {
    //  deleteitem($conn, $postId);
     if (deleteitem($conn, $postId)) {
         # code...
         include_once "reload.inc.php";
         echo'  
                             <script type="text/javascript">
                            $(document).ready(function() {
                            document.querySelector(".alert-box").innerHTML="SucessFully Deleted";
                            document.querySelector("#numberOf").innerHTML="'.$resultcheck.'";
                                                $(".alert-box").removeClass("alert-warn");
                                                $(".alert-box").addClass("alert-success");
                                                document.querySelector(".alert-box").style = "visibility:visible;";
                                                setTimeout(() => {
                                                document.querySelector(".alert-box").style = "visibility:hidden;";
                                
                                                }, 3000);
                                            });
                                            </script>';
     }
     else{
         echo'  
         <script type="text/javascript">
         $(document).ready(function() {
         document.querySelector(".alert-box").innerHTML="An error while trying to delete";
                            $(".alert-box").removeClass("alert-success");
                            $(".alert-box").addClass("alert-warn");
                            document.querySelector(".alert-box").style = "visibility:visible;";
                            setTimeout(() => {
                            document.querySelector(".alert-box").style = "visibility:hidden;";
                                
                            }, 3000);
                        });
                        </script>';
     }
     # code...

 }
  



}
else {
  header("location:index.php");
}
 ?>

efkl;mgprk;m,