<?php include "partials/_dbconnect.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- fontawesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file linked -->
    <link rel="stylesheet" href="css/style.css">

    <title>Hackathon</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo SITEURL; ?>">PST</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo SITEURL; ?>map.php">Tracker</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo SITEURL; ?>DriverLocation.php">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo SITEURL; ?>about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo SITEURL; ?>contact.php">Support</a>
                    </li>
                </ul>
                <div class="col-md-3 text-end">
                    <button type="button" class="btn btn-warning me-2" data-bs-toggle="offcanvas" data-bs-target="#loginCanvas">Login</button>
                    <button type="button" class="btn btn-primary"  data-bs-toggle="offcanvas" data-bs-target="#signupCanvas">Sign-up</button>
                </div>
            </div>
        </div>
    </nav>
<?php
    include "_loginCanvas.php";
    include "_signupCanvas.php";
?>