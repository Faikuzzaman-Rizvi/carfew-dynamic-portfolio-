<?php

include "./config/database.php";
session_start();

if(isset($_SESSION['author_id'])){
    
    $id = $_SESSION['author_id'];
    $users_query = "SELECT * FROM users WHERE  id='$id' ";
    $connect = mysqli_query($db,$users_query);
    $user = mysqli_fetch_assoc($connect);

}else{
    $users_query = "SELECT * FROM users";
    $connect = mysqli_query($db,$users_query);
    $user = mysqli_fetch_assoc($connect); 
}

$services_query = "SELECT * FROM services WHERE status='active'";
$services = mysqli_query($db,$services_query);

$reviews_query = "SELECT * FROM reviews WHERE status='active'";
$reviews = mysqli_query($db,$reviews_query);

$port_query = "SELECT * FROM portfolios WHERE status='active'";
$portfolios = mysqli_query($db,$port_query);

$edu_query = "SELECT * FROM educations WHERE status='active'";
$educations = mysqli_query($db,$edu_query);

$quote_query = "SELECT * FROM quotes WHERE status='active'";
$quotes = mysqli_query($db,$quote_query);

$company_query = "SELECT * FROM companys WHERE status='active'";
$logos = mysqli_query($db,$company_query);



?>

<!doctype html>
<html class="no-js" lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rizvi- Personal Portfolio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="./public/frontend/img/favicon2.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="./public/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/frontend/css/animate.min.css">
        <link rel="stylesheet" href="./public/frontend/css/magnific-popup.css">
        <link rel="stylesheet" href="./public/frontend/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./public/frontend/css/flaticon.css">
        <link rel="stylesheet" href="./public/frontend/css/slick.css">
        <link rel="stylesheet" href="./public/frontend/css/aos.css">
        <link rel="stylesheet" href="./public/frontend/css/default.css">
        <link rel="stylesheet" href="./public/frontend/css/style.css">
        <link rel="stylesheet" href="./public/frontend/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="./index.php" class="navbar-brand logo-sticky-none" ><i style="font-size: 25px; display:flex; gap:10px; font-weight:900; color:#8CC090; letter-spacing: 3px;" class="fa-brands fa-r-project">Rizvi</i></a>
                                    <a href="./index.php" class="navbar-brand s-logo-none"><i style="font-size: 25px; display:flex; gap:10px; font-weight:900; color:#8CC090; letter-spacing: 3px;" class="fa-brands fa-r-project">Rizvi</i></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                            <?php if(isset($_SESSION['author_id'])) :?>
                                            <li class="nav-item"><a class="nav-link" href="./authentication/login.php">Dashboard</a></li>
                                            <?php else: ?>
                                            <li class="nav-item"><a class="nav-link" href="./authentication/login.php">Login/Register</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="./index.php">
                    <i style="font-size: 25px; display:flex; gap:10px; font-weight:900; color:#8CC090; letter-spacing: 3px;" class="fa-brands fa-r-project">Rizvi</i>
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli
                            Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <?php if(isset($_SESSION['author_id'])) : ?>
                        <p>+88<?= $user['number'] ?></p>
                        <?php else: ?>
                        <p>+88<?= $user['number'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <?php if(isset($_SESSION['author_id'])) : ?>
                        <p><?= $user['email'] ?></p>
                        <?php else: ?>
                        <p><?= $user['email'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">Assalamu-Alykum!</h6>
                                <?php if(isset($_SESSION['author_id'])) : ?>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"> I am <?= $user['name'] ?></h2>
                                <?php else:?>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $user['name'] ?></h2>
                                <?php endif; ?>
                                <p class="wow fadeInUp" data-wow-delay="0.6s">I'm <?= $user['name'] ?> <?= $user['description'] ?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                
                            <?php if($user['image'] == 'defult.jpeg') : ?>
                                <img src="./public/uploads/defult/<?= $user['image'] ?>" style="width: 650px; height: 820px;" alt="<?= $user['image'] ?>" >
                                <?php else: ?>
                                    <img src="./public/uploads/profile/<?= $user['image'] ?>" style="width: 650px; height: 820px;" alt="" >
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="./public/frontend/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <!-- <img src="./public/frontend/img/banner/banner_img2.png" title="me-01" alt="me-01"> -->
                                <?php if($user['image_about'] == 'defult2.png') : ?>
                                <img src="./public/uploads/defult/<?= $user['image_about'] ?>" style="width: 650px; height: 750px;" alt="" >
                                <?php else: ?>
                                    <img src="./public/uploads/about_img/<?= $user['image_about'] ?>" style="width: 600px; height: 850px;" alt="" >
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <?php foreach($educations as $education) : ?>
                            <div class="about-content">
                                
                            <p> <?= $education['description'] ?></p>

                            <?php endforeach; ?>
                                
                                <h3>Skills:</h3>
                            </div>
                            <!-- Education Item -->
                            <?php foreach($educations as $education) : ?>
                            <div class="education">
                                <div class="year"><?= $education['year'] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $education['information'] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width:<?= $education['activity'] ?>;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services & Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach($services as $service) : ?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class=" <?= $service['icon']?>"></i>
								<h3>
                                <?= $service['title'] ?>
                                </h3>
								<p>
                                <?= $service['description']?>
								</p>
							</div>
						</div>
                        <?php endforeach; ?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent tours places</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($portfolios as $portfolio): ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img style="height: 500px; object-fit:cover;" src="./public/uploads/portfolio/<?= $portfolio['image']?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span>
                                    <?= $portfolio['subtitle']?>
                                    </span>
									<h4><a href="portfolio-single.html">
                                    <?= $portfolio['title']?>
                                    </a></h4>
									<a href="./backend/portfolio/single.php?singleid=<?= $portfolio['id']?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                        <?php foreach($reviews as $review) : ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?= $review['icon']?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <span><h5><?= $review['title'] ?></h5></span>
                                        <span><p>
                                          <?= $review['description']?>
								         </p></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                <?php foreach($quotes as $quote):?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="./public/uploads/customer_img/<?= $quote['image']?>" alt="img" style="width: 100px; height: 100px; border-radius:50%;">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?= $quote['quote']?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $quote['name']?></h5>
                                            <span><?= $quote['position']?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->
            
            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php foreach($logos as $logo):?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="./public/uploads/company_logo/<?= $logo['image'] ?>" alt="img" style="width: 100px; height: 100px; border-radius:50%;">
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span>NEW YORK</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <?php if(isset($_SESSION['author_id'])) : ?>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $user['address'] ?></li>
                                        <?php else: ?>
                                            <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $user['address'] ?></li>
                                        <?php endif; ?>

                                        <?php if(isset($_SESSION['author_id'])) : ?>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span>+88<?= $user['number'] ?></li>
                                        <?php else: ?>
                                            <li><i class="fas fa-headphones"></i><span>Phone :</span>+88<?= $user['number'] ?></li>
                                        <?php endif; ?>

                                        <?php if(isset($_SESSION['author_id'])) : ?>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $user['email'] ?></li>
                                        <?php else: ?>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $user['email'] ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="./backend/email/action.php" method="POST">
                                    <input type="text" placeholder="your name *" name="name">
                                    <input type="email" placeholder="your email *" name="email" style="text-transform: lowercase !important;">
                                    <textarea name="body" id="message" placeholder="your message *"></textarea>
                                    <button class="btn" type="submit" name="email_send">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Rizvi</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="./public/frontend/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./public/frontend/js/popper.min.js"></script>
        <script src="./public/frontend/js/bootstrap.min.js"></script>
        <script src="./public/frontend/js/isotope.pkgd.min.js"></script>
        <script src="./public/frontend/js/one-page-nav-min.js"></script>
        <script src="./public/frontend/js/slick.min.js"></script>
        <script src="./public/frontend/js/ajax-form.js"></script>
        <script src="./public/frontend/js/wow.min.js"></script>
        <script src="./public/frontend/js/aos.js"></script>
        <script src="./public/frontend/js/jquery.waypoints.min.js"></script>
        <script src="./public/frontend/js/jquery.counterup.min.js"></script>
        <script src="./public/frontend/js/jquery.scrollUp.min.js"></script>
        <script src="./public/frontend/js/imagesloaded.pkgd.min.js"></script>
        <script src="./public/frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="./public/frontend/js/plugins.js"></script>
        <script src="./public/frontend/js/main.js"></script>
    </body>

</html>
