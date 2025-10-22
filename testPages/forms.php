<!DOCTYPE html>
<html>
    <head>
        <title>Form response</title>
    </head>
    <body>
        <p><?= var_dump($_GET) ?> </p>
        <p><?= var_dump($_POST) ?></p>
        <p>Hello, your name is <?= $_POST['fname'] ?> <?= $_POST['lname'] ?>. Your favorite language is <?= $_POST['fav_language'] ?>.</p>

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
                foreach($result as $row) { 
                echo nl2br ("\n id: {$row["id"]}
                | Unit: {$row["unitName"]} 
                | Faction: {$row["unitFaction"]}
                | Class: {$row["unitClass"]}\n"); }
                // This iterates through every each row and echoes only values of defined columns.
                
                mysqli_close($conn);
            ?>
        </p>
    </body>
</html>
