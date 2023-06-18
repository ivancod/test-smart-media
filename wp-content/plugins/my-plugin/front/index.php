<?php

// Start up the engine
class Front_My_Plugine
{
	/**
	 * This is our constructor
	 *
	 * @return void
	 */

	public function __construct()
	{
		$this->add_scripts();

		add_shortcode( 'my_plugin', function( $atts ) {
			load_template( dirname( __FILE__ ) . '/views/index.php', true, array( 'acf_fields' => $this->set_field() ) );
		}); // [my_plugin] 
	}

    private function set_field(): array
    {
        global $wpdb;

        $result = [];
    
        foreach( $this->meta_list('acf-field') as $acf ) {
            $field = get_field_object( $acf );
    
            if($field['parent']) {
                $sql = $wpdb->prepare("SELECT post_excerpt FROM {$wpdb->posts} WHERE ID = %d AND post_type = 'acf-field'", $field['parent']);
                if( $wpdb->get_results( $sql ) ) continue; 
            }
    
            $result[] = $field;
        }
    
        return $result;
    }

    private function meta_list(string $type = ''): array
    {
        global $wpdb;
   
        $sql = $wpdb->prepare("SELECT post_name FROM {$wpdb->posts} WHERE post_type = %s ORDER BY menu_order ASC", $type);
        $result = [];

        foreach ($wpdb->get_results( $sql ) as $value) {
            $result[] = $value->post_name;
        }
   
       return $result;
   	}

    private function add_scripts()
	{
		add_action('wp_enqueue_scripts', function () {
			$path = '/' . PLUGINDIR . '/sm-plugin/assets';

			// CSS
			wp_enqueue_style('my-plugine-style', $path . "/style.css", array(), time());

			// JS
			wp_localize_script('FrontEndAjax', 'ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
			wp_enqueue_script( 'my-plugin-script', $path . '/script.js', array('jquery'), time(), true );
		});
	}
}

new Front_My_Plugine();