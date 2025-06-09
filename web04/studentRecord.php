<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record</title>
</head>
<body>
    <?php
        $name=$_GET['name'];
        $usn=$_GET['usn'];
        $cgpa=$_GET['cgpa'];

        $con=mysqli_connect("localhost","root","","studentDB");
        if(mysqli_connect_errno()){
            print("failed to connect ".mysqli_connect_error());
            exit();
        }
        else{
            print("Connection Successfull to database");
        }
        $query="INSERT INTO student VALUES('$name','$usn','$cgpa')";
        $result=mysqli_query($con,$query);

        if(mysqli_error($con)){
            print("query couldn't be executed");
            exit();
        }
        mysqli_close($con);
    ?>
</body>
</html>