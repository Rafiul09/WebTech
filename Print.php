<!DOCTYPE html>
<title>Index</title>

<body>
    <center>
        <form method=GET action="Log.php">
            <fieldset align="center">
                <legend>Registration Print</legend>
                <table align="center">
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $_GET['Name'];?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $_GET['Em'];?></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $_GET['Uname'];?></td>
                    </tr>
                    <tr>
                        <td> Home Address:</td>
                        <td><?php echo $_GET['HADD'];?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $_GET['DOB'];?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><?php echo $_GET['Upass'];?></td>

                    </tr>
                    
                </table>
                <hr>
                    <button align="center">Back</button>

            </fieldset>
        </form>
    </center>
</body>