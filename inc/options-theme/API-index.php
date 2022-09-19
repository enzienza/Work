<?php
/**
 * Name file: API-index
 * Description: group all API files of the theme here
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */

/** ======================================================
 * 01 - OP_Profile
 *      group all profile files
 */
require_once ('OP_Profile/01-personalDetails.php');
require_once ('OP_Profile/02-media.php');
require_once ('OP_Profile/03-network.php');
require_once ('OP_Profile/04-aboutme.php');
require_once ('OP_Profile/05-curriculum.php');

/** ======================================================
 * 02 - OP_theme
 *      group all custom theme files
 */
require_once ('OP_theme/01-customTheme.php');
require_once ('OP_theme/02-core.php');