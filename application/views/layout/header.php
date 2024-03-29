<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ANZALA SAKINAH </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?=base_url('assets/')?>img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=base_url('assets/')?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url('assets/')?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?=base_url('assets/')?>/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/37faa7d064.js" crossorigin="anonymous"></script>
</head>

<body >
    <div class="container-fluid position-relative d-flex p-0"   >

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3" >
            <nav class="navbar bg-secondary navbar-dark" >
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4" >
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?= $user['nama']; ?></h6>
                        <!-- <span>Admin</span> -->
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <?php
            if ($user['role'] == 'Admin') {
            ?>
            <div class="navbar-nav w-100">
                    <a class="nav-item nav-link" href="<?= site_url('Dashboard/')?>" ><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                    </div>
                    <?php
            }
            ?>
                    <?php
            if ($user['role'] == 'User') { ?>
            <a href="<?= base_url('Profil/') ?>" class="nav-item nav-link"><i
                            class="fa fa-keyboard me-2"></i>Data Profil</a>
                    <a href="<?= base_url('Profil/parfum') ?>" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>Data Transaksi</a>
                    <a href="<?= base_url('Profil/pembelian') ?>" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>Data Pembelian</a>
                    <a href="<?= base_url('Auth/logout') ?>" class="nav-item nav-link"><i
                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
            
                    <?php } else {  
            ?>
            <div class="navbar-nav w-100">
                     <a href="<?= base_url('Profil/') ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Profil</a>
                    <div class="nav-item dropdown">
                    </div>
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Tables</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?= base_url('Parfum/') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Table Parfum</a>
                    <a href="<?= base_url('Transaksi/') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Table Transaksi</a>
                        </div>
                    <a href="<?= base_url('Auth/logout') ?>" class="nav-item nav-link"><i
                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                    
                    <?php
            } ?>
                </div>
            </nav>
        </div>
                <!-- <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                    </div>
                    <div class="navbar-nav w-100">
                     <a href="<?= base_url('Profil/') ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Profil</a>
                    <div class="nav-item dropdown">
                    </div>
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Tables</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?= base_url('Parfum/') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Table Parfum</a>
                    <a href="<?= base_url('Transaksi/') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Table Transaksi</a>
                        </div>
                        <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Data Table</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?= base_url('Datatables/') ?>" class="nav-item nav-link"><i
                            class="fa fa-keyboard me-2"></i>Data Parfum</a>
                        </div>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div> -->
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content" style="background-color: #AAA8A3;">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4" >
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit" ></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0" >
                    <i class="fa fa-bars" ></i>
                </a>
                <form class="d-none d-md-flex ms-4" >
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="<?=base_url('assets/')?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="<?=base_url('assets/')?>/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="<?=base_url('assets/')?>img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?= $user['nama']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href=<?=base_url('Auth/logout')?> class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->