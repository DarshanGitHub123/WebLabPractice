<?php
    if(!empty($_FILES['upldcv'])){
        $path="upload/";
        $path=$path.basename($_FILES['upldcv']['name']);

        if(move_uploaded_file($_FILES['upldcv']['tmp_name'],$path)){
            echo "file uploaded successfully!!!!";
        }
        echo "<br>";
        echo "size : ".$_FILES['upldcv']['size'];
        echo "<br>";
        print_r($_FILES);
    }
    else{
        echo "error in uploading file.please try again!!!!!!";
    }
?>
