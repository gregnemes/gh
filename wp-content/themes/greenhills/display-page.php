
	<?php 
		$display_post = get_field('display_form','option'); 
		$display_id = $display_post->ID;
		$form = get_field('form_to_display',$display_id);
		$form_id = $form->id;
		$post_id = $display_id;
	?>

<div class="display-page">

	<div class="row">
	
		<div class="col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
		<?php

			$entries = RGFormsModel::get_leads($form_id, $star); ?>
			<ul class="entry-list">
			
			<?php foreach($entries as $entry){ ?>
				<li class="<?php if($entry[is_starred]){ echo 'starred'; } else{ } ?>">
									
					<?php echo 	'entry_id: ' . $entry[id] . ', text: ' . $entry[5];	 ?>
				</li>				
			<?php } ?>
			</ul>	
		</div>
		
	</div>
	
</div>	