<?php
    include_once('../functions/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I believe In You</title>
</head>
<body>
    <!-- Create -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="action" value="new_workout">
        <label for="cars" required>Choose the role:</label> <br>
        <select name="client" id="client">
            <option value="admin">Client</option>
        </select>
        <select name="client" id="client">
            <option value="staff">Personal Trainer</option>
        </select>
        <br><br>
        <input type="text" name="exercise_name" placeholder="Enter Exercise Name" required><br>
        <input type="text" name="workout_details" placeholder="Enter Workout Details" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>