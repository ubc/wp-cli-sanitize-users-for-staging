<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}


class UBC_Sanitize_For_Staging {

	public $keep_users = false;

	/**
	 * Sanitize users tables (inc. meta) when migrating from prod->staging|local
	 *
	 * ## OPTIONS
	 *
	 * [--keep]
	 * : Either a single user ID or a comma separated list of user IDs to keep
	 *
	 * [--dry-run]
	 * : Don't actually make the removals, but print out what they would be.
	 *
	 * [--verbose]
	 * : I heard you like logs in your logs?
	 * ---
	 *
	 * ## EXAMPLES
	 *
	 *     wp sanitize users --keep="123"
	 *
	 * @when after_wp_load
	 */

	function users( $args, $assoc_args ) {

		$keep_users = ( isset( $assoc_args['keep'] ) ) ? $assoc_args['keep'] : false;

		WP_CLI::success( 'ahoy' );

	}/* users() */


}/* class UBC_Sanitize_For_Staging */


// Register the command, only appropriate on a Multisite Install
WP_CLI::add_command( 'sanitize', 'UBC_Sanitize_For_Staging', array(
	'before_invoke' => function(){
		if ( ! is_multisite() ) {
			WP_CLI::error( 'This is not a multisite install.' );
		}
	},
) );
