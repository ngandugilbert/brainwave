<?php
require_once './database/Database.php';
require_once './cookies/State.php';

class UserModel extends Database
{
    private $connection;
    private $state;

    //get all users
    function get_users()
    {
        $users = array();
        $connection = self::connect();
        $sql = "SELECT firstname, lastname, email from users";

        $result = mysqli_query($connection, $sql);

        // check if there are any users
        if (mysqli_num_rows($result) > 0) {
            // There are users
            //iterate through making an association
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
            return $users;
        } else {
            $connection->close();
            return "There are no users in the database";
        }
    }

    // update user
    function update_user($id, $firstname)
    {
        $connection = self::connect();

        $sql = "UPDATE users SET lastname='$firstname' WHERE id=$id";

        if (mysqli_query($connection, $sql)) {
            echo "Updated successfully";
        } else {
            echo "update failed";
        }

        $connection->close();
    }

    function login($email, $password)
    {
        // get the user with the datails
        $connection = self::connect();

        $user = new State();
        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            // useraccount does exist
            while ($row = mysqli_fetch_assoc($result)) {
                // update the cookie and set the session
                // check if the passwords match
              $value =  password_verify($password, $row['user_password']);
                    $user->set_cookie($row['id']);
                    $_SESSION['active'] = $row['id'];
                if($value){
                    echo 'equal';
                }
            }

            return true;
        } else {
            return false;
        }
    }

    // modifaction of the login method using the encrypted password
    function login_encrypted($email, $password){

        $conn = self::connect();

        $sql = "SELECT * FROM users where email = '$email'";
        $result = mysqli_query($conn, $sql);
        // check if there is a user with the email
        if(mysqli_num_rows($result) > 0 ){
            // The user does exist
            // Convert the result to an associative array
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($password, $row['user_password'])){
                    echo 'Access Granted';
                }
            }
        }
    }

    function signup($first_name, $sur_name, $user_email, $user_password)
    {
        // use the bind method to add users to the database
        $connection = self::connect();
        $sql = "INSERT INTO users(firstname, lastname, email, user_password) VALUES(?,?,?,?)";

        // bind the value
        $statement = $connection->prepare($sql);
        $statement->bind_param("ssss", $firstname, $lastname, $email, $password);

        $firstname = $first_name;
        $lastname = $sur_name;
        $email = $user_email;
        $password = password_hash($user_password, 1);

        $statement->execute();
        $statement->close();

        return true;
    }
}
