<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php
include "main.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/14fa96d7be.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        input::placeholder {
            color: red !important;
            font-size: 1em;
        }

        #contact input::placeholder {
            color: black !important;
            font-size: 1em;
        }

        .contact-form {
            background: #fff;
            margin-top: 10%;
            margin-bottom: 5%;
            width: 70%;
        }

        .contact-form .form-control {
            border-radius: 1rem;
        }

        .contact-image {
            text-align: center;
        }

        .contact-image img {
            border-radius: 6rem;
            width: 11%;
            margin-top: -3%;
            transform: rotate(29deg);
        }

        .contact-form form {
            padding: 14%;
        }

        .contact-form form .row {
            margin-bottom: -7%;
        }

        .contact-form h3 {
            margin-bottom: 8%;
            margin-top: -10%;
            text-align: center;
            color: #0062cc;
        }

        .contact-form .btnContact {
            width: 50%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
            background: #dc3545;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }

        .btnContactSubmit {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
    <div class="centerdiv">
        <span class="loader"></span>
    </div>

    <i class="fas fa-arrow-circle-up uparrow fa-2x" style="position:fixed; bottom: 2vh; right:1vh ;z-index:5000000; cursor: pointer; display:none; color:darkred"></i>


    <header class="d-flex justify-content-center container-fluid fixed-top p-2" style="background-color:#2b2d42">
        <nav class="navbar container navbar-expand-md navbar-dark w-100">
            <div class="container-fluid d-flex">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse pt-sm-0 pt-3" id="navbarSupportedContent">
                    <h4> <a href="index.php" style="color:white">Tickets</a> </h4>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center w-sm-50">
                        <li class="nav-item">
                            <a class="nav-link" href="#home"><?= $language[$lang]['home'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#products"><?= $language[$lang]['products'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact"><?= $language[$lang]['contact'] ?></a>
                        </li>

                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 1) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="addproduct.php">ადმინ პანელი</a>
                            </li>
                        <?php
                        } ?>

                    </ul>
                    <?php
                    if (isset($_GET['logout'])) {

                        $_SESSION['user'] = null;
                    }
                    if (isset($_SESSION['user'])) {
                    ?>
                        <ul class="navbar-nav ms-auto d-block d-lg-flex d-flex justify-content-end text-center text-white">
                            <!-- <i class="fas fa-user-circle" id="login1"> <?= $_SESSION["user"]['name']; ?></i> -->
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle"></i>
                                </button>
                                <ul class="dropdown-menu text-justify" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item"><i class="fas fa-user-circle"></i> <?= $_SESSION['user']['name'] ?> </a></li>
                                    <li><a class="dropdown-item" href="userorders.php">შეკვეთები</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/jaba/FINALPROJECT/?logout">გამოსვლა</a></li>
                                </ul>
                            </div>
                        </ul>


                    <?php
                    } else {
                    ?>
                        <ul class="navbar-nav ms-auto d-block d-lg-flex d-flex justify-content-end text-center text-white">
                            <i class="fas fa-user-circle" id="login"> <?= $language[$lang]['login'] ?></i>
                        </ul>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </nav>
    </header>