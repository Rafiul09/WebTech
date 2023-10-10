<?php 
session_start();

if (isset($_POST['Log'])) {
    if (!empty($_POST['Uname']) && !empty($_POST['Pass'])) {
        if ($_POST['Uname'] == $_POST['Pass']) {
            header("Location: reg.php");
            exit();
        } else {
            $_SESSION['message'] = "Invalid Credentials";
        }
    } else {
        $_SESSION['message'] = "Please enter both username and password.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>
    <center>
        <fieldset style="width:500px" align="center">
            <legend>Login</legend>
            <form method="POST">
                <table align="center">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="Uname"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="Pass"></td>
                    </tr>
                </table>
                <hr>
                <input type="submit" name="Log" value="Login" align="center">
                <input type="submit" name="reg" value="Signup" align="center">
            </form>
            <?php 
                if (isset($_SESSION['message'])) {
                    echo '<div style="color: red;">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']);
                }
            ?>
        </fieldset>
    </center>
</body>
</html>
