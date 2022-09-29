<?php
/**
 * Taxonomy:   label-project
 *
 * Type tax:    this is a TAG
 * Description: this file add type-project taxonomy in CPT_works
 *
 * @package WordPress
 * @subpackage MyWork
 * @version 1.0
 */


if(!function_exists('taxo_labelproject')){
    function taxo_labelproject(){
        /**
         * Déclaration de la Taxonomie
         * @var array
         */
        $labels = array(
            'name'                       => __( 'Étiquettes projet', 'MyWork' ),
            'singular_name'              => __( 'Étiquette projet', 'MyWork' ),
            'menu_name'                  => __( 'Étiquettes projet', 'MyWork' ),
            'search_items'               => __( 'Recherche une étiquette projet', 'MyWork' ),
            'popular_items'              => __( 'Étiquettes projet populaires', 'MyWork' ),
            'all_items'                  => __( 'Toutes les étiquettes projet', 'MyWork' ),
            'parent_item'                => __( 'Parent étiquette projet', 'MyWork' ),
            'edit_item'                  => __( 'Modifier l\'étiquette projet', 'MyWork' ),
            'view_item'                  => __( 'Afficher l\'étiquette projet', 'MyWork' ),
            'update_item'                => __( 'Mettre à jour l\'étiquette de projet', 'MyWork' ),
            'add_new_item'               => __( 'Ajouter une nouvelle étiquette projet', 'MyWork' ),
            'new_item_name'              => __( 'Nouveau nom d\'étiquette projet', 'MyWork' ),
            'separate_items_with_commas' => __( 'Séparer les étiquette projet par des virgules', 'MyWork' ),
            'add_or_remove_items'        => __( 'Ajouter ou retirer les étiquettes projet ', 'MyWork' ),
            'choose_from_most_used'      => __( 'Choisir parmi les étiquettes projet les plus utilisées', 'MyWork' ),
            'not_found'                  => __( 'Aucune étiquette projet trouvé', 'MyWork' ),
            'no_terms'                   => __( 'Aucune étiquette projet', 'MyWork' ),
            'items_list_navigation'      => __( 'Navigation de la liste des étiquettes projet', 'MyWork' ),
            'items_list'                 => __( 'Liste des étiquettes projet de projets', 'MyWork' ),
        );

        /**
         * définir les option de rewrite
         * @var array
         */
        $rewrite = array(
            'slug' => 'label_project',
            // 'with_front'    => true,
            // 'hierarchical'  => false,
        );

        /**
         * Définir une valeur par défaut
         */
        //$default = array(
            //'name' => 'Non défini',
            //'slug' => 'non-defini',
            //'description' => ''
        //);

        /**
         * définir les option de supports
         * @var array
         */
        $args = array(
            'labels'            => $labels,
            'rewrite'           => $rewrite,
            //'default_term'      => $default,
            'public'            => true,
            'show_in_rest'      => true,
            //'hierarchical'      => true,              // true => category
            'hierarchical'      => false,           // false => tags
            'show_admin_column' => true,
            'show_in_nav_menus' => false,
            'show_in_menu'      => true,
            'query_var'         => true,
            'show_ui'           => true
        );

        /**
         * définir les WP_Screen
         * @var array
         */
        $screen = array(
            'works'
        );

        register_taxonomy(
            'label_project',    // Nom de la Taxonomie
            $screen,                    // WP_screen
            $args                       // Tableau des arguments
        );

    }
}
add_action('init', 'taxo_labelproject');