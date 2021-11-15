<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        # code...
        header('Location:login.php');
    }
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
                        <span id="">Total Number of post submitted : <span id="numberOf"> 7</span> </span>
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

                </div>
            </div>
        </section>
    </main>
    <script>
    $(document).ready(function() {
            var searchcount = 10;
            $(".form_").submit(function(event) {
                event.preventDefault();
                var Title = $("#Title").val();
                var Descreption = $("#Descreption").val();
                var image = "hi";
                var submit = "100";
                var postedBy = "<?php echo $_SESSION['admin']; ?>";
                $(".errormsg").load("../inc/post.inc.php", {
                    Title:Title,
                    Descreption:Descreption,
                    image:image,
                    submit:submit,
                    
                });
            });
        });
</script>
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
    
</body>

</html>