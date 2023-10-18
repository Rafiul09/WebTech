 <?php
    session_start();
    require_once('../Model/user_activity_model.php');
    $varDoctorIdToShow = $_SESSION['sroamid'];
    $resDoctorProfileData = getprofileinfo("doctors", "D_Id", "D-100");
    $rowDoctorProfileData = mysqli_fetch_assoc($resDoctorProfileData);

    ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Responsive Header Navigation Menu With Scroll Indicator Bar - Html, Css & Javascript</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Responsive Header Navigation Menu With Scroll Indicator Bar - Html, Css & Javascript</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
     <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
     <link rel="stylesheet" href="../style.css">
     <link rel="stylesheet" href="../css/profilevw.css">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 </head>

 <body>

     <header>
         <div class="nav-bar">
             <a href="../Home.php" class="logo"><img src="../resources/wing.png" align="left" width="60" height="60"></a>
             <div class="navigation">
                 <div class="nav-items">
                     <i class="uil uil-times nav-close-btn"></i>
                     <ul>

                         <li>

                             <form method="post">
                                 <div class="search">
                                     <input type="text" id="search" name="search" placeholder="Enter text">
                                     <button class="btn-green" type="submit" name="submit">GO</button>
                                 </div>

                             </form>


                         </li>
                         <li>
                             <a href="../controller/logheader.php">login</a>
                         </li>
                     </ul>

                 </div>
             </div>
             <i class="uil uil-apps nav-menu-btn"></i>
         </div>

     </header>
     <section>
         <div class="wrapper">
             <div class="left">
                 <img src="https://i.imgur.com/cMy8V5j.png" alt="user" width="100">
                 <h4><?php echo $rowDoctorProfileData['D_firstName'] . ' ' . $rowDoctorProfileData['D_lastName']; ?></h4>
                 <p><?php echo $rowDoctorProfileData['D_specialist']; ?></p>
                 <p><?php echo $rowDoctorProfileData['D_qualification']; ?></p>
                 <p><?php echo $rowDoctorProfileData['D_Id']; ?></p>
             </div>
             <div class="right">
                 <div class="info">
                     <h3>Information</h3>
                     <div class="info_data">
                         <div class="data">
                             <h4>Email</h4>
                             <p><?php echo $rowDoctorProfileData['D_email']; ?></p>
                         </div>
                         <div class="data">
                             <h4>Phone</h4>
                             <p><?php echo $rowDoctorProfileData['D_phone']; ?></p>
                         </div>

                     </div>
                 </div>

                 <div class="projects">
                     <h3>Work Days</h3>
                     <div class="projects_data">
                         <div class="data">
                             <table width="300px">
                                 <tr>
                                     <th>Time Slot&nbsp</th>
                                     <th>Sun&nbsp</th>
                                     <th>Mon&nbsp</th>
                                     <th>Tue&nbsp</th>
                                     <th>Wed&nbsp</th>
                                     <th>Thu&nbsp</th>
                                     <th>Fri&nbsp</th>
                                     <th>Sat</th>
                                 </tr>
                                 <tr>
                                     <td>7am-11am</td>
                                     <td align="left"><?php
                                                        $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSunday'];

                                                        if ($varCheckWorkingOrNot[0] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnMonday'];
                                                        if ($varCheckWorkingOrNot[0] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnTuesday'];
                                                        if ($varCheckWorkingOrNot[0] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnWednesday'];
                                                        if ($varCheckWorkingOrNot[0] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnThursday'];
                                                        if ($varCheckWorkingOrNot[0] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnFriday'];
                                                        if ($varCheckWorkingOrNot[0] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSaturday'];
                                                        if ($varCheckWorkingOrNot[0] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>11am-2pm</td>
                                     <td align="left"><?php
                                                        $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSunday'];

                                                        if ($varCheckWorkingOrNot[1] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnMonday'];
                                                        if ($varCheckWorkingOrNot[1] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnTuesday'];
                                                        if ($varCheckWorkingOrNot[1] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnWednesday'];
                                                        if ($varCheckWorkingOrNot[1] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnThursday'];
                                                        if ($varCheckWorkingOrNot[1] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnFriday'];
                                                        if ($varCheckWorkingOrNot[1] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSaturday'];
                                                        if ($varCheckWorkingOrNot[1] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>2pm-6pm</td>
                                     <td align="left"><?php
                                                        $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSunday'];

                                                        if ($varCheckWorkingOrNot[2] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnMonday'];
                                                        if ($varCheckWorkingOrNot[2] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnTuesday'];
                                                        if ($varCheckWorkingOrNot[2] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnWednesday'];
                                                        if ($varCheckWorkingOrNot[2] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnThursday'];
                                                        if ($varCheckWorkingOrNot[2] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnFriday'];
                                                        if ($varCheckWorkingOrNot[2] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSaturday'];
                                                        if ($varCheckWorkingOrNot[2] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>6pm-10pm</td>
                                     <td align="left"><?php
                                                        $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSunday'];

                                                        if ($varCheckWorkingOrNot[3] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnMonday'];
                                                        if ($varCheckWorkingOrNot[3] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnTuesday'];
                                                        if ($varCheckWorkingOrNot[3] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnWednesday'];
                                                        if ($varCheckWorkingOrNot[3] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnThursday'];
                                                        if ($varCheckWorkingOrNot[3] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnFriday'];
                                                        if ($varCheckWorkingOrNot[3] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSaturday'];
                                                        if ($varCheckWorkingOrNot[3] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>10pm-12am</td>
                                     <td align="left"><?php
                                                        $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSunday'];

                                                        if ($varCheckWorkingOrNot[4] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnMonday'];
                                                        if ($varCheckWorkingOrNot[4] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnTuesday'];
                                                        if ($varCheckWorkingOrNot[4] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnWednesday'];
                                                        if ($varCheckWorkingOrNot[4] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnThursday'];
                                                        if ($varCheckWorkingOrNot[4] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnFriday'];
                                                        if ($varCheckWorkingOrNot[4] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>


                                     <td align="left"><?php $varCheckWorkingOrNot = $rowDoctorProfileData['D_workOnSaturday'];
                                                        if ($varCheckWorkingOrNot[4] == "1") {
                                                            // If the first character is '1'
                                                            echo '<img src="../resources/doctorWorking.png">';
                                                        } else {
                                                            // If the first character is not '1'
                                                            echo '<img src="../resources/doctorNotWorking.png">';
                                                        }
                                                        ?>
                                     </td>
                                 </tr>
                             </table>
                         </div>
                         <div class="data">
                             <h4>Session</h4>

                             <p>

                             </p>
                             <h4>Visit</h4>
                             <p><?php echo $rowDoctorProfileData['D_visit'] ?>Tk only</p>
                         </div>
                     </div>
                 </div>

                 <div class="social_media">
                     <h4>Make an Apointment?</h4>
                     <form method="post" action="process_form.php">

                         <?php
                            $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                            $daysoftheweek = array();

                            foreach ($days as $day) {
                                $workOn = $rowDoctorProfileData['D_workOn' . $day];
                                if (strpos($workOn, '1') !== false) {
                                    $daysoftheweek[] = array('Day' => $day, 'D_workOn' => $workOn);
                                }
                            }

                            /*  $slot = $rowDoctorProfileData['D_timeSlot']; // Splitting the string into an array of characters
                            $characterArray = str_split($slot);
                            $index = 0;
                            $slotval;
                            $timeSlot = array();
                            while ($index < count($characterArray)) {
                                if (!empty($characterArray[$index]) && $characterArray[$index] === '1') {
                                    if ($index == '0') {
                                        array_push($timeSlot, "7am-11am");
                                        $slotval = 10000;
                                    }
                                    if ($index == '1') {
                                        array_push($timeSlot, "11am-2pm");
                                        $slotval = 01000;
                                    }
                                    if ($index == '2') {
                                        array_push($timeSlot, "2pm-6pm");
                                        $slotval = 00100;
                                    }
                                    if ($index == '3') {
                                        array_push($timeSlot, "6pm-10pm");
                                        $slotval = 00010;
                                    }
                                    if ($index == '4') {
                                        array_push($timeSlot, "10pm-12am");
                                        $slotval = 00001;
                                    }
                                }
                                $index++;
                            }
*/
                            ?>
                         <label for="dayOfWeek">Select a day:</label>
                         <select name="dayOfWeek" id="dayOfWeek">
                             <?php foreach ($daysoftheweek as $day) : ?>
                                 <option value="<?= $day['Day'] ?>"><?= $day['Day'] ?></option>
                             <?php endforeach; ?>
                         </select>

                         <label for="D_workOn">Select Time Slot:</label>
                         <select name="D_workOn" id="D_workOn">
                             <!-- Options will be populated based on the selected day using JavaScript -->
                         </select>

                         <button type="submit" class="btn-green" name="submit">Submit</button>

                     </form>


                 </div>
             </div>
         </div>
         <center>

             <script>
                 function search(str) {
                     if (str == "") {
                         document.getElementById('message').innerHTML = "<tr><td align=\"center\"><font color=\"white\" face=\"times new roman\" size=\"6\">Please Type Title</font><br><br><br>";
                         return;
                     }
                     let xhttp = new XMLHttpRequest();
                     xhttp.open('post', '../Controllers/search-controller.php', true);
                     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                     xhttp.send('name=' + str);
                     xhttp.onload = function() {
                         document.getElementById('message').innerHTML = this.responseText;
                     }
                 }


                 const dayOfWeek = document.getElementById('dayOfWeek');
                 const D_workOn = document.getElementById('D_workOn');

                 const daysWithWorkOn = <?= json_encode($daysoftheweek) ?>;

                 dayOfWeek.addEventListener('change', function() {
                     const selectedDay = this.value;
                     const selectedDayData = daysWithWorkOn.find(day => day.Day === selectedDay);

                     // Clear previous options
                     D_workOn.innerHTML = '';

                     // Create and append options to D_workOn select
                     if (selectedDayData && selectedDayData.D_workOn) {
                         for (let i = 0; i < selectedDayData.D_workOn.length; i++) {
                             const option = document.createElement('option');
                             option.value = selectedDayData.D_workOn[i];
                             option.textContent = selectedDayData.D_workOn[i];
                             D_workOn.appendChild(option);
                         }
                     }
                 });
             </script>
             </table>

             <br><br><br>
         </center>
     </section>




     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <!-- <script type="text/javascript" src="script.js"></script>-->
     <script>
         //Responsive navigation menu toggle
         const menuBtn = document.querySelector(".nav-menu-btn");
         const closeBtn = document.querySelector(".nav-close-btn");
         const navigation = document.querySelector(".navigation");

         menuBtn.addEventListener("click", () => {
             navigation.classList.add("active");
         });

         closeBtn.addEventListener("click", () => {
             navigation.classList.remove("active");
         });

         window.addEventListener('scroll', reveal);

         function reveal() {
             var reveals = document.querySelectorAll('.reveal');

             for (var i = 0; i < reveals.length; i++) {

                 var windowheight = window.innerHeight;
                 var revealtop = reveals[i].getBoundingClientRect().top;
                 var revealpoint = 150;

                 if (revealtop < windowheight - revealpoint) {
                     reveals[i].classList.add('active');
                 } else {
                     reveals[i].classList.remove('active');
                 }
             }
         }


         $(document).ready(function() {
             $("#search").autocomplete({
                 source: "controller/searchctrl.php",
             });
         });
     </script>




 </body>

 </html>