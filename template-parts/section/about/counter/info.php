<?php
/**
 * Name file: desc
 * Description: show list counter complementary info on about section
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */
?>

<div class="counter">
    <?php if(checked(1, get_option('about_years_experience'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb">
                <?php
                $dateOfStart = new DateTime(get_option('years_experience'));
                $myExperience = $dateOfStart -> diff(new DateTime);
                echo $myExperience -> y;
                ?>
            </p>
            <p class="counter-title"><?php _e("Années d'expérience", "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_formations'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb"><?php echo get_option('numb_formation'); ?></p>
            <p class="counter-title"><?php _e('Nombre de formation', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_languanges'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb"><?php echo get_option('numb_languanges'); ?></p>
            <p class="counter-title"><?php _e('Langage web', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_repository'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb"><?php echo get_option('numb_repository'); ?></p>
            <p class="counter-title"><?php _e('Repositories GitHub', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_all_project'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb">30</p>
            <p class="counter-title"><?php _e('Projets achevés', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_web_project'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb">7</p>
            <p class="counter-title"><?php _e('Projet web', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_proto_project'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb">7</p>
            <p class="counter-title"><?php _e('Projet prototypage', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_graph_project'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb">7</p>
            <p class="counter-title"><?php _e('Projet graphique', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_real_client'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb">7</p>
            <p class="counter-title"><?php _e('Projet clients', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

    <?php if(checked(1, get_option('about_satisfied_client'), false)) : ?>
        <div class="counter-box">
            <p class="counter-numb">7</p>
            <p class="counter-title"><?php _e('Clients satisfaits', "MyWork"); ?></p>
        </div>
    <?php endif; ?>

</div>