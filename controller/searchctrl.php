<?php
require_once('../model/user_activity_model.php');



session_start();

$_SESSION['sroamid'] = "";


if (isset($_GET['term'])) {
    $searchTerm = $_GET['term'];

    $searchResults = lv_search_doc($searchTerm);

    echo json_encode($searchResults);
} else {
    echo json_encode(array('error' => 'No search term provided'));
}

if (isset($_POST['homesubmit'])) {
    $roamid = $_POST['selectedId'];
    $_SESSION['sroamid'] = $roamid;

    if ($roamid == 'broad_search_id') { // Check for 'broad_search_id' as a string, adjust based on actual value
        header('Location: ../view/broadsearchvw.php');
    } else if (!empty($roamid)) {
        header('Location: ../view/profile-vw.php');
    } else {
        header('Location: ../Home.php');
    }
    exit();
}
