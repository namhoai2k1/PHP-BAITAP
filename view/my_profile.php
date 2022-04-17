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
        <!-- link fas -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <link rel="stylesheet" href="./style/style.css" />
        <title>Admin</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark <?php if($role == 1) { echo 'bg-dark'; } else { echo 'bg-primary'; }?>">
            <div class="container-fluid">
                <a class="navbar-brand" href="./home.php"><?php if($role == 1) {echo $_SESSION['name'] .'(ADMIN)';} else {echo $_SESSION['name'] .'(USER)';} ?></a>
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
                        <li class="nav-item">             
                            <a class="nav-link" href="#"
                                >All Blog</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./admin_all_user.php"
                                >All User</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./my_profile.php?id=<?php echo $_SESSION['name']?>"
                                >My Profile</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./add_blog.php"
                                >Add Blog</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./add_user.php?role=1"
                                >Add Adim</a
                            >
                        </li>
                    <?php                        
                    } else { ?> 
                        <li class="nav-item">
                            <a class="nav-link" href="./add_blog.php"
                                >Add Blog</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./my_profile.php?id=<?php echo $_SESSION['name']?>"
                                >My Profile</a
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
                        <button class="btn btn-dark" type="button">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-2"></div>
                <?php 
                    $info = $get_data->getNameUser($_SESSION['name']);
                ?>
                <div class="col-8">
                    <!-- profile -->
                    <div class="card border-dark">
                        <div class="card-header">
                            <h3>My Profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        src="<?php
                                            if($info['sex'] == 'nam') {
                                                echo 'https://www.w3schools.com/bootstrap5/img_avatar3.png';
                                            } else {
                                                echo 'https://www.w3schools.com/bootstrap5/img_avatar5.png';
                                            }
                                        ?>"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="col-md-8">
                                    <h4 class="text-uppercase">
                                        <?php echo $info['name']; ?>
                                    </h4>
                                    <p>
                                        <strong>Interest: </strong><?php echo $info['interest']; ?>
                                    </p>
                                    <p>
                                        <strong>Address: </strong><?php echo $info['address']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-dark">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div> 
        <!-- title blog -->

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-2"></div>
                <!-- hien thi cac blogs -->
                <div class="col-md-8">
                    <div class="alert alert-primary mt-3" role="alert">
                        <strong>My Blogs</strong>
                    </div>
                    <?php
                        $data = $get_data->getAllBlogsByAuthor($_SESSION['name']);
                        foreach ($data as $key => $value) {
                    ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                <?php echo $value['title']; ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?php echo $value['description']; ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="./edit_blog.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="./delete_blog.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">
                                Delete
                            </a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                <div class="col-md-2"></div>
            </div>
        </div>     
    </body>
</html>
<?php } ?>