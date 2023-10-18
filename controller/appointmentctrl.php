 <?php
    require_once('../model/appointmentmdl.php');
    session_start();




    if (isset($_POST['aptsubmit'])) {
        $P_ID = $_POST['$P_ID'];
        $D_Id = $_POST['D_Id'];
        $dayOfWeek = $_POST['dayOfWeek'];
        $D_workOn = $_POST['D_workOn'];
        $D_name = $_POST['D_name'];
        $D_specialist = $_POST['D_specialist'];
        /*  echo "Patient ID: $P_ID<br>";
        echo "Doctor ID: $D_Id<br>";
        echo "Selected Day: $dayOfWeek<br>";
        echo "Work Schedule: $D_workOn<br>";
        echo "Doctor's Name: $D_name<br>";
        echo "Doctor Specialization: $D_specialist<br>";*/

        aptValidator($P_ID, $D_Id, $D_name,  $D_workOn,  $D_specialist);
    }



    if (isset($_POST['cancelbtn'])) {
        $P_ID = $_POST['P_Id'];
        $D_Id = $_POST['D_Id'];
        $apt_date =  $_POST['apt_date'];
        $apt_time =  $_POST['apt_time'];

        aptcancel($P_ID, $D_Id, $apt_date,  $apt_time);
    }




    ?>