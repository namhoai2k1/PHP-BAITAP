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
        // get all user
        public function getAllUser() {
            global $conn;
            $sql = "SELECT * FROM user";
            $query = mysqli_query($conn, $sql);
            return $query;
        }
    }
?>