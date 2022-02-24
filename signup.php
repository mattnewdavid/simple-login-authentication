<?php
    if (isset($_POST['submit'])) {
        require('database.php');
        
        $name = $_POST['name'];
        $password = $_POST['password'];
        $passcheck = $_POST['passwordcheck'];
        $email = $_POST['email'];

        if (empty($name) || empty($password) || empty($email)) {
            header("Location: ../signup.php?error=emptyfields&name=" .$name. "&email=" .$email);
            exit();
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $name)){
            header("Location: ../signup.php?error=invalidcharacters");
            exit();
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=invalidemail&name=" .$name);
            exit();
        }
        elseif (!preg_match("/^[a-zA-Z0-9]*$/", $name)){
            header("Location: ../signup.php?error=invalidname&email=" .$email);
            exit();
        }
        elseif ($password !== $passcheck){
            header("Location: ../signup.php?error=emptyfields&name=" .$name. "&email=" .$email);
            exit();
        }
        else {
            $sql = "SELECT name FROM signupform WHERE name=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../signup.php?error=namealreadyexists&email=".$email);
                    exit();
                }
                else {
                    $sql = "INSERT INTO signupform (name, email, password) VALUES (?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
                }
                else {
                    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            } 
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }}
    // else{
    //     header("Location: ../signup.php");
    //     exit();
    // }
 ?>