<!DOCTYPE html>

<html>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title> 
	   <?php
	      if (function_exists('is_tag') && is_tag()) {
	         single_tag_title(); 
	         }
	      elseif (is_search()) {
	         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
	      elseif (!(is_404()) && (is_single()) || (is_page())) {
	         wp_title(''); echo ' - '; }
	      elseif (is_404()) {
	         echo 'Not Found - '; 
	         }
	      if (is_home()) {
	         bloginfo('name'); echo ' - '; bloginfo('description'); }
	      else {
	          bloginfo('name'); }
	   ?>
	</title>
				   
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="google-site-verification" content="">
	<meta name="author" content="Greg Nemes + Brandon Pence">
		
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico?v=2">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
			
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_directory'); ?>/_/js/html5shiv.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/_/js/respond.js"></script>
    <![endif]-->			
		
	<?php wp_head(); ?>
	
	<script type="text/javascript" charset="utf-8">
	  $(window).load(function() {
	    $('.flexslider').flexslider();
	  });
	 </script>
		
</head>

<body <?php body_class(); ?>>

	<?php 
		$display_post = get_field('display_form','option'); 
		$display_id = $display_post->ID;
		$form = get_field('form_to_display',$display_id);
		$post_id = $display_id;
	?>

	<header id="header" class="before">
		<a id="logo" class="logo white centered" href="<?php bloginfo('url'); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/_/img/logo.png">
		</a>
		
		<div class="prompt white">
			<h3 class="white prompt-text centered">
				<?php the_field('response_prompt',$post_id); ?>
			</h3>	
			<div class="prompt-image">
				<?php the_field('response_prompt_image',$post_id); ?>				
			</div>
			<div class="prompt-link">
				<?php 
				if(get_field('response_prompt_link_check',$post_id)){
					$response_link = get_field('response_prompt_link',$post_id);				
				}
				else{
					$response_link = get_bloginfo('url'); 
				} ?>
				<a href="<?php echo $response_link; ?>" class="white centered">Join the Conversation at:<br> <?php echo $response_link; ?></a>
			</div>
			<div class="prompt-link">
				<?php
					$display_link = get_bloginfo('url') . '/display'; 
					?>
				<a href="<?php echo $display_link; ?>" class="white centered">See the responses at <?php echo $display_link; ?></a>
			</div>				
												
		</div>		
		
	</header>
		
	<div id="content" class="empty">
