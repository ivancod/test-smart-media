<div id="my_plugin-custom_post" class="flex fd-c">
	<? load_template(dirname( __FILE__ ) . '/filter.php', true, [ 'acf_fields' => $args['acf_fields'] ]) ?>
	<hr>
	<? load_template(dirname( __FILE__ ) . '/list.php') ?>
</div>
