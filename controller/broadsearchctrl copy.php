<?php
require_once('../view/profilecardvw.php');
require_once('../model/user_activity_model.php');
session_start();

$_SESSION['sroamid'] = "";

if (isset($_POST["query"], $_POST["category"], $_POST["slot"])) {
    $query = $_POST["query"];
    $category = $_POST["category"];
    $slot = $_POST["slot"];
    echo $slot;
    $result = lv_search2_doc($query, $category, $slot);
    $htmlOutput = generateTableOutput($result);

    echo $htmlOutput;
}

if (isset($_POST['broadsubmit'], $_POST['D_Id'])) {
    $roamid = $_POST['D_Id'];
    $_SESSION['sroamid'] = $roamid;

    header('Location: ../view/profile-vw.php');
    exit();
}
if (isset($_POST['doctorLink'])) {
    $roamid = $_POST['D_Id'];
    $_SESSION['sroamid'] = $roamid;

    header('Location: ../view/broadsearchvw.php');
    exit();
}
