    <?php
     @session_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN</title>
    </head>

    <body>
        <form action="" method="post">
            <input type="text" name="email" placeholder="email" require>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" name="submit" value="submit">
        </form>
        <?php
        if (isset($_POST["submit"])){
          if((isset($_COOKIE["spam"])==false&&empty($_COOKIE["spam"]))){
            setcookie("spam",0,time()+60);
            $_COOKIE["spam"]=0;
          }


          if($_COOKIE["spam"]<3){
            $file = fopen('data.txt','r');
            $valide_email = 0;
            while(!feof($file)){
              $user_data = fgets($file);
              $user_data = explode("-",$user_data);
              if($_POST["email"]==$user_data[0]){
                $valide_email=1;
                if($_POST["password"]==$user_data[1]){
                  $_SESSION["user"]=$user_data[2];
                  header("Location: ./loged.php");
                  die();
                }else{
                  echo"wrong password";
                  setcookie("spam",$_COOKIE["spam"]+1,time()+60);
                  break;
                }
              }
            }
            fclose($file);
            if($valide_email==0){
              echo "invalide e-mail";
              setcookie("spam",$_COOKIE["spam"]+1,time()+60);
            }

          }else{
            echo"u got banned !! please wait 1min";
          }
      }
      
        ?>
    </body>

    </html>