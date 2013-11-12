<?php 
	if(is_single()){
		while ( have_posts() ) : the_post(); 
			$form = get_field('form_to_display');
			$form_id = $form->id; 
			$post_id = get_the_ID(); 
		endwhile;	
	}		
	else{
		$home_post = get_field('home_response','option'); 
		$home_id = $home_post->ID;
		$form = get_field('form_to_display',$home_id);
		$form_id = $form->id; 		
		$post_id = $home_id;
	}

?>

<div class="response-page">

	<div class="row">
	
		<div class="col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
		<?php
			 gravity_form_enqueue_scripts($form_id, true);
			 gravity_form( $form_id, $display_title=false, $display_description=false, $display_inactive=false, $field_values=null, $ajax=true, $tabindex=1000); 		
		?>
			<div id="success" class="hidden">
				<h1 class=""><span class="icon" data-icon="&#245;"></span><?php the_field('confirmation_message',$post_id); ?></h1>
			</div>		
		</div>
		
	</div>
	
</div>	
