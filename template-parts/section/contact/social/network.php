<?php
/**
 * Name file: network
 * Description: show network on contact section
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */
?>

<ul class="network-list">

    <?php if(checked(1, get_option('display_myfacebook'), false)): ?>
        <li class="network-item">
            <a href="<?php echo esc_attr(get_option('myfacebook')); ?>" target="_blank">
                <i class="icons flaticon-facebook-1"></i>
            </a>
        </li>
    <?php endif; ?>

    <?php if(checked(1, get_option('display_mytwitter'), false)): ?>
        <li class="network-item">
            <a href="<?php echo esc_attr(get_option('mytwitter')); ?>" target="_blank">
                <i class="icons flaticon-twitter-1"></i>
            </a>
        </li>
    <?php endif; ?>

    <?php if(checked(1, get_option('display_myinstagram'), false)): ?>
        <li class="network-item">
            <a href="<?php echo esc_attr(get_option('myinstagram')); ?>" target="_blank">
                <i class="icons flaticon-instagram-1"></i>
            </a>
        </li>
    <?php endif; ?>

    <?php if(checked(1, get_option('display_mylinkedin'), false)): ?>
        <li class="network-item">
            <a href="<?php echo esc_attr(get_option('mylinkedin')); ?>" target="_blank">
                <i class="icons flaticon-linkedin-1"></i>
            </a>
        </li>
    <?php endif; ?>

    <?php if(checked(1, get_option('display_mybehance'), false)): ?>
        <li class="network-item">
            <a href="<?php echo esc_attr(get_option('mybehance')); ?>" target="_blank">
                <i class="icons flaticon-behance-1"></i>
            </a>
        </li>
    <?php endif; ?>

    <?php if(checked(1, get_option('display_mygithub'), false)): ?>
        <li class="network-item">
            <a href="<?php echo esc_attr(get_option('mygithub')); ?>" target="_blank">
                <i class="icons flaticon-github-1"></i>
            </a>
        </li>
    <?php endif; ?>

</ul>