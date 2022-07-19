<?php
    include_once('../functions/functions.php');
    $dbConnect = dbLink();
    if($dbConnect) {
        echo '<!-- Connection established -->';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="grid-content-login">
        <div class="logo">
            <a href="../index.php" class="logo">
            <img src="../images/logo.png" alt="logo">
            </a>
        </div>
    <nav>
        <p class="p-address">
                24, Roma Street, <br>
                Brisbane, QLD 4000
            </p>
            <p class="p-hours">
                Monday - Saturday:
                9AM - 8PM <br>
                Sunday: 10AM - 7PM 
            </p>
            <p class="p-contact">
                contact@iby.com.au <br>
                +61 (07) 1234 5678 
            </p><br><br><br>
            <a href="about.php">About</a>
            <a href="classes.php">Classes</a>
            <a href="equipment.php">Equipment</a>
            <a href="contact.php">Contact</a>   
            <a href="login.php">Login</a>          
    </nav>
        <div class="hero-image-login">
        </div>
        <div class="form-login">
            <!-- Login -->
            <form class="form-login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label class="title">Login</label><br><br>
                <input type="text" name="username" placeholder="Enter Username"><br>
                <input type="hidden" name="action" value="client">
                <input type="password" name="password" placeholder="Enter Password">
                <button type="submit" class="btn-login" value="Send">Login</button>
            </form>
        </div>
    <footer>
        <p class="p-footer">Created by IT AUS - All rights Reserved
        <a href="https://www.facebook.com/" class="links-hover social-media-links"><i class="bi bi-facebook"></i></a>
        <a href="https://www.twitter.com/"class="links-hover social-media-links"><i class="bi bi-twitter"></i></a>
        <a href="https://www.instagram.com/" class="links-hover social-media-links"><i class="bi bi-instagram"></i></a>
        </p>
    </footer>
    </div>    
</body>
</html>