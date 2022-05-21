<?php
        include('../controller/control.php'); 
        $get_data = new Data();
        $id = $_GET['id'];
        // accept
        $data = $get_data->unacceptBlog($id);
        header('location: all_blog.php');
?>