<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signupPHP</title>
</head>
<body>
    <?php
        $userid=$_POST['userid'];
        $password=$_POST['password'];
        $hashedPassword=sha1($password);

        $con=mysqli_connect("localhost","root","","Authentication");
        if(mysqli_connect_errno()){
            print("Failure to connect : ".mysqli_connect_error());
            exit();
        }
        else{
            print("connection successful to DB");
        }
        $query="INSERT INTO users VALUES('$userid','$hashedPassword')";
        $result=mysqli_query($con,$query);
        if(mysqli_error($con)){
            print("query couldn't be run");
            exit();
        }
        mysqli_close($con);
    ?>
</body>
</html>