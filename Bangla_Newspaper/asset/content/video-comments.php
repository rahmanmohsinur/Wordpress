<?php
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
    die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p>
<?php
    return; }
// ##########  End do not delete section

 // Field Array
 $fields =  array(

  'author' => 
    '<label for="author" class="sr-only">' . __( 'Name', 'domainreference' ) . '</label> ' .
    '<input id="author" name="author" type="text" class="form-control mb-3"  placeholder="আপনার নাম কি?" aria-describedby="sizing-addon2" value="' . 
    esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' required />',
    
  'email' => 
    '<label for="email" class="sr-only">' . __( 'Email', 'domainreference' ) . '</label> ' .
    '<input id="email" name="email" type="email" class="form-control mb-1"  placeholder="Email" aria-describedby="sizing-addon2" value="' . 
    esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' required />',
   
);

 // Default Args Array
 $args = array(
  'id_form'           => 'commentform',
  'class_form'      => 'comment-form video-comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit btn btn-light text-white',
  'name_submit'       => 'submit',
  'title_reply'       => __( '' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel Reply' ),
  'label_submit'      => __( 'Post Comment' ),
  'format'            => 'xhtml',

  'comment_field' =>  
    '<label for="comment" class="sr-only">' . _x( 'Comment', 'noun' ) . '</label>' .
    '<input id="comment" name="comment" class="form-control mb-3"  placeholder="আপনার মন্তব্য লিখুন" required />',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'মন্তব্য লিখতে <a href="%s">লগইন করুন</a>' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'আপনি <a href="%1$s">%2$s</a> নামে লগ ইন আছেন। <a href="%3$s" title="লগ আউট করুন">লগ আউট?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '',

  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);
 
comment_form( $args, $post_id );


// Display Comments Section
if ( have_comments() ) : ?>
  <h3><?php printf( _nx( 'One Comment', '%1$s টি মন্তব্য', get_comments_number(), 'comments title', 'textdomain' ), bangla_number( get_comments_number() ) ); ?></h3>
  <div class="comments">
        <div class="navigation">
            <div class="alignleft"><?php previous_comments_link() ?></div>
            <div class="alignright"><?php next_comments_link() ?></div>
        </div>
    <ol class="commentlist">
     <?php
     wp_list_comments(array(
      // see http://codex.wordpress.org/Function_Reference/wp_list_comments
         'login_text'        => 'রিপ্লে করতে লগইন করুন',
      // 'callback'          => null,
      // 'end-callback'      => null,
      // 'type'              => 'all',
      // 'avatar_size'       => 32,
      // 'reverse_top_level' => null,
      // 'reverse_children'  =>
      ));
      ?>
    </ol>
        <div class="navigation">
            <div class="alignleft"><?php previous_comments_link() ?></div>
            <div class="alignright"><?php next_comments_link() ?></div>
        </div>
    <?php
    if ( ! comments_open() ) : // There are comments but comments are now closed
        echo"<p class='nocomments'>মন্তব্যসমূহ বন্ধ আছে</p>";
    endif;
else : // I.E. There are no Comments ?>

  <h3 id="comments"><?php comments_number('কোনো মন্তব্য নেই', 'প্রতিক্রিয়া', '% Responses');?></h3>

  <div class="comments">
    <?php
    if ( comments_open() ) : // Comments are open, but there are none yet
        // echo"<p>Be the first to write a comment.</p>";
    else : // comments are closed
        echo"<p class='nocomments'>মন্তব্যসমূহ বন্ধ আছ</p>";
    endif;
endif;
echo '</div><!-- /comments -->';
 
?>


<script>
  (function($) {
    $(function() {
    
    $("#comment").keyup(function(){
        if($(this).val() != '')
		{
            $("#submit").removeClass("btn-light text-white").addClass("btn-primary");
        }
		else
		{
            $("#submit").removeClass("btn-primary").addClass("btn-light text-white");
        }
    });
    
	$("#comment").blur(function(){
 
		if($(this).val() == '')
		{
            $(this).attr("placeholder", "মন্তব্য লিখতে হবে");
            $(this).css('border-color','#dc3545');
        }
		else
		{
            $(this).css('border-color','#28a745');
        }
	});
    
    //regex to validate email
    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
    $("#email").blur(function(){
		var email = $("#email").val();
		if (validateEmail(email)) 
		{
            $(this).css('border-color','#28a745');
        } 
		else 
		{
            $(this).attr("placeholder", "সঠিক ইমেইল এড্রেস প্রদান করুন");
            $(this).css('border-color','#dc3545');
        }
	});
    
    $("#author").blur(function(){
 
		if($(this).val() == '')
		{
            $(this).attr("placeholder", "আপনার নাম আবশ্যক");
            $(this).css('border-color','#dc3545');
        }
		else
		{
            $(this).css('border-color','#28a745');
        }
	});
    
    $("#submit").click(function(){
		
		if($("#comment").val() == '')
		{
            $("#comment").css('border-color','#dc3545');
            return false;	
		}
		
		
		if($("#author").val() == '')
		{
            $("#author").css('border-color','#dc3545');
            return false;	
		}
		
	
		if($("#email").val() == '')
		{
            $("#email").css('border-color','#dc3545');
            return false;	
		}
		
		if($("#email").val() != '')
		{
			var email = $("#email").val();
			if (!validateEmail(email)) 
			{
            $("#email").css('border-color','#dc3545');
            return false;	
			} 
		}		
	  });
      
      
    });
  })(jQuery);
</script>
<style>
  .article-content {
    -webkit-transition: max-height .35s; 
  -moz-transition: max-height .35s; 
  -ms-transition: max-height .35s; 
  -o-transition: max-height .35s; 
  transition: max-height .35s;
    transition: max-height 0.3s ease-in-out;
    max-height: 3rem;
    overflow: hidden !important;
  }
  .form-submit {
    text-align: right;
  }
  .video-comment-form .form-control {
    border-radius: 0;
    border-top: 0;
    border-right: 0;
    border-left: 0;
    padding-right: 0;
    padding-left: 0;
  }
  .video-comment-form .form-control:focus {
    box-shadow: none;
  }
</style>


