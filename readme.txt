=== RSS Feed ===

Description:	Provides opposite rss feed to that configured in ClassicPress.
Version:		1.2.2
Tags:			rss, feed
Author:			azurecurve
Author URI:		https://development.azurecurve.co.uk/
Plugin URI:		https://development.azurecurve.co.uk/classicpress-plugins/rss-feed/
Download link:	https://github.com/azurecurve/azrcrv-rss-feed/releases/download/v1.2.2/azrcrv-rss-feed.zip
Donate link:	https://development.azurecurve.co.uk/support-development/
Requires PHP:	5.6
Requires:		1.0.0
Tested:			4.9.99
Text Domain:	rss-feed
Domain Path:	/languages
License: 		GPLv2 or later
License URI: 	http://www.gnu.org/licenses/gpl-2.0.html

Provides opposite rss feed to that configured in ClassicPress.

== Description ==

# Description

Provides opposite rss feed to that configured in ClassicPress; e.g. if ClassicPress is configured for summary then an alternative feed called detail will be created, or if ClassicPress is configured for a detailed feed then an alternative feed called summary is created.

Once active, both summary and detail feeds cab be access using the following paths:
* http://yourdomain/feed/detail
* http://yourdomain/feed/summary

This plugin is multisite compatible.

== Installation ==

# Installation Instructions

 * Download the latest release of the plugin from [GitHub](https://github.com/azurecurve/azrcrv-rss-feed/releases/latest/).
 * Upload the entire zip file using the Plugins upload function in your ClassicPress admin panel.
 * Activate the plugin.
 * Configure relevant settings via the configuration page in the admin control panel (azurecurve menu).

== Frequently Asked Questions ==

# Frequently Asked Questions

### Can I translate this plugin?
Yes, the .pot file is in the plugins languages folder; if you do translate this plugin, please sent the .po and .mo files to translations@azurecurve.co.uk for inclusion in the next version (full credit will be given).

### Is this plugin compatible with both WordPress and ClassicPress?
This plugin is developed for ClassicPress, but will likely work on WordPress.

== Changelog ==

# Changelog

### [Version 1.2.2](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.2.2)
 * Update azurecurve menu.
 * Update readme files.

### [Version 1.2.1](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.2.1)
 * Update azurecurve menu and logo.
 
### [Version 1.2.0](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.2.0)
 * Fix plugin action link to use admin_url() function.
 * Add plugin icon and banner.
 * Update azurecurve plugin menu.

### [Version 1.1.4](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.1.4)
 * Fix bug with plugin menu.
 * Update plugin menu css.

### [Version 1.1.3](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.1.3)
 * Upgrade azurecurve plugin to store available plugins in options.
 
### [Version 1.1.2](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.1.2)
 * Update Update Manager class to v2.0.0.
 * Update action link.
 * Update azurecurve menu icon with compressed image.
 
### [Version 1.1.1](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.1.1)
 * Fix bug with incorrect language load text domain.

### [Version 1.1.0](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.1.0)
 * Add integration with Update Manager for automatic updates.
 * Fix issue with display of azurecurve menu.
 * Change settings page heading.
 * Add load_plugin_textdomain to handle translations.

### [Version 1.0.1](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.0.1)
 * Update azurecurve menu for easier maintenance.
 * Move require of azurecurve menu below security check.
 * Localization fixes.

### [Version 1.0.0](https://github.com/azurecurve/azrcrv-rss-feed/releases/tag/v1.0.0)
 * Initial release for ClassicPress forked from azurecurve RSS Feed WordPress Plugin.

== Other Notes ==

# About azurecurve

**azurecurve** was one of the first plugin developers to start developing for Classicpress; all plugins are available from [azurecurve Development](https://development.azurecurve.co.uk/) and are integrated with the [Update Manager plugin](https://directory.classicpress.net/plugins/update-manager) for fully integrated, no hassle, updates.

Some of the other plugins available from **azurecurve** are:
 * Avatars - [details](https://development.azurecurve.co.uk/classicpress-plugins/avatars/) / [download](https://github.com/azurecurve/azrcrv-avatars/releases/latest/)
 * Disable FLoC - [details](https://development.azurecurve.co.uk/classicpress-plugins/disable-floc/) / [download](https://github.com/azurecurve/azrcrv-disable-floc/releases/latest/)
 * Icons - [details](https://development.azurecurve.co.uk/classicpress-plugins/icons/) / [download](https://github.com/azurecurve/azrcrv-icons/releases/latest/)
 * Maintenance Mode - [details](https://development.azurecurve.co.uk/classicpress-plugins/maintenance-mode/) / [download](https://github.com/azurecurve/azrcrv-maintenance-mode/releases/latest/)
 * Nearby - [details](https://development.azurecurve.co.uk/classicpress-plugins/nearby/) / [download](https://github.com/azurecurve/azrcrv-nearby/releases/latest/)
 * Page Index - [details](https://development.azurecurve.co.uk/classicpress-plugins/page-index/) / [download](https://github.com/azurecurve/azrcrv-page-index/releases/latest/)
 * Sidebar Login - [details](https://development.azurecurve.co.uk/classicpress-plugins/sidebar-login/) / [download](https://github.com/azurecurve/azrcrv-sidebar-login/releases/latest/)
 * Theme Switcher - [details](https://development.azurecurve.co.uk/classicpress-plugins/theme-switcher/) / [download](https://github.com/azurecurve/azrcrv-theme-switcher/releases/latest/)
 * Timelines - [details](https://development.azurecurve.co.uk/classicpress-plugins/timelines/) / [download](https://github.com/azurecurve/azrcrv-timelines/releases/latest/)
 * URL Shortener - [details](https://development.azurecurve.co.uk/classicpress-plugins/url-shortener/) / [download](https://github.com/azurecurve/azrcrv-url-shortener/releases/latest/)
