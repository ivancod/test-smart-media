<?php

class Ajax_My_Plugine
{

    /**
     * This is our constructor
     *
     * @return void
     */

    public function __construct()
    {
        if ( wp_doing_ajax() ) {
            // ------------------------------ ACTIONS ---------------------------------
            add_action( 'wp_ajax_nopriv_mp_acf_filter', array($this, 'mp_acf_filter') );
            add_action( 'wp_ajax_mp_acf_filter', array($this, 'mp_acf_filter') );
        }
    }

    public function mp_acf_filter()
    {

        $meta_query = [];
    
        foreach($_POST['data'] as $key => $field){
            if($field['val'] == '' OR $field['val'] == '0' OR $field['val'] == []){
                continue;
            }
    
            if($field['type'] == 'text') {
                $meta_query[] = [	
                    'key'		=> $field['name'],
                    'value'		=> $field['val'],
                    'compare'	=> 'LIKE'
                ];
            }
    
            if($field['type'] == 'select' OR $field['type'] == 'radio') {
                $meta_query[] = [	
                    'key'		=> $field['name'],
                    'value'		=> $field['val'],
                    'compare'	=> '='
                ];
            }
        }
    
        $meta_query['relation']	= 'AND';
    
        $the_query  =  new WP_Query(
            array(
                'post_type'		=> 'objects',
                'posts_per_page' => '3',
                'paged' => $_POST['page'] ? $_POST['page'] : 1,
                'meta_query'	=> $meta_query
            )
        );

        $posts = [ 'list' => [] ];

        while ( $the_query->have_posts() ) : $the_query->the_post(); 
            $posts['list'][] = [
                'link' 		=> get_permalink(),
                'thumbnail' => get_the_post_thumbnail(),
                'title' 	=> get_the_title(),
                'content' 	=> wp_trim_words( get_the_content(), 30, '...' )
            ];	
        endwhile;
    
        $posts['total_posts'] = $the_query->found_posts;
    
        wp_send_json_success($posts);
        wp_die(); 
    }
}

new Ajax_My_Plugine();