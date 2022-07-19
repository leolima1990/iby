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
    <!-- Create -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
        <input type="submit" value="Submit">
    </form>
</body>
</html>