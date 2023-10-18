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

    // Check if any of the required fields are empty or passwords don't match
    if (
        empty($name) || empty($em) || empty($phon) || empty($dob) ||
        empty($address) || empty($pass) || empty($Ucpass) || ($pass != $Ucpass)
    ) {
        header('location:../view/patientregistration.php');
        exit(); // Terminate script after redirection
    }

    // Check file upload
    if (isset($_FILES['fileImg'])) {
        $file = $_FILES['fileImg'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = array('jpg', 'jpeg', 'png');

        if (in_array($fileExt, $allowedExtensions)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) { // 5MB file size limit
                    $imageName = uniqid() . '_' . $fileName;
                    $target = "../resources/pphoto/patient/" . $imageName;
                    copy($fileTmpName, $target);
                    // Insert patient data with image name
                    insertpatient($pid, $name, $gen, $dob, $em, $phon, $address, $pass, $imageName);
                    header('location:../view/patientregistration.php');
                } else {
                    // File size is too large
                    header('location:../view/patientregistration.php');
                    exit();
                }
            } else {
                // File upload error
                header('location:../view/patientregistration.php');
                exit();
            }
        } else {
            // Invalid file type
            header('location:../view/patientregistration.php');
            exit();
        }
    } else {
        // No file uploaded
        header('location:../view/patientregistration.php');
        exit();
    }
} elseif (isset($_GET['del'])) {
    $id = $_GET['del'];
    deluser("patient", "P_ID", $id);
    header('location:../view/patientregistration.php');
} elseif (isset($_POST['btnHome'])) {
    header('location:../view/login.php');
}
