<?php 
    include('../controller/control.php');
    $get_data = new Data();
?>
<?php                             
    // lay bien role tu url
    // liep xem co ton tai bien role trong url khong
    if (isset($_GET['role'])) {
        $role = $_GET['role'];
        echo $role;
    } else {
        $role = '';
    }
    if (isset($_POST['add_user'])) {
        // kiem tra user co chua
        if($get_data->getNameUser($_POST['name'])) {
            echo "<p class='text-danger text-center'>User already exists</p>";
        } else {
            $sothich = implode(' ', $_POST['interest']);
            try {
                $flag = $get_data->addUser($_POST['name'], $_POST['pswd'], $_POST['age'], $_POST['address'], $_POST['sex'], $sothich, $role);              
                if($flag) {
                    header('Location: login.php');
                }
            } catch (Exception $e) {
                echo "<p class='text-danger text-center'>".$e->getMessage()."</p>";
            }
        }
    }
    
    if(isset($_POST['cancel'])) {
        header('Location: login.php');
    }
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
        <title>Create a new account</title>
    </head>
    <body>
        <h2 class="bg-dark text-white text-center p-3">Add new account</h2>
        <div id="container__form" class="container mt-5 p-5 bg-dark text-white text-center" style="max-width: 40vw">
            <form method="post">
                <div class="row mb-3">
                    <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter your username"
                            name="name"
                        />
                    </div>
                    <div class="col">
                        <input
                            type="password"
                            class="form-control"
                            placeholder="Enter password"
                            name="pswd"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-check">
                            <input
                                type="radio"
                                class="form-check-input"
                                id="radio1"
                                name="sex"
                                value="nam"
                                checked
                            />
                            <label class="form-check-label" for="radio1"
                                >Nam</label
                            >
                        </div>
                        <div class="form-check">
                            <input
                                type="radio"
                                class="form-check-input"
                                id="radio2"
                                name="sex"
                                value="nu"
                            />
                            <label class="form-check-label" for="radio2"
                                >Nu</label
                            >
                        </div>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter age"
                            name="age"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter your address"
                            name="address"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col d-flex justify-content-between">
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="check1"
                                name="interest[]"
                                value="game"
                                checked
                            />
                            <label class="form-check-label" for="check1"
                                >Game</label
                            >
                        </div>
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="check2"
                                name="interest[]"
                                value="football"
                            />
                            <label class="form-check-label" for="check2"
                                >Football</label
                            >
                        </div>
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="check3"
                                name="interest[]"
                                value="music"
                            />
                            <label class="form-check-label" for="check3"
                                >Music</label
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" name="add_user" class="btn btn-primary">
                            Submit
                        </button>
                        <button type="submit" name="cancel" class="btn btn-danger">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
