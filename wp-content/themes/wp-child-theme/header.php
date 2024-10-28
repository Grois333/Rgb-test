<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' );?>">
    <?php
        wp_head();
    ?>
</head>
<body <?php body_class();?> >

<div id="cs-header-sec">
    <nav class="container">
        <div class="row">
            <div class="col cs-left-sec">
                <div class="cs-logo">
                    <img src="<?php echo get_stylesheet_directory_uri().'/assets/img/icon-nav.svg';?>">
                    <span>RGB COOKIE</span>
                </div>
            </div>
            <div class="col cs-right-sec">
                <div class="cs-right-sec">
                    <a class="btn btn-primary" href="#" role="button">Link</a>
                    <a class="btn btn-primary" href="#" role="button">Link</a>
                    <a class="btn btn-primary" href="#" role="button">Link</a>
                    <a class="btn btn-primary" href="#" role="button">Link</a>
                </div>
            </div>
        </div>
    </nav>
</div>