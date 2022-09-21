<?php
/**
 * Name file: it-content
 * Description: display this part if get_locale() is same as 'it_IT'
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */
?>

<?php if(checked(1, get_option('choose_format'), false)) : ?>
    <h3 class="uppercase font-light">
        <?php echo get_option('hero_greeting_it'); ?>
    </h3>
    <h1 class="big-title">
        <span class="hight">
            <?php if(checked(1, get_option('hero_show_firsrname'), false)) : ?>
                <?php echo get_option('myfirstname') ?>
            <?php endif; ?>
            <?php if(checked(1, get_option('hero_show_lastname'), false)) : ?>
                <?php echo get_option('mylastname') ?>
            <?php endif; ?>
        </span>
    </h1>
<?php elseif (checked(2, get_option('choose_format'), false)) : ?>
    <h3 class="uppercase font-light">
        <?php echo esc_attr(get_option('hero_msg_oneline_it')); ?>
    </h3>
    <h1 class="big-title">
        <?php echo esc_attr(get_option('hero_msg_twoline_it')); ?>
        <span class="higt">
            <?php if(checked(1, get_option('hero_show_firsrname'), false)): ?>
                <?php echo get_option('myfirstname'); ?>
            <?php endif; ?>

            <?php if(checked(1, get_option('hero_show_lastname'), false)): ?>
                <?php echo get_option('mylastname'); ?>
            <?php endif; ?>
        </span>
    </h1>
<?php endif; ?>


<?php if (checked(1, get_option('hero_hidden_job'), false)) : else : ?>
    <h2 class="font-light">
        <?php echo get_option('hero_msg_job_it'); ?>
        <?php echo get_option('job_title_it'); ?>
    </h2>
<?php endif; ?>

<?php if (checked(1, get_option('hero_show_about_it'), false)) : ?>
    <p class="desc font-thin"><?php echo get_option('short_aboutme_it'); ?></p>
<?php endif; ?>