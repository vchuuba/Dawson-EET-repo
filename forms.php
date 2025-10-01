<!DOCTYPE html>
<html>
    <head>
        <title>Form response</title>
    </head>
    <body>
        <?= var_dump($_GET) ?> 
        <?= var_dump($_POST) ?>
        <p>Hello, your name is <?= $_POST['fname'] ?> <?= $_POST['lname'] ?>. Your favorite language is <?= $_POST['fav_language'] ?>.</p>
    </body>
</html>