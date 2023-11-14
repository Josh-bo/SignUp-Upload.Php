<?php
require 'connection.php';
session_start();
 if(isset($_POST['submit'])){
     $picname = $_FILES['picture']['name'];
     print_r($_FILES['picture']);
    echo "<br>";
    $temp = $_FILES['picture']['tmp_name'];  ;
    print_r ($picname);
    echo "<br>";
    print_r ($temp);
    echo "<br>";
    $anothername = time().$picname;
    echo $anothername;
    $id = $_SESSION['user_id'];
    $movefile = move_uploaded_file($temp, 'image/'.$anothername);
    // echo $movefile;
    if($movefile){
        $query = "UPDATE users SET profile_pic ='$anothername' WHERE user_id = $id";
        $setPicture = $db_connect->query($query);
        echo "<br>";
        echo $setPicture;
        if($setPicture){
            header("Location:upload.php");
        }
        
    }


 }
?>