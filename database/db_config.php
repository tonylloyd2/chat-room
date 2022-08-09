      <?php
          $host = "localhost";
          $username = "lloyd";
          $password = "0220";
          $db_name = "chat";

          $connectdb = mysqli_connect($host,$username,$password,$db_name);

          if (!$connectdb)
          {
            echo "Connection failed<br>";
            echo "Error number: " . mysqli_connect_errno() . "<br>";
            echo "Error message: " . mysqli_connect_error() . "<br>";
            die();
          }
          $DB_HOST = "localhost";
          $DB_USER = "root";
          $DB_PASS = "0220";
          $DB_NAME = "chat";
      
          try{
              $db_connect = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME",$DB_USER,$DB_PASS);
              $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }
          
      ?>  
      