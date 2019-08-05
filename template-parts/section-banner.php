<?php 
global $seafood_options; 
$select = $seafood_options['sections-banner-select'];
$slides = $seafood_options['sections-banner-details'];
$shortcode = $seafood_options['sections-banner-shortcode'];
$cover = $seafood_options['sections-banner-bg-cover']['url'];
$mp4 = $seafood_options['sections-banner-bg-mp4'];
$webm = $seafood_options['sections-banner-bg-webm'];
$n = 1;
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_before_banner', $page_details );
?>
<section id="section-banner">
	<?php do_action( 'action_before_banner_loop', $page_details ); ?>
	<div id="video-con">
		<video id="banner-video" autoplay loop muted playsinline <?php if ($cover) : ?> style="background-image:url(<?php echo $cover ?>)" <?php endif; ?>>
		<?php if($mp4) : ?>
			<source src="<?php echo $mp4 ?>">
		<?php endif; ?>
		<?php if($webm) : ?>
			<source src="<?php echo $webm ?>">
		<?php endif; ?>
		</video>		
	</div>

	<?php if ($select == 'shortcode' ) : ?>
		<?php echo do_shortcode( $shortcode ); ?>
	<?php else : ?>
		<div <?php if ( $select == 'banner' ) echo 'class="static-banner"'; else echo 'id="section-banner-owl" class="owl-carousel owl-theme"';   ?>>
			<?php foreach ($slides as $slide) : ?>
				<div class="wrapper">
					<?php echo wp_get_attachment_image( $slide["attachment_id"], 'full', false, array( 'class' => 'img-fluid img-banner', 'alt' => $alt_tag['inner'] . strip_tags(do_shortcode( $slide["title"] )) )) ?>
					<?php do_action( 'action_before_banner_content', $page_details ); ?>
					<div class="banner-content">
						<div class="container">
							<div class="banner-text">
								<?php if ($slide["title"]) : ?>
								<h2 class="banner-title"><?php echo do_shortcode( $slide["title"] ) ?></h2>
								<?php endif; ?>
								<?php if ($slide["description"]) : ?>
								<div class="banner-desc">
									<?php echo do_shortcode(  $slide["description"] )?>					
								</div>
								<?php endif; ?>
								<?php if($slide["link_url"] AND $slide["link_title"]) : ?>
									<a class="btn btn-outline-light rounded-0 mt-3" href="<?php echo do_shortcode( $slide["link_url"] ) ?>" <?php if ($slide["target"]) echo 'target="_blank"'; ?>><?php echo do_shortcode( $slide["link_title"] )?></a>
								<?php endif; ?>
							</div>
						</div>	
					</div>
					<?php do_action( 'action_after_banner_content', $page_details ); ?>
					<?php if ($select == 'banner' AND $n==1) break; $n++; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php do_action( 'action_after_banner_loop', $page_details ); ?>
</section>
<?php do_action( 'action_after_banner', $page_details ); ?>