<?php 
global $seafood_options;
$sections = $seafood_options['general-page-sections']['Enabled'];
$layout = $seafood_options['general-page-layout'];
?><?php get_header() ?>
<section id="page" class="page-content <?php if(@$seafood_options['sections-content-background-type'] == 1) echo @$seafood_options['sections-content-background'];?>">
	<div class="content-wrap">
		<div class="container">
		<?php if ($layout != 'ns') : ?>
			<div class="row">
				<div class="col-lg-8 <?php if ($layout == 'ls') echo 'order-lg-last'?>">
		<?php endif; ?>
					<?php if ( have_posts() ) :?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php if (has_post_thumbnail()):?>
								<div class="page-img-container">
									<?php the_post_thumbnail('blog-image-full', array('class' => 'img-fluid img-blog img-centered'))?>
								</div>
							<?php endif;?>						
							<div class="content">
								<?php get_template_part( 'content', 'page' ) ?>
							</div>
						<?php endwhile;?>	


					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif;?>		

		<?php if ($layout != 'ns') : ?>		
				</div>
				<div class="col-lg-4 <?php if ($layout == 'ls') echo 'order-lg-first'?>">
					<?php get_sidebar('page');?>
				</div>
			</div>
			<?php endif; ?>
		</div>	
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>