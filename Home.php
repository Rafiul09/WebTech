<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<body>

    <header>
        <div class="nav-bar">
            <a href="Home.php" class="logo"><img src="resources/wing.png" align="left" width="60" height="60"></a>
            <div class="navigation">
                <div class="nav-items">
                    <i class="uil uil-times nav-close-btn"></i>
                    <ul>

                        <li>

                            <form method="post" action="controller/searchctrl.php">
                                <div class="search">
                                    <input type="text" id="search" name="search" placeholder="Look for a Doctor">
                                    <button class="close-btn" type="button" id="clear-search">X</button>
                                    <button class="btn-green" type="submit" name="homesubmit">GO</button>

                                    <input type="hidden" id="selectedId" name="selectedId">
                                </div>

                            </form>

                        </li>
                        <li>
                            <?php
                            if (isset($_COOKIE['patient'])) {
                                echo ' <a href="./controller/logheader.php">Dashboard>></a>';
                            } else {
                                echo '<a href="./controller/logheader.php">login</a>';
                            }

                            ?>
                        </li>
                    </ul>

                </div>
            </div>
            <i class="uil uil-apps nav-menu-btn"></i>
        </div>

    </header>

    <section class="home">

        <div class="container-fluid">
            <div class="banner-content">

                <h1><img src="resources/wing.png " width="50" height="50"> Our expertise at your service</h1>
            </div>

            <div class="service">
                <a href="./view/broadsearchvw.php">

                    <div class="service-content">
                        Our Doctors <i class="fas fa-heartbeat"></i>
                    </div>

                    <div class="service-icon">

                    </div>

                </a>
                <a href="javascript:viod(0);">

                    <div class="service-content">
                        <i class="fas fa-calendar"></i> Book an Appointment
                    </div>

                    <div class="service-icon">

                    </div>

                </a>
                <a href="javascript:viod(0);">

                    <div class="service-content">
                        Have an emergency?
                    </div>

                    <div class="service-icon">


                    </div>
                    <div class="callnum">
                        <h3>Call Number <i class="fas fa-phone"></i></h3>
                        <p>+8801944704963</p>
                    </div>
                </a>
            </div>

        </div>


    </section>

    <section class="work">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="hour">
                        <h2>Schedules</h2>

                        <div class="time">
                            <div class="booking">Slot-1</div>
                            <div class="booking">7AM-11AM</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Book
                                </button>
                            </div>
                        </div>
                        <div class="time">
                            <div class="booking">Slot-2</div>
                            <div class="booking">11AM-2pm</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Book
                                </button>
                            </div>
                        </div>
                        <div class="time">
                            <div class="booking">Slot-3</div>
                            <div class="booking">2pm-6pm</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Book
                                </button>
                            </div>
                        </div>
                        <div class="time">
                            <div class="booking">Slot-4</div>
                            <div class="booking">6pm-10pm</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Book
                                </button>
                            </div>
                        </div>
                        <div class="time">
                            <div class="booking">Slot-5</div>
                            <div class="booking">10pm-12m</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Book
                                </button>
                            </div>
                        </div>

                    </div>




                </div>
                <div class="col-md-6">
                    <div class="hour">
                        <h2>Notices</h2>

                        <div class="time">
                            <div class="booking">Date</div>
                            <div class="booking">Content</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Read
                                </button>
                            </div>
                        </div>
                        <div class="time">
                            <div class="booking">Date</div>
                            <div class="booking">Content</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Read
                                </button>
                            </div>
                        </div>
                        <div class="time">
                            <div class="booking">Date</div>
                            <div class="booking">Content</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Read
                                </button>
                            </div>
                        </div>
                        <div class="time">
                            <div class="booking">Date</div>
                            <div class="booking">Content</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Read
                                </button>
                            </div>
                        </div>
                        <div class="time">
                            <div class="booking">Date</div>
                            <div class="booking">Content</div>
                            <div class="booking">
                                <button type="button" class="btn-white">
                                    <i class="fas fa-calendar-week"></i>Read
                                </button>
                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>

    </section>

    <section>

    </section>
    <section>
        <div class="container reveal">
            <h2>Title</h2>
            <div class="cards">
                <div class="text-card">
                    <h3>Title</h3>
                    <p>infomation</p>
                </div>
                <div class="text-card">
                    <h3>Title</h3>
                    <p>infomation</p>
                </div>
                <div class="text-card">
                    <h3>Title</h3>
                    <p>infomation</p>
                </div>
                <div class="text-card">
                    <h3>Title</h3>
                    <p>infomation</p>
                </div>
                <div class="text-card">
                    <h3>Title</h3>
                    <p>infomation</p>
                </div>
            </div>
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
            $("#search").autocomplete({
                source: "controller/searchctrl.php",
                select: function(event, ui) {
                    var selectedId = ui.item.id;
                    var selectedValue = ui.item.value;
                    console.log('Selected ID:', selectedId);
                    console.log('Selected Value:', selectedValue);

                    $("#selectedId").val(selectedId);
                }
            });


            $('#search').on('input', function() {
                var inputValue = $(this).val();
                if (inputValue.length > 0) {
                    $('#clear-search').show();
                } else {
                    $('#clear-search').hide();
                }
            });

            // Clear search input on close button click
            $('#clear-search').on('click', function() {
                $('#search').val('').focus();
                $(this).hide();
            });

        });
    </script>




</body>

</html>