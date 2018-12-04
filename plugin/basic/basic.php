<?php
/**
Plugin Name: Basic
Description:  een basic plugin voor een opdracht
Version:      1.0
Author:       Quinten Rodrigues
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */


// Exit if accessed directly.
if( !defined( 'ABSPATH' ) ) exit;

function test_register_post_type() {
    $labels = array(
        'name' => _x( 'Portfolio', 'Post type general name', 'test-portfolio' ),
        'singular_name' => _x( 'Portfolio Item', 'Post type singular name', 'test-portfolio' ),
        'menu_name' => _x( 'Portfolio Items', 'Admin Menu text', 'test-portfolio' ),
        'name_admin_bar' => _x( 'Portfolio Items', 'Add New on Toolbar', 'test-portfolio' ),
    );

     $args = array(
         'labels'             => $labels,
         'public'             => true,
         'publicly_queryable' => true,
         'show_ui'            => true,
         'show_in_menu'       => true,
         'query_var'          => true,
         'rewrite'            => array( 'slug' => 'portfolio' ),
         'capability_type'    => 'post',
         'has_archive'        => true,
         'hierarchical'       => false,
         'menu_position'      => null,
         'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
         'menu_icon'		  => 'dashicons-screenoptions',
     );

     register_post_type( 'test_portfolio', $args );
}

add_action( 'init', 'test_register_post_type' );

function portfolio_taxonomy() {
    register_taxonomy('portfolio-type','test_portfolio' , '$args');
}

wp_enqueue_style( $handle, $src = 'style.css', $deps = array(), $ver = false, $media = 'all' );

add_action( 'init', 'portfolio_taxonomy');