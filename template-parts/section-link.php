<?php 
global $seafood_options;
$title = $seafood_options['sections-link-title'];
$content = $seafood_options['sections-link-content'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_link', $page_details ); 
?>
<section id="section-link" class="<?php if(@$seafood_options['sections-link-background-type'] == 1) echo @$seafood_options['sections-link-background'] . ' ';?><?php if(@$seafood_options['sections-link-color-type'] == 1) echo @$seafood_options['sections-link-color'];?>">
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_link hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_link', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
		<?php 
		/*
		* action_after_link hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_link', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_link', $page_details  ); ?>