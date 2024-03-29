<?php 
global $seafood_options;
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
?>
  <footer id="footer" <?php if(@$seafood_options['sections-footer-background-type'] == 1) echo 'class="'.@$seafood_options['sections-footer-background'].'"';?>>
    <div class="content-wrap">
      <div class="container-fluid">
        <div class="row  justify-content-center">
          <div class="col-lg-11">
            <div class="row">
              <div class="col-lg-6">
                
                  <?php echo do_shortcode( '[site-identity]' ); ?> 
                  <div class="footer-main-address">                    
                    <?php echo do_shortcode( '[address index=1]' );?>
                  </div>     
                  <div class="footer-phone">
                  <strong class="footer-phone">Phone: </strong>
                    <?php echo do_shortcode( '[phone index=1]' );?>
                    <?php echo do_shortcode( '[phone index=2]' );?>
                    <?php echo do_shortcode( '[phone index=3]' );?>
                  </div>
                  <div class="footer-email">
                    <strong>Email: </strong>
                    <?php echo do_shortcode( '[email index=1]' );?>
                  </div>
                  <div class="footer-factory-address">
                    <?php echo do_shortcode( '[address index=2]' );?>
                  </div>
                  <div class="footer-phone">
                  <?php echo do_shortcode( '[phone offset=7]' );?>
                  </div>

              </div>
              <div class="col-lg-6 align-self-end">
                <?php
                wp_nav_menu([
                  'menu'            => 'footermenu',
                  'theme_location'  => 'footermenu',
                  'menu_class'      => 'footer-menu'
                ]);
                ?>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php
if ($seafood_options['misc-back-top']) :
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img width="40" height="40" src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" alt="Back To Top"></a>
    <?php 
    endif;
?>
<?php wp_footer(); ?> 
<?php if ($seafood_options['misc-settings-css']) : ?>
  <style>
    <?php echo $seafood_options['misc-settings-css'] ?>    
  </style>
<?php endif; ?>
<?php if ($seafood_options['misc-settings-js']) : ?>
  <script>
    <?php echo $seafood_options['misc-settings-js'] ?> 
  </script>
<?php endif; ?>
</body>
</html>