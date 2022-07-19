<?php
    include_once('../functions/functions.php');
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
    <div class="grid-content-add-user">
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
                <p class="p-contact">
                    contact@iby.com.au <br>
                    +61 (07) 1234 5678 
                </p><br><br><br><br>

                <a href="about.php">About</a>
                <a href="classes.php">Classes</a>
                <a href="equipment.php">Equipment</a>
                <a href="contact.php">Contact</a>           
            </nav>
            <div class="social-media">
                <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
                <a href="https://www.twitter.com/"><i class="bi bi-twitter"></i></a>
                <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a><br><br>

                <a class="login-link" href="login.php">Login</a>
            </div>

        <!-- Create -->
        <form class="form-users-add" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label class="title">Register a new user</label><br><br>
            <input type="hidden" name="action" value="new_user">
            <input type="text" name="username" placeholder="Enter Username" required><br>
            <label for="role" required>Choose the role:</label> <br>
            <select name="role" id="role">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="client">Client</option>
            </select>
            <br><br>
            <input type="password" name="password" placeholder="Enter Password" required><br>
            <input type="text" name="name" placeholder="Enter Name" required><br>
            <input type="email" name="email" placeholder="Enter Email" required><br>
            <input type="text" name="phone" placeholder="Enter Phone" required><br>
            <input type="text" name="address" placeholder="Enter Address"><br>
            <input type="submit" class="btn-users-add" value="Submit">
        </form>
    </div>
</body>
</html>