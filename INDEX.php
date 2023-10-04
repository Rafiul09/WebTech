<?php 
sess
?>
<!DOCTYPE html>
<title>Index</title>

<body>
    <center>
    
        <fieldset style = "width:500px"  align="center">
            <legend>Login</legend>
            <form method=POST action="reg.php">
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
            <hr rowspan = "50">
                <input type="submit" name="Log" value ="Login"  align="center">
                <?php 
                  if (isset($_POST['log']) && Uname==Pass) 
                  {
                    
                  }
                ?>
                </form>
                <form method=GET action="reg.php"><input type="submit" name="reg" value ="Signup"  align="center"></form>
                
        </fieldset>
    
    </center>
</body>
