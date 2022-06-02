    <footer class="footer">
        <div class="footer-infobar block pt-5 pb-4 animate">
            <div class="container">
                <?php get_template_part('asset/footer/infobar'); ?>
            </div><!--/container -->
        </div><!--/footer-infobar -->
      
        <div class="footer-useful-link block py-5 animate">
            <div class="container">
                <?php get_template_part('asset/footer/useful-link'); ?>
            </div><!--/container -->
        </div><!--/footer-useful-link -->
        
        <div class="footer-copyright block py-5">
            <div class="container">
              <div class="row">
                <div class="col-sm-4 copyright">&copy; <?php echo bangla_number(date('Y')); ?> <?php bloginfo('name');?></div>
                <div class="col-sm-4 translator">
                    
                </div>
                <div class="col-sm-4 copyright">
                  <span class="back_to_top" style="display: none;"><i class="fas fa-arrow-alt-circle-up fa-2x"></i></span>
                </div>
              </div><!-- /row -->
            </div><!-- /container -->
         </div><!-- /footer-copyright -->
       
    </footer>
    <?php wp_footer(); ?>
    <script>
  (function($) {
    $(function() {
      $(".pagination .page-numbers").addClass("page-link");
      $(".pagination .page-numbers.current").parent().addClass("disabled");
      $("a").tooltip({ trigger: "hover"});
      $(document).tooltip({ selector: '[data-toggle="tooltip"]' });
      $(document).popover({ selector: '[data-toggle="popover"]' });
      
      /***************************************
	    	ajax like shot feature
	  ***************************************/
	  $(".like").stop().click(function(){

	  	  var rel = $(this).attr("rel");

		  var data = {
			  data: rel,
			  action: 'like_callback'
		  }
		  $.ajax({
			  action: "like_callback",
			  type: "GET",
			  dataType: "json",
			  url: ajaxurl,

			  data: data,
			  success: function(data){
              
				  console.log(data.likes);
				  console.log(data.status);
                  var enNumber = [0,1,2,3,4,5,6,7,8,9];
                  var bnNumber = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];

				  if(data.status == true){
					  $(".like[rel="+rel+"]").html('<i class="fas fa-thumbs-up"></i> ' + data.likes).addClass("text-primary");
				  }else{
					  $(".like[rel="+rel+"]").html('<i class="fas fa-thumbs-up"></i> ' + data.likes).removeClass("text-primary");
				  }

			  }
		  });

	  });
      
      /***************************************
	    	   ajax like ends here
	  ***************************************/
    
    });
  })(jQuery);
</script>
    <script>
        (function ( $ ) {
            $(window).scroll(function() {
            
                $(".animate, .card, .blog-post h2, .blog-post h3, .blog-post p, .bpu").each(function(){
                    var pos = $(this).offset().top;
                    var winTop = $(window).scrollTop();
                    if (pos < winTop + 600) {
                      $(this).addClass("slide-up");
                    }
                });
                
                if($(this).scrollTop()>100){
					$('.back_to_top').fadeIn();
					}
				else{
					$('.back_to_top').fadeOut();
					}
                
            });
            
            $('.back_to_top').click(function(){
				$('body,html').animate({scrollTop:0},800);
		    })
            
        })(jQuery);
    </script>
    <script>
        $(function () {
          var nua = navigator.userAgent
          var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
          if (isAndroid) {
            $('select.form-control').removeClass('form-control').css('width', '100%')
          }
        })
    </script>
    </div><!-- /wrapper -->
    </body>
</html>