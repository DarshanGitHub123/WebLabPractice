<?php
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $hashedPassword=sha1($password);

    $con=mysqli_connect("localhost","root","","ExamLogin");
    if(mysqli_connect_errno()){
        print("Error in connection ".mysqli_connect_error());
        exit();
    }
    $query="SELECT * from users";
    $result=mysqli_query($con,$query);

    if(mysqli_error($con)){
        printf("query not run!!!!!");
        exit();
    }

    $rows=mysqli_num_rows($result);
    $flag=0;
    if($rows>0){
        for($i=0;$i<$rows;$i++){
            $row=mysqli_fetch_array($result);
            if($userid==$row['userid']){
                if($hashedPassword==$row['password']){
                    echo "login successfully.";
                    $flag=1;
                    break;
                }
            }
        }

        if($flag==0){
            echo "invalid credential password";
        }
    }
    else{
        echo "no users found in DB";
    }



    mysqli_close($con);
?>