<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uploadPHP</title>
</head>
<body>
<?php
    if(!empty($_FILES['upldcv'])){
        $path="uploads";
        $path=$path.basename($_FILES['upldcv']['name']);
        echo "Temp Name : ";
        echo $_FILES['upldcv']['tmp_name'];

        if(move_uploaded_file($_FILES['upldcv']['tmp_name'],$path)){
            echo "<br><br>The File ".basename($_FILES['upldcv']['name'])." has been uploadeds successfully!";
            echo "<br><br>size:".basename($_FILES['upldcv']['size']);
        }
    }
    else{
        echo "There is a error in uploading the file.... please try again. ";


    }
    print_r($_FILES);
?>
</body>
</html>

