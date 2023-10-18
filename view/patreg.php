<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Registration</title>
</head>

<body bgcolor="black">
    <br><br>
    <center>
        <a href="../index.php"><img src="../Uploads/logo.png" width="80px"></a>
    </center>
    <br><br>
    <form action="../Controllers/reg-controller.php" method="post">
        <table width="30%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" align="center" bordercolor="F5C518">
            <tr>
                <td>
                    <font color="F5C518" face="times new roman" size="6">Create Account</font>
                    <br><br>
                    <font color="white" face="times new roman" size="4">Full Name</font>
                    <br>
                    <input type="text" name="fullname" id="fullname" placeholder="First and Last name" size="43px" onkeyup="checkFullName()">
                    <br>
                    <font color="red" face="times new roman" size="3" id="fnameError"></font>
                    <br><br>
                    <font color="white" face="times new roman" size="4">Username</font>
                    <br>
                    <input type="text" name="username" id="username" size="43px" onkeyup="checkUserName()">
                    <br>
                    <font color="red" face="times new roman" size="3" id="usernameError"></font>
                    <br><br>
                    <font color="white" face="times new roman" size="4">Phone number</font>
                    <br>
                    <input type="text" name="phone" id="phone" size="43px" onkeyup="checkPhone()">
                    <br>
                    <font color="red" face="times new roman" size="3" id="phoneError"></font>
                    <br><br>
                    <font color="white" face="times new roman" size="4">Email</font>
                    <br>
                    <input type="email" name="email" id="email" size="43px" onkeyup="checkMail()">
                    <br>
                    <font color="red" face="times new roman" size="3" id="mailError"></font>
                    <br><br>
                    <font color="white" face="times new roman" size="4">Password</font>
                    <br>
                    <input type="password" name="password" id="password" size="43px" onkeyup="checkPassword()">
                    <br>
                    <font color="red" face="times new roman" size="3" id="passwordError"></font>
                    <br><br>
                    <font color="white" face="times new roman" size="2"><i>i &nbsp;</i></font>
                    <font color="white" face="times new roman" size="2">Passwords must be at least 8 characters.</font>
                    <br><br>
                    <font color="white" face="times new roman" size="4">Re-enter password</font>
                    <br>
                    <input type="password" name="repassword" id="repasswordField" size="43px" onkeyup="checkRepassword()">
                    <br>
                    <font color="red" face="times new roman" size="3" id="repasswordError"></font>
                    <br><br>
                    <input type="checkbox" name="termsandconditions" required>
                    <font color="white" face="times new roman" size="4">I accept the Terms and Conditions</font><br><br><br>
                    <button size="250px" name="submit" id="submitButton">Create your iMBD account</button>
                    <br><br>
                    <hr color="F5C518" width="auto">
                    <p align="center">
                        <br>
                        <font color="white" face="times new roman" size="3">Already have an account?</font>
                        <a href="sign-in.html">
                            <font color="5799EF" face="times new roman" size="3">Sign in</font>
                        </a>
                    </p>
                </td>
            </tr>
        </table>
    </form>
    <br><br><br>

    <script>
        function checkFormValidity() {
            let fullname = document.getElementById('fullname').value;
            let username = document.getElementById('username').value;
            let phone = document.getElementById('phone').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let repassword = document.getElementById('repasswordField').value;

            let fnameError = document.getElementById('fnameError').innerText;
            let usernameError = document.getElementById('usernameError').innerText;
            let phoneError = document.getElementById('phoneError').innerText;
            let mailError = document.getElementById('mailError').innerText;
            let passwordError = document.getElementById('passwordError').innerText;
            let repasswordError = document.getElementById('repasswordError').innerText;

            let submitButton = document.getElementById('submitButton');

            if (
                fullname === '' ||
                username === '' ||
                phone === '' ||
                email === '' ||
                password === '' ||
                repassword === '' ||
                fnameError !== '' ||
                usernameError !== '' ||
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
            let name = document.getElementById('fullname').value;
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




        function checkFullName() {
            let name = document.getElementById('fullname').value;
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



        function checkUserName() {
            let username = document.getElementById('username').value;

            if (username === '') {
                document.getElementById('usernameError').innerHTML = "Username cannot be empty.";
            } else {
                for (let i = 0; i < username.length; i++) {
                    if (!checkChar(username[i])) {
                        document.getElementById('usernameError').innerHTML = "Username can only contain letters, numbers, dots, or spaces.";
                        break;
                    }
                }

                if (username.split(' ').length > 1) {
                    document.getElementById('usernameError').innerHTML = "Username cannot contain more than one word.";
                } else if (username.length > 15) {
                    document.getElementById('usernameError').innerHTML = "Username cannot exceed 15 characters.";
                } else {
                    document.getElementById('usernameError').innerHTML = "";
                }
            }
            checkFormValidity();
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

        function checkPassword() {
            let password = document.getElementById('password').value;

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
            let password = document.getElementById('password').value;
            let repassword = document.getElementById('repasswordField').value;

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
    </script>



    <center>
        <a href="about-us.php">
            <font color="white" face="times new roman" size="4">About Us</font>
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.php">
            <font color="white" face="times new roman" size="4">Helpline</font>
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.php">
            <font color="white" face="times new roman" size="4">FAQ</font>
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.php">
            <font color="white" face="times new roman" size="4">Terms and Services</font>
        </a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com, Inc.</font><br><br>
    </center>
</body>

</html>