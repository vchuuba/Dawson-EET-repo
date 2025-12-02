<!DOCTYPE html>
<html>
    <head>
        <title>GPIO toggle</title>
        <!-- <script>
          window.location.replace("buttons.html");
        </script> -->
    </head>
    <body>
      <p>
        <?php
          $servername = "localhost"; // keep $servername to localhost if doing it on own Pi
          $username = "Arthas";
          $password = "Shell111";
          $dbname = "unitStats";
          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          // Check for successful connection
          if (!$conn) { 
              die("Connection failed: {mysqli_connect_error()}"); 
          } 
          echo "Connected successfully";

          // $sql = "select * from unitList where id={$_POST['unitID']};";		// This can be any valid SQL cmd.
          $sql = "select * from unitList where unitFaction like \"%{$_POST['unitFaction']}%\";";		// This can be any valid SQL cmd.
          $result = mysqli_query($conn, $sql);	// Stores rows retrieved by query.
          echo mysqli_error($conn);	    		// If error, this determines cause.
        ?>
      </p>

      <p>
        <?php
          $raw = `/root/raspberry-pi-bme280/bme280`; // Variable run program. 
          echo $raw; // Run and display result to terminal. 
          $deserialized = json_decode($raw, true); // Convert to php array and save to variable. 
          var_dump($deserialized); // Displays array info. 
          
          mysqli_close($conn);
        ?>
      </p>

        <a href="buttons.html">Go back.</a>

    </body>
</html>