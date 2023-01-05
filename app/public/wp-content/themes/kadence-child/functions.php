<?php
/**
** activation theme
**/// 



// in case of deliting accidently the admin from the data base, the next function will reintall all rights and users 
// if ( !function_exists( 'populate_roles' ) ) {
// 	require_once( ABSPATH . 'wp-admin/includes/schema.php' );
//   }
  
//   populate_roles();



function child_enqueue_styles() {
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' ); 

if (current_user_can('administrator')):
	show_admin_bar(true);
  endif;



function add_admin_link($items) {
  if (current_user_can( 'manage_options' )
  
  ) {
      $items_array = explode('</li>', $items);
        $items_array[2]=$items_array[1];
        $items_array[1] = '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="'. get_admin_url() .'">Admin</a>';
        $items = implode('</li>', $items_array);
    }
    return $items;
    
}
add_filter( 'wp_nav_menu_items', 'add_admin_link', 10, 2 );



