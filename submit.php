<?php
    require 'connection.php';
    session_start();
    
    if(isset($_POST['submit'])){
        print_r($_POST);

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];

        // VERIFYING EMAIL.

        $gettingMails = "SELECT * FROM users WHERE email = '$email'";
        $emailVerify = $db_connect -> query($gettingMails);
        print_r($emailVerify);

        if($emailVerify -> num_rows > 0){
            $_SESSION['msg'] = "Email already been used";
            header('location:NewSignUp.php');
        }
        else{
            // HASHING OF PASSWORD.
            
            $hashedPassword = password_hash ($password, PASSWORD_DEFAULT);
            echo $hashedPassword;

            // SAVING INSIDE DATABASE.

            $UserDetails = "INSERT INTO users (first_name, last_name, email, phone_number, password) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$hashedPassword')";


            
            $SavedData = $db_connect -> query($UserDetails);
            // print_r($SavedData);
        
        
            if($SavedData){
                header('location:NewLogin.php');
            }
            else{
                echo '<div class="alert alert-danger text-center">Error occurred</div>';
                header('location:NewSignUp.php');
            }
        }
    }


?>