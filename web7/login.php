<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginPHP</title>
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
        $query="SELECT * FROM users";
        $result=mysqli_query($con,$query);
        if(mysqli_error($con)){
            print("query couldn't be run");
            exit();
        }
        
        $rowCnt=mysqli_num_rows($result);

        $flag=0;
        if($rowCnt>0){
            $row=mysqli_fetch_array($result);
            for($i=0;$i<$rowCnt;$i++){
                if($userid=$row['name']){
                    if($hashedPassword==$row['password']){
                        echo "login successful";
                        $flag=1;
                        break;
                    }
                }
                $row=mysqli_fetch_array($result);
            }
            if($flag==0){
                echo "login unsuccessful ...Password not matched";
            }
        }else{
            echo "No users found!!!!!!";
        }

        mysqli_close($con);
    ?>
</body>
</html>