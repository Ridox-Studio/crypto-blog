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
         $sql = "SELECT * FROM posts;";
                
                            $resultmsg = mysqli_query($conn, $sql);
                            $resultcheck = mysqli_num_rows($resultmsg);
                        $nn = 1;
                
                            if ($resultcheck > 0) {
                
                              while ($row = mysqli_fetch_assoc($resultmsg)) {
                
                                  # code...
                                  echo '<article class="article_post">
                                            '.$row['title'].'
                                            <button href="" class="delete" data-me="'.$row['POST_ID'].'" onclick="deleteMe(this)">Delete</button>
                                        </article>';
                                  
                            }
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
                
                            elseif ($resultcheck == 0) {
                              echo '<article class="article_post">
                                        NO POST AVALIABLE
                                        <a href=" " class="delete" data-me="he">REFRESH</a>
                                    </article>';
                            }
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