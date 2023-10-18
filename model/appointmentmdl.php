<?php

require_once('conn.php');


function sergen($tbl, $col, $D_Id)
{
    $conn = get_conn();
    $result = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING($col, 3) AS SIGNED)) AS max_id FROM $tbl WHERE D_Id = '$D_Id' And isValid = 1");

    if (!$result) {
        return "Error retrieving ID";
    }

    $res = mysqli_fetch_assoc($result);

    if ($res['max_id'] === null) {
        $genid = "0001";
    } else {
        $genid =  str_pad($res['max_id'] + 1, 4, '0', STR_PAD_LEFT);
    }

    return $genid;
}
function setAppointment($P_ID, $D_Id, $D_name,  $D_workOn,  $D_specialist)
{

    $serno = sergen("appointment", "serno", $D_Id);
    $date = date('d-m-Y');
    $time = date('h:i:sa');
    $conn = get_conn();
    $sql = "INSERT INTO appointment (serno,P_Id, D_Id, D_name, D_specialist, apt_date, apt_time, apt_slot,isValid) VALUES ('$serno', '$P_ID', '$D_Id', '$D_name','$D_specialist','$date','$time','$D_workOn',1)";
    if (mysqli_query($conn, $sql)) {
        // Appointment successful
        mysqli_close($conn);
        header("Location: ../view/profile-vw.php?appointment=success");
        exit();
    } else {
        // Appointment failed
        mysqli_close($conn);
        header("Location: ../view/profile-vw.php?appointment=error");
        exit();
    }
}

function checkappointment($id)
{
    $conn = get_conn();
    $sql = "select * from appointment WHERE P_Id ='$id' ORDER BY apt_date, apt_time";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function checkActiveappointment($id)
{
    $conn = get_conn();
    $sql = "select * from appointment WHERE P_Id ='$id' AND isValid = 1";
    $result = mysqli_query($conn, $sql);
    return $result;
}





function aptValidator($P_ID, $D_Id, $D_name, $D_workOn, $D_specialist)
{
    $conn = get_conn();
    $sql = "SELECT * FROM appointment WHERE P_Id = '$P_ID'AND isValid = 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $rowCount = mysqli_num_rows($result);

        if ($rowCount < 4) {
            while ($row = mysqli_fetch_assoc($result)) {
                $stringTime = $row['apt_date'] . ' ' . $row['apt_time'];
                $time = DateTime::createFromFormat('Y-m-d H:i:s', $stringTime);
                $currentTime = new DateTime();

                if ($time instanceof DateTime && $currentTime > $time) {
                    $interval = $time->diff($currentTime);
                    $hoursDifference = $interval->h + ($interval->days * 24);

                    if ($hoursDifference >= 24) {
                        $aptIdToUpdate = $row['apt_id']; // Assuming apt_id is the primary key
                        $updateQuery = "UPDATE appointment SET isValid = 0 WHERE apt_id = '$aptIdToUpdate'";
                        mysqli_query($conn, $updateQuery);
                    }
                }
            }

            setAppointment($P_ID, $D_Id, $D_name, $D_workOn, $D_specialist);
        } else {
            header("Location: ../view/profile-vw.php?appointment=countlimit");
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


function aptcancel($P_ID, $D_Id, $apt_date, $apt_time)
{

    $conn = get_conn();

    $sql = "UPDATE appointment SET isValid = 0 WHERE P_Id = '$P_ID' AND D_Id = '$D_Id' AND apt_date ='$apt_date' AND apt_time ='$apt_time'";
    $result = mysqli_query($conn, $sql);
    header("Location: ../view/appointmentvw.php?appointment=success");
}
