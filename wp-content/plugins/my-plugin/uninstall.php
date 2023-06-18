<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit;
}

// Удаление данных плагина
$posts = get_posts(array(
    'post_type'     => 'objects',
    'post_status'   => "any",
    'fields'        => 'ids',
    'posts_per_page'=> -1
));

foreach($posts as $WP_Post) {
    wp_delete_post($WP_Post->ID);
}

unregister_post_type('objects');