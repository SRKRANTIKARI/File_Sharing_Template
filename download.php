<?php include "assets/head.html"; ?>

    <title>PrivateCDN Download</title>
  </head>
  <body>

    <div class="container">

      <?php
        $name = $_GET['file'];
        $hash = $_GET['hash'];
        $path = "";
        $folder = "cdn/";

        //NO PARAMETERS
        if($name == "" && $hash == ""){

          echo "<h1>NO FILE SPECIFIED</h1>";
          header("Location: index.php");
          die();

        }else{

          //HASH NOT PROVIDED
          if($hash == ""){

            $path = $folder . $name;
            $hash = hash_file( "crc32" , $path);

          }else{
            //NAME NOT PROVIDED
            if($name == ""){

              //HASHES ALL THE FILES AND FINDS THE RIGHT ONE
              foreach (glob($folder . "*") as $filepath) {
                if($hash == hash_file( "crc32" , $filepath)){
                  $path = $filepath;
                  $name = substr($path, strlen($folder));
                }
              }

            }

          }

        }

        //SIZE
        $size = filesize($path);
        $timesRounded = 0;
        $units = array("", "K", "M", "G", "T", "P");

        while($size>1024){
          $size = round($size / 1024, 2);
          $timesRounded++;
        };

        if(file_exists($path)){ //FILE FOUND

          echo "<h1>Download File</h1><br>";
          echo "<p>Someone shared with you the file listed below. Click on the \"Download\" button to start downloading it.</p><br>";
          echo "<div class=\"file\">
                  <img src=\"assets/img/file_icon.svg\">
                  <div>
                    <p><b>" . $name . "</b></p>
                    <p>Size: " . $size . " " . $units[$timesRounded] . "Bytes </p>
                    <p>Hash: " . $hash . "</p>
                  </div>
                </div>";
          echo "<a class=\"btn hvr-shrink\" href=\"" . $path . "\" download>Download</a>";

        }else{ //FILE NOT FOUND

          http_response_code(404);
          header("Location: https://notfound.org/it/notfound");
          die();

        }
      ?>

    </div>

  </body>
</html>
