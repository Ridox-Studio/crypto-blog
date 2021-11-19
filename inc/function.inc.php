<?php
function emptyInput($key) {
    if (empty($key)) {
        # code...
        header('Location:../admin/login.php?error=emptyinput');
        exit();
    }

}

function userExist($conn, $userName){
    $sql = "SELECT * FROM admins WHERE userName = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../admin/login.php?error=stmtfailed#formbox");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $userName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function login($conn, $userName, $pwd){
    if (!userExist($conn, $userName)) {
    # code...
    header('Location:../admin/login.php?error=wronglogin');
    exit();

    }
    else {
        $row = userExist($conn, $userName);
        $pwdHashed = $row['Password'];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if ($checkPwd === false) {
            header("location:../admin/login.php?error=wrongpassword");
            exit();
        }
        else{
            session_start();
            $_SESSION['admin'] = $row['userName'];
            header("Location:../admin/");
            exit();
        }

    }
}

function uploadtodb($conn, $Title, $Descreption, $Image, $postedBy){
    if (!userExist($conn, $postedBy)) {
    # code...
    // echo '<div class="alert-box alert-warn">user dont exist</div>';
    // header('Location:../admin/login.php?error=wronglogin');
    return false;
    // exit();

    }
    else {
        $sql = "INSERT INTO `posts` (`title`, `Descriptions`, `Images`, `ADMIN_ID`) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // header("location:../admin/login.php?error=stmtfailed");
                return false;
            // echo '<div class="alert-box alert-warn">An </div>';

            // exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $Title, $Descreption, $Image, $postedBy);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;

    }

}

function postexist($conn, $postId){
  $sql ="SELECT * FROM posts WHERE POST_ID = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    return false;
  }

  mysqli_stmt_bind_param($stmt, "s", $postId);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;

  }

  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);



}

function deleteitem($conn, $postId){
  $sql ="DELETE FROM posts WHERE POST_ID = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    return false;
  }

  mysqli_stmt_bind_param($stmt, "s", $postId);
  mysqli_stmt_execute($stmt);

//   $resultData = mysqli_stmt_get_result($stmt);

  
  mysqli_stmt_close($stmt);
  return true;



}
