<?php 
global $seafood_options;
$title = $seafood_options['sections-link-title'];
$content = $seafood_options['sections-link-content'];
$slides = $seafood_options['sections-link-slides'];
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
			<div class="row no-gutters">
			<?php foreach($slides as $slide) : ?>
				<div class="col-lg-3">
					<div class="link-unit">
						<img class="img-responsive img-fluid img-service" src="<?php echo aq_resize(wp_get_attachment_url( $slide['attachment_id']), 475, 875, true) ?>" alt="<?php echo strip_tags(do_shortcode( $slide['title'] )) ?>" width="<?php echo $slide['width'] ?>" height="<?php echo $slide['height'] ?>">
						<div class="content">
							<h2 class="heading"><?php echo $slide['title'] ?></h2>
							<h3 class="sub-heading"><?php echo $slide['link_title'] ?></h3>
							<button class="btn btn-outline-light border-0">Learn More</a>
						</div>
						<a href="<?php echo do_shortcode( $slide['link_title'] ); ?>" class="hidden-link">Learn More</a>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
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