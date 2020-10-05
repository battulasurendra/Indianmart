=== Wp assest cleanup (Gonzales)  ===
Tags: dequeue script, dequeue style, pagespeed, speed, unload style, gonzales, assets clean, assets, assets cleanup, page speed optimizer, perfmatters, disable script, disable style, disable jquery, disable jquery-migrate, disable fonts
Contributors: webcraftic
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VDX7JNTQPNPFW
Requires at least: 4.2
Tested up to: 4.9
Requires PHP: 5.2
Stable tag: trunk
License: GPLv2

Make your website load FASTER by preventing specific scripts (.JS) & styles (.CSS) from loading on pages/posts and home page.

== Description ==

There are often times when you are using a theme and a number of plugins which are enabled and run on the same page. However, you don’t need to use all of them and to improve the speed of your website and make the HTML source code cleaner (convenient for debugging purposes), it’s better to prevent those styles and scripts from loading.

For instance, you might use a plugin that generates contact forms and it loads its assets (.CSS and .JS files) in every page of your website instead of doing it only in the /contact page (if that’s the only place where you need it).

WP Asset CleanUp scans your page and detects all the assets that are loaded. All you have to do when editing a page/post is just to select the ones you DO NOT wish to load.

THIS PLUGIN’S BENEFITS INCLUDE

Decreases number of HTTP requests loaded (important for faster load)
Reduces the HTML code of the actual page (that’s even better if GZIP compression is enabled)
Makes source code easier to scan in case you’re a developer and want to search for something
Remove possible conflicts between plugins/theme (e.g. 2 JavaScript files that are loading from different plugins and they interfere one with another)
Better performance score if you test your URL on websites such as GTmetrix, PageSpeed Insights, Pingdom Website Speed Test
Google will love your website more as it would be faster and fast page load is nowadays a factor in search ranking
Your server access log files (e.g the Apache ones) will be easier to scan and would take less space on your server
Plugin works with WordPress Multisite Network enabled!

NOTE: People that have tested the plugin are so far happy with it and I want to keep a good reputation for it. In case something is not working for you or have any suggestions, please write to me on the forum and I will be happy to assist you.

== Details ==

The plugin provides the option to **completely disable the commenting feature in WordPress**. When this option is selected, the following changes are made:

== Translations ==

* English - default, always included
* Russian

If you want to help with the translation, please contact me through this site or through the contacts inside the plugin.

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The plugin settings can be accessed via the 'Settings' menu in the administration area (either your site administration for single-site installs).

== Screenshots ==
1. Control panel

== Changelog ==
= 1.0.1 =
* Plugin release
