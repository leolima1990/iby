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
</head>
<body>
<div class="grid-content-users-list">
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
        <div class="table-users-list">
    
            <table border="1" class="table">
                <tr>
                    <th></th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
                
                <?php
                    $users = listUsers();
                    foreach ($users as $key => $user) { ?>
                        <tr>
                            <td>#<?= $user['id'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['phone'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td><a href="?user_id=<?= $user['id'] ?>#users">Edit</a></td>
                            <td><a href="?delete_id=<?= $user['id'] ?>#delete">Delete</a></td>
                        </tr><?php
                    }           
                ?>
            </table>

            <?php if($_GET['user_id']){ ?>
                <!-- //case existis an ID, do that -->
                <?php $u = listUsers($_GET['user_id'])[0]; ?>
                <!-- //list all the users -->
                <h4 id="users">#<?= $u['id'] ?> Users details</h4>
                <form class="form-users-list" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="action" value="update_user">
                    <!-- this action send the information to post and execute the if(isset($_POST['action'])) in the functions page -->
                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                    <input type="text" name="username" placeholder="Enter Username" value="<?= $u['username'] ?>" required><br>
                    <!-- print the values "value"-->
                    <label for="cars" required>Choose the role:</label> <br>
                    <select name="role" id="role">
                        <option value="admin" <?= $u['role'] == 'admin' ? 'selected' :'' ?>>Admin</option>
                        <option value="staff" <?= $u['role'] == 'staff' ? 'selected' :'' ?>>Staff</option>
                        <option value="client" <?= $u['role'] == 'client' ? 'selected' :'' ?>>Client</option>
                    </select>
                    <br><br>
                    <input type="password" name="password" placeholder="Enter Password" value="<?= $u['password'] ?>" required><br>
                    <input type="text" name="name" placeholder="Enter Name" value="<?= $u['name'] ?>" required><br>
                    <input type="email" name="email" placeholder="Enter Email" value="<?= $u['email'] ?>" required><br>
                    <input type="text" name="phone" placeholder="Enter Phone" value="<?= $u['phone'] ?>" required><br>
                    <input type="text" name="address" placeholder="Enter Address" value="<?= $u['address'] ?>"><br>
                    <input type="submit" class="btn-users-list" value="Submit">
                </form>

            <?php } ?>


            <?php if($_GET['delete_id']){ ?>
                <!-- //case existis an ID, do that -->
                <?php $u = listUsers($_GET['delete_id'])[0]; ?>
                <!-- //list all the users -->
                <h4 id="delete">#<?= $u['id'] ?> Users details</h4>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="action" value="delete_user">
                    <!-- this action send the information to post and execute the if(isset($_POST['action'])) in the functions page -->
                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                    Confirm hahahah
                    <input type="submit" value="Confirm">
                </form>

            <?php } ?>
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