<?php
// Get the video URL and put it in the $video variable
$videoID = get_post_meta($post->ID, 'video_url', true);
// Check if there is in fact a video URL
if ($videoID) {
	echo '<div class="videoContainer">';
	// Echo the embed code via oEmbed
	echo wp_oembed_get( 'http://www.youtube.com/watch?v=' . $videoID ); 
	echo '</div>';
}
?>