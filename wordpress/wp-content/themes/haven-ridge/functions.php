<?php
/**
 * Haven Ridge — ACF-block WordPress theme.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

define('HAVENRIDGE_VERSION', '1.0.0');
define('HAVENRIDGE_DIR', get_template_directory());
define('HAVENRIDGE_URI', get_template_directory_uri());

require_once HAVENRIDGE_DIR . '/inc/helpers.php';
require_once HAVENRIDGE_DIR . '/inc/setup.php';
require_once HAVENRIDGE_DIR . '/inc/enqueue.php';
require_once HAVENRIDGE_DIR . '/inc/cpt.php';
require_once HAVENRIDGE_DIR . '/inc/customizer.php';
require_once HAVENRIDGE_DIR . '/inc/acf-options.php';
require_once HAVENRIDGE_DIR . '/inc/acf-blocks.php';
require_once HAVENRIDGE_DIR . '/inc/acf-fields.php';
require_once HAVENRIDGE_DIR . '/inc/demo-seed.php';
require_once HAVENRIDGE_DIR . '/inc/form.php';
