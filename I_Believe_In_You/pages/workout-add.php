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
</head>
<body>
    <a href="../index.php">Home</a>
    
    <table border="1">
        <tr>
            <th colspan="17">Workouts</th>
            <th>Action</th>
        </tr>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Personal Trainer</th>
            <th>Title</th>
            <th>Monday</th>
            <th>Title</th>
            <th>Tuesday</th>
            <th>Title</th>
            <th>Wednesday</th>
            <th>Title</th>
            <th>Thursday</th>
            <th>Title</th>
            <th>Friday</th>
            <th>Title</th>
            <th>Saturday</th>
            <th>Title</th>
            <th>Sunday</th>
            <th>Action</th>
        </tr>
        
        <?php




            $users = listWorkouts();
            foreach ($users as $key => $user) { ?>
                <tr>
                    <td>#<?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['workout_title_monday'] ?></td>
                    <td><?= $user['workout_monday'] ?></td>
                    <td><?= $user['workout_title_tuesday'] ?></td>
                    <td><?= $user['workout_tuesday'] ?></td>
                    <td><?= $user['workout_title_wednesday'] ?></td>
                    <td><?= $user['workout_wednesday'] ?></td>
                    <td><?= $user['workout_title_thursday'] ?></td>
                    <td><?= $user['thursday'] ?></td>
                    <td><?= $user['workout_title_friday'] ?></td>
                    <td><?= $user['workout_friday'] ?></td>
                    <td><?= $user['workout_title_saturday'] ?></td>
                    <td><?= $user['workout_saturday'] ?></td>
                    <td><?= $user['workout_title_sunday'] ?></td>
                    <td><?= $user['workout_sunday'] ?></td>
                    <td><a href="?user_id=<?= $user['id'] ?>#users">Edit</a></td>
                </tr><?php
            }
            $users = listUsers();         
        ?>
    </table>

    <?php if($_GET['user_id']){ ?>
        <!-- //case existis an ID, do that -->
        <?php $u = listWorkouts($_GET['user_id'])[0]; ?>
        <!-- //list all the users -->
        <h4 id="users">#<?= $u['id'] ?> Users details</h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="action" value="workout-edit">
            <!-- this action send the information to post and execute the if(isset($_POST['action'])) in the functions page -->
            <input type="hidden" name="id" value="<?= $u['id'] ?>">
            <br><br>
            <input type="text" name="name" placeholder="Enter Name" value="<?= $u['name'] ?>" required><br>
            <input type="text" name="name" placeholder="Enter Name" value="<?= $u['name'] ?>" required><br>
            <input type="email" name="email" placeholder="Enter Email" value="<?= $u['email'] ?>" required><br>



            <input type="text" name="workout_title" placeholder="Enter Title" value="<?= $u['workout_title_monday'] ?>"><br>
            <input type="text" name="workout_details" placeholder="Workout Details" value="<?= $u['workout_monday'] ?>"><br>
            <input type="text" name="workout_title" placeholder="Enter Title" value="<?= $u['workout_title_tuesday'] ?>"><br>
            <input type="text" name="workout_details" placeholder="Workout Details" value="<?= $u['workout_tuesday'] ?>"><br>
            <input type="text" name="workout_title" placeholder="Enter Title" value="<?= $u['workout_title_wednesday'] ?>"><br>
            <input type="text" name="workout_details" placeholder="Workout Details" value="<?= $u['workout_wednesday'] ?>"><br>
            <input type="text" name="workout_title" placeholder="Enter Title" value="<?= $u['workout_title_thursday'] ?>"><br>
            <input type="text" name="workout_details" placeholder="Workout Details" value="<?= $u['workout_thursday'] ?>"><br>
            <input type="text" name="workout_title" placeholder="Enter Title" value="<?= $u['workout_title_friday'] ?>"><br>
            <input type="text" name="workout_details" placeholder="Workout Details" value="<?= $u['workout_friday'] ?>"><br>
            <input type="text" name="workout_title" placeholder="Enter Title" value="<?= $u['workout_title_saturday'] ?>"><br>
            <input type="text" name="workout_details" placeholder="Workout Details" value="<?= $u['workout_saturday'] ?>"><br>
            <input type="text" name="workout_title" placeholder="Enter Title" value="<?= $u['workout_title_sunday'] ?>"><br>
            <input type="text" name="workout_details" placeholder="Workout Details" value="<?= $u['workout_sunday'] ?>"><br>
           
            <input type="submit" value="Submit">
        </form>

    <?php } ?>


    <?php if($_GET['delete_id']){ ?>
        <!-- //case existis an ID, do that -->
        <?php $u = listWorkouts($_GET['delete_id'])[0]; ?>
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

</body>
</html>