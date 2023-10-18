<?php 
session_start();
$_SESSION['message']="Invalid Credentials";

$unameErr= $unpassErr="";
?>
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
                    if (empty($_POST['Uname'])) {
                       $unameErr = "Name is required";
                    }
                    if (empty($_POST['Pass'])) {
                       $unpassErr = "Password is required";
                    }

                   
                
                  
                 
                 }
                # else if (isset($_POST['log']) && (isset($_POST['uname'])  isset($_POST['password'])))
                 #{
                  #print_r($_SESSION);
                 #}
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
                    <td><input type="text" name="Uname">
                    <br><span class="error"><?php echo $unameErr;?></span>    
                </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="Pass">
                    <br><span class="error"><?php echo $unpassErr;?></span>
                </td>
                </tr>
            </table>
            <hr rowspan = "50">
                <input type="submit" name="Log" value ="Login"  align="center">
                <input type="submit" name="reg" value ="Signup"  align="center">
                
                </form>
                
                
        </fieldset>
    
    </center>
</body>