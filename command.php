<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}


class UBC_Sanitize_Users_For_Staging {

	/**
	 * Migrate one or more individual sites in a multisite install to be served via SSL.
	 *
	 * ## OPTIONS
	 *
	 * [--sites]
	 * : Either a single site ID, a single domain name or a comma separated list of either
	 *
	 * [--dry-run]
	 * : Don't actually make the replacements, but print out what they would be.
	 *
	 * [--verbose]
	 * : I heard you like logs in your logs?
	 * ---
	 *
	 * ## EXAMPLES
	 *
	 *     wp migrate-to-ssl migrate --sites="123"
	 *     wp migrate-to-ssl migrate --sites="subdomain.yoursite.com"
	 *     wp migrate-to-ssl migrate --sites="domainmappedsite.com"
	 *     wp migrate-to-ssl migrate --sites="123,456,789"
	 *     wp migrate-to-ssl migrate --sites="123" --dry-run
	 *
	 * @when after_wp_load
	 */

	function users( $args, $assoc_args ) {

		WP_CLI::success( 'ahoy' );

	}/* users() */


}/* class UBC_Sanitize_Users_For_Staging */


// Register the command, only appropriate on a Multisite Install
WP_CLI::add_command( 'sanitize', 'UBC_Sanitize_Users_For_Staging', array(
	'before_invoke' => function(){
		if ( ! is_multisite() ) {
			WP_CLI::error( 'This is not a multisite install.' );
		}
	},
) );
