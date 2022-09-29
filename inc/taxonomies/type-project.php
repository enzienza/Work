<?php
/**
 * Taxonomy:   type-project
 *
 * Type tax:    this is a CATEGORY
 * Description: this file add type-project taxonomy in CPT_works
 *
 * @package WordPress
 * @subpackage MyWork
 * @version 1.0
 */


if(!function_exists('taxo_typeproject')){
    function taxo_typeproject(){
        /**
         * Déclaration de la Taxonomie
         * @var array
         */
        $labels = array(
            'name'                       => __( 'Types de projets', 'MyWork' ),
            'singular_name'              => __( 'Type de projet', 'MyWork' ),
            'menu_name'                  => __( 'Types de projets', 'MyWork' ),
            'search_items'               => __( 'Recherche un type de projets', 'MyWork' ),
            'popular_items'              => __( 'Types de projets populaires', 'MyWork' ),
            'all_items'                  => __( 'Tous les types de projets', 'MyWork' ),
            'parent_item'                => __( 'Parent type de projet', 'MyWork' ),
            'edit_item'                  => __( 'Modifier le type de projet', 'MyWork' ),
            'view_item'                  => __( 'Afficher le type de projet', 'MyWork' ),
            'update_item'                => __( 'Mettre à jour le type de projet', 'MyWork' ),
            'add_new_item'               => __( 'Ajouter un nouveau type de projet', 'MyWork' ),
            'new_item_name'              => __( 'Nouveau nom de type de projet', 'MyWork' ),
            'separate_items_with_commas' => __( 'Séparez les types de projets par des virgules', 'MyWork' ),
            'add_or_remove_items'        => __( 'Ajouter ou retirer les types de projets', 'MyWork' ),
            'choose_from_most_used'      => __( 'Choisir parmi les type projets les plus utilisés', 'MyWork' ),
            'not_found'                  => __( 'Aucun type de projet trouvé', 'MyWork' ),
            'no_terms'                   => __( 'Aucun type de projets', 'MyWork' ),
            'items_list_navigation'      => __( 'Navigation de la liste des types de projets', 'MyWork' ),
            'items_list'                 => __( 'Liste des types de projets', 'MyWork' ),
        );

        /**
         * définir les option de rewrite
         * @var array
         */
        $rewrite = array(
            'slug' => 'type_project',
            // 'with_front'    => true,
            // 'hierarchical'  => false,
        );

        /**
         * Définir une valeur par défaut
         */
        $default = array(
            'name' => 'Non défini',
            'slug' => 'non-defini',
            'description' => ''
        );

        /**
         * définir les option de supports
         * @var array
         */
        $args = array(
            'labels'            => $labels,
            'rewrite'           => $rewrite,
            'default_term'      => $default,
            'public'            => true,
            'show_in_rest'      => true,
            'hierarchical'      => true,              // true => category
            //'hierarchical'      => false,           // false => tags
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
            'type_project',    // Nom de la Taxonomie
            $screen,                    // WP_screen
            $args                       // Tableau des arguments
        );

    }
}
add_action('init', 'taxo_typeproject');