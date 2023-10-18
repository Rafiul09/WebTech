<!DOCTYPE html>
<title>Index</title>

<body>
    <?php 
                 $nameErr=$unemErr=$unameErr=$uaddErr=$undobErr=$unpassErr="";       
                 if ( isset($_GET['check'])) 
                 {
                  
                    if (empty($_GET['Name'])) {
                        $nameErr = "Name is required";
                     }
                     if (empty($_GET['Em'])) {
                        $unemErr = "Email is required";
                     }
                     if (empty($_GET['Uname'])) {
                        $unameErr = "Username is required";
                     }
                     if (empty($_GET['HADD'])) {
                        $uaddErr = "Address is required";
                     }
                     if (empty($_GET['DOB'])) {
                       $undobErr = "DOB is required";
                    }
                     if (empty($_GET['Upass'])) {
                       $unpassErr = "Password is required";
                    }    
                 
                 }
                
               ?>
    <center>
        <form method=GET>
            <fieldset align="center">
                <legend>Registration</legend>
                <table align="center">
                    <tr>
                        <td>Name*</td>
                        <td><input type="text" name="Name">
                            <br><span class="error"><?php echo $nameErr;?></span>
                        </td>

                    </tr>
                    <tr>
                        <td>Email*</td>
                        <td><input type="email" name="Em">
                            <br><span class="error"><?php echo $unemErr;?></span>
                        </td>

                    </tr>
                    <tr>
                        <td>Username*</td>
                        <td><input type="text" name="Uname">
                            <br><span class="error"><?php echo $unameErr;?></span>
                        </td>

                    </tr>
                    <tr>
                        <td> Home Address*</td>
                        <td><input type="string" name="HADD">
                            <br><span class="error"><?php echo $uaddErr;?></span>
                        </td>

                    </tr>
                    <tr>
                        <td>Date of Birth*</td>
                        <td><input type="date" name="DOB">
                            <br><span class="error"><?php echo $undobErr;?></span>
                        </td>

                    </tr>

                    <tr>
                        <td>Password*</td>
                        <td><input type="password" name="Upass">
                            <br><span class="error"><?php echo $unpassErr;?></span>
                        </td>


                    </tr>


                </table>
                <hr rowspan="50">
                <input type="submit" name="check" value="CHECK" align="center">
            </fieldset>
        </form>
    </center>
</body>