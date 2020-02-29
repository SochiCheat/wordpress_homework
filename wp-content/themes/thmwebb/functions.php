<?php 
    function add_feature(){
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme','add_feature');

    function add_menu() {
        register_nav_menus(
          array(
            'primary' => __( 'primary-menu' ),
            'footer' => __( 'footer-menu' )
          )
        );
      }
      add_action( 'init', 'add_menu' );
?>