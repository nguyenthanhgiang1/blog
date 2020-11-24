
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Register</title>
</head>

<body>
    <header>
        <div class="logo">
            <h1><span>Awa</span>Inspires</h1>
        </div>
        <ul>
            <li>
                <a href="#">Home</a>
                <ul>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
                <ul>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Services</a>
                <ul>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-user" id="user"></i>Awa Melvine <i class="fa fa-caret-down" id="down"></i></a>
                <ul>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <div class="auth-content">
        <form action="register.html" method="post">
            <h2 class="form-title">Register</h2>
            <!-- <div class="msg error">
                <li>Username required</li>
            </div> -->
            <div>
                <label for="">Username</label>
                <input type="text" name="username" class="text-input">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" class="text-input">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" class="text-input">
            </div>
            <div>
                <label for="">Password Confirmation</label>
                <input type="password" name="passwordConf" class="text-input">
            </div>
            <div>
                <button type="submit" name="register-btn" class="btn btn-big">Register</button>
            </div>
            <p>Or <a href="login.html">Sign In</a></p>
        </form>
    </div>
    <!-- video7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- nheiu anh truoi -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>