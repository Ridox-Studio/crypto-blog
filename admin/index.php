<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        # code...
        header('Location:login.php');
    }
    require_once '../inc/dbh.inc.php';
    require_once '../inc/function.inc.php';
                
    $sql = "SELECT * FROM posts;";
                
    $resultmsg = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($resultmsg);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME BACK LISTMINING</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/lgscreen.css">
    <link rel="stylesheet" href="css/warn.css">
    <link rel="stylesheet" href="css/smscreen.css">
    <script src="../scripts/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        
        <div class="header_wrapper">
            <div class="header_logo">
                ADMIN
            </div>
            <nav>
                <ul>
                    <li><a href="../">Home</a></li>
                    <li><a href="">BTC</a></li>
                    <li><a href="">All News</a></li>
                    <li><a href="">Coins</a></li>
                    <li><a href="../inc/logout.inc.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        
    </header>
    <main>
        <section class="main-wrapper">
            <div class="room room1">
                <div class="room_wrapper">
                    <div class="room_header">
                        <h2>Dasboard</h2>
                        <span id="">Total Number of post submitted : <span id="numberOf"> <?php echo $resultcheck; ?></span> </span>
                    </div>
                    <div class="room_main">
                        <div class="room_sub_header">
                            Add a post
                        </div>
                        <div class="room_form">
                            <form action="" method="post" class="form_">
                                <div class="input_wrapper">
                                    <label for="Title">Title of the blog</label>
                                    <input type="text" id="Title" name="Title">
                                </div>
                                <div class="input_wrapper textarea">
                                    <label for="Descreption">Body of the blog</label>
                                    <textarea name="Descreption" id="Descreption" ></textarea>
                                </div>
                                <div class="input_wrapper no_entery">
                                    <!-- <label for=""></label> -->
                                    <button type="submit" name="submit" >POST</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="room room2">
                <div class="room_wrapper all_post">
                    <div class="all_post_header">
                        <h1>ALL POST</h1>
                    </div>
                    <div class="all_post_main">
                        <!-- <article class="article_post">
                            MARKET CAP CRIPPLES INVESTORS ON 12% ALL-TIME LOW
                            <button href="" class="delete" data-me="he">Delete</button>
                        </article> -->
                         <?php
                            require_once '../inc/dbh.inc.php';
                            require_once '../inc/function.inc.php';
                
                            $sql = "SELECT * FROM posts;";
                
                            $resultmsg = mysqli_query($conn, $sql);
                            $resultcheck = mysqli_num_rows($resultmsg);
                        $nn = 1;
                
                            if ($resultcheck > 0) {
                
                              while ($row = mysqli_fetch_assoc($resultmsg)) {
                
                                  # code...
                                  echo '<article class="article_post">
                                            '.$row['title'].'
                                            <button href="" class="delete" data-me="'.$row['POST_ID'].'" id="'.$row['POST_ID'].'" onclick="deleteMe(this)">Delete</button>
                                        </article>';
                                  
                            }
                            }
                
                            elseif ($resultcheck == 0) {
                              echo '<article class="article_post">
                                        NO POST AVALIABLE
                                        <a href="" class="delete" data-me="he">REFRESH</a>
                                    </article>';
                            }
                     ?>
                     

                    </div>

                </div>
            </div>
        </section>
    </main>
    <div class="errormsg">
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
                        case 'emptyinput':
                            echo '<div class="alert-box alert-warn">fill in all input</div>';
                            # code...
                            break;
                            case 'stmtfailed':
                                echo '<div class="alert-box alert-danger">Something  went wrong</div>';
                                # code...
                                break;
            
                            default:
                            echo '<div class="alert-box alert-success">Welcome Back '.$_SESSION['admin'].'</div>';
                            # code...
                            break;
                        }
                    }
                    else {
                echo '<div class="alert-box alert-success">Welcome Back '.$_SESSION['admin'].'</div>';
                # code...
            }
            ?>
        </div>
    <script>
        var postid = "";
        // document.querySelector(".delete").dataset.me
        function deleteMe(thi){
            postid = thi.dataset.me;

            // console.log(postid);
            // $(document).ready(function() {
            // var searchcount = 10;
            $(document).ready(function() {
             
                
                // console.log(postid);
            //     event.preventDefault();
            //     var busname = $("#busname").val();
            //     var fullname = $("#fullname").val();
            //     var state = $("#state").val();
            //     var email = $("#email").val();
            //     var phone = $("#phone").val();
            //     var submit = $("#savePro").val();
            //     
                $(".all_post_main").load("../inc/delete.inc.php", {
                    postid:postid
                });
            
           
        });
        }
        function checkStaus(){
            if (window.navigator.onLine === false) {
                            document.querySelector(".alert-box").innerHTML="Check your Internet Connection";
                            $(".alert-box").removeClass("alert-success");
                            $(".alert-box").addClass("alert-warn");
                            document.querySelector(".alert-box").style = "visibility:visible;";
                            setTimeout(() => {
                            document.querySelector(".alert-box").style = "visibility:hidden;";
                                
                            }, 3000);
            }
            else{
                document.querySelector(".alert-box").innerHTML="Checking for Image";
                            $(".alert-box").removeClass("alert-warn");
                            $(".alert-box").addClass("alert-success");
                            document.querySelector(".alert-box").style = "visibility:visible;";
                            setTimeout(() => {
                            document.querySelector(".alert-box").style = "visibility:hidden;";
                                
                            }, 3000);
            }
            
        }
        $(document).ready(function() {
            var searchcount;

            $(".form_").submit(function(event) {
                event.preventDefault();
                var Title = $("#Title").val();
                var image = "";

                let clientId = "opldphTvzfpI_DK8LnPuxO2SdjSeA-nqVG_TUrgpOmc";
                let endpoint = `https://api.unsplash.com/search/photos/?client_id=${clientId}`;
                endpoint = `https://api.unsplash.com/search/photos?page=1&query=${Title}&client_id=${clientId}&order_by=relevant`;
                console.log(endpoint);
                console.log(window.navigator.onLine);
                checkStaus();
                fetch(endpoint)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (jsonData) {
                        // console.log(jsonData.results[0].urls.regular);
                        // this is the jsonDAta 
                        // to get random image(number)
                        // This is The json fetch
                        let rand = Math.floor((Math.random() * jsonData.results.length));
                        console.log(rand);
                        console.log(jsonData.results);
                        if (jsonData.results.length == 0) {
                            image = "";
                            document.querySelector(".alert-box").innerHTML="An error occur with Image to be Loaded. you can try adjusting the blog title";
                            $(".alert-box").removeClass("alert-success");
                            $(".alert-box").addClass("alert-warn");
                            document.querySelector(".alert-box").style = "visibility:visible;";
                            setTimeout(() => {
                            document.querySelector(".alert-box").style = "visibility:hidden;";
                                
                            }, 3000);

                        }
                        else{
                            image = jsonData.results[rand].urls.regular;

                        }
                        // console.log(jsonData.results[rand].urls.regular);
                        var Descreption = $("#Descreption").val();
                        // console.log("image:::::: "+image);
                        var submit = "100";
                        var postedBy = "<?php echo $_SESSION['admin']; ?>";
                        $(".errormsg").load("../inc/post.inc.php", {
                        Title:Title,
                        Descreption:Descreption,
                        image:image,
                        submit:submit,
                    
                });

                    })
                
            });

           
        });
</script>
    
    
</body>

</html>