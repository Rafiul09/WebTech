<?php
session_start();
require_once('../Model/user_activity_model.php');
if (isset($_POST['btnLogin'])) {
    $id = $_POST['uid'];
    $password = $_POST['upass'];
    $remember;


    if (empty($id) && !empty($password)) {
        $_SESSION['error_message'] = "Please fill in ID ";
        header("Location: ../view/login.php");
    }
    if (!empty($id) && empty($password)) {
        $_SESSION['error_message'] = "Please fill in Password";
        header("Location: ../view/login.php");
    }
    if (empty($id) && empty($password)) {
        $_SESSION['error_message'] = "Please fill in both ID & Password";
        header("Location: ../view/login.php");
    } else if (!empty($id) && !empty($password)) {

        if (isset($_POST['rememberme'])) {
            $remember = "true";
        }
        if (!isset($_POST['rememberme'])) {
            $remember = "false";
        }


        $row = login($id, $password);

        if ($row['A_userGroup'] == "patient" && $row['A_accessType'] == "0") {
            if ($remember == "true") {
                setcookie("patient", $row['A_Id'], time() + 99999999, "/");
            } else {
                setcookie("patient", $row['A_Id'], time() + 3600, "/");
            }
            header('location:../view/patDash.php');
        } else if ($row['A_userGroup'] == "Admin" && $row['A_accessType'] == "0") {
            if ($remember == "true") {
                setcookie("Admin", $row['A_Id'], time() + 99999999, "/");
            } else {
                setcookie("Admin", $row['A_Id'], time() + 3600, "/");
            }
            header('location:../view/adminDashboard.php');
        } else if ($row['A_userGroup'] == "doctor" && $row['A_accessType'] == "0") {
            if ($remember == "true") {
                setcookie("doctor", $row['A_Id'], time() + 99999999, "/");
            } else {
                setcookie("doctor", $row['A_Id'], time() + 3600, "/");
            }
            header('location:../view/doctorDashboard.php');
        } else {
            header('location:../view/nowhere.php');
        }
    }
}
