<?php


require_once('conn.php');



function getmailoutinfo($id)
{

    $sqlM = "SELECT mail.*, doctors.D_firstName, doctors.D_lastName FROM mail, doctors where mail.m_from='$id' AND mail.m_to=doctors.D_Id;";

    $conn = get_conn();

    $result = mysqli_query($conn, $sqlM);
    return $result;
}

function getmailinfo($id)
{

    $sqlM = "SELECT mail.*, doctors.D_firstName, doctors.D_lastName FROM mail, doctors WHERE '$id' = mail.m_to AND mail.m_from = doctors.D_Id";

    $conn = get_conn();

    $result = mysqli_query($conn, $sqlM);
    return $result;
}

function mailsend($from, $to, $date, $sub, $message)
{
    $conn = get_conn();
    $sql_msend = "INSERT INTO mail (m_from, m_to, m_date, m_sub, m_body) VALUES ('$from', '$to', '$date', '$sub', '$message')";

    if (mysqli_query($conn, $sql_msend)) {
        echo "Message sent successfully.";
        header("Location: ../view/mail_inlist_vw.php");
    } else {
        echo "Error";
    }
}
function maildel($m_from, $m_to, $m_date)
{
    $conn = get_conn();
    $sql_del = "DELETE FROM mail WHERE m_from='$m_from' AND m_to = '$m_to' AND m_date = '$m_date'";

    if (mysqli_query($conn, $sql_del)) {
        echo "Mail Deleted successfully.";
        header("Location: ../view/mail_outlist_vw.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
