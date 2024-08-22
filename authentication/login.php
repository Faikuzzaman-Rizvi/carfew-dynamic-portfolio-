<?php
session_start();

if (isset($_SESSION['author_id'])){
    header('location: ../backend/home/home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../public/backend/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/backend/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../public/backend/assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="../public/backend/assets/css/main.min.css" rel="stylesheet">
    <link href="../public/backend/assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../public/backend/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../public/backend/assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="register.php">Sign Up</a></p>
            <!-- register complete -->
             <?php if (isset($_SESSION["register_complete"]) && isset($_SESSION["register_complete"])){ ?>
            <div class="alert alert-custom" role="alert">
              <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                 <div class="alert-content">
                   <span class="alert-title"> <?php echo $_SESSION["register_complete"]; ?> </span>
                   <span class="alert-text"> Mr.<?php echo $_SESSION["register_name"]; ?></span>
                 </div>
              </div>
              <?php } unset($_SESSION["register_complete"]); unset($_SESSION["register_complete"]);?>
               <!-- register complete -->

            <!-- register unsuccuessfull -->
             <?php if (isset($_SESSION["login_unsuccuessfull"])){ ?>
            <div class="alert alert-custom" role="alert">
              <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
                 <div class="alert-content">
                   <span class="alert-title"> <?php echo $_SESSION["login_unsuccuessfull"]; ?> </span>
                 </div>
              </div>
              <?php } unset($_SESSION["login_unsuccuessfull"]);?>
               <!-- register unsuccuessfull -->

               <form action="manage.php" method="POST">
            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Email address</label>
                <input type="email" class="form-control m-b-md" name="email" placeholder="example@neptune.com" value="<?php if(isset($_SESSION["register_email"])){ echo $_SESSION["register_email"];}else{ echo "";} unset($_SESSION["register_email"]); ?>">
                <?php if (isset($_SESSION["email_error"])) { ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION["email_error"]; ?></div>
                        <?php unset($_SESSION["email_error"]); ?>
                    <?php } ?>

                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                <?php if (isset($_SESSION["pass_error"])) { ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION["pass_error"]; ?></div>
                        <?php unset($_SESSION["pass_error"]); ?>
                    <?php } ?>
            </div>

            <div class="auth-submit">
                <button name="loginbtn" class="btn btn-primary">Sign In</button>
            </div>
            </form>
            <div class="divider"></div>            
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="../public/backend/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../public/backend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/backend/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../public/backend/assets/plugins/pace/pace.min.js"></script>
    <script src="../public/backend/assets/js/main.min.js"></script>
    <script src="../public/backend/assets/js/custom.js"></script>
</body>
</html>