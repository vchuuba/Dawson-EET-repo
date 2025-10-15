<!DOCTYPE html>
<html>
    <head>
        <title>Form response</title>
    </head>
    <body>
        <?= var_dump($_GET) ?> 
        <?= var_dump($_POST) ?>
        <p>Hello, your name is <?= $_POST['fname'] ?> <?= $_POST['lname'] ?>. Your favorite language is <?= $_POST['fav_language'] ?>.</p>

        <?php
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
        
        $sql = "select * from unitList;";		// This can be any valid SQL cmd.
        $result = mysqli_query($conn, $sql);	// Stores rows retrieved by query.
        echo mysqli_error($conn);	    		// If error, this determines cause.

        foreach($result as $row) { 
            echo "\n id: {$row["id"]}
        | Unit: {$row["unitName"]} 
        | Faction: {$row["unitFaction"]}
        | Class: {$row["unitClass"]}\n"; }
        // This iterates through every each row and echoes only values of defined columns.
        
        mysqli_close($conn);
        ?>
    </body>
</html>