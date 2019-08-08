<?php 
global $seafood_options;
$sections = $seafood_options['general-page-sections']['Enabled'];
$top_part = get_post_meta( get_the_ID(), '_seafood_top_part', true );
$middle_part = get_post_meta( get_the_ID(), '_seafood_middle_part', true );
$bottom_part = get_post_meta( get_the_ID(), '_seafood_bottom_part', true );
?><?php get_header() ?>
<section id="page" class="page-content <?php if(@$seafood_options['sections-content-background-type'] == 1) echo @$seafood_options['sections-content-background'];?>">
	<div class="content-wrap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col col-md-10">
					<?php if ( have_posts() ) :?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php if (has_post_thumbnail()):?>
								<div class="page-img-container">
									<?php the_post_thumbnail('blog-image-full', array('class' => 'img-fluid img-blog img-centered'))?>
								</div>
							<?php endif;?>
							<div class="header-section">
							<?php if($top_part) : ?>
								<div class="top-header"><?php echo do_shortcode( $top_part ); ?></div>
							<?php endif; ?>
							<?php if($middle_part) : ?>
								<div class="middle-header"><?php echo do_shortcode( $middle_part ); ?></div>
							<?php endif; ?>
							<?php if($bottom_part) : ?>
								<div class="bottom-header"><?php echo do_shortcode( $bottom_part ); ?></div>
							<?php endif; ?>
							</div>						
							<div class="content">
								<?php get_template_part( 'content', 'page' ) ?>
							</div>
						<?php endwhile;?>	


					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif;?>		
				</div>
			</div>
		</div>	
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>