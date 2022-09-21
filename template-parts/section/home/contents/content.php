<?php
/**
 * Name file: contents
 * Description: show content on home section
 * Important : use hooks get_locale()
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */
?>


<?php if(get_locale() === 'fr_FR') : // Partie FR =============== ?>
    <?php require_once('fr-content.php'); ?>
<?php elseif(get_locale() === 'en_GB') : // Partie EN =========== ?>
    <?php require_once('en-content.php'); ?>
<?php elseif(get_locale() === 'it_IT') : // Partie IT =========== ?>
    <?php require_once('it-content.php');?>
<?php endif; ?>