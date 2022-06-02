    <footer class="footer">
        <div class="footer-nav block">
            <div class="container">
                <div class="nav-container">
                <?php $args = array(
                    'theme_location' => 'footer'
                    );
                ?>
                <?php wp_nav_menu( $args ); ?>
                </div><!--/nav-container -->
            </div><!--/container -->
        </div><!--/footer-nav -->
        
        <div class="footer-infobar block">
            <div class="container">
                <?php get_template_part('footer-infobar'); ?>
            </div><!--/container -->
        </div><!--/footer-infobar -->
        
        <div class="footer-copyright block">
            <div class="container">
                <div class="pull-left copyright">&copy; <?php echo bangla_number(date('Y')); ?> <?php bloginfo('name');?></div>
                <div class="pull-right copyright"><a href="#"><span class="glyphicon glyphicon-chevron-up go-top"></span></a></div>
            </div><!--/container -->
        </div><!--/footer-copyright -->
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>