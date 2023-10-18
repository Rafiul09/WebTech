<?php
require_once('../model/user_activity_model.php');
require_once('../model/appointmentmdl.php');
require_once('../controller/messagecontrol.php');
if (!isset($_COOKIE['patient'])) {
    message("You can't access this page");
} else if (isset($_COOKIE['patient'])) {
    $id = $_COOKIE['patient'];
    $result = getprofileinfo("patient", "P_ID", $id);
    $row = mysqli_fetch_assoc($result);
}


$aptres = checkappointment($id);
$rowapt = mysqli_num_rows($aptres);
$aptact = checkActiveappointment($id);
$rowaptact = mysqli_num_rows($aptact);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/patDash.css">

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


            <div class="sidebar_inner">
                <ul>
                    <li>
                        <div class="profile">

                            <img src="../resources/pphoto/patient/<?php echo $row['p_photo']; ?>" class="profile_image" alt="">
                            <h3><?php echo $row['P_Name']; ?></h3>

                        </div>
                    </li>
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
                        <a href="mail_inlist_vw.php">
                            <span class="icon"><i class="fa fa-comments"></i></span>
                            <span class="text">Ask for Advice</span>
                        </a>
                    </li>
                    <li>
                        <a href="appointmentvw.php">
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
            <div class="status-card">
                <?php if ($rowaptact > 0) : ?>
                    <h2>Scheduled Appointments: <?php echo $rowaptact; ?></h2>
                    <p>Total Appointments: <?php echo $rowapt; ?></p>
                    <button class="btn-green" onclick="location.href='appointmentvw.php';">Manage</button>
                <?php else : ?>
                    <h2>No Appointments</h2>
                    <p>Total Appointments: <?php echo $rowapt; ?></p>
                    <button class="btn-green" onclick="location.href='appointmentvw.php';">Manage</button>
                <?php endif; ?>
            </div>
            <div class="status-card">
                <h2>Lab Reports: None Pending</h2>
                <p>You currently have no appointments scheduled.</p>
            </div>
            <div class="status-card">
                <h2>prescriptions: None Active</h2>
                <p>Total Prescriptions: 0</p>
            </div>
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
    </script>
</body>

</html>