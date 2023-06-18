<div id="my_plugin-filters" >
	<div id="use_filter"><?= __('Использовать фильтр', 'my-plugin') ?></div>
	<form action="#" style="display:none;">
		<div class="fields">
			
		<? foreach( $args['acf_fields'] as $field ): ?>

			<? if( !$field['sub_fields'] ){ ?>

				<? if($field['type'] == 'text') { ?>
					<div class='acf_field'>
						<label class='mp_label_field'><p><? esc_html_e($field['label']) ?></p>
							<input class='form-control' type='text' key='<? esc_attr_e($field['key']) ?>' name='<? esc_attr_e($field['name']) ?>'> 
						</label>
					</div>
				<? } ?>

				<? if($field['type'] == 'radio') { ?>
					<div class='mp_wrap_field acf_field'><p><? esc_html_e($field['label']) ?></p>

					<? foreach($field['choices'] as $choice){ ?>
						<label class='mp_label_field '>
							<input type='radio' key='<? esc_attr_e($field['key']) ?>' name='<? esc_attr_e($field['name']) ?>' value='<? esc_attr_e($choice) ?>'> <? esc_html_e($choice) ?>
						</label><br>
					<? } ?>

					</div>
				<? } ?>

				<? if($field['type'] == 'select') { ?>
					<div class='mp_wrap_field acf_field'><p><? esc_html_e($field['label']) ?></p>
						<select class='custom-select' type='select' name='<? esc_attr_e($field['name']) ?>' key='<? esc_attr_e($field['key']) ?>'>
							<option value='0'>-</option>
							<? foreach($field['choices'] as $choice){ ?>
								<option value='<? esc_attr_e($choice) ?>'><? esc_html_e($choice) ?></option>
							<? } ?>
						</select>
					</div>
				<? } ?>

			<? } else { ?>
				<p class="my_plugin_group_title"><? esc_html_e($field['label'])?></p>
				<?php
					foreach( $field['sub_fields'] as $sub_field ): 
						$sub_field['name'] = $field['name'].'_'.$sub_field['name'];
						
						if($sub_field['type'] == 'text') { ?>
							<div class='acf_field'>
								<label class='mp_label_field'><p><? esc_html_e($sub_field['label']) ?></p>
									<input class='form-control' type='text' key='<? esc_attr_e($sub_field['key']) ?>' name='<? esc_attr_e($sub_field['name']) ?>'> 
								</label>
							</div>
						<? } ?>
		
						<? if($sub_field['type'] == 'radio') { ?>
							<div class='mp_wrap_field acf_field'><p><? esc_html_e($sub_field['label']) ?></p>
		
							<? foreach($sub_field['choices'] as $choice){ ?>
								<label class='mp_label_field '>
									<input type='radio' key='<? esc_attr_e($sub_field['key']) ?>' name='<? esc_attr_e($sub_field['name']) ?>' value='<? esc_attr_e($choice) ?>'> <? esc_html_e($choice) ?>
								</label><br>
							<? } ?>
		
							</div>
						<? } ?>
		
						<? if($sub_field['type'] == 'select') { ?>
							<div class='mp_wrap_field acf_field'><p><? esc_html_e($sub_field['label']) ?></p>
								<select class='custom-select' type='select' name='<? esc_attr_e($sub_field['name']) ?>' key='<? esc_attr_e($sub_field['key']) ?>'>
									<option value='0'>-</option>
									<? foreach($sub_field['choices'] as $choice){ ?>
										<option value='<? esc_attr_e($choice) ?>'><? esc_html_e($choice) ?></option>
									<? } ?>
								</select>
							</div>
						<? }
					endforeach; 
				?>
			<? } ?>
		<? endforeach ?>

		</div>
		<hr>
		<div>
			<button class="btn btn-primary" type="submit"><?= __('Фильтровать', 'my-plugin') ?></button>
		</div>

	</form>
</div>
