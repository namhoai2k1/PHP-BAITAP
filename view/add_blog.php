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
        <link rel="stylesheet" href="./style/style.css">
        <title>Create a new blog</title>
    </head>
    <body id="page__add">
        <h2 class="bg-danger text-white text-center p-3">Add new Blog</h2>
        <div id="container__form" class="container mt-5 p-5 bg-danger text-white text-center container__form" style="max-width: 40vw">
            <form method="post">
                <div class="row mb-3">
                    <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter your title"
                            name="title"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input
                            type="date"
                            class="form-control"
                            placeholder="Enter your date"
                            name="date"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <textarea
                            type="text"
                            class="form-control"
                            placeholder="Enter description"
                            name="description"
                            rows="5"
                        >Enter description</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" name="add_blogs" class="btn btn-primary">
                            Submit
                        </button>
                        <button type="submit" name="cancel" class="btn btn-warning">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php 
            if (isset($_POST['add_blogs'])) {
                // kiem tra dau vao
                if (empty($_POST['title']) || empty($_POST['date']) || empty($_POST['description'])) {
                    echo '<script>alert("Please enter all information")</script>';
                } else {
                    $title = $_POST['title'];
                    $date = $_POST['date'];
                    $description = $_POST['description'];
                    $get_data->addBlogs($title, $description,$_SESSION['name'],$date);
                    header('location: ./home.php');
                }
            }
            if (isset($_POST['cancel'])) {
                header('location: ./home.php');
            }
        ?>
    </body>
</html>
<?php
    }
?>