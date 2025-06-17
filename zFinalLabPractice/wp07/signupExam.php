<?php

    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $hashedPassword=sha1($password);

    $con=mysqli_connect("localhost","root","","ExamLogin");
    if(mysqli_connect_errno()){
        print("Eroor in connection ".mysqli_connect_error());
        exit();
    }
    $query="INSERT iNTO users(userid,password) VALUES('$userid','$hashedPassword')";
    $result=mysqli_query($con,$query);

    if(mysqli_error($con)){
        printf("query not run!!!!!");
        exit();
    }
    echo "signup successfully";
    mysqli_close($con);
?>