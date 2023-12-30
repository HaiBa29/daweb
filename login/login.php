<!DOCTYPE html>
<html>

<head>
    <title>Login-or-Sign Up</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Girassol|Kulim+Park|Open+Sans&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <div class="form">
        <div class="tabs">
            <div class="tab-selection">
                <div id="butn"></div>
                <button type="button" onclick="login()" class="toggle-button">Login</button>
                <button type="button" class="toggle-button" onclick="signup()">Sign Up</button>
            </div>
            <form id="login" class="details" action="_login.php" method="post">
                <h1>Welcome to BikeBuzz!</h1>
                <input type="text" class="field" name="username" placeholder="User Name" required>

                <input type="password" name="password" class="field" placeholder="Password" required>
                <button type="submit" class="sub-btn">Log in</button>
            </form>
            <form id="signup" class="details" action="register.php" method="post" onsubmit="return validatePassword();">
                <h1>Register for an Account BikeBuzz!</h1>
                <input type="text" class="field" name="username" placeholder="User Name" required>

                <input type="password" name="password" id="signup_password" class="field" placeholder="Password" required>
                <input type="password" name="repassword" id="signup_confirm_password" class="field" placeholder="ReEnter Password" required>
                <button type="submit" class="sub-btn">Register an account</button>
            </form>
        </div>
    </div>

    <script src="css/login.js"></script>
    <script>
        function validatePassword() {
            var password = document.getElementById("signup_password").value;
            var confirmPassword = document.getElementById("signup_confirm_password").value;

            if (password !== confirmPassword) {
                Swal.fire({
                    icon: '',
                    title: 'Password Mismatch',
                    text: 'Passwords do not match. Please re-enter your passwords.',
                    showConfirmButton: true
                });
                return false;
            }
            return true;
        }
    </script>

</body>

</html>