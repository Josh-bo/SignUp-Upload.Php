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
        session_start();
          if(isset($_SESSION['msg'])){
            echo "<div class='alert alert-danger text-center'>".$_SESSION['msg']."</div>";
            session_unset();
          }
        ?>
      </div>

      <div class="text-center">
        <h3 class="mb-3 fs-1">SIGN UP</h3>
        <small>New PHP</small>
        <form action="submit.php" method='post'>
        <input type="text" placeholder="First name" name="firstName" class="form-control my-2">
        <input type="text" placeholder="Last name" name="lastName" class="form-control my-2">
        <input type="text" placeholder="Email" name="email" class="form-control my-2">
        <input type="text" placeholder="Phone Number" name="phoneNumber" class="form-control my-2">
        <input type="text" placeholder="Password" name="password" class="form-control my-2">

        <button type="submit" name="submit" value="submit" class="btn btn-success w-100">SUBMIT</button>
    </form>
      </div>
    </div>
</body>
</html>