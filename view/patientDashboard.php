<?php
require_once('../model/user_activity_model.php');
require_once('../controller/messagecontrol.php');
if (!isset($_COOKIE['patient'])) {
    message("You can't access this page");
} else if (isset($_COOKIE['patient'])) {
    $id = $_COOKIE['patient'];
    $result = getprofileinfo("patient", "P_ID", $id);
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
</head>

<body>
    <center>
        <h1>Hello,<?php echo $row['P_Name']; ?></h1>
        <form action="logoutctrl.php" method="post"><button> Logout</button></form>
    </center>

</body>

</html>