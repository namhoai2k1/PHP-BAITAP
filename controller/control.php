<?php
    include('connect.php');

    class Data {
        // tao function add user
        public function addUser($name, $password, $age, $address, $sex, $interest ,$role) {
            global $conn;
            $sql = "INSERT INTO user (name, pass_word, age, address, sex, interest, role)
            VALUES ('$name', '$password', $age, '$address', '$sex', '$interest', $role)";
            $query = mysqli_query($conn, $sql);
            echo $sql;
            return $query;
        }
        // get name user
        public function getNameUser($name) {
            global $conn;
            $sql = "SELECT * FROM user WHERE name = '$name'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            return $row;
        }
        // login
        public function login($name, $password) {
            global $conn;
            $sql = "SELECT * FROM user WHERE name = '$name' AND pass_word = '$password'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            return $row;
        }
        // add blogs 
        public function addBlogs($title, $description, $author, $date) {
            global $conn;
            $sql = "INSERT INTO blog (title, description, author, date)
            VALUES ('$title', '$description', '$author', '$date')";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get all user
        public function getAllUser() {
            global $conn;
            $sql = "SELECT * FROM user";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get all blogs
        public function getAllBlogs() {
            global $conn;
            $sql = "SELECT * FROM blog";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get all blogs by author
        public function getAllBlogsByAuthor($author) {
            global $conn;
            $sql = "SELECT * FROM blog WHERE author = '$author'";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get all blogs by id
        public function getBlogById($id) {
            global $conn;
            $sql = "SELECT * FROM blog WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            return $row;
        }
        // edit blogs
        public function editBlog($id, $title, $description, $date) {
            global $conn;
            $sql = "UPDATE blog SET title = '$title', description = '$description', date = '$date' WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            echo $sql;
            return $query;
        }
        // delete blogs
        public function deleteBlog($id) {
            global $conn;
            $sql = "DELETE FROM blog WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
        // get user by name
    }
?>