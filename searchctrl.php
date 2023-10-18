<?php
require_once('conn.php');

$con = get_conn();
$searchTerm = $_GET['term'];
$sql = "SELECT * FROM doctors WHERE D_firstName LIKE '%" . $searchTerm . "%'";
$result = mysqli_query($con, $sql);
if ($result->num_rows > 0) {
    $tutorialData = array();
    while ($row = $result->fetch_assoc()) {
        $data['id']    = $row['D_Id'];
        $data['value'] = $row['D_firstName'];
        array_push($tutorialData, $data);
    }
}
echo json_encode($tutorialData);
