 <?php
    session_start();
    require_once('../Model/user_activity_model.php');



    ?>
 <!DOCTYPE html>
 <html>

 <head>
     <title>Index</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/reg.css">


 </head>

 <body>
     <?php


        $patient_id = idgen("patient", "P_ID");



        $res = tableloader("patient");

        ?>
     <center>
         <form action="../controller/regctrl.php" enctype="multipart/form-data" method="POST">
             <?php

                if (isset($_SESSION['error_message']) && is_array($_SESSION['error_message'])) {
                    $errorMessages = $_SESSION['error_message'];
                }

                ?>

             <h2>Sign Up!</h2>
             <table align="center">

                 <tr>

                     <td colspan="2" align="left">
                         <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                         <div class="upload">
                             <img src="img/<?php echo $user['image']; ?>" id="image">

                             <div class="rightRound" id="upload">
                                 <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                                 <i class="fa fa-camera"></i>
                             </div>

                             <div class="leftRound" id="cancel" style="display: none;">
                                 <i class="fa fa-times"></i>
                             </div>
                             <div class="rightRound" id="confirm" style="display: none;">
                                 <input type="submit">
                                 <i class="fa fa-check"></i>
                             </div>
                         </div>

                     </td>
                 </tr>
                 <tr>
                     <td>Patient ID</td>
                     <td align="left"><input type="text" name="pid" value="<?php echo $patient_id ?>" readonly>

                     </td>
                 </tr>
                 <tr valign="top">
                     <td>Name</td>
                     <td align="left"><input type="text" name="name" id="name" onkeyup="checkFullName()">
                         <br>
                         <font color="red" face="times new roman" size="3" id="fnameError">
                         </font>

                     </td>
                 </tr>
                 <tr valign="top">
                     <td>Email</td>
                     <td align="left"><input type="email" name="email" id="email" onkeyup="checkMail()">
                         <br>
                         <font color="red" face="times new roman" size="3" id="mailError"></font>
                         <br>
                     </td>
                 </tr>
                 <tr>
                     <td>Gender</td>
                     <td align="left">
                         <select name="gen">
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                             <option value="Other">Other</option>
                         </select>

                     </td>
                 </tr>
                 <tr valign="top">
                     <td>Date of Birth</td>
                     <td align="left"><input type="date" name="dob" id="dob">

                     </td>
                 </tr>
                 <tr valign="top">
                     <td>Phone</td>
                     <td align="left"><input type="number" name="phone" id="phone" onkeyup="checkPhone()">
                         <br>
                         <font color="red" face="times new roman" size="3" id="phoneError"></font>

                     </td>
                 </tr>
                 <tr valign="top">
                     <td>Address</td>
                     <td align="left">
                         <input type="text" name="address" id="address" onkeyup="checkAddress()">
                         <br>
                         <font color="red" face="times new roman" size="3" id="addressError"></font>
                     </td>
                 </tr>
                 <tr valign="top">
                     <td>Password*</td>
                     <td align="left"><input type="password" name="Upass" id="Upass" onkeyup="checkPassword()">
                         <br>
                         <font color="red" face="times new roman" size="3" id="passwordError"></font>


                     </td>
                 </tr>
                 <tr valign="top">
                     <td>Confirm Password*</td>
                     <td align="left"><input type="password" name="Ucpass" id="Ucpass" onkeyup="checkRepassword()">
                         <br>
                         <font color="red" face="times new roman" size="3" id="repasswordError"></font>

                     </td>
                 </tr>
             </table>
             <hr width="400">
             <?php
                unset($_SESSION['error_message']);
                ?>
             <button type="submit" class="btn-green" name="btnHome"> Login </button>
             <button type="submit" class="btn-green" name="admit" id="submitButton">Register</button>


         </form>



         <script type="text/javascript">
             function checkFormValidity() {
                 let fullname = document.getElementById('name').value;
                 let phone = document.getElementById('phone').value;
                 let email = document.getElementById('email').value;
                 let password = document.getElementById('Upass').value;
                 let repassword = document.getElementById('Ucpass').value;

                 let fnameError = document.getElementById('fnameError').innerText;
                 let phoneError = document.getElementById('phoneError').innerText;
                 let mailError = document.getElementById('mailError').innerText;
                 let passwordError = document.getElementById('passwordError').innerText;
                 let repasswordError = document.getElementById('repasswordError').innerText;
                 let submitButton = document.getElementById('submitButton');

                 if (
                     fullname === '' ||

                     phone === '' ||
                     email === '' ||
                     password === '' ||
                     repassword === '' ||
                     fnameError !== '' ||
                     phoneError !== '' ||
                     mailError !== '' ||
                     passwordError !== '' ||
                     repasswordError !== '' ||
                     password !== repassword
                 ) {
                     submitButton.disabled = true;
                 } else {
                     submitButton.disabled = false;
                 }
             }

             function checkFullName() {
                 let name = document.getElementById('name').value;
                 let nameLen = name.split(' ');

                 if (nameLen.length < 2) {
                     document.getElementById('fnameError').innerHTML = "Can not be less than 2 words";
                 } else {
                     document.getElementById('fnameError').innerHTML = "";
                 }

                 for (let i = 0; i < name.length; i++) {
                     if (!checkChar(name[i])) {
                         document.getElementById('fnameError').innerHTML = "Name can only contain letters, dots, or spaces.";
                         break;
                     }
                 }
                 checkFormValidity();
             }

             function checkChar(ch) {
                 return (ch >= 'A' && ch <= 'Z') || (ch >= 'a' && ch <= 'z') || ch === '.' || ch === ' ' || !isNaN(ch);
             }




             function checkPhone() {
                 let phone = document.getElementById('phone').value;

                 if (phone === '') {
                     document.getElementById('phoneError').innerHTML = "Phone number cannot be empty.";
                 } else {
                     for (let i = 0; i < phone.length; i++) {
                         if (!Number.isInteger(parseInt(phone[i]))) {
                             document.getElementById('phoneError').innerHTML = "Phone number can only contain numbers.";
                             break;
                         }
                     }

                     if (phone.length !== 11) {
                         document.getElementById('phoneError').innerHTML = "Phone number must be 11 characters long.";
                     } else {
                         document.getElementById('phoneError').innerHTML = "";
                     }
                 }
                 checkFormValidity();
             }

             function checkAddress() {
                 let address = document.getElementById('address').value;

                 // Regular expression for a basic address validation
                 let addressPattern = /^[a-zA-Z0-9\s,'-]*$/;

                 if (address === '') {
                     document.getElementById('addressError').innerHTML = "Address cannot be empty.";
                 } else if (!addressPattern.test(address)) {
                     document.getElementById('addressError').innerHTML = "Invalid address format.";
                 } else {
                     document.getElementById('addressError').innerHTML = "";
                 }
                 //checkFormValidity();
             }

             function checkPassword() {
                 let password = document.getElementById('Upass').value;

                 if (password === '') {
                     document.getElementById('passwordError').innerHTML = "Password cannot be empty.";
                 } else if (password.length < 8) {
                     document.getElementById('passwordError').innerHTML = "Password must be at least 8 characters long.";
                 } else {
                     document.getElementById('passwordError').innerHTML = "";
                 }
                 checkFormValidity();
             }

             function checkRepassword() {
                 let password = document.getElementById('Upass').value;
                 let repassword = document.getElementById('Ucpass').value;

                 if (repassword !== password) {
                     document.getElementById('repasswordError').innerHTML = "Passwords do not match.";
                 } else {
                     document.getElementById('repasswordError').innerHTML = "";
                 }
                 checkFormValidity();
             }

             function checkMail() {
                 let mail = document.getElementById('email').value;
                 let atPos = mail.indexOf('@');
                 let dotPos = mail.lastIndexOf('.');

                 if (!mail) {
                     document.getElementById('mailError').innerHTML = "Email cannot be empty.";
                 } else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
                     document.getElementById('mailError').innerHTML = "Invalid email address.";
                 } else {
                     document.getElementById('mailError').innerHTML = "";
                 }
                 checkFormValidity();
             }

             document.getElementById("fileImg").onchange = function() {
                 document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

                 document.getElementById("cancel").style.display = "block";
                 document.getElementById("confirm").style.display = "block";

                 document.getElementById("upload").style.display = "none";
             }

             var userImage = document.getElementById('image').src;
             document.getElementById("cancel").onclick = function() {
                 document.getElementById("image").src = userImage; // Back to previous image

                 document.getElementById("cancel").style.display = "none";
                 document.getElementById("confirm").style.display = "none";

                 document.getElementById("upload").style.display = "block";
             }
         </script>
         <?php
            /* if (isset($_FILES["fileImg"]["name"])) {
                $id = $_POST["id"];

                $src = $_FILES["fileImg"]["tmp_name"];
                $imageName = uniqid() . $_FILES["fileImg"]["name"];

                $target = "img/" . $imageName;

                move_uploaded_file($src, $target);

                $query = "UPDATE tb_user SET image = '$imageName' WHERE id = $id";
                mysqli_query($conn, $query);

                header("Location: index.php");
            }*/
            ?>
 </body>

 </html>