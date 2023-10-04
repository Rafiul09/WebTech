<?php 
session_start();
$_SESSION['message']="Invalid Credentials";
?>
<!DOCTYPE html>
<title>Index</title>

<body>
    <center>
    
        <fieldset style = "width:500px"  align="center">
            <legend>Login</legend>
            <form method=POST >
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
                <input type="submit" name="reg" value ="Signup"  align="center">
                
                </form>
                <?php 
                  if ( isset($_POST['Log'])) 
                  {
                    if(!empty($_POST['Uname'])&& !empty($_POST['Pass'])) 
                    {
                        if($_POST['Uname']== $_POST['Pass']) 
                        {
                            
                            header("Location: reg.php");
                            exit();
                        } 
                        elseif ($_POST['Uname']!= $_POST['Pass']) {
                            echo "Invalid Credentials";
                        }
                     }

                    
                 
                   
                  
                  }
                 # else if (isset($_POST['log']) && (isset($_POST['uname'])  isset($_POST['password'])))
                  #{
                   #print_r($_SESSION);
                  #}
                ?>
                
        </fieldset>
    
    </center>
</body>
