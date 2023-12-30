<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Girassol|Kulim+Park|Open+Sans&display=swap" rel="stylesheet">
</head>

<body>

    <div class="form">
        <div class="tabs">
            <div class="tab-selection">
                <div id="butn"></div>
                <button type="button" onclick="login()" class="toggle-button">Login Admin</button>
            </div>
            <form id="login" class="details" action="_login_.php" method="post">
                <h1>Welcome to BikeBuzz!</h1>
                <input type="text" class="field" name="username" placeholder="User Name" required>

                <input type="password" name="password" class="field" placeholder="Password" required>
                <button type="submit" class="sub-btn">Log in</button>
            </form>
        </div>
    </div>

    <script src="css/login.js"></script>
</body>

</html>