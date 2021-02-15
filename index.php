<?php
session_start();
require_once "./class/crud.php";

if (isset($_POST['login'])) {
    #GRABBING VALUES
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];
    $rememberMe = $_POST['rememberMe'];

    #Error for Email and Password for login
    $loginEmailErr = $loginPasswordErr = "";

    $crud = new Crud();
    $crud->db_connect();

    $con = $crud->mysqli;
    #grabbing Email from database
    $emailCheck = "select * from registration where email = '$loginEmail'";
    $query = mysqli_query($con, $emailCheck);
    $emailCount = mysqli_num_rows($query);

    if ($emailCount) {
        $loginEmailErr = "";
        $emailArr = mysqli_fetch_assoc($query);
        $dbPass = $emailArr['password'];;
        
        // $_SESSION['name'] = $emailArr['firstName'] . " " . $emailArr['lastName'];
        // $_SESSION['email'] = $emailArr['email'];
        // 
        // $checkPassword = password_verify($loginPassword, $dbPass);
        // password
        if ($dbPass) {
          $loginPasswordErr = "";
          header('location:./pages/shopping.php');
        } else {
          $loginPasswordErr = "Incorrect password.";
        }
    }
}


?>

<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" lang="en" content="">
    <meta name="keywords" lang="en" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Shopping System | Login</title>

    <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
    <link rel="shortcut icon" href="favicon.ico" />

    <!--font-awesome link for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
    <link rel="stylesheet" media="screen" href="assets/css/style.css">

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
            <!--login section start-->
            <section class="login">
                <div class="wrapper">
                    <h2 class="login__heading">Login Here</h2>
                    <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label for="email">Email:</label>
                        <input type="text" name="loginEmail" id="email" value="<?php echo $loginEmail; ?>" />
                        <span class="error"><?php echo $loginEmailErr; ?></span>
                        <label for="password">Password:</label>
                        <input type="text" name="loginPassword" id="password" value="<?php echo $loginPassword; ?>" />
                        <span class="error"><<?php echo $loginPasswordErr; ?>/span>
                        <input type="submit" value="Login Now" name="login" class="submit">
                    </form>
                    <h3 class="login__user">New to Shopping System? <a href="./pages/signup.php" class="create__account" title="Create an account">Create an account</a></h3>
                </div>
            </section>
            <!--login section end-->
        </main>
        <!--main section end-->
        
    </div>
    <!--container end-->

</body>

</html>