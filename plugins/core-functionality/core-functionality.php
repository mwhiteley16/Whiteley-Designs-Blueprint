<?php
/*
Plugin Name: Core Functionality Plugin
Description: DO NOT DEACTIVATE. This plugin controls creation of Custom Post Types (CPTs), taxonomies, ACF blocks and other non-theme specific functionality.  This is a core functionality plugin required for the site to function properly.
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
define( 'WD_PATH', WP_PLUGIN_DIR . '/' . basename( dirname( __FILE__ ) ) );
define( 'CHILD_THEME_NAME', 'Base Genesis Child Theme' );
define( 'CHILD_THEME_SLUG', 'base-child-theme' );
define( 'BLOCK_ICON_COLOR', '#b5267b' );


/**
* blocks
*/
require_once WD_PATH.'/lib/blocks/blocks-acf.php';
// require_once WD_PATH.'/lib/blocks/block-patterns.php';


/**
* custom functionality
*/
require_once WD_PATH.'/lib/functionality/acf.php';


/**
* custom post types
*/
require_once WD_PATH.'/lib/post-types/post-type-block-areas.php';
// require_once WD_PATH.'/lib/post-types/post-type-news.php';


/**
* custom taxonomies
*/
//require_once WD_PATH.'/lib/taxonomies/taxonomy-news.php';


/**
* change location of acf json sync to /acf-json folder within core functionality plugin
*
* @link https://www.advancedcustomfields.com/resources/local-json/
*
*/
add_filter( 'acf/settings/save_json',
     function() {
          return dirname(__FILE__) . '/acf-json';
     }
);

add_filter( 'acf/settings/load_json',
     function() {
          $paths[] = dirname(__FILE__) . '/acf-json';
          return $paths;
     }
);
