<?php
/**
 * Name file: index-home
 * Description: display home section
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */
?>

<div id="home" class="hero-wrap" <?php if(checked(1, get_option('add_bg_hero'))) : ?>style="background-image: url(<?php echo get_option('bg_hero'); ?>)" <?php endif; ?>>
    <div class="jumb-content">
        <?php require_once('contents/content.php');?>
        <?php require_once('buttons/button.php');?>
    </div>
</div>
