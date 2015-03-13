<?php
/*
Plugin Name: WordPress SEO, less something
Description: Strips some information strings from original plugin output
Author: Alessio Felicioni
Version: 1.0
Author URI: https://github.com/afelicioni/wordpress-seo-less-something
*/

class WPSEOLS
{
    static function cb_ob_start()
    {
        ob_start(array('WPSEOLS', 'chomp'));
    }
    static function cb_end_flush()
    {
        ob_end_flush();
    }
    static function chomp($sCode)
    {
        if (defined('WPSEO_PATH'))
        {
            $sCode = str_replace('<!-- This site is optimized with the ' . ( file_exists(WPSEO_PATH . 'premium/') ? 'Yoast WordPress SEO Premium plugin' : 'Yoast WordPress SEO plugin' ) . ' v' . WPSEO_VERSION . ' - https://yoast.com/wordpress/plugins/seo/ -->', '', $sCode);
            $sCode = str_replace('<!-- / Yoast WordPress SEO plugin. -->', '', $sCode);
        }
        return $sCode;
    }
}
add_action('get_header', array('WPSEOLS', 'cb_ob_start'));
add_action('wp_head', array('WPSEOLS', 'cb_end_flush'), 999);
