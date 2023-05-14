<!DOCTYPE html>
<?php
require_once './Models/UserModel.php';


$obj = new UserModel();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
<?php if(isset($_SESSION['active'])){
        header('Location: /brainwave/index.php');
    } ?>
    <div id="login-container">
        <div class="p-5 mb-5 rounded" style="width: 28rem;" id="form-area">
            <div class="card-body" >
                <h3 id = "title">sign up</h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm bg-transparent border-white" id="floatingInput" placeholder="first name" aria-label=".form-control-sm example" name="firstname" required>
                        <label for="floatingInput">First name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm bg-transparent border-white" id="floatingInput" placeholder="last name" aria-label=".form-control-sm example" name="lastname" required>
                        <label for="floatingInput">Last name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-control-sm bg-transparent border-white" id="floatingInput" placeholder="name@example.com" aria-label=".form-control-sm example" name="email" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control form-control-sm bg-transparent border-white" id="floatingPassword" placeholder="Password" aria-label=".form-control-sm example" name="password" required>
                        <label for="floatingPassword" class ="bg-transparent">Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary mt-3" type="submit" name="signup">submit</button>
                        <span>Already have an account? <a  href="/brainwave/login.php">
                            login
                        </a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php
    if (isset($_POST['signup'])) {
        // Attempt to signup the user and update the cookie
        if ($obj->signup($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'])) {
            // now login the user
            if ($obj->login($_POST['email'], $_POST['password'])) {
                // rediect to the homepage
                header('Location: /brainwave/index.php');
                exit();
            }
        }
    }
    ?>
</body>

</html>