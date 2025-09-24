<!DOCTYPE html>
<html>
    <head>
        <title>Form response</title>
    </head>
    <body>
        <p><?= var_dump($_SERVER) ?></p>
        <p>Your name is: <?= htmlspecialchars($_POST['fname']) . " " . htmlspecialchars($_POST['lname'])?></p>
        <p>Your favorite language is <?= $_POST(['fav_language'])?></p>
    </body>
</html>