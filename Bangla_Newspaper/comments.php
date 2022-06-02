<?php
/**
 *
 *  Comments themplate - Adapted Version of Kubrick's
 *
 *  There are 2 distinct sections after the protection area ::
 *  Display Comments is a loop surrounding the wp_list_comments() function
 *  The Form/Login section uses comment_form() to do everything
 *  ( Finally the RSS link is at the end of the page )
 *
 *  */
 
// ##########  Do not delete these lines
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
    die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p>
<?php
    return; }
// ##########  End do not delete section
 
// Display Comments Section
if ( have_comments() ) : ?>
<div class="col-md-2 left-sidebar comments">
  <h3><?php printf( _nx( 'One Comment', '%1$s টি মন্তব্য', get_comments_number(), 'comments title', 'textdomain' ), bangla_number( get_comments_number() ) ); ?></h3>
</div><!--/col-sm-7-->
<div class="col-md-6">
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
    ?>
    
      <!--/div>
</div>
<div class="col-md-4 blog-sidebar right-sidebar comments">
   <div class="">   
   </div>
</div> -->
<?php 
else : // I.E. There are no Comments ?>

<div class="col-md-2 left-sidebar comments">
  <h3 id="comments"><?php comments_number('কোনো মন্তব্য নেই', 'প্রতিক্রিয়া', '% Responses');?></h3>
</div><!--/col-sm-7-->
<div class="col-md-6">
  <div class="comments">
    <?php
    if ( comments_open() ) : // Comments are open, but there are none yet
        // echo"<p>Be the first to write a comment.</p>";
    else : // comments are closed
        echo"<p class='nocomments'>মন্তব্যসমূহ বন্ধ আছ</p>";
    endif;
endif;
 
 // Field Array
 $fields =  array(

  'author' => '<div class="input-group mb-3">' . 
    '<div class="input-group-prepend">' .
      '<span class="input-group-text"><i class="fas fa-user-tie"></i></span>' .
    '</div>' .
    '<label for="author" class="sr-only">' . __( 'Name', 'domainreference' ) . '</label> ' .
    '<input id="author" name="author" type="text" class="form-control"  placeholder="আপনার নাম কি?" aria-describedby="sizing-addon2" value="' . 
    esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' required />' .
    ( $req ? '<div class="input-group-append required">' .
    '<span class="input-group-text"><i class="fas fa-haykal fa-xs"></i></span>' .
    '</div>' : '' ) . '</div>',
    
  'email' => '<div class="input-group mb-3">' . 
    '<div class="input-group-prepend">' .
      '<span class="input-group-text"><i class="fas fa-at"></i></span>' .
    '</div>' .
    '<label for="email" class="sr-only">' . __( 'Email', 'domainreference' ) . '</label> ' .
    '<input id="email" name="email" type="email" class="form-control"  placeholder="Email" aria-describedby="sizing-addon2" value="' . 
    esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' required />' . 
    ( $req ?  '<div class="input-group-append required">' .
    '<span class="input-group-text"><i class="fas fa-haykal fa-xs"></i></span>' .
    '</div>' : '' ) . '</div>',
    
 /*
  'url' =>
    '<div class="input-group"><span class="glyphicon glyphicon-link input-group-addon" id="sizing-addon-url"></span>' . 
    '<label for="url" class="sr-only">' . __( 'Website', 'domainreference' ) . '</label>' . 
    '<input id="url" name="url" type="url" class="form-control" placeholder="http://domain.com/ (Optinal)" aria-describedby="sizing-addon2" value="' . 
    esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></div>',
 */
);

 // Default Args Array
 $args = array(
  'id_form'           => 'commentform',
  'class_form'      => 'comment-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit btn btn-light border border-primary',
  'name_submit'       => 'submit',
  'title_reply'       => __( 'আপনার মতামত প্রকাশ করুন' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel Reply' ),
  'label_submit'      => __( 'Post Comment' ),
  'format'            => 'xhtml',

  'comment_field' =>  '<div class="input-group mb-3">' . 
    '<div class="input-group-prepend">' .
      '<span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>' .
    '</div>' .
    '<label for="comment" class="sr-only">' . _x( 'Comment', 'noun' ) .
    '</label><input id="comment" name="comment" class="form-control"  placeholder="আপনার মন্তব্য লিখুন" required />' .
    ( $req ? '<div class="input-group-append required">' .
    '<span class="input-group-text"><i class="fas fa-haykal fa-xs"></i></span>' .
    '</div>' : '' ) . '</div>',

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

  'comment_notes_before' => '<p class="comment-notes">' .
    __( 'আপনার ই-মেইল গোপন থাকবে। <i class="fas fa-haykal fa-xs"></i> চিহ্নিত স্থান পূরণ করা আবশ্যক' ) . ( $req ? $required_text : '' ) .
    '</p>',

  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);
 
comment_form( $args, $post_id );

// RSS comments link
echo '<div class="comments_rss">';
comments_rss_link('আরএসএস ফিড মন্তব্য');
echo '</div>
  </div></div><!--/col-sm-7-->
<div class="col-md-4 blog-sidebar right-sidebar comments">
   <div class="">   
   </div>
</div><!--/col-sm-4-->';
 
?>


<script>
(function($) {
$(function() {
    

	$("#comment").blur(function(){
 
		if($(this).val() == '')
		{
            $(this).siblings('.input-group-prepend').children().css({"color": "#dc3545", "border": "1px solid #dc3545"});
			$(this).css('border','1px solid #dc3545');
            $(this).siblings('.input-group-append').html('<span class="input-group-text border border-danger"><i class="fas fa-exclamation-triangle fa-sm text-danger"></i></span>');			
		}
		else
		{
            $(this).siblings('.input-group-prepend').children().css({"color": "#28a745", "border": "1px solid #28a745"});
			$(this).css('border','1px solid #28a745');
            $(this).siblings('.input-group-append').html('<span class="input-group-text border border-success"><i class="fas fa-check fa-sm text-success"></i></span>');
			
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
            $(this).siblings('.input-group-prepend').children().css({"color": "#28a745", "border": "1px solid #28a745"});
			$(this).css('border','1px solid #28a745');
            $(this).siblings('.input-group-append').html('<span class="input-group-text border border-success"><i class="fas fa-check fa-sm text-success"></i></span>');
		} 
		else 
		{
            $(this).siblings('.input-group-prepend').children().css({"color": "#dc3545", "border": "1px solid #dc3545"});
			$(this).css('border','1px solid #dc3545');
            $(this).siblings('.input-group-append').html('<span class="input-group-text border border-danger"><i class="fas fa-exclamation-triangle fa-sm text-danger"></i></span>');
		}
	});
    
    $("#author").blur(function(){
 
		if($(this).val() == '')
		{
            $(this).siblings('.input-group-prepend').children().css({"color": "#dc3545", "border": "1px solid #dc3545"});
			$(this).css('border','1px solid #dc3545');
            $(this).siblings('.input-group-append').html('<span class="input-group-text border border-danger"><i class="fas fa-exclamation-triangle fa-sm text-danger"></i></span>');			
		}
		else
		{
            $(this).siblings('.input-group-prepend').children().css({"color": "#28a745", "border": "1px solid #28a745"});
			$(this).css('border','1px solid #28a745');
            $(this).siblings('.input-group-append').html('<span class="input-group-text border border-success"><i class="fas fa-check fa-sm text-success"></i></span>');
		}
	});
    
    $("#submit").click(function(){
		
		
		if($("#comment").val() == '')
		{
            $("#comment").siblings('.input-group-prepend').children().css({"color": "#dc3545", "border": "1px solid #dc3545"});
			$("#comment").css('border','1px solid #dc3545');
            $("#comment").siblings('.input-group-append').html('<span class="input-group-text border border-danger"><i class="far fa-check-circle fa-sm text-danger"></i></span>');
			return false;	
		}
		
		
		if($("#author").val() == '')
		{
            $("#author").siblings('.input-group-prepend').children().css({"color": "#dc3545", "border": "1px solid #dc3545"});
			$("#author").css('border','1px solid #dc3545');
            $("#author").siblings('.input-group-append').html('<span class="input-group-text border border-danger"><i class="far fa-check-circle fa-sm text-danger"></i></span>');
			return false;	
		}
		
	
		if($("#email").val() == '')
		{
            $("#email").siblings('.input-group-prepend').children().css({"color": "#dc3545", "border": "1px solid #dc3545"});
			$("#email").css('border','1px solid #dc3545');
            $("#email").siblings('.input-group-append').html('<span class="input-group-text border border-danger"><i class="far fa-check-circle fa-sm text-danger"></i></span>');
			return false;	
		}
		
		if($("#email").val() != '')
		{
			var email = $("#email").val();
			if (!validateEmail(email)) 
			{
            $("#email").siblings('.input-group-prepend').children().css({"color": "#dc3545", "border": "1px solid #dc3545"});
			$("#email").css('border','1px solid #dc3545');
            $("#email").siblings('.input-group-append').html('<span class="input-group-text border border-danger"><i class="far fa-check-circle fa-sm text-danger"></i></span>');
			return false;	
			} 
		}
		
				
	});
    
    

});
})(jQuery);
</script>