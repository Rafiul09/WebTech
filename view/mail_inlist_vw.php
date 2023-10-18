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

    $mailloader = getmailinfo("D-100");
}



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
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" rel="stylesheet">

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



            <table border="1" width="650" align="center">

                <tr>
                    <td>

                        <fieldset align="center">
                            <legend align="left">INBOX</legend>
                            <table width="650" border="0" align="center">

                                <?php $mailrow = mysqli_fetch_assoc($mailloader);
                                if (!$mailrow) {
                                    echo "Empty";
                                } else {
                                    while ($mailrow) { ?>
                                        <form method="post" action="../controller/mailctrl.php">
                                            <tr>
                                                <td align="left">
                                                    <button type="submit" name="mview">
                                                        <input name="mfrom" type="hidden" value="<?php echo $mailrow['m_from']; ?>"></input>
                                                        <input name="mto" type="hidden" value="<?php echo $mailrow['m_to']; ?>"></input>
                                                        <input name="mdate" type="hidden" value="<?php echo $mailrow['m_date']; ?>"></input>
                                                        <input name="msub" type="hidden" value="<?php echo $mailrow['m_sub']; ?>"></input>
                                                        <input name="mbody" type="hidden" value="<?php echo $mailrow['m_body']; ?>"></input>
                                                        <input name="dfname" type="hidden" value="<?php echo $mailrow['D_firstName']; ?>"></input>
                                                        <input name="dlname" type="hidden" value="<?php echo $mailrow['D_lastName']; ?>"></input>
                                                        <table width="650">
                                                            <tr>
                                                                <td align="left">
                                                                    From:&#160
                                                                    <?php echo $mailrow['D_firstName'] . ' ' . $mailrow['D_lastName']; ?>

                                                                    <br>
                                                                    ID:&#160
                                                                    <?php echo $mailrow['m_from']; ?>

                                                                    <br>
                                                                    Sub:&#160
                                                                    <?php echo $mailrow['m_sub']; ?>
                                                                    <br>
                                                                    Body:&#160
                                                                    <?php echo substr($mailrow['m_body'], 0, 50); ?>....
                                                                </td>
                                                                <td valign="top" align="right">

                                                                    <?php echo $mailrow['m_date']; ?>
                                                                    <br>
                                                                </td>
                                                                <td>
                                                                    <?php //echo "<a href=\"mail_view.php?id={$r['m_from']}&id2={$r['m_to']}&id3={$r['m_date']}\">Click</a>"; 
                                                                    ?>




                                                                </td>
                                                            </tr>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                            </table>

                    </td>


                    <form action="../controller/mailctrl.php" method="post">
                        <td>
                            <input name="mto" type="hidden" value="<?php echo $mailrow['m_to']; ?>"></input>
                            <input name="mdate" type="hidden" value="<?php echo $mailrow['m_date']; ?>"></input>
                            <input name="mfrom" type="hidden" value="<?php echo $mailrow['m_from']; ?>"></input>
                            <button type="submit" name="del">
                                <table>
                                    <tr height="63">
                                        <td>Delete</td>
                                    </tr>
                                </table>

                            </button>
                        </td>
                    </form>

                </tr>
        <?php $mailrow = mysqli_fetch_assoc($mailloader);
                                    }
                                } ?>
            </table>
            </fieldset>
            </td>
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