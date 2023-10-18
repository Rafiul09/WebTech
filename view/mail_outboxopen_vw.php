<?php
require_once('../model/user_activity_model.php');
require_once('../model/mailmdl.php');
require_once('../controller/messagecontrol.php');
session_start();
if (!isset($_COOKIE['patient'])) {
    message("You can't access this page");
} else if (isset($_COOKIE['patient'])) {
    $id = $_COOKIE['patient'];
    $result = getprofileinfo("patient", "P_ID", $id);
    $row = mysqli_fetch_assoc($result);
}
$mfrom = $_SESSION['mfrom'];
$mto = $_SESSION['mto'];
$mdate = $_SESSION['mdate'];
$msub = $_SESSION['msub'];
$mbody = $_SESSION['mbody'];
$DfirstName = $_SESSION['dfname'];
$DlastName = $_SESSION['dlname'];


/*if (isset($_SESSION['mfrom'])) {
    $mfrom = $_SESSION['mfrom'];
    $mto = $_SESSION['mto'];
    $mdate = $_SESSION['mdate'];
    $msub = $_SESSION['msub'];
    $mbody = $_SESSION['mbody'];
    $DfirstName = $_SESSION['dfname'];
    $DlastName = $_SESSION['dlname'];

    // Use these variables as needed in this file


    // Unset or clear the session variables if needed
    /* unset($_SESSION['m_from']);
    unset($_SESSION['m_to']);
    unset($_SESSION['m_date']);
    unset($_SESSION['m_sub']);
    unset($_SESSION['m_body']);
    unset($_SESSION['dfname']);
    unset($_SESSION['dlname']);
} else {
    // Handle the case where session variables are not set
    echo "Session variables are not set.";
}
*/
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/mail.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.51/css/all.min.css">
</head>

<body>
    <div class="wrapper hover_collapse">
        <div class="top_navbar">
            <div class="logo"><a href="../Home.php" class="logo"><img src="../resources/wing.png" align="left" width="60" height="60"></a></div>
            <div class="menu">
                <div class="hamburger">
                    <i class="fas fa-bars"></i>
                </div>

            </div>
        </div>

        <div class="sidebar">
            <div class="profile">

                <img src="../resources/Team1.jpg" class="profile_image" alt="">
                <h3><?php echo $row['P_Name']; ?></h3>

            </div>

            <div class="sidebar_inner">
                <ul>
                    <li>
                        <a href="broadsearchvw.php">
                            <span class="icon"><i class="fa fa-calendar-plus-o"></i></span>
                            <span class="text">Make an Appointment</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-flask"></i></span>
                            <span class="text">Book for Lab Tests</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-clipboard"></i></span>
                            <span class="text">My Prescriptions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-comments"></i></span>
                            <span class="text">Ask for Advice</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-book"></i></span>
                            <span class="text">Manage Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-cog"></i></span>
                            <span class="text">Account Settings</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-phone-square"></i></span>
                            <span class="text">Contact Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="logoutctrl.php">
                            <span class="icon"><i class="fa fa-sign-out"></i></span>
                            <span class="text">Log out</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </div>
    <?php


    ?>

    <section>
        <div class="container-fluid">
            <h3 class="title"> </h3>

        </div>

        <div class="container-fluid">



            <table width="1000" align="center">

                <tr>

                    <form action="../controller/mailctrl.php" method="post">


                        <td align="right">

                            <input name="mto" type="hidden" value="<?php echo $mto; ?>"></input>

                            Sub: <input type="text" size="130" name="sub" value="<?php echo $msub ?>" readonly><br>
                            To: <input type="text" name="name" size="130" value="<?php echo $DfirstName . ' ' . $DlastName; ?>" readonly><br>
                            ID: <input type="text" name="from" size="130" value="<?php echo $mfrom ?>" readonly><br>
                            Date: <input type="text" name="date" size="130" value="<?php echo $mdate ?>" readonly>



                        </td>
                </tr>
                <tr>
                    <td align="right">
                        <textarea rows="20" cols="140" name="message" readonly><?php echo $mbody ?></textarea>
                        <br>
                        <a href="mail_outlist_vw.php"><button class="btn-green" type="button">
                                << To Outbox</button></a>
                        <button class="btn-green" type="submit" name="mreply">Send a Reply >></button>
                    </td>
                </tr>


                </form>

                </tr>

            </table>
        </div>
        </div>

    </section>
    <script type="text/javascript">
        // JavaScript code for sidebar functionality
        var li_items = document.querySelectorAll(".sidebar ul li");
        var hamburger = document.querySelector(".hamburger");
        var wrapper = document.querySelector(".wrapper");
        var section = document.querySelector(".container-fluid");

        li_items.forEach((li_item) => {
            li_item.addEventListener("mouseenter", () => {
                wrapper.classList.remove("hover_collapse");
                section.classList.add("hover_collapse");
            });
        });

        li_items.forEach((li_item) => {
            li_item.addEventListener("mouseleave", () => {
                wrapper.classList.add("hover_collapse");
                section.classList.remove("hover_collapse");
            });
        });

        hamburger.addEventListener("click", () => {
            wrapper.classList.toggle("hover_collapse");
            section.classList.toggle("hover_collapse");
        });


        const urlParams = new URLSearchParams(window.location.search);
        const appointmentStatus = urlParams.get('appointment');

        // Display alert based on the appointment status
        if (appointmentStatus === 'success') {
            alert('Appointment cancelled.');
            window.location.href = 'appointmentvw.php';
        } else if (appointmentStatus === 'error') {
            alert('Error on cancelling. Please try again.');
        }
    </script>
</body>

</html>