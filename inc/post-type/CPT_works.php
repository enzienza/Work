<?php
/**
 * Name file: cpt_works
 * Description: This file allow create a Custom Post Type for works
 *
 * @package WordPress
 * @subpackage MyWork
 * @since 1.0.0
 */



if(!function_exists('CPT_works')){
    function CPT_works(){
        /**
         * définir les options du label
         * @var array
         */
        $labels = array(
            'name'               => __('Travaux', 'MyWork'),
            'singular_name'      => __('Travail', 'MyWork'),
            'menu_name'          => __('Travaux', 'MyWork'),
            'name_admin_bar'     => __('Travail', 'MyWork'),
            'all_items'          => __('Toutes les travaux', 'MyWork'),
            'add_new'            => __('Ajouter', 'MyWork'),
            'add_new_item'       => __('Ajouter un nouveau travail', 'MyWork'),
            'new_item'           => __('Nouveau travail', 'MyWork'),
            'edit_item'          => __('Modifier le travail', 'MyWork'),
            'view_item'          => __('Afficher le travail', 'MyWork'),
            'update_item'        => __('Mettre à jour le travail', 'MyWork'),
            'search_items'       => __('Rechercher dans les travaux', 'MyWork'),
            'not_found'          => __('Aucun travail trouvée', 'MyWork'),
            'not_found_in_trash' => __('Aucun travail trouvé dans la corbeille', 'MyWork'),
            'filter_items_list'  => __('Filtrer la liste des travaux', 'MyWork'),
            'attributes'         => __('Attributs du travail', 'MyWork'),
        );

        /**
         * définir les option de rewrite
         * @var array
         */
        $rewrite = array(
            'slug'         => 'works',
            //'with_front'   => true,
            //'hierarchical' => false,
        );

        /**
         * définir les option de supports
         * @var array
         */
        $supports = array(
            'title',           // titre
            'editor',          // editeur
            'thumbnail',       // image à la une
            //'author',          // auteur du post
            //'excerpt',         // extrait
            //'comments'         // commentaires autorisé
        );

        /**
         * définir l'icon SVG
         * @var array
         */
        $iconSVG = 'data:image/svg+xml;base64,' . base64_encode(
                '<svg width="36px" height="34px" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                    <path fill="black" 
                          d="M908.3,244.3H681.1v-63.8c0-58.8-62.9-106.7-140.3-106.7h-85.2c-76.6,0-136.6,46.9-136.6,106.7v63.8H98.6c-49.6,0-88.6,35.2-88.6,80v69.1v53.3v48.1c0,7.8,4.3,15.1,11.2,18.8c1.8,0.9,13,6.8,31.4,15.6v349c0,23.1,16.3,47.8,40.8,47.8h809.5c25.1,0,44.5-25.6,44.5-47.8v-349c18.4-8.8,29.5-14.7,31.3-15.7c7-3.7,11.2-10.9,11.2-18.8v-48v-53.3v-69.1C990.1,278,955.6,244.3,908.3,244.3 M371.6,180.6c0-35.3,32-53.9,83.9-53.9h85.2c52.1,0,87.7,19.8,87.7,53.9v63.8H371.6L371.6,180.6L371.6,180.6z M894.7,863.9c0,1.5-1.9,4.3-3.4,5.4H106.7c-0.7-1.3-1.3-3.3-1.3-5.2V548.8c71.9,31.3,167.2,74.6,288.7,91v20.1c0,23.5,19.1,42.6,42.6,42.6h126.8c23.5,0,42.6-19.1,42.6-42.6v-20c121.5-16.5,216.8-59.7,288.7-91.1L894.7,863.9L894.7,863.9z M446.7,659.8V553.3h106.5v106.5H446.7L446.7,659.8z M937.3,471.6c-41.8,20.8-172.8,92.1-331.3,114.9v-33.3c0-23.5-19.1-42.6-42.6-42.6H436.6c-23.5,0-42.6,19.1-42.6,42.6v33.3c-158.4-22.7-289.5-94-331.2-114.9v-26.9v-51.2v-69.1c0-23.4,13.3-27.3,35.9-27.3h809.6c23.8,0,29.1,4.6,29.1,27.3v69.1v43.1V471.6L937.3,471.6z"
                    />
              </svg>'
            );
        /**
         * définir les arguments du custom post type
         * @var array
         */
        $args = array(
            'labels'            => $labels,
            'rewrite'           => $rewrite,
            'supports'          => $supports,
            'public'            => true,
            'hierarchical'      => false,
            //'hierarchical'      => true,              // parent / child
            //'has_archive'       => true,              // c'est une archive => archive-{$post-type}
            'has_archive'       => false,               // c'est une page => page-{$post-type}
            //'show_in_rest'      => true,              // oui => afficher editeur Gutemberg
            'show_in_rest'      => false,               // non => afficher editeur Gutemberg
            'show_in_menu'      => true,
            'show_in_nav_menus' => false,
            'query_var'         => true,
            'capability_type'   => 'post',
            'menu_position'     => 9,
            //'menu_icon'         => 'dashicons-images-alt',
            'menu_icon'         => $iconSVG,
        );

        register_post_type('works', $args);
    }
}
add_action('init', 'CPT_works');