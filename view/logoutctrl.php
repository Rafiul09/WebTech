<?php
require_once('../Controller/messagecontrol.php');
if (isset($_COOKIE['Admin'])) {
} else if (isset($_COOKIE['patient'])) {
} else if (isset($_COOKIE['doctor'])) {
} else {
    message("You can't access this page");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <br><br><br><br><br><br><br><br>
        <img src="../resources/wing.png" height="200" width="200">
        <br>Logging out
    </center>
</body>

</html>

<?php
session_start();
setcookie("patient", "", time() - 9999999999, "/");
setcookie("patient", "", time() - 36000, "/");
setcookie("Admin", "", time() - 9999999999, "/");
setcookie("Admin", "", time() - 36000, "/");
setcookie("doctor", "", time() - 9999999999, "/");
setcookie("doctor", "", time() - 36000, "/");
session_destroy();
header("refresh:1;url=../Home.php");
?>