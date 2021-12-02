<?php
/*
Plugin Name: Core Functionality Plugin
Description: DO NOT DEACTIVATE. This plugin controls creation of Custom Post Types (CPTs), taxonomies and other non-theme specific functionality.  This is a core functionality plugin required for the site to function properly.
Version: 1.0
Author: Matt Whiteley
Author URI: http://www.whiteleydesigns.com
License: GPL2

Before modifying plugin, please reference plugin documentation:
https://github.com/mwhiteley16/Whiteley-Designs-Blueprint/tree/master/plugins/core-functionality
*/

/**
* Define constants
*/
define( 'WD_PLUGIN_PATH', WP_PLUGIN_DIR . '/' . basename( dirname( __FILE__ ) ) );
define( 'WD_PLUGIN_THEME_NAME', 'Base Genesis Child Theme' );
define( 'WD_PLUGIN_THEME_SLUG', 'base-child-theme' );


/**
* custom post types
*/
require_once WD_PLUGIN_PATH.'/lib/post-types/post-type-block-areas.php';
require_once WD_PLUGIN_PATH.'/lib/post-types/post-type-block-patterns.php';
// require_once WD_PLUGIN_PATH.'/lib/post-types/post-type-news.php';


/**
* custom taxonomies
*/
//require_once WD_PLUGIN_PATH.'/lib/taxonomies/taxonomy-news.php';
