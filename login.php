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
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/style.css">
</head>

<body>
    <?php if(isset($_SESSION['active'])){
        header('Location: /brainwave/index.php');
    } ?>
    <div id="login-container">
        <div class="p-5 mb-5 rounded" style="width: 24rem;" id="form-area">
            <div class="card-body" >
                <h3 id = "title">login</h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-control-sm border-bottom bg-transparent " id="floatingInput" placeholder="name@example.com" aria-label=".form-control-sm example" name="email" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control form-control-sm bg-transparent" id="floatingPassword" placeholder="Password" aria-label=".form-control-sm example" name="password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary mt-3" type="submit" name="submit">submit</button>
                        <span>Do not have an account? <a  href="/brainwave/signup.php">
                            signup
                        </a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Attempt to login the user and update the cookie
        $status = $obj->login($_POST['email'], $_POST['password']);
        if ($status) {

            header('Location: /brainwave/index.php');
        } else {
            print('Something wrong happened');
        }
    }
    ?>

</body>

</html>