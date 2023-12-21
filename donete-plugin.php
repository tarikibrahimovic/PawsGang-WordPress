<?php

/**
 * Plugin Name: Donete Plugin
 * Description: A custom plugin that takes you to the donation page
 * Version: 1.0
 * Author: Tarik Ibrahimovic
 * Author URI: https://example.com
 * Requires at least: 5.2
 * Requires PHP: 7.2
 */

 add_filter('show_admi_bar', '__return_false');

 function donate_shortcode( $atts, $content = null) {
    global $post;extract(shortcode_atts(array(
    'account' => 'your-paypal-email-address',
    'for' => $post->post_title,
    'onHover' => '',
    ), $atts));
    if(empty($content)) $content='Make A Donation';
    return '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation for '.$for.'" title="'.$onHover.'">'.$content.'</a>';
}
    add_shortcode('donate', 'donate_shortcode');