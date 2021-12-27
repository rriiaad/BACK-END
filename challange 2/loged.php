    <?php
      @session_start();
      if (!isset($_SESSION["user"])){
        ?>
    <script>
location.replace("./index.php");
    </script>
    <?php
      }
      ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_SESSION["user"]; ?></title>
    </head>

    <body>

        <?php

      if(isset($_SESSION["user"])){

      if(strcasecmp($_SESSION["user"],"user")==1){
        echo "<button>Create an article</button>";

      }else if(strcasecmp($_SESSION["user"],"admin")==1){
        echo "<button>Create an article</button>
              <button>Modify an article</button>";
        

      }else if(strcasecmp($_SESSION["user"],"superAdmine")==1) {
        echo "<button>Create an article</button>
              <button>Modify an article</button>
              <button>Delete an article</button>";
      }

    }
        ?>
    </body>

    </html>