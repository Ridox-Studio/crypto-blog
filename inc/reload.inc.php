<?php
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';
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
                            
                            }
                
                            elseif ($resultcheck == 0) {
                              echo '<article class="article_post">
                                        NO POST AVALIABLE
                                        <a href=" " class="delete" data-me="he">REFRESH</a>
                                    </article>';
                            }
?>