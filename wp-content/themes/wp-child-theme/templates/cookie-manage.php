<?php
// Template Name: RGB Cookie

get_header();

?>


<div id="cs-content-wrap" class="container">
    <!-- <div class="cs-page-head">

    </div> -->

    <?php

   // echo do_shortcode('[dynamic_cookie_manager]');
    // Check if the dynamic cookie is already set; if not, set it with a sample value
    if (!isset($_COOKIE['rgbDynamicCookie'])) {
        setcookie('rgbDynamicCookie', 'Dynamic Value', time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
        $_COOKIE['rgbDynamicCookie'] = 'Dynamic Value'; // Set it in $_COOKIE for immediate display
    }

    // Display all cookies including the dynamic cookie
    echo '<h2>Current Cookies</h2>';
    if (empty($_COOKIE)) {
        echo '<p>No cookies set.</p>';
    } else {
        echo '<ul>';
        foreach ($_COOKIE as $name => $value) {
            echo '<li><strong>' . esc_html($name) . ':</strong> ' . esc_html($value);
            echo ' <a href="' . esc_url(add_query_arg('delete_cookie', $name)) . '" style="color: red;">[Delete]</a></li>';
        }
        echo '</ul>';
    }

    // Handle cookie deletion
    if (isset($_GET['delete_cookie'])) {
        $cookie_name = sanitize_text_field($_GET['delete_cookie']);
        if (isset($_COOKIE[$cookie_name])) {
            setcookie($cookie_name, '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
            echo '<p>Cookie <strong>' . esc_html($cookie_name) . '</strong> deleted. Please refresh the page.</p>';
        }
    }

    ?>



</div>

<?php


get_footer();





















