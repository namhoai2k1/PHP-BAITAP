<?php
        include('../controller/control.php'); 
        $get_data = new Data();
        $id = $_GET['id'];
        $data = $get_data->deleteBlog($id);
        header('location: all_blog.php');
?>