<?php
function cs_wp_child_enqueue_styles_scripts() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('cs-child-css', get_stylesheet_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_style('cs-bootsrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );

    wp_enqueue_script('jquery');
    wp_enqueue_script('cs-bootsrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);


}

add_action('wp_enqueue_scripts', 'cs_wp_child_enqueue_styles_scripts');


// Register the shortcode for managing cookies
function cookie_manager_with_dynamic_shortcode() {
    ob_start();

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

    return ob_get_clean();
}

// Add the shortcode to WordPress
add_shortcode('dynamic_cookie_manager', 'cookie_manager_with_dynamic_shortcode');
