<?php
require_once('../model/user_activity_model.php');
require_once('../model/mailmdl.php');
require_once('../controller/messagecontrol.php');
if (!isset($_COOKIE['patient'])) {
    message("You can't access this page");
} else if (isset($_COOKIE['patient'])) {
    $id = $_COOKIE['patient'];
    $result = getprofileinfo("patient", "P_ID", $id);
    $row = mysqli_fetch_assoc($result);
}



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

            <div class="sidebar">
                <div class="profile">

                    <img src="../resources/Team1.jpg" class="profile_image" alt="">
                    <h3><?php echo $row['P_Name']; ?></h3>

                </div>

                <div class="sidebar_inner">
                    <ul>
                        <li>
                            <a href="patDash.php">
                                <span class="icon"><i class="fa fa-calendar-plus-o"></i></span>
                                <span class="text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="mail_compose_vw.php">
                                <span class="icon"><i class="fa fa-pencil-square-o"></i></span>
                                <span class="text">Compose</span>
                            </a>
                        </li>
                        <li>
                            <a href="mail_outlist_vw.php">
                                <span class="icon"><i class="fas fa-inbox"></i></span>
                                <span class="text">Outbox</span>
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
                                To: <input type="text" size="130" name="mto"><br>
                                From: <input type="text" name="mfrom" size="130" value="<?php echo $id; ?>"><br>
                                Sub: <input type="text" name="msub" size="130">
                            </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <textarea rows="20" cols="140" name="mbody"></textarea>
                            <br>
                            <button type="submit" class="btn-green" name="msend">Send</button>
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