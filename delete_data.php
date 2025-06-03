<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (!isset($_GET['id'])) {
        header('location:display_data.php');
    }

    require_once "connection.php";
    $email = $_GET['id'];
    $qry = "DELETE FROM employee WHERE email='$email'";

    if ($conn->query($qry)) {
        header("location:display_data.php?status=ok");
    } else {
        header("location:display.php?status=error");
    }
    ?>
</body>
</html>
