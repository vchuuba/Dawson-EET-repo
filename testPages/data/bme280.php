<!DOCTYPE html>
<html>
    <head>
        <title>humidity sensor</title>
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
        ?>
      </p>

      <p>
        <?php
          $raw = `/var/www/html/Dawson-EET-repo/testPages/raspberry-pi-bme280`; // Variable run program. 
          echo $raw; // Run and display result to terminal. 
          $deserialized = json_decode($raw, true); // Convert to php array and save to variable. 
          var_dump($deserialized); // Displays array info. 
          
          if ($deserialized !== null && is_array($deserialized)) {
              echo json_encode([
                  "temperature" => htmlspecialchars($deserialized["temperature"] ?? "N/A"),
                  "pressure" => htmlspecialchars($deserialized["pressure"] ?? "N/A"),
                  "altitude" => htmlspecialchars($deserialized["altitude"] ?? "N/A")
              ]);
          } else {
              echo json_encode([
                  "error" => "Failed to read sensor data or decode JSON."
              ]);
          }

          mysqli_close($conn); //upload?
        ?>
      </p>

      <a href="buttons.html">Go back.</a>

    </body>
</html>