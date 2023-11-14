<?php
    require 'connection.php';
    session_start();

    if(isset($_POST['submit'])){

        // print_r($_POST);
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        // echo ($password);
        
        $userMail = "SELECT email, password, user_id FROM users WHERE email = ?";
        $userQuery = $db_connect -> prepare($userMail);
        $userQuery -> bind_param('s', $email);
        $userQuery -> execute();
        $userQuery->bind_result($emailresult, $passwordresult, $userId);
        if($userQuery->fetch()){
            $_SESSION['user_id'] = $userId;
            echo $userId;
            echo 'correct';
            header('location:upload.php');
        }
        // if($userQuery){

        //     if($bind){
        //         // print_r($result);
        //         if($result -> num_rows > 0){
        //             $userData = $result->fetch_assoc();
        //             // print_r ($userData['password']);
        //             $getHashedPassword = $userData['password'];
        //             $userId = $userData['user_id'];
        //             $_SESSION['user_id'] = $userId;
        //             echo $userId;
        //             // echo $getHashedPassword;

        //             if (password_verify($password, $getHashedPassword)){
                       
        //             }
        //         }
        //     }

        // }
        // print_r($newMe);
        // if($userQuery -> num_rows > 0) {
        //     echo "yes";
        // }
        // else{
        //     echo 'No';
        // }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="text-center mt-3 col-lg-6 mx-auto">
            <b class="fs-1">New Login Page</b>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="text" class="form-control my-2" name="email" id="" placeholder="Email">
                <input type="text" class="form-control my-2" name="password" id="" placeholder="Password" >

                <button type="submit" name="submit" class="w-100 btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>