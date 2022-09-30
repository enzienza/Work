<?php
/**
 * Name file: MB_Year
 * Description: File creating a MetaBox for completing informations the Custom Post Type
 *              -> this Metabox adding the year for CPT_WORKS
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */

/* ---------------------------------------------------------
>>>  TABLE OF CONTENTS:
------------------------------------------------------------

1 - DEFINIR LES VALEURS (repeter)
2 - DEFINIR LES HOOKS ACTIONS
3 - CONSTRUCTION DE LA METABOX
4 - DEFENIR LA METABOX (template & champs)
5 - SAUVEGARDER LES DONNEES DE LA METABOX

----------------------------------------------------------*/

class MB_Year{
    /**
     *1 - DEFINIR LES VALEURS (repeter)
     */
    //const TITLE_MB = "Information";
    const META_KEY = 'year_info';
    const NONCE    = '_year_info';
    const SCREEN   = array('works');

    /**
     *2 - DEFINIR LES HOOKS ACTIONS
     */
    public static function register(){
        add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
        add_action('save_post', [self::class, 'save']);
    }

    /**
     *3 - CONSTRUCTION DE LA METABOX
     */
    public static function add($postType, $POST){
        if (current_user_can('publish_posts', $POST)) {
            add_meta_box(
                self::META_KEY,             // ID_META_BOX
                __('Année', 'MyWork'),            // TITLE_META_BOX
                [self::class, 'render'],        // CALLBACK
                self::SCREEN,            // WP_SCREEN
                'advanced',             // CONTEXT [ normal | advanced | side ]
                'high'                  // PRIORITY [ high | default | low ]
            );
        }
    }

    /**
     *4 - DEFENIR LA METABOX (template & champs)
     */
    public static function render($POST){
        wp_nonce_field(self::NONCE, self::NONCE);
        $year = get_post_meta($POST->ID, 'year', true);
        ?>
        <div class="components-base-control__field">
            <p class="desc">
                <?php _e("Préciser l'année de création", "MyWork") ?>
            </p>
            <input type="text"
                   name="year"
                   id="year"
                   value="<?php echo $year ?>"
                   placeholder="<?php _e('2000', 'MyWork'); ?>"
            />
        </div>
        <?php
    }

    /**
     *5 - SAUVEGARDER LES DONNEES DE LA METABOX
     */
    public static function save($POST_ID){
        if( current_user_can('publish_posts', $POST_ID)){

            // save $year_job -----------------------------------------------------
            if(isset($_POST['year'])) {
                if ($_POST['year'] === '') {
                    delete_post_meta( $POST_ID, 'year', $_POST['year'] );
                } else {
                    update_post_meta( $POST_ID, 'year', $_POST['year'] );
                }
            }
        }
    }
}
if(class_exists('MB_Year')){
    MB_Year::register();
}