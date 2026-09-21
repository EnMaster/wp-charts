<?php
/**
 * Chartcraft uninstall handler.
 *
 * The plugin stores no options or data of its own: chart settings live inside
 * Elementor widget settings, which are page/post data owned by the site owner.
 * Deleting those would remove content, so we intentionally leave them intact.
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// No cleanup required — see the comment above.