<?php global $seafood_options; ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="Md. Mostak Shahid">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<input id="loader-status" type="hidden" value="<?php echo $seafood_options['misc-page-loader'] ?>">
<?php if ($seafood_options['misc-page-loader']) : ?>
    <div class="se-pre-con">
    <?php if ($seafood_options['misc-page-loader-image']['url']) : ?>
        <img class="img-responsive animation <?php echo $seafood_options['misc-page-loader-image-animation'] ?>" src="<?php echo do_shortcode( $seafood_options['misc-page-loader-image']['url'] ); ?>">
    <?php else : ?>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
    <?php endif; ?>
    </div>
<?php endif; ?>
	<header id="main-header">
		<div class="container">
			<div class="row justify-content-center">
				<?php echo do_shortcode( '[site-identity]' ); ?>			
			</div>
			<div class="row justify-content-center">
			<?php
				wp_nav_menu([
					'menu'            => 'mainmenu',
					'theme_location'  => 'mainmenu',
				]);
			?>
			</div>
		</div>
	</header>
	<?php if (!is_front_page()) : ?>
		<?php 
		$banner_img = get_post_meta( get_the_ID(), '_seafood_banner_cover', true ); 
		$banner_mp4 = get_post_meta( get_the_ID(), '_seafood_banner_mp4', true ); 
		$banner_webm = get_post_meta( get_the_ID(), '_seafood_banner_webm', true ); 
		$banner_shortcode = get_post_meta( get_the_ID(), '_seafood_banner_shortcode', true ); 
		?>
		<section id="page-title" class="<?php if(@$seafood_options['sections-title-background-type'] == 1) echo @$seafood_options['sections-title-background'] . ' ';?><?php if(@$seafood_options['sections-title-color-type'] == 1) echo @$seafood_options['sections-title-color'];?>" <?php if ($banner_img) : ?>style="background-image:url(<?php echo $banner_img ?>)"<?php endif; ?>>
			<?php if ($banner_shortcode) : ?>
				<div class="shortcode-output"><?php echo do_shortcode( $banner_shortcode ); ?></div>
			<?php elseif ($banner_mp4 OR $banner_webm) : ?>
				<div class="video-output">
					<video id="banner-video" autoplay loop muted playsinline <?php if ($banner_img) : ?> style="background-image:url(<?php echo $banner_img ?>)" <?php endif; ?>>
					<?php if($banner_mp4) : ?>
						<source src="<?php echo $banner_mp4 ?>">
					<?php endif; ?>
					<?php if($banner_webm) : ?>
						<source src="<?php echo $banner_webm ?>">
					<?php endif; ?>
					</video>					
				</div>
			<?php endif; ?>
			<div class="content-wrap">
				<div class="container">
					<?php 
					if (is_home()) :
						$page_for_posts = get_option( 'page_for_posts' );
						$title = get_the_title($page_for_posts);
					elseif (is_404()) :
						$title = '404 Page';
					else :
						$title = get_the_title();
					endif; 
					?>
					<span class="heading"><?php echo $title ?></span>
				</div>
			</div>
		</section>
		<?php if (@$seafood_options['sections-breadcrumbs-option']) : ?>
		<section id="section-breadcrumbs" <?php if(@$seafood_options['sections-breadcrumbs-background-type'] == 1) echo 'class="'.@$seafood_options['sections-breadcrumbs-background'].'"';?>>
			<div class="content-wrap">
				<div class="container">
					<?php mos_breadcrumbs(); ?>
				</div>
			</div>
		</section>
		<?php endif; ?>
	<?php endif ?>