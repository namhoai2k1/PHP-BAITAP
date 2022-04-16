<?php 
    session_start();
    include('../controller/control.php');
    $get_data = new Data();
    // lay bien rolo
    $role = $_SESSION['role'];
    if ($_SESSION['name'] == '') {
        header('location: ./login.php');
    } else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./style/style.css" />
        <title>Admin</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark <?php if($role == 1) { echo 'bg-dark'; } else { echo 'bg-info'; }?>">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><?php if($role == 1) {echo $_SESSION['name'] .'(ADMIN)';} else {echo $_SESSION['name'] .'(USER)';} ?></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mynavbar"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                    <?php 
                        if($role == 1) {
                    ?>
                        <li class="nav-item">                        <li class="nav-item">
                            <a class="nav-link" href="#"
                                >All Blog</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"
                                >All User</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"
                                >Link</a
                            >
                        </li>
                    <?php                        
                    } else { ?> 
                        <li class="nav-item">
                            <a class="nav-link" href="./add_blog.html"
                                >Add Blog</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"
                                >See My Blog</a
                            >
                        </li>
                    <?php
                        }
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./login.php"
                                >Logout</a
                            >
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input
                            class="form-control me-2"
                            type="text"
                            placeholder="Search"
                        />
                        <button class="btn btn-primary" type="button">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-3">
            <h3>Navbar Forms</h3>
            <p>You can also include forms inside the navigation bar.</p>
        </div>
        
    </body>
</html>
<?php } ?>