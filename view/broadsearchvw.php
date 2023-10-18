 <?php
    session_start();
    require_once('../Model/user_activity_model.php');
    $varDoctorIdToShow = $_SESSION['sroamid'];
    $resDoctorProfileData = getprofileinfo("doctors", "D_Id", $varDoctorIdToShow);
    $rowDoctorProfileData = mysqli_fetch_assoc($resDoctorProfileData);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['selectedSlot'])) {
            $_SESSION['selectedSlot'] = $_POST['selectedSlot'];
        }
    }
    echo '<script>';
    echo 'var selectedSlot = ' . json_encode($_SESSION['selectedSlot']) . ';';
    echo '</script>';

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
     <link rel="stylesheet" href="../css/profilecardvw.css">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="../css/virtual-select.min.css">

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


                             <?php

                                if (isset($_COOKIE['patient'])) {
                                    echo ' <a href="../controller/logheader.php">Dashboard>></a>';
                                } else {
                                    echo '<a href="../controller/logheader.php">login</a>';
                                }

                                ?>

                         </li>
                     </ul>

                 </div>
             </div>
             <i class="uil uil-apps nav-menu-btn"></i>
         </div>

     </header>
     <section>
         <div>
             <br />
             <div class="form-group">
                 <div class="input-group">
                     <select name="category" class="form-select">
                         <option value="">Select Category</option>
                         <option value="Oncologist">Oncologist</option>
                         <option value="Dermatologist">Dermatologist</option>
                         <option value="Gynecologist">Gynecologist</option>
                         <option value="Cardiology">Cardiology</option>
                         <option value="Orthopedics">Orthopedics</option>
                         <option value="Neurology">Neurology</option>
                         <option value="Urology">Urology</option>
                         <!-- Add more options for different categories if needed -->
                     </select>

                     <select id="slot" multiple name="slot[]" placeholder="Select Time Slot" class="form-select">
                         <option value="1">7am-11am</option>
                         <option value="2">11am-2pm</option>
                         <option value="3">2pm-6pm</option>
                         <option value="4">6pm-10pm</option>
                         <option value="5">10pm-12am</option>
                     </select>






                     <input type="text" name="search_text" id="search_text" placeholder="Search by Doctor Details" class="form-control" />
                     <!-- <button class="btn-green" type="submit" name="submit">GO</button>-->
                 </div>
             </div>

             <br>
             <hr>
             <div class="result" id="result"></div>
         </div>
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
             load_data();

             function load_data(query, category, slot) {
                 $.ajax({
                     url: "../controller/broadsearchctrl.php",
                     method: "POST",
                     data: {
                         query: query,
                         category: category,
                         slot: slot
                     },
                     success: function(data) {
                         $('#result').html(data);
                     }
                 });
             }

             $('#search_text, select[name="category"], #slot').on('keyup change', function() {
                 var search = $('#search_text').val();
                 var category = $('select[name="category"]').val();
                 var slot = $('select[name="slot"]').val(); // Get the selected slot(s) value(s)

                 load_data(search, category, slot);
             });

         });
     </script>


     <script type="text/javascript" src="../js/virtual-select.min.js"></script>
     <script type="text/javascript">
         VirtualSelect.init({
             ele: '#slot',
             search: false
         });
     </script>


 </body>

 </html>