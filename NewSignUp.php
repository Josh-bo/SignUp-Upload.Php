<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container mt-5">
      <div>
        <?php
        require 'connection.php';
        session_start();
          if(isset($_POST['submit'])){
            // echo 'yes';
            print_r($_POST);

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $password = $_POST['password'];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // echo $hashedPassword;

            $query = "INSERT INTO users (first_name, last_name, email, phone_number, password) VALUES (?,?,?,?,?)";
            $prepare = $db_connect -> prepare($query);
            $prepare -> bind_param('sssss', $firstName, $lastName, $email, $phoneNumber, $hashedPassword);
            $check = $prepare -> execute();
            // print_r($check);

            if($check){
                print_r($check);
            }
            else{
                echo 'none';
            }
          }
        ?>
      </div>

      <div class="text-center col-lg-6 mx-auto">
        <h3 class="mb-3 fs-1">SIGN UP</h3>
        <small>NewSignUp PHP</small>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
        <input type="text" placeholder="First name" name="firstName" class="form-control my-2">
        <input type="text" placeholder="Last name" name="lastName" class="form-control my-2">
        <input type="text" placeholder="Email" name="email" class="form-control my-2">
        <input type="text" placeholder="Phone Number" name="phoneNumber" class="form-control my-2">
        <input type="text" placeholder="Password" name="password" class="form-control my-2">

        <button type="submit" name="submit" value="submit" class="btn btn-dark w-100">SUBMIT</button>
    </form>
      </div>
    </div>
</body>
</html>