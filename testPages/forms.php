<!DOCTYPE html>
<html>
    <head>
        <title>Form response</title>
    </head>
    <body>
        <p><?= var_dump($_GET) ?> </p>
        <p><?= var_dump($_POST) ?></p>
        <p>Hello, your name is <?= $_POST['fname'] ?> <?= $_POST['lname'] ?>. Your favorite language is <?= $_POST['fav_language'] ?>.</p>

    </body>
</html>