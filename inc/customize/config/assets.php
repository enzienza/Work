<?php
/**
 * Name file: config-assets
 * Description: this is allows you to add the style and the différent scripts that we need for this theme
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */

/* ---------------------------------------------------------
>>>  TABLE OF CONTENTS:
------------------------------------------------------------

# STYLE *********************************
1 - BOOTSTRAP [CDN]
2 - STYLE

# SCRIPT ********************************
1 - BOOTSTRAP [CDN]
2 - POPPER [CDN]
3 - JQUERY [CDN]

----------------------------------------------------------*/


// fonction qui vérifie si 'mywork_register_assets' exixte déjà avant de l'initialiser
if(!function_exists('mywork_register_assets')) {
    function mywork_register_assets()
    {

        // ===================================================================
        // CSS
        // ===================================================================

        /**
         * BOOTSTRAP - CSS
         *
         * @category CDN
         * @version 4.4.1
         */
        wp_register_style(
            'bootstrap',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
            [], '4.4.1'
        );
        wp_enqueue_style('bootstrap');

        // STYLE CUSTOM  .....................................................
        /**
         * STYLE
         *
         * @description Custom Theme Style
         * @version 4.4.1
         */
        wp_enqueue_style(
            'style',
            get_template_directory_uri().'/style.css',
            [], '1.0.0'
        );


        // ===================================================================
        // JAVASCRIP
        // ===================================================================

        /**
         * BOOTSTRAP - JS
         *
         * @category CDN
         * @dependence ['popper', 'jquery']
         * @version 4.4.1
         */
        wp_register_script(
            'bootstrap',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
            ['popper', 'jquery'],
            '4.4.1', true
        );

        /**
         * POPPER
         *
         * @category CDN
         * @dependence ['popper', 'jquery']
         * @version 1.16.0
         */
        wp_register_script(
            'popper',
            'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
            [],
            '1.16.0', true
        );
        wp_enqueue_script('bootstrap');



        // SCRIPT CUSTOM  ....................................................


        /**
         * JQUERY
         *
         * @category CDN
         * @version 3.5.1
         */
        wp_deregister_script('jquery');
        wp_register_script(
            'jquery',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js',
            [],
            '3.5.1', true
        );

    }
}
add_action('wp_enqueue_scripts', 'mywork_register_assets');