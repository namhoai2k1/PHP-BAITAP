<?php 
    session_start();
    include('../controller/control.php');
    $get_data = new Data();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./style/style.css" />
        <title>Login</title>
    </head>
    <body>
        <div class="container__login">
            <div class="r-logs">
                <div class="heading">
                    <h1 id="logo">facebook</h1>
                    <h2>Recent Logins</h2>
                    <p>Click your picture or add an account.</p>
                </div>
                <div class="accounts">
                    <div class="acc add">
                        <img src="https://source.unsplash.com/random" alt="+" />
                        <p id="name">Add Account</p>
                    </div>
                </div>
            </div>
            <form method="post" class="login">
                <div class="input-fields">
                    <input
                        type="text"
                        placeholder="Email address or phone number"
                        size="40"
                        name="name"
                        required
                    />
                    <input
                        type="password"
                        placeholder="Password"
                        size="40"
                        name="password"
                        required
                    />
                    <button id="login" name="login">Log in</button>
                    <p>Forgotten password?</p>
                </div>
                <button id="new-acc" name="new-acc">
                    <a href="./add_user.php?role=2">Create New Account</a>
                </button>
            </form>
        </div>
        <?php 
            if(isset($_POST['login'])) {
                $name = $_POST['name'];
                $password = $_POST['password'];
                // kiem tra dau vao
                if(empty($name) || empty($password)) {
                    echo "<script>alert('Please enter your name and password!')</script>";
                } else {
                    // kiem tra user co ton tai hay khong
                    $check_user = $get_data->getNameUser($name);
                    if(empty($check_user)) {
                        echo "<script>alert('User does not exist!')</script>";
                    } else {
                        // kiem tra password
                        if($check_user['pass_word'] != $password) {
                            echo "<script>alert('Password is incorrect!')</script>";
                        } else {
                            // dang nhap thanh cong
                            $_SESSION['name'] = $name;
                            $_SESSION['role'] = $check_user['role'];
                            header('location: ../view/home.php');
                        }
                        // // kiem tra role
                        //// if($check_user['role'] == 1) {
                        ////     $_SESSION['name'] = $name;
                        ////     $_SESSION['role'] = $check_user['role'];
                        // //     echo "<script>window.location.href = './admin.php'</script>";
                        //// } else {
                        //    // dang nhap thanh cong
                        ////     $_SESSION['name'] = $name;
                        ////    $_SESSION['role'] = $check_user['role'];
                        ////     echo "<script>window.location.href = './user.php'</script>";
                        //// }
                    }
                }
            }
        ?>
    </body>
</html>
