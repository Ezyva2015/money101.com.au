<?php
/**
* Theme Hook Alliance hook stub list.
*
* @package 		themehookalliance
* @version		1.0-draft
* @since		1.0-draft
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $tha_supports[] = 'html;
 */
 function tha_html_before() {
	 do_action( 'tha_html_before' );
 }
/**
 * HTML <body> hooks
 * $tha_supports[] = 'body';
 */
 function tha_body_top() {
	 do_action( 'tha_body_top' );
 }

 function tha_body_bottom() {
	 do_action( 'tha_body_bottom' );
 }

/**
* HTML <head> hooks
*/
function tha_head_top() {
	do_action( 'tha_head_top' );
}

function tha_head_bottom() {
	do_action( 'tha_head_bottom' );
}

/**
* Semantic <header> hooks
*/
function tha_header_before() {
	do_action( 'tha_header_before' );
}

function tha_header_after() {
	do_action( 'tha_header_after' );
}

function tha_header_top() {
	do_action( 'tha_header_top' );
}

function tha_header_bottom() {
	do_action( 'tha_header_bottom' );
}

/**
* Semantic <content> hooks
*/
function tha_content_before() {
	do_action( 'tha_content_before' );
}

function tha_content_after() {
	do_action( 'tha_content_after' );
}

function tha_content_top() {
	do_action( 'tha_content_top' );
}

function tha_content_bottom() {
	do_action( 'tha_content_bottom' );
}

/**
* Semantic <entry> hooks
*/
function tha_entry_before() {
	do_action( 'tha_entry_before' );
}

function tha_entry_after() {
	do_action( 'tha_entry_after' );
}

function tha_entry_top() {
	do_action( 'tha_entry_top' );
}

function tha_entry_bottom() {
	do_action( 'tha_entry_bottom' );
}

/**
* Comments block hooks
*/
function tha_comments_before() {
	do_action( 'tha_comments_before' );
}

function tha_comments_after() {
	do_action( 'tha_comments_after' );
}

/**
* Semantic <sidebar> hooks
*/
function tha_sidebars_before() {
	do_action( 'tha_sidebars_before' );
}

function tha_sidebars_after() {
	do_action( 'tha_sidebars_after' );
}

function tha_sidebar_top() {
	do_action( 'tha_sidebar_top' );
}

function tha_sidebar_bottom() {
	do_action( 'tha_sidebar_bottom' );
}

/**
* Semantic <footer> hooks
*/
function tha_footer_before() {
	do_action( 'tha_footer_before' );
}

function tha_footer_after() {
	do_action( 'tha_footer_after' );
}

function tha_footer_top() {
	do_action( 'tha_footer_top' );
}

function tha_footer_bottom() {
	do_action( 'tha_footer_bottom' );
}