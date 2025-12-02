<!DOCTYPE html>
<html>
    <head>
        <title>GPIO toggle</title>
        <!-- <script>
          window.location.replace("buttons.html");
        </script> -->
    </head>
    <body>
        <?php=
        $servername = "thelichking"; // keep $servername to localhost if doing it on own Pi
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
        
        `gpio toggle 0`;
                
        mysqli_close($conn);

        ?>

        <a href="buttons.html">Go back.</a>

    </body>
</html>