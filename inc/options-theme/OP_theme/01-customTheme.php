<?php
/**
 * Name file: 01-customtheme
 * Description: this file is an index of the different links that allows you to manage the theme
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */

/* ---------------------------------------------------------
>>>  TABLE OF CONTENTS:
------------------------------------------------------------
  1 - DEFINIR LES ELEMENTS (repeter)
  2 - DEFINIR LES HOOKS ACTIONS
  3 - CONSTRUCTION DE LA PAGE
  4 - TEMPLATE DES PAGES
  5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
  6 - DEFINIR LES SECTIONS DE LA PAGE
  7 - DEFINIR LE TELECHARGEMENT DES FICHIER
  8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
  9 - AJOUT STYLE & SCRIPT
----------------------------------------------------------*/

class mywork_mycustome{

    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 1
    const PERMITION  = 'manage_options';
    const DASHICON   = 'dashicons-admin-multisite';
    const GROUP      = 'mycustome';
    const NONCE      = '_mycustome';

    //definir les sections de la page d'option
    const SECTION_DETAIL = 'section_detail';
    const SECTION_LOCATION = 'section_location';
    const SECTION_POST = 'section_post';


    /**
     * 2 - DEFINIR LES HOOKS ACTIONS
     */
    public static function register(){
        add_action('admin_menu', [self::class, 'addMenu']);
        //add_action('admin_init', [self::class, 'registerSettings']);
        //add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    /**
     * 3 - CONSTRUCTION DE LA PAGE
     */
    public static function addMenu(){
        add_menu_page(
            __('Mon thème', 'MyWork'),       // TITLE_PAGE
            __('Mon thème', 'MyWork'),        // TITLE_MENU
            self::PERMITION,           // CAPABILITY
            self::GROUP,              // SLUG_PAGE
            [self::class, 'render'],            // CALLBACK
            self::DASHICON,             // icon
            4                           // POSITION
        );
    }

    /**
     * 4 - TEMPLATE DES PAGES
     */
    public static function render(){
        ?>
        <div class="wrap">
            <h1 class="wp-heagin-inline"><?php _e("Page d'option du theme", 'MyWork') ?></h1>
            <p class="description">
                <?php _e('Sur cette page vous pouvez gérer les différents éléments de notre theme', 'MyWork') ?>
            </p><!--./description-->
            <?php settings_errors(); ?>
        </div><!--./wrap-->

        <table class="widefat importers striped">

            <!-- start tr -->
            <tr class="importer-item">
                <td class="import-system">
                    <span class="importer-title"><?php _e('Core', "MyWork")?></span>
                    <span class="importer-action">
                      <a href="?page=" class="install-now"><?php _e("Gérer la section", "MyWork"); ?></a>
                    </span>
                </td>
                <td class="desc">
                    <span class="importer-desc">
                      <?php _e("Lien pour gérer l'affichage de l'header et du footer", "MyWork"); ?>
                    </span>
                </td>
            </tr><!-- end tr -->

            <!-- start tr -->
            <tr class="importer-item">
                <td class="import-system">
                    <span class="importer-title"><?php _e('Home', "MyWork")?></span>
                    <span class="importer-action">
                      <a href="?page=" class="install-now"><?php _e("Gérer la section", "MyWork"); ?></a>
                    </span>
                </td>
                <td class="desc">
                    <span class="importer-desc">
                      <?php _e("Lien pour gérer la section de l'home", "MyWork"); ?>
                    </span>
                </td>
            </tr><!-- end tr -->

            <!-- start tr -->
            <tr class="importer-item">
                <td class="import-system">
                    <span class="importer-title"><?php _e('about', "MyWork")?></span>
                    <span class="importer-action">
                      <a href="?page=" class="install-now"><?php _e("Gérer la section", "MyWork"); ?></a>
                    </span>
                </td>
                <td class="desc">
                    <span class="importer-desc">
                      <?php _e("Lien pour gérer la section l'about", "MyWork"); ?>
                    </span>
                </td>
            </tr><!-- end tr -->

            <!-- start tr -->
            <tr class="importer-item">
                <td class="import-system">
                    <span class="importer-title"><?php _e('Portfolio', "MyWork")?></span>
                    <span class="importer-action">
                      <a href="?page=" class="install-now"><?php _e("Gérer la section", "MyWork"); ?></a>
                    </span>
                </td>
                <td class="desc">
                    <span class="importer-desc">
                      <?php _e("Lien pour gérer la section portfolio", "MyWork"); ?>
                    </span>
                </td>
            </tr><!-- end tr -->

            <!-- start tr -->
            <tr class="importer-item">
                <td class="import-system">
                    <span class="importer-title"><?php _e('Contact', "MyWork")?></span>
                    <span class="importer-action">
                      <a href="?page=" class="install-now"><?php _e("Gérer la section", "MyWork"); ?></a>
                    </span>
                </td>
                <td class="desc">
                    <span class="importer-desc">
                      <?php _e("Lien pour gérer la section contact", "MyWork"); ?>
                    </span>
                </td>
            </tr><!-- end tr -->

            <!-- start tr -->
            <tr class="importer-item">
                <td class="import-system">
                    <span class="importer-title"><?php _e("Page d'erreur", "MyWork")?></span>
                    <span class="importer-action">
                      <a href="?page=" class="install-now"><?php _e("Gérer la section", "MyWork"); ?></a>
                    </span>
                </td>
                <td class="desc">
                    <span class="importer-desc">
                      <?php _e("Lien pour gérer l'affichage de la page d'erreur", "MyWork"); ?>
                    </span>
                </td>
            </tr><!-- end tr -->
        </table>
        <?php
    }

    /**
     * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
     */
//    public static function registerSettings(){}

    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */



    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */

    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */
}

if(class_exists('mywork_mycustome')){
    mywork_mycustome::register();
}