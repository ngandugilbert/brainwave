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
    <link rel="stylesheet" href="./public/style_revised.css">
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 col-md-6" id="left-side">
                <h2 id="logo">Cliche</h2>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-control-sm bg-transparent" id="floatingInput" placeholder="name@example.com" aria-label=".form-control-sm example" name="email" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control form-control-sm" id="floatingPassword" placeholder="Password" aria-label=".form-control-sm example" name="password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary mt-3" type="submit" name="submit">Login</button>
                        <a class="btn btn-outline-primary" href="/brainwave/signup.php">
                            signup
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 d-none d-md-block" id="right-side">
                <img src="./public/assets/image5.png" alt="image" id="image">
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