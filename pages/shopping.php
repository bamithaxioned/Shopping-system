<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("location:../index.php");
    }
?>
<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" lang="en" content="">
    <meta name="keywords" lang="en" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Shopping System</title>

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
        <header class="header">
            <div class="wrapper">
                <h1 class="header__heading">Welcome to Shopping System</h1>
                <div class="logout-btn">
                    <a href="./logout.php">Logout</a>
                </div>
            </div>
        </header>
        <!--header section end-->
        <!--main section start-->
        <main>
            <!--product section start-->
            <section class="product">
                <div class="wrapper">
                    <div class="cart">
                        <h2 class="name"><?php echo $_SESSION['name']; ?></h2>
                        <a href="#" class="cart" title="Cart">Cart</a>
                    </div>
                    <ul class="product-block">
                        <li class="product-list">
                            <figure>
                                <img src="../assets/images/iphone 12 pro.jpeg" alt="Iphone 12 Pro">
                            </figure>
                            <h2 class="product-heading">Iphone 12 Pro</h2>
                            <span class="price">1,00,000 Rs</span>
                            <a href="#FIXME" class="signup" title="Add to Cart">Add to Cart</a>
                        </li>
                        <li class="product-list">
                            <figure>
                                <img src="../assets/images/nokia 3310.jpeg" alt="Nokia 3310">
                            </figure>
                            <h2 class="product-heading">Iphone 12 Pro</h2>
                            <span class="price">4,000 Rs</span>
                            <a href="#FIXME" class="signup" title="Add to Cart">Add to Cart</a>
                        </li>
                        <li class="product-list">
                            <figure>
                                <img src="../assets/images/nokia 3310.jpeg" alt="Nokia 3310">
                            </figure>
                            <h2 class="product-heading">Iphone 12 Pro</h2>
                            <span class="price">4,000 Rs</span>
                            <a href="#FIXME" class="signup" title="Add to Cart">Add to Cart</a>
                        </li>
                    </ul>
                </div>
            </section>
            <!--product section start-->
        </main>
        <!--main section end-->

        <!--footer section start-->
        <footer>

        </footer>
        <!--footer section end-->

    </div>
    <!--container end-->

</body>

</html>