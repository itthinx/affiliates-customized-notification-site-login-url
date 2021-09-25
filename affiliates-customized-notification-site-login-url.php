<?php
/**
 * affiliates-customized-notification-site-login-url.php
 *
 * Copyright (c) 2021 www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author itthinx
 * @package affiliates-customized-notification-site-login-url.php
 * @since 1.0.0
 *
 * Plugin Name: Affiliates Customized Notification Site Login URL
 * Plugin URI: https://github.com/itthinx/affiliates-customized-notification-site-login-url
 * Description: Changes the default notification login URL to the page with slug affiliate-area if it exists; uses filters introduced in Affiliates 4.10.0.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: http://www.itthinx.com
 * Donate-Link: http://www.itthinx.com
 * Text Domain: affiliates-customized-notification-site-login-url
 * Domain Path: /languages
 * License: GPLv3
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

function ACNSLU_affiliates_new_affiliate_user_registration_params( $params ) {
	$page = get_page_by_path( 'affiliate-area' );
	if ( $page !== null ) {
		$url = get_permalink( $page );
		if ( $url !== false ) {
			$params['site_login_url'] = $url;
		}
	}
	return $params;
}
add_filter( 'affiliates_new_affiliate_user_registration_params', 'ACNSLU_affiliates_new_affiliate_user_registration_params' );

function ACNSLU_affiliates_updated_affiliate_status_params( $params ) {
	$page = get_page_by_path( 'affiliate-area' );
	if ( $page !== null ) {
		$url = get_permalink( $page );
		if ( $url !== false ) {
			$params['site_login_url'] = $url;
		}
	}
	return $params;
}
add_filter( 'affiliates_updated_affiliate_status_params', 'ACNSLU_affiliates_updated_affiliate_status_params' );
