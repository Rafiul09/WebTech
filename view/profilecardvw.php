<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CSS User Profile Card</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link href="../style.css" rel="stylesheet">-->
  <link href="../css/profilecardvw.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>


<body>
  <?php
  function generateTableOutput($result)
  {
    $output = '';

    if (mysqli_num_rows($result) > 0) {
      $output .= '<div class="container text-center py-5">
                  <div class="row row-cols-1 row-cols-md-3 g-4 py-5">';

      while ($row = mysqli_fetch_assoc($result)) {

        $output .= '
         <form action="../controller/broadsearchctrl.php" method="post">
             <div class="col">
               <div class="card">
                 <img src="../resources/pphoto/doctor/' . $row["D_photo"] . '" class="card-img-top" alt="...">
                 <div class="card-body">
                   <h3 class="card-title">Dr. ' . $row["D_firstName"] . ' ' . $row["D_lastName"] . '</h3>
                   <p class="text-muted">' . $row['D_specialist'] . '</p>
                   <p class="card-text">' . $row['D_qualification'] . '</p>
                    <input type="hidden" value="' . $row['D_Id'] . '" name="D_Id">
                 </div>
                 <div class="d-flex justify-content-evenly">
                   <button class="btn-green" type="submit" name="broadsubmit">More Info</button>
                 </div>
               </div>
             </div>
          </form>';
      }

      $output .= '</div></div>';
    } else {
      $output = '<h3 align="center">[0] matches</h3>';
    }

    return $output;
  }
  ?>


</body>

</html>