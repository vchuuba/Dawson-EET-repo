<!DOCTYPE html>
<html>
    <head>
        <title>humidity sensor</title>

    </head>
    <body>
      <p>
        <?php
          $raw = `/var/www/html/Dawson-EET-repo/testPages/raspberry-pi-bme280/bme280`; // Variable run program. 
          echo $raw; // Run and display result to terminal. 
          $data = json_decode($raw, true); // Convert to php array and save to variable. 
          var_dump($data); // Displays array info. 
          
          if ($data !== null && is_array($data)) {
              echo json_encode([
                  "temperature" => htmlspecialchars($data["temperature"] ?? "N/A"),
                  "pressure" => htmlspecialchars($data["pressure"] ?? "N/A"),
                  "altitude" => htmlspecialchars($data["altitude"] ?? "N/A")
              ]);
          } else {
              echo json_encode([
                  "error" => "Failed to read sensor data or decode JSON."
              ]);
          }
        ?>
      </p>

      <a href="../buttons.html">Go back.</a>

    </body>
</html>