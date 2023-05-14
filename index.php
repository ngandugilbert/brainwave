<!DOCTYPE html>
<?php 
    require_once './Models/UserModel.php';
    require_once './cookies/State.php';

    $obj = new UserModel();
    $state = new State();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="./public/css/bootstrap.css">
</head>
<body>
    <?php
        if($state->cookie_active()){
            // start session
            if(isset($_SESSION['active'])){
                echo "user is logged in";
            }
            else{
                echo "user logged out";
            }
        }
        else{
            //redirect the user to log in page
            header('Location: /brainwave/login.php');
            exit();
        }

        if(isset($_POST['logout'])){
            $state->logout();
        }
    ?>
    <?php if(isset($_SESSION['active'])){ ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="submit" value="Logout" name = "logout">
    </form>
    <?php } ?>
    <?php if(isset($_SESSION['active']) == false){ 
        header('Location: /brainwave/login.php');
        exit();
     } ?>
    
</body>
</html>