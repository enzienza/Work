<?php
/**
 * Name file: index
 * Description: the main template file
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/components/switch-mode') ?>

<!-- START : MAIN -->

<?php
/** ==================================================================
 * 01 - HOME SECTION
 * @desc Display home-section if "hero_hidden_section" is not checked
 */
    if(checked(1, get_option('hero_hidden_section'), false)) : else :
        get_template_part('template-parts/section/home/index', 'home');
    endif;
?>

<?php
/** ==================================================================
 * 02 - ABOUT SECTION
 * @desc Display about-section if "about_hidden_section" is not checked
 */
    if(checked(1, get_option('about_hidden_section'), false)) : else :
        get_template_part('template-parts/section/about/index', 'about');
    endif;
?>

<?php
/** ==================================================================
 * 03 - PORTFOLIO SECTION
 * @desc Display about-section if "about_hidden_section" is not checked
 */
    if(checked(1, get_option('work_hidden_section'), false)) : else :
        get_template_part('template-parts/section/portfolio/index', 'portfolio');
    endif;
?>

<?php
/** ==================================================================
 * 04 - CONTACT SECTION
 * @desc Display about-section if "about_hidden_section" is not checked
 */
    if(checked(1, get_option('contact_hidden_section'), false)) : else :
        get_template_part('template-parts/section/contact/index', 'contact');
    endif;
?>

<!-- END : MAIN -->

<?php get_footer(); ?>