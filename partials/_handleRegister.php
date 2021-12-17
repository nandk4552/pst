<?php
$showError = "false";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '_dbconnect.php';
    // $user_email = $_POST['signupEmail'];
    $p_number = mysqli_real_escape_string($conn, $_POST['p_number']);

    // $pass = $_POST['sigupPassword'];
    $pass = mysqli_real_escape_string($conn, $_POST['sigupPassword']);

    // $cpass = $_POST['signupcPassword'];
    $cpass = mysqli_real_escape_string($conn, $_POST['signupcPassword']);

    // check whether the username exists already
    $existSql = "SELECT * FROM `tbl_student` WHERE parent_number = '$p_number'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);


    if ($numRows > 0) {
        $showError = "Email already in use";
    } else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `parent_number`, `parent_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result = true) {
                echo $result;
                $showAlert = true;
                header('Location:' . SITEURL . '?signupsuccess=true');
                exit();
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
    header('Location:' . SITEURL . '?signupsuccess=false&error=$showError');
}
