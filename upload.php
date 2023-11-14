
<?php
require 'connection.php';
session_start();
$id = $_SESSION['user_id'];
    $query = " SELECT * FROM users WHERE user_id = $id";
    $fetchUser = $db_connect->query($query);
    if($fetchUser){
        $getUser=$fetchUser->fetch_assoc();
        $userPic = $getUser['profile_pic'];
        // echo $userPic;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <img src='<?php echo "image/$userPic"?>' class="img-fluid rounded-5" alt="" style="height:80px; weight:30px">
    <form action="submitimg.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="picture" accept="image/*">
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>