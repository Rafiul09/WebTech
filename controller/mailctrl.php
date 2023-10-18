<?php
require_once('../model/mailmdl.php');
session_start();
if (isset($_POST["mview"])) {

    $_SESSION['mfrom'] = $_POST['mfrom'];
    $_SESSION['mto'] = $_POST['mto'];
    $_SESSION['mdate'] = $_POST['mdate'];
    $_SESSION['msub'] = $_POST['msub'];
    $_SESSION['mbody'] = $_POST['mbody'];
    $_SESSION['dfname'] = $_POST['dfname'];
    $_SESSION['dlname'] = $_POST['dlname'];



    // $mfrom = $mto = $msub = $mdate = $mbody = "";

    /*    $m_from =  $_SESSION['mfrom'];
    $m_to = $_SESSION['mto'];
    $m_date = $_POST['mdate'];
    $m_sub = $_POST['msub'];
    $m_body = $_POST['mbody'];
    $D_firstName = $_POST['dfname'];
    $D_lastName = $_POST['dlname'];

    echo "m_from: " . $m_from . "<br>";
    echo "m_to: " . $m_to . "<br>";
    echo "m_date: " . $m_date . "<br>";
    echo "m_sub: " . $m_sub . "<br>";
    echo "m_body: " . $m_body . "<br>";*/
    header("Location: ../view/mail_outboxopen_vw.php");
    exit();
}
if (isset($_POST['del'])) {

    $m_from = $_POST['mfrom'];
    $m_to = $_POST['mto'];
    $m_date = $_POST['mdate'];


    if (maildel($m_from, $m_to, $m_date)) {
        echo "Mail Deleted successfully.";
    } else {
        echo "Error: ";
    }
}




if (isset($_POST["mreply"])) {
    $mfrom = $_POST['mto'];
    $mto = $_POST['from'];
    $msub = "RE: " . $_POST['sub'];
}



if (isset($_POST["mrsend"])) {
    $from = $_POST['mfrom'];
    $to = $_POST['mto'];
    $sub = $_POST['msub'];
    date_default_timezone_set('Asia/Dhaka');
    $date = date('g:i A | l, jS, F, Y');
    echo "From: " . $from;
    echo "To: " . $to;
    echo "Subject: " . $sub;

    $message = $_POST['mbody'];

    if (empty($sub)) {
        echo "Subject is required.";
    } elseif (empty($message)) {
        echo "Message body is required.";
    } else {
        $sql_msend = "INSERT INTO mail (m_from, m_to, m_date, m_sub, m_body) VALUES ('$from', '$to', '$date', '$sub', '$message')";

        if (mysqli_query($conn, $sql_msend)) {
            echo "Message sent successfully.";
            header("Location: ../view/mail_inlist_vw.php");
        } else {
            echo "Error: ' . mysqli_error($conn) . '";
        }
    }
}




if (isset($_POST["msend"])) {
    $from = $_POST['mfrom'];
    $to = $_POST['mto'];
    $sub = $_POST['msub'];
    date_default_timezone_set('Asia/Dhaka');
    $date = date('g:i A | l, jS, F, Y');
    $message = $_POST['mbody'];



    if (empty($sub)) {
        echo '<script>alert("Subject is required.");</script>';
    } elseif (empty($message)) {
        echo '<script>alert("Message body is required.");</script>';
    } else {
        mailsend($from, $to, $date, $sub, $message);
        header("Location: ../view/mail_outlist_vw.php");
    }
}
