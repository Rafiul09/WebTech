<?php
$serv="localhost";
$uname="root";
$pass="";
$dbname="cms";
$conn= new mysqli($serv,$uname,$pass,$dbname);
$sql="select * from Patient";
$res =mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<title>Index</title>

<body>
    <center>
        
            <fieldset align="center">
                <legend>Registration Print</legend>
                <table align="center">
                 
                        
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                    <?php while($r=mysqli_fetch_assoc($res)){ ?> 
                    <tr>
                        <td><?php echo $r['P_ID'];?></td>
                        <td><?php echo $r['P_Name'];?></td>
                        <td><?php echo $r['P_Gender'];?></td>
                        <td><?php echo $r['P_DOB'];?></td>
                        <td><?php echo $r['P_Email'];?></td>
                        <td><?php echo $r['P_Phone'];?></td>
                        <td><?php echo $r['P_Address'];?></td>
                    </tr>
                     <?php } ?>
                    
                </table>
                <hr>
                    <button align="center">Back</button>

            </fieldset>
        
    </center>
</body>
