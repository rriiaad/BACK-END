<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="User name" required>
        <input type="text" name="Email" placeholder="Email" id="mail" required>
        <input type="password" name="password" placeholder="password 3 char len" pattern=".{3,}" required>
        <input type="file" name="file" accept=".PNG" required>
        <input type="number" name="validator" id="validator" value="1" style="display: none">
        <input type="submit" name="submit" value="submit">
    </form>
    <br>
    <div class="error"></div>

    <?php
            if (isset($_POST['submit'])){

            if($_POST["validator"]==1){
                echo "<h1>NOT A VALID E-MAIL</h1>";
            }else{

            $img = $_FILES["file"];
            $imgName = $_FILES["file"]["name"];
            $imgTmpName = $_FILES["file"]["tmp_name"];
            $imgSize = $_FILES["file"]["size"];
            $imgType = $_FILES["file"]["type"];
            $imgError = $_FILES["file"]["error"];

            $imgName = explode('.',$imgName);
            $imgName = strtolower($imgName[1]);

            if($imgName != "png" ||  $imgSize > 1000000 || $imgError == 1  ){
                echo"<h1>THIS FILE IS NOT ALLOWED !!!!!!!!</h1>";
            }else{

            $file=fopen('data.txt','a+');
            $password = password_hash($_POST["password"],PASSWORD_ARGON2I);
            $b=fputs($file,$_POST["nom"].'-'.$_POST["Email"].'-'.$password.chr(13).chr(10));
            fclose($file); 

            $imgID = uniqid("",true)."."."PNG";
            $imglocation = "./img/".$imgID;
            move_uploaded_file($imgTmpName,$imglocation);

            echo "    <h1>Votre réponse a bien était enregistrée</h1>";
            }
        }
    }
        ?>

    <script src="./main.js"></script>
</body>

</html>