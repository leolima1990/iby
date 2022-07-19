<?php

    //debug
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    // helper debug function
    if (!function_exists('dd')) {
        function dd()
        {
            echo "<pre>";
            array_map(function($x) {
                var_dump($x);
            }, func_get_args());
            echo "</pre>";
            die;
        }
    }

    require 'dbLink.php';
    

    // DB functions
    function insertUser($username,$role,$password,$name,$email,$phone,$address){
        $db = dbLink();

        $sql = "INSERT INTO users (id,username,role,password,name,email,phone,address) VALUES(NULL,:username,:role,:password,:name,:email,:phone,:address)";
        $query = $db->prepare($sql);
        $query->bindParam(":username",$username);
        $query->bindParam(":role",$role);
        $query->bindParam(":password",$password);
        $query->bindParam(":name",$name);
        $query->bindParam(":email",$email);
        $query->bindParam(":phone",$phone);
        $query->bindParam(":address",$address);
        $query->execute();
        return $db->lastInsertId();
    }

    function updateUser($id, $username,$role,$password,$name,$email,$phone,$address){
        $db = dbLink();

        $sql = "UPDATE users set username = :username,role = :role, password = :password, name = :name, email = :email, phone = :phone, address = :address WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(":id",$id);
        $query->bindParam(":username",$username);
        $query->bindParam(":role",$role);
        $query->bindParam(":password",$password);
        $query->bindParam(":name",$name);
        $query->bindParam(":email",$email);
        $query->bindParam(":phone",$phone);
        $query->bindParam(":address",$address);
        $query->execute();
        return $db->lastInsertId();
    }

    
    function deleteUser($id){
        $db = dbLink();

        if($id) {
            $sql = "DELETE FROM users WHERE id = :id";
            $query = $db->prepare($sql);
            $query->bindParam(":id",$id);
            $query->execute();
            return true;
        } else {
            return false;
        }
    }


    // read
    function listUsers($id = 0){
        $db = dbLink();
        $sql = 'SELECT * FROM users';
        if($id) {
            $sql = 'SELECT * FROM users WHERE id ='.(int)$id;
        }
        
        $users = [];
        foreach($db->query($sql) as $row){
            $users[] = $row;
        }
        return $users;
    }
    function listWorkouts($id = 0){
        $db = dbLink();

        $sql = 'SELECT * FROM users';
        if($id) {
            $sql = 'SELECT * FROM users WHERE id ='.(int)$id;
        }
        
        $users = [];
        foreach($db->query($sql) as $row){
            $users[] = $row;
        }
        return $users;


        $sql = 'SELECT * FROM workouts';
        if($id) {
            $sql = 'SELECT * FROM workouts WHERE id ='.(int)$id;
        }
        
        $workouts = [];
        foreach($db->query($sql) as $row){
            $workouts[] = $row;
        }
        return $workouts;
    }



    //forms 
    if(isset($_POST['action'])) { 
        
        $action = $_POST['action'];

        switch($action) {
            case 'new_user': 

                $username = $_POST['username'];
                $role = $_POST['role'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                $id = insertUser($username,$role,$password,$name,$email,$phone,$address);
                if($id) {
                    echo "User #$id created with success! <br />";
                }
                break;

            case 'update_user': 

                $id = $_POST['id'];
                $username = $_POST['username'];
                $role = $_POST['role'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                $id = updateUser($id, $username,$role,$password,$name,$email,$phone,$address);
                if($id) {
                    echo "User #$id updated with success! <br />";
                }
                break;

            case 'delete_user': 

                $id = $_POST['id'];


                $success = deleteUser($id);
                if($success) {
                    echo "User deleted with success! <br />";
                }
                break;
            case 'workout-edit': 

                $id = $_POST['id'];
                $name = $_POST['name'];

                $id = listWorkouts($id,$name);
                if($id) {
                    echo "User #$id updated with success! <br />";
                }
                break;






            case 'login':
                // TODO

                break;

            default:
                dd("Post action $action not detected");
                break;
        }
            
        
    }
    

    /*
    function insertWorkout($db,$staff_id,$client_id,$exercise_name,$workout_details){
        $staff_id = $_POST['staff_id'];
        $client_id = $_POST['client_id'];
        $exercise_name = $_POST['exercise_name'];
        $workout_details = $_POST['workout_details'];

        $sql = "INSERT INTO workout (id,staff_id,client_id,exercise_name,workout_details) VALUES(NULL,:staff_id,:client_id,:exercise_name,:workout_details)";
        $query = $db->prepare($sql);
        $query->bindParam(":staff_id",$staff_id);
        $query->bindParam(":client_id",$client_id);
        $query->bindParam(":exercise_name",$exercise_name);
        $query->bindParam(":workout_details",$workout_details);
        $query->execute();
    }*/






    /*
    function showMem(){
        echo '<prep>';
        echo 'Post';
        print_r($_POST);
        echo '</prep>';
    }*/

    /*
    function checkName($dbConnect,$uname){
        //check staff
        $sql = 'SELECT * FROM staff';
        foreach ($dbConnect->query($sql) as $row){
            if($uname == $row['staffName']){
                return 'staff';
            }
        }
        $sql = 'SELECT * FROM client';
        foreach ($dbConnect->query($sql) as $row){
            if($uname == $row['clientName']){
                return 'client';
            }
        }
        return false;
    }
    function addStaff($dbConnect){
        echo '
        <form action="../pages/action.php?type=add" method="post">
        <input type="text" name="staffName" placeholder="Enter Staff Name">
        <input type="submit" value="Add staff">
        </form>';
    }
    function actionData($dbConnect,$details,$action,$table,$field){
        switch($action){
            case 'add':
                $result = insertUser($dbConnect,$details,$table,$field);
                break;
            default:
                echo 'oh no';
        }
    }
    function insertUser($dbConnect,$details,$table,$field){
        $q = "INSERT into $table (id,$field) VALUES (NULL,:details);";
        $query = $dbConnect->prepare($q);
        $query->bindParam(":details",$details);
        $result = $query->execute();
        return $result;
    }
    */

    /*
    function validate($dbConnect,$u,$p){
        echo $u.$p;
        $sql = "SELECT * FROM users";
        foreach($dbConnect->query($sql) as $row){
            if($row['username'] == $u){
                if($row['password'] == $p){
                    $_SESSION['auth'] = 'logged';
                    $roleName = getRole($dbConnect, $row['roleid']);
                    $_SESSION['role'] = $roleName;
                    return $row['roleid'];
                }
            }
        }
    }
    
    function getRole($dbConnect, $rid){
        $sql = "SELECT * FROM roles";
        foreach($dbConnect->query($sql) as $row){
            if($row['id'] == $rid){
                return $row['name'];
            }
        }
    }
    function listRoles($dbConnect){
        echo '<table>';
        $sql = "SELECT * FROM roles";
        foreach($dbConnect->query($sql) as $row){
            echo '<tr><td>'.$row['name'].'</td><td><input type="radio" name="role" value="'.$row['id'].'"></td></tr>';
        }
        echo '</table>';
    }
    */
