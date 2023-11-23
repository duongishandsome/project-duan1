<?php
session_start();
include "../../../model/pdo.php";
include "../../../model/accadmin.php";
$error_message = '';

if(isset($_POST['login'])) {
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error_message = 'Email và Mật khẩu không được để trống <br>';
    } else {
        
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        $admin = get_info_admin($email);
        
        if (!$admin) {
            $error_message .= 'Email không đúng<br>';
        } else {
            $check = password_verify($password, $admin['admin_password']);
            if ($check) {
                $_SESSION['admin'] = $admin;
                header("location: ../../index.php?act=listproduct");
                exit; 
            } else {
                $error_message .= 'Password không đúng<br>';
            }
        }
          
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b> Panel</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if ($error_message != '') {
                            echo "<div class='error text-danger' style='padding: 10px;margin-bottom:20px;'>" . $error_message . "</div>";
                        }
                        ?>
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
        </div>
    </div>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../assets/js/adminlte.js"></script>
</body>

</html>