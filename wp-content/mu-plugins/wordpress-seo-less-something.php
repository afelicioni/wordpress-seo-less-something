<?php
/*
Plugin Name: WordPress SEO, less something
Description: Strips some information strings from original plugin output
Author: Alessio Felicioni
Version: 1.1
Author URI: https://github.com/afelicioni/wordpress-seo-less-something
*/

class WPSEOLS
{
    public static function cb_ob_start()
    {
        ob_start(array('WPSEOLS', 'chomp'));
    }
    public static function cb_end_flush()
    {
        ob_end_flush();
    }
    public static function chomp($sCode)
    {
        if (defined('WPSEO_PATH'))
        {
            $sCode = str_replace('<!-- This site is optimized with the ' . self::YoastProductName(true) . ' - https://yoast.com/wordpress/plugins/seo/ -->', '', $sCode);
            $sCode = str_replace('<!-- / ' . self::YoastProductName() . '. -->', '', $sCode);
        }
        return $sCode;
    }
    private static function isWPSEOPremium()
    {
        if (file_exists(WPSEO_PATH . 'premium/'))
        {
            return true;
        }
        return false;
    }
    private static function YoastProductName($bWithVersionIfAvailable = false)
    {
        $oWPSEOF = WPSEO_Frontend::get_instance();
        $_vv = ' v' . WPSEO_VERSION;
        $_sYoastProductName = substr(substr($oWPSEOF->debug_marker(false), 37), 0, -47);
        if (!$bWithVersionIfAvailable && substr($_sYoastProductName, -(strlen($_vv))) == $_vv) {
            $_sYoastProductName = substr($_sYoastProductName, 0, -(strlen($_vv)));
        }
        return $_sYoastProductName;
    }
}
add_action('get_header', array('WPSEOLS', 'cb_ob_start'));
add_action('wp_head', array('WPSEOLS', 'cb_end_flush'), 999);
