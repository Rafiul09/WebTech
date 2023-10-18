<?php
session_start();
$message = $_SESSION['message'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <center>
        <br><br><br><br><br><br><br><br><br><br>
        <h1><?php echo $message ?></h1>
        <?php header("refresh:2;url=../Home.php"); ?>
    </center>
</body>

</html>