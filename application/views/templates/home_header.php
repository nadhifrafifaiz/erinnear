<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title  ?></title>
        <link rel="icon" type="image/x-icon" href="<?=base_url('assets/');?>img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=base_url('assets/');?>css/styles.css" rel="stylesheet" />
    </head>


        <body id="page-top" class="bg-dark">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="<?=base_url('home')  ?>"><img src="<?=base_url('/assets/img/navbar-logo.svg') ?>" alt="" /></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text-uppercase ml-auto">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Order</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>

                            <?php if($this->session->userdata('email')): ?>
                              <div class="dropdown">
                                <a class="nav-item dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-gray-600 small"><?= $user['name']  ?></span>
                                  <img class="img-profile rounded-circle" src="<?=base_url('/assets/img/profile/') . $user['image'];?>">
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="<?=base_url('user/index')  ?>">Profile</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="<?=base_url('auth/logout');  ?>">Logout</a>
                                </div>
                              </div>
                            <?php else: ?>
                              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?=base_url('auth');  ?>">Login</a></li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </nav>
