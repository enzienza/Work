<?php
/**
 * Name file: functions
 * Description: Theme functions and definitions [includes all functions]
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */

/* ---------------------------------------------------------
>>>  TABLE OF CONTENTS:
------------------------------------------------------------

1 - Customize
2 - Metaboxes
3 - Options-Theme
4 - Post-Type
5 - Taxonomies

----------------------------------------------------------*/

/** =====================================================
 *  1 - CUSTOMIZE
 */

require_once ('inc/customize/config-index.php');

/** =====================================================
 *  2 - METABOXES
 */
require_once ('inc/metaboxes/meta_index.php');

/** =====================================================
 *  3 - OPTIONS-THEME
 */
require_once ('inc/options-theme/API-index.php');


/** =====================================================
 *  4 - POST-TYPE
 */
require_once ('inc/post-type/CPT_works.php');

/** =====================================================
 *  5 - TAXONOMIES
 */
require_once ('inc/taxonomies/taxo-index.php');