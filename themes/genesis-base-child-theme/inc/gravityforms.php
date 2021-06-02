<?php
/**
 * Gravity Forms
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
* Gravity Forms Domain
*
* Adds a notice at the end of admin email notifications
* specifying the domain from which the email was sent.
*
* @param array $notification
* @param object $form
* @param object $entry
* @return array $notification
*/
function wd_gravityforms_domain( $notification, $form, $entry ) {

     if( $notification['name'] == 'Admin Notification' ) {
		$notification['message'] .= 'Sent from ' . home_url();
	}

	return $notification;

}
add_filter( 'gform_notification', 'wd_gravityforms_domain', 10, 3 );


/**
 * Gravity Forms custom classes
 *
 * Add custom classes for help with styling
 *
 * @link https://docs.gravityforms.com/gform_field_css_class/
 */
add_filter( 'gform_field_css_class', 'wd_gravity_field_classes', 10, 3 );
function wd_gravity_field_classes( $classes, $field, $form ) {

     // add custom date class for all date fieldsets
     if ( $field->type == 'date' ) {
          $classes .= ' gfield_date_wrap';
     }

     return $classes;
}
