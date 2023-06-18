<?php
/**
 * Plugin Name: My plugin 
 * Description: Плагин для тестового задания
 * Plugin URI:  vanstep17@gmail.com
 * Author URI:  vanstep17@gmail.com
 * Author:      Ivan Step
 * Version:     1.0
 *
 */

include plugin_dir_path( __FILE__ ) . '/widget/index.php';

add_action('init', function () {
	register_post_type( 'objects',
		array(
			'labels' => array(
				'name' => __( 'Объект недвижимости', 'my-plugin' ),
				'singular_name' => __( 'Объект', 'my-plugin' )
			),
			'public' 		=> true,
			'has_archive' 	=> true,
			'rewrite' 		=> array('slug' => 'objects'),
			'taxonomies' 	=> array(  'Район' ),
			'supports' => array('title', 'editor', 'thumbnail' ),
		)
	);

	if (is_admin()) {
		// admin mode
		require_once __DIR__ . '/admin/index.php';
	} else {
		// front mode
		require_once __DIR__ . '/front/index.php';
	}
});
