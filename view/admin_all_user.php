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
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./home.php"><?php echo $_SESSION['name'] .'(ADMIN)'?></a>
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
                        <li class="nav-item">             
                            <a class="nav-link" href="./all_blog.php"
                                >All Blog</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"
                                >All User</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./add_blog.php"
                                >Add Blog</a
                            >
                        </li>
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
            <div class="row">
                <div class="col-md-2"></div>
                <!-- hien thi cac blogs -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>All User</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $data = $get_data->getAllUser();
                                        foreach ($data as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value['id'] ?></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['pass_word'] ?></td>
                                        <td><?php echo $value['role'] ?></td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                ><i class="fa fa-trash" aria-hidden="true"></i
                                            ></a>
                                            <a href="javascript:void(0)"
                                                ><i class="fa fa-pencil" aria-hidden="true"></i
                                            ></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        
    </body>
</html>
<?php } ?>