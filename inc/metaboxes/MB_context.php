<?php
/**
 * Name file: MB_context
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

class MB_context{
    /**
     *1 - DEFINIR LES VALEURS (repeter)
     */
    //const TITLE_MB = "Information";
    const META_KEY = 'context_project';
    const NONCE    = '_context_project';
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
                __('Contexte', 'MyWork'),            // TITLE_META_BOX
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
        $context = get_post_meta($POST->ID, 'context', true);
        $is_won = get_post_meta($POST->ID, 'is_won', true);
        ?>
        <div class="components-base-control__field">

                <p class="desc">
                    <?php _e("Préciser le contexte du projet", "MyWork") ?>
                </p>
                <ul class="context-lists">
                    <li class="context-item">
                        <span>
                            <input type="radio" name="context" value="1" <?php checked(1, $context, true); ?> />
                            <?php _e('C\'est un projet école', 'MyWork'); ?>
                        </span>
                        <span class="retrait">
                            <input type="checkbox" id="is_won" name="is_won" value="1" <?php checked(1, $is_won, true); ?> />
                            <?php _e('J\'ai gangé le projet', 'MyWork'); ?>
                        </span>
                    </li>
                    <li class="context-item">
                        <input type="radio" name="context" value="2" <?php checked(2, $context, true); ?> />
                        <?php _e('C\'est un projet privé', 'MyWork'); ?>
                    </li>
                </ul>
            </div>
        </div>
        <?php
    }

    /**
     *5 - SAUVEGARDER LES DONNEES DE LA METABOX
     */
    public static function save($POST_ID){
        if( current_user_can('publish_posts', $POST_ID)){

            // save $context -----------------------------------------------------
            if(isset($_POST['context'])) {
                if ($_POST['context'] === '') {
                    delete_post_meta( $POST_ID, 'context', $_POST['context'] );
                } else {
                    update_post_meta( $POST_ID, 'context', $_POST['context'] );
                }
            }
            // save $is_won -----------------------------------------------------
            if(isset($_POST['is_won'])) {
                if ($_POST['is_won'] === '') {
                    delete_post_meta( $POST_ID, 'is_won', $_POST['is_won'] );
                } else {
                    update_post_meta( $POST_ID, 'is_won', $_POST['is_won'] );
                }
            }


        }
    }
}
if(class_exists('MB_context')){
    MB_context::register();
}