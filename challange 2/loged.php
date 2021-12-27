    <?php
      @session_start();
      if (!isset($_SESSION["user"])){
        ?>
    <script>
location.href = "./index.php"
    </script>
    <?php
      }
      ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
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