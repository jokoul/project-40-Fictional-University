<?php 
//Define a new fn
function university_files(){
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'),array('jquery'),'1.0',true);//to load javascript file, we add third arguments to precise dependencies files of main js file. If there is no dependencies files, the third arg can be "NULL". 4ème arg is the version and 5ème arg is boolean to answer question : file needs to be download at the bottom of the page right before closing tag?good for performance
    wp_enqueue_style('custom-google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('unversity_main_styles',get_theme_file_uri('/build/style-index.css'));//this wordpress fn point to the css files and first arguments is the nickname of the file
    wp_enqueue_style('unversity_extra_styles',get_theme_file_uri('/build/index.css'));
}
//We run the function above
add_action('wp_enqueue_scripts','university_files');//wp_enqueue_scripts define the moment to call the fn we pass the name as second parameter

//Create new action to add page title
function university_features(){
    // register_nav_menu('headerMenuLocation','Header Menu Location');//to create a new menu section in ashboard
    // register_nav_menu('footerLocationOne','Footer Location One');
    // register_nav_menu('footerLocationTwo','Footer Location Two');

    add_theme_support('title-tag');//title-tag is a feature we specify to wordpress
}
add_action('after_setup_theme','university_features');//'after_setup_theme' in 1rst parameter of add_action is a wordpress event listener who fire the function named in 2nd parameter
