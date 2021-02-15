<?php
session_start();
require_once "../class/validation.php";
require_once "../class/crud.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['signup'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $cnfPassword = $_POST['cnfPassword'];
        $contact = trim($_POST['contact']);

        #PASSWORD ENCRYPTION
        $encPass = password_hash($password, PASSWORD_BCRYPT);
        $encCPass = password_hash($cnfPassword, PASSWORD_BCRYPT);

        #CREATING OBJECT OF VALIDATION.
        $validate = new Validation();
        $validate->assignValue($name, $email, $password, $cnfPassword, $contact);
        $validate->validateName();
        $validate->validateEmail();
        $validate->validatePassword();
        $validate->validateConfirmPassword();
        $validate->validateContact();

        if ($validate->nameErr == "" && $validate->emailErr == "" && $validate->passwordErr == "" && $validate->cnfPasswordErr == "" && $validate->contactErr == "") {
            $crud = new Crud();
            $crud->setDatabaseName("shoppingsystem");
            $crud->db_connect();

            // EMAIL QUERY
            $con = $crud->mysqli;
            $emailQuery = "select * from registration where email = '$email'";
            $query = mysqli_query($con, $emailQuery);
            $emailCount = mysqli_num_rows($query);

            if ($emailCount > 0) {
                $validate->emailErr = "Email Already Exists";
            } else {
?>
                <script>
                    alert("Thank you for creating your account");
                </script>
<?php
                $validate->emailErr = "";
                $crud->insert("registration", ['name' => "$name", 'email' => "$email", 'password' => "$encPass", 'cpassword' => "$encCPass", 'contact' => "$contact"]);
                $validate->name = $validate->email = $validate->password = $validate->cnfPassword = $validate->contact = "";
            }
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
                        <input type="text" name="name" id="name" value="<?php echo $validate->name; ?>" placeholder="Name" />
                        <span class="error"><?php echo $validate->nameErr; ?></span>
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="<?php echo $validate->email; ?>" placeholder="Email" />
                        <span class="error"><?php echo $validate->emailErr; ?></span>
                        <label for="password">Password:</label>
                        <input type="text" name="password" id="password" value="<?php echo $validate->password; ?>" placeholder="Password" />
                        <span class="error"><?php echo $validate->passwordErr; ?></span>
                        <label for="cnfPassword">Confirm Password:</label>
                        <input type="text" name="cnfPassword" id="cnfPassword" value="<?php echo $validate->cnfPassword; ?>" placeholder="Confirm Password" />
                        <span class="error"><?php echo $validate->cnfPasswordErr; ?></span>
                        <label for="contact">Mobile Number:</label>
                        <input type="text" name="contact" id="contact" value="<?php echo $validate->contact; ?>" placeholder="Mobile Number" />
                        <span class="error"><?php echo $validate->contactErr; ?></span>
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