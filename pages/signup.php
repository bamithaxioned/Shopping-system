<?php
    session_start();
?>

<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" lang="en" content="">
    <meta name="keywords" lang="en" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Shopping System | Sign Up</title>

    <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
    <link rel="shortcut icon" href="favicon.ico" />

    <!--font-awesome link for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
    <link rel="stylesheet" media="screen" href="../assets/css/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <!--container start-->
    <div class="container">
        <!--header section start-->
        <header>
            <div class="wrapper">
                <h1 class="header__heading">Welcome to Shopping System</h1>
            </div>
        </header>
        <!--header section end-->
        <!--main section start-->
        <main>
            <!--registration section start-->
            <section class="registration">
                <div class="wrapper">
                    <h2 class="registration__heading">Create Account</h2>
                    <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label for="fname">Your Name:</label>
                        <input type="text" name="name" id="name" value="" placeholder="Name" />
                        <span class="error"></span>
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="" placeholder="Email" />
                        <span class="error"></span>
                        <label for="password">Password:</label>
                        <input type="text" name="password" id="password" value="" placeholder="Password" />
                        <span class="error"></span>
                        <label for="cnfPassword">Confirm Password:</label>
                        <input type="text" name="cnfPassword" id="cnfPassword" value="" placeholder="Confirm Password" />
                        <span class="error"></span>
                        <label for="contact">Mobile Number:</label>
                        <input type="text" name="contact" id="contact" value="" placeholder="Mobile Number" />
                        <span class="error"></span>
                        <input type="submit" value="Sign Up" name="signup" class="submit">
                    </form>
                    <h3 class="login__user">Already have an account? <a href="../index.php" class="create__account" title="Sign In">Sign In</a></h3>
                </div>
            </section>
            <!--registration section end-->
        </main>
        <!--main section end-->
    </div>
    <!--container end-->

</body>

</html>