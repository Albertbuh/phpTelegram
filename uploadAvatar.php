<!DOCTYPE html>
<html>
<head>
    <title>SigninChat</title>
    <meta nane="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="stylesheet" href="Styles/login.css">
    <link rel="stylesheet" href="Styles/extendedStyles.css">
    <style>
        h3 {
            color:white;
            font-family: Roboto;
            font-size: 24px;
            text-align: center;
            margin-top: 0px;
            margin-bottom: 0px;
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>SETTINGS</h1>
        <form method="post" action="signup.php" enctype="multipart/form-data">
            <h3 >Avatar</h3>
            <div class="txt_field">
                <input type="file" name="avatar">
            </div>
            <input type="submit" value="Save" style="margin-bottom:15px;"/>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_FILES["avatar"]))
    {
        $target_dir = "Pictures/avatars/";
        $uploadOk = 1;
        $FileType = strtolower(pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION));  
        $target_file = $target_dir . $_COOKIE["name"] . "_avatar." . $FileType; 
    
        // Check file size
        if ($_FILES["avatar"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
    //
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
    }
?>

