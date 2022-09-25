<?php
/**
 * Name file: 05-work
 * Description: this file allows to manage display of the work section
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */

/**
 * Table of Contents:
 *
 * 1 - DEFINIR LES ELEMENTS (repeter)
 * 2 - DEFINIR LES HOOKS ACTIONS
 * 3 - CONSTRUCTION DE LA PAGE
 * 4 - TEMPLATE DES PAGES
 * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
 * 6 - DEFINIR LES SECTIONS DE LA PAGE
 * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
 * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
 * 9 - AJOUT STYLE & SCRIPT
 */

class mycustome_works{

    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 1
    const PERMITION    = 'manage_options';
    const SUB_GROUP    = 'mycustome_works';
    const NONCE        = '_mycustome_works';

    //definir les sections de la page d'option
    const WORKS_MANAGEMENT  = "work_management";
    const WORKS_LOOP        = "work_loop";


    /**
     * 2 - DEFINIR LES HOOKS ACTIONS
     */
    public static function register(){
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        //add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    /**
     * 3 - CONSTRUCTION DE LA PAGE
     */
    public static function addMenu(){
        add_submenu_page(
            mywork_mycustome::GROUP,        // slug parent
            __('Works', 'MyWork'),            // page_title
            __('Works', 'MyWork'),             // menu_title
            self::PERMITION,              // capability
            self::SUB_GROUP,             // slug_menu
            [self::class, 'render']                // CALLBACK
        );
    }

    /**
     * 4 - TEMPLATE DES PAGES
     */
    public static function render(){
        ?>
        <div class="wrap">
            <h1 class="wp-heagin-inline"><?php _e("Personnaliser work", 'MyWork') ?></h1>
            <p class="description">
                <?php _e('Sur cette page vous pouvez gérer la section work du site', 'MyWork') ?>
            </p><!--./description-->
            <?php settings_errors(); ?>
        </div><!--./wrap-->

        <form class="myoptions" action="options.php" method="post" enctype="multipart/form-data">
            <?php
            wp_nonce_field(self::NONCE, self::NONCE);
            settings_fields(self::SUB_GROUP);
            do_settings_sections(self::SUB_GROUP);
            ?>
            <?php submit_button(); ?>
        </form>
        <?php
    }

    /**
     * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
     */
    public static function registerSettings(){
        /**
         * SECTION 1 : WORKS_MANAGEMENT ==========================================
         *              1. Créer la section
         *              2. Ajouter les éléments du formulaire
         *              3. Sauvegarder les champs
         *
         */
        // 1. Créer la section
        add_settings_section(
            self::WORKS_MANAGEMENT,                 // SLUG_SECTION
            __('Gérer la section', 'MyWork'),         // TITLE
            [self::class, 'display_section_works_management'],  // CALLBACK
            self::SUB_GROUP                         // SLUG_PAGE
        );

        // 2. Ajouter les éléments du formulaire
        add_settings_field(
            'work_hidden',                        // SLUG_FIELD
            __('Cacher la section', 'MyWork'),  // LABEL
            [self::class,'field_works_hidden'],        // CALLBACK
            self::SUB_GROUP ,                    // SLUG_PAGE
            self::WORKS_MANAGEMENT                // SLUG_SECTION
        );
        add_settings_field(
            'work_title',                        // SLUG_FIELD
            __('Titre section', 'MyWork'),  // LABEL
            [self::class,'field_works_title'],        // CALLBACK
            self::SUB_GROUP ,                    // SLUG_PAGE
            self::WORKS_MANAGEMENT                // SLUG_SECTION
        );
        add_settings_field(
            'work_description',                        // SLUG_FIELD
            __('Description section', 'MyWork'),  // LABEL
            [self::class,'field_works_description'],        // CALLBACK
            self::SUB_GROUP ,                    // SLUG_PAGE
            self::WORKS_MANAGEMENT                // SLUG_SECTION
        );

        // 3. Sauvegarder les champs
        register_setting(self::SUB_GROUP, 'work_hidden_section');
        // title
        register_setting(self::SUB_GROUP, 'work_title_fr');
        register_setting(self::SUB_GROUP, 'work_title_en');
        register_setting(self::SUB_GROUP, 'work_title_it');
        // description
        register_setting(self::SUB_GROUP, 'work_show_desc');
        register_setting(self::SUB_GROUP, 'work_desc_fr');
        register_setting(self::SUB_GROUP, 'work_desc_en');
        register_setting(self::SUB_GROUP, 'work_desc_it');

        /**
         * SECTION 2 : WORKS_LOOP ================================================
         *              1. Créer la section
         *              2. Ajouter les éléments du formulaire
         *              3. Sauvegarder les champs
         *
         */
        // 1. Créer la section
        add_settings_section(
            self::WORKS_LOOP,                 // SLUG_SECTION
            __('Gérer la boucle', 'MyWork'),         // TITLE
            [self::class, 'display_section_works_loop'],  // CALLBACK
            self::SUB_GROUP                         // SLUG_PAGE
        );

        // 2. Ajouter les éléments du formulaire
        add_settings_field(
            'work_emoji_loop',                        // SLUG_FIELD
            __('Émoji', 'MyWork'),  // LABEL
            [self::class,'field_works_emoji_loop'],        // CALLBACK
            self::SUB_GROUP ,                    // SLUG_PAGE
            self::WORKS_LOOP                // SLUG_SECTION
        );
        add_settings_field(
            'work_msg_loop',                        // SLUG_FIELD
            __('Message boucle', 'MyWork'),  // LABEL
            [self::class,'field_works_msg_loop'],        // CALLBACK
            self::SUB_GROUP ,                    // SLUG_PAGE
            self::WORKS_LOOP                // SLUG_SECTION
        );

        // 3. Sauvegarder les champs
        register_setting(self::SUB_GROUP, 'work_loop_emoji');
        // msg loop
        register_setting(self::SUB_GROUP, 'work_loop_fr');
        register_setting(self::SUB_GROUP, 'work_loop_it');
        register_setting(self::SUB_GROUP, 'work_loop_en');
    }

    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */
    // SECTION 1 : WORKS_MANAGEMENT ==========================================
    public static function display_section_works_management(){
        ?>
        <p class="section-description">
            <?php _e("Cette partie vous permet de gérer l'affichage de la section", "MyWork") ?>
        </p>
        <?php
    }
    // SECTION 2 : WORKS_LOOP ================================================
    public static function display_section_works_loop(){
        ?>
        <p class="section-description">
            <?php _e("Cette partie vous permet de gérer la boucle", "MyWork") ?>
        </p>
        <?php
    }


    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */
    // SECTION 1 : WORKS_MANAGEMENT ==========================================
    // SECTION 2 : WORKS_LOOP ================================================

    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */
    // SECTION 1 : WORKS_MANAGEMENT ==========================================
    public static function field_works_hidden(){
        $work_hidden_section = get_option('work_hidden_section');
        ?>
        <input type="checkbox" id="work_hidden_section" name="work_hidden_section" value="1" <?php checked(1, $work_hidden_section, true) ?> />
        <label for=""><?php _e("Masquer la section work du thème", "MyWork"); ?></label>
        <?php
    }
    public static function field_works_title(){
        $work_title_fr = esc_attr(get_option('work_title_fr'));
        $work_title_en = esc_attr(get_option('work_title_en'));
        $work_title_it = esc_attr(get_option('work_title_it'));
        ?>
        <p class="description"><?php _e("Définir le titre de la section", "MyWork"); ?></p>
        <div class="grid-cols-3">
            <div class="grid-box">
                <p class="box-title"><?php _e('Français', "MyWork"); ?></p>
                <input type="text"
                       id="work_title_fr"
                       name="work_title_fr"
                       value="<?php echo $work_title_fr ?>"
                       placeholder="<?php _e('Texte en français', 'MyWork'); ?>"
                />
            </div>
            <div class="grid-box">
                <p class="box-title"><?php _e('Anglais', "MyWork"); ?></p>
                <input type="text"
                       id="work_title_en"
                       name="work_title_en"
                       value="<?php echo $work_title_en ?>"
                       placeholder="<?php _e('Texte en anglais', 'MyWork'); ?>"
                />
            </div>
            <div class="grid-box">
                <p class="box-title"><?php _e('Italien', "MyWork"); ?></p>
                <input type="text"
                       id="work_title_it"
                       name="work_title_it"
                       value="<?php echo $work_title_it ?>"
                       placeholder="<?php _e('Texte en italien', 'MyWork'); ?>"
                />
            </div>
        </div>
        <?php
    }

    public static function field_works_description(){
        $work_show_desc = get_option('work_show_desc');
        $work_desc_fr = esc_attr(get_option('work_desc_fr'));
        $work_desc_en = esc_attr(get_option('work_desc_en'));
        $work_desc_it = esc_attr(get_option('work_desc_it'));
        ?>
        <p>
            <input type="checkbox" id="work_show_desc" name="work_show_desc" value="1" <?php checked(1, $work_show_desc, true) ?> />
            <label for=""><?php _e("Afficher une description à la section", "MyWork"); ?></label>
        </p>
        <div class="grid-cols-3">
            <div class="grid-box">
                <p class="box-title"><?php _e('Français', "MyWork"); ?></p>
                <textarea name="work_desc_fr" id="work_desc_fr" placeholder="<?php _e('Texte en français', 'MyWork'); ?>"><?php echo $work_desc_fr; ?></textarea>
            </div>
            <div class="grid-box">
                <p class="box-title"><?php _e('Anglais', "MyWork"); ?></p>
                <textarea name="work_desc_en" id="work_desc_en" placeholder="<?php _e('Texte en anglais', 'MyWork'); ?>"><?php echo $work_desc_en; ?></textarea>
            </div>
            <div class="grid-box">
                <p class="box-title"><?php _e('Italien', "MyWork"); ?></p>
                <textarea name="work_desc_it" id="work_desc_it" placeholder="<?php _e('Texte en italien', 'MyWork'); ?>"><?php echo $work_desc_it; ?></textarea>
            </div>
        </div>
        <?php
    }

    // SECTION 2 : WORKS_LOOP ================================================
    public static function field_works_emoji_loop(){
        $work_loop_emoji = get_option('work_loop_emoji');
        ?>
        <input type="checkbox" id="work_loop_emoji" name="work_loop_emoji" value="1" <?php checked(1, $work_loop_emoji, true) ?> />
        <label for=""><?php _e("Afficher l'émoji", "MyWork"); ?> &#128549;</label>
        <?php
    }
    public static function field_works_msg_loop(){
        $work_loop_fr = esc_attr(get_option('work_loop_fr'));
        $work_loop_it = esc_attr(get_option('work_loop_it'));
        $work_loop_en = esc_attr(get_option('work_loop_en'));
        ?>
        <p class="description"><?php _e("Ce message sera présent si la boucle est vide", "MyWork"); ?></p>
        <div class="grid-cols-3">
            <div class="grid-box">
                <p class="box-title"><?php _e('Français', "MyWork"); ?></p>
                <input type="text"
                       id="work_loop_fr"
                       name="work_loop_fr"
                       value="<?php echo $work_loop_fr; ?>"
                       placeholder="<?php _e('Texte en français', 'MyWork'); ?>"
                />
            </div>
            <div class="grid-box">
                <p class="box-title"><?php _e('Anglais', "MyWork"); ?></p>
                <input type="text"
                       id="work_loop_it"
                       name="work_loop_it"
                       value="<?php echo $work_loop_it; ?>"
                       placeholder="<?php _e('Texte en anglais', 'MyWork'); ?>"
                />
            </div>
            <div class="grid-box">
                <p class="box-title"><?php _e('Italien', "MyWork"); ?></p>
                <input type="text"
                       id="work_loop_en"
                       name="work_loop_en"
                       value="<?php echo $work_loop_en; ?>"
                       placeholder="<?php _e('Texte en italien', 'MyWork'); ?>"
                />
            </div>
        </div>
        <?php
    }

    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */
}

if(class_exists('mycustome_works')){
    mycustome_works::register();
}