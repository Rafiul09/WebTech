<?php
session_start();
require_once('../Model/user_activity_model.php');





if (isset($_POST['admit'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $em = $_POST['email'];
    $gen = $_POST['gen'];
    $dob = $_POST['dob'];
    $phon = $_POST['phone'];
    $address = $_POST['address'];
    $pass = $_POST['Upass'];
    $Ucpass = $_POST['Ucpass'];

    $err = array();
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['dob']) || empty($_POST['address']) || empty($_POST['Upass']) || empty($_POST['Ucpass'])) {
        header('location:../view/patientregistration.php');
    }


    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['phone']) &&
        !empty($_POST['dob']) &&
        !empty($_POST['address']) &&
        !empty($_POST['Upass']) &&
        !empty($_POST['Ucpass']) &&
        ($_POST['Upass'] == $_POST['Ucpass'])
    ) {


        insertpatient($pid, $name, $gen, $dob, $em, $phon, $address, $pass);
        header('location:../view/patientregistration.php');
    }
    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) && !empty($_POST['phone']) &&
        !empty($_POST['dob']) && !empty($_POST['address']) &&
        !empty($_POST['Upass']) && !empty($_POST['Ucpass']) &&
        ($_POST['Upass'] != $_POST['Ucpass'])
    ) {

        header('location:../view/patientregistration.php');
    }
} else if (isset($_GET['del'])) {
    $id = $_GET['del'];
    deluser("patient", "P_ID", $id);
    header('location:../view/patientregistration.php');
} else if (isset($_POST['btnHome'])) {

    header('location:../view/login.php');
}
