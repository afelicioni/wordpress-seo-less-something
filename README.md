# wordpress-seo-less-something
Turning off some strings from WordPress response code, particularly useful when projects go live

## Scenario
Using WordPress with the awesome WordPress SEO plugin by Yoast, you may feel like unpleasant about comments and messages in the header section of HTML page generated for your projects.
Since they have been designed for debug purposes, it's not needed to have them always on the output.

## Requirements
* You have to bring your [WordPress](https://www.wordpress.org/) setup
* Plugin [WordPress SEO by Yoast](https://wordpress.org/plugins/wordpress-seo/) must be installed and active
* You must be able to copy files to plugins path

## Usage
This is basically a *[Must Use](http://codex.wordpress.org/Must_Use_Plugins)* style plugin, so it will be always active by default.

Just copy `wp-content/mu-plugins/wordpress-seo-less-something.php` to your WordPress installation.

No panic if there is no `wp-content/mu-plugins` folder in your setup, just create it before copying the plugin file.

## License
See [LICENSE](LICENSE)
