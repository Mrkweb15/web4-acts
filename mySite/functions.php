<?php
    function site_files(){

        wp_enqueue_script('site_main_js', get_theme_file_uri('/build/index.js'),array('jquery'),null,true);

        //online files
        wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i`');
        wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

        //local files
        wp_enqueue_style('main_styles', get_theme_file_uri('build/style-index.css'));
        wp_enqueue_style('extra_styles', get_theme_file_uri('build/index.css'));

    }

    function mysite_features(){
        add_theme_support('title-tag');
    }

    add_action('wp_enqueue_scripts','site_files');
    add_action('after_setup_theme', 'mysite_features');
?>