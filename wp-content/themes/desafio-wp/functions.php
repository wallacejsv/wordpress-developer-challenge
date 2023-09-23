<?php
    // Include your functions files here
    include('inc/enqueues.php');

    //Remove Admin Bar
    function my_function_admin_bar(){
        return false;
    }
    add_filter( 'show_admin_bar' , 'my_function_admin_bar');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post', 'page', 'share'));