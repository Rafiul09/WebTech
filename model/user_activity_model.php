<?php

require_once('conn.php');


$row;
function login($id, $password)
{

    global $row;

    $con = get_conn();
    $sql = "SELECT * FROM authenticate WHERE (A_Id = '$id' AND A_pass = '$password')";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else return false;
}

function lv_search_doc($searchTerm)
{
    $con = get_conn();
    $sql = "SELECT * FROM doctors WHERE D_firstName LIKE '%" . $searchTerm . "%' OR D_lastName LIKE '%" . $searchTerm . "%'";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        $SearchData = array();
        while ($row = $result->fetch_assoc()) {
            $data['id']    = $row['D_Id'];
            $data['value'] = 'Dr. ' . $row['D_firstName'] . ' ' . $row['D_lastName'] . '        ' . $row['D_specialist'];
            array_push($SearchData, $data);
        }

        $data['id']    = 'broad_search_id';
        $data['value'] = 'Broad Search';
        array_push($SearchData, $data);
    }
    return $SearchData;
    // echo json_encode($SearchData);
}

function lv_search2_doc($query, $category, $slot)
{
    $con = get_conn();
    $search = mysqli_real_escape_string($con, $query);
    $category = mysqli_real_escape_string($con, $category);

    if (!empty($query) && empty($category) && empty($slot)) {
        $qury = "SELECT * FROM doctors WHERE D_firstName LIKE '%$search%' OR D_lastName LIKE '%$search%'";
    } elseif (!empty($query) && !empty($category) && empty($slot)) {
        $qury = "SELECT * FROM doctors WHERE (D_firstName LIKE '%$search%' OR D_lastName LIKE '%$search%') AND D_specialist LIKE '%$category%'";
    } elseif (empty($query) && !empty($category) && empty($slot)) {
        $qury = "SELECT * FROM doctors WHERE D_specialist = '$category'";
    } elseif (empty($query) && empty($category) && !empty($slot)) {
        $conditions = array(); // Create an array to store conditions

        foreach ($slot as $position) {
            $conditions[] = "SUBSTRING(D_timeSlot, '$position', 1) = '1'";
        }

        // Join conditions with OR or AND depending on your logic
        $qury = "SELECT * FROM doctors WHERE " . implode(" OR ", $conditions);
    } elseif (!empty($query) && !empty($category) && !empty($slot)) {
        $conditions = array(); // Create an array to store conditions

        foreach ($slot as $position) {
            $conditions[] = "SUBSTRING(D_timeSlot, '$position', 1) = '1'";
        }

        // Join conditions with OR or AND depending on your logic
        $qury = "SELECT * FROM doctors WHERE (D_firstName LIKE '%$search%' OR D_lastName LIKE '%$search%') AND D_specialist LIKE '%$category%' AND (" . implode(" OR ", $conditions) . ")";
    } elseif (!empty($query) && empty($category) && !empty($slot)) {
        $conditions = array(); // Create an array to store conditions

        foreach ($slot as $position) {
            $conditions[] = "SUBSTRING(D_timeSlot, '$position', 1) = '1'";
        }

        // Join conditions with OR or AND depending on your logic
        $qury = "SELECT * FROM doctors WHERE (D_firstName LIKE '%$search%' OR D_lastName LIKE '%$search%') AND (" . implode(" OR ", $conditions) . ")";
    } elseif (empty($query) && !empty($category) && !empty($slot)) {
        $conditions = array(); // Create an array to store conditions

        foreach ($slot as $position) {
            $conditions[] = "SUBSTRING(D_timeSlot, '$position', 1) = '1'";
        }

        // Join conditions with OR or AND depending on your logic
        $qury = "SELECT * FROM doctors WHERE D_specialist = '$category' AND (" . implode(" OR ", $conditions) . ")";
    } else {
        $qury = "SELECT * FROM doctors ORDER BY D_Id";
    }

    $result = mysqli_query($con, $qury);
    return $result;
}



function getprofileinfo($tblname, $colname, $id)
{
    $conn = get_conn();
    $sql = "select * from $tblname where $colname = '$id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function tableloader($tblname)
{
    $conn = get_conn();
    $sql = "select * from $tblname";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function deluser($tbl, $col, $id)
{
    $conn = get_conn();

    $sql_del = "DELETE FROM $tbl WHERE $col='$id'";
    $sql_A_del = "DELETE FROM authenticate WHERE A_Id='$id'";

    if (mysqli_query($conn, $sql_del) && mysqli_query($conn, $sql_A_del)) {
        echo "Patient Deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

function idgen($tbl, $col)
{
    $conn = get_conn();
    $result = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING($col, 3) AS SIGNED)) AS max_id FROM $tbl");

    if (!$result) {
        return "Error retrieving ID";
    }

    $res = mysqli_fetch_assoc($result);

    if ($res['max_id'] === null) {
        // If no records found, start from P-0001
        $genid = "P-0001";
    } else {
        $genid = "P-" . str_pad($res['max_id'] + 1, 4, '0', STR_PAD_LEFT);
    }

    return $genid;
}

function insertpatient($patient_id, $name, $gen, $dob, $em, $phon, $address, $pass, $imageName)
{
    $conn = get_conn();
    $sql_Rin = "INSERT INTO Patient (P_ID, P_Name, P_Gender, P_DOB, P_Email, P_Phone, P_Address,P_photo) VALUES ('$patient_id', '$name', '$gen', '$dob', '$em', '$phon', '$address','$imageName')";
    $sql_Lin = "INSERT INTO authenticate (A_Id,A_pass,A_userGroup,A_accessType,A_isPassReset ) VALUES ('$patient_id', '$pass','patient','0','0')";
    if (mysqli_query($conn, $sql_Rin) && mysqli_query($conn, $sql_Lin)) {
        echo "Patient registered successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
