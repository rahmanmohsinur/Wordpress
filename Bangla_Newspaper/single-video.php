<?php
include 'asset/video/header.php'; ?>
<div class="container mt-3">
    <?php 
	if (have_posts()) :
        while (have_posts()) : the_post();
            setPostViews(get_the_ID()); 
            // Get the video URL and put it in the $video variable
            $videoID = get_post_meta($post->ID, 'video_url', true);
            // Check if there is in fact a video URL
            if ($videoID) { ?>
                <article  itemid="//www.youtube.com/embed/<?php echo $videoID; ?>" itemscope itemtype="http://schema.org/VideoObject">
                    <div class="row">
                        <div class="col-lg-8 mb-5 mr-auto">
                            <div id="printableArea" class="video-post">
                                <div class="embed-responsive embed-responsive-16by9 mt-2 mb-3">
                                    <iframe class="embed-responsive-item" src="//www.youtube-nocookie.com/embed/<?php echo $videoID; ?>?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowFullScreen></iframe> 
									<?php if ( has_post_thumbnail() ) { ?>
									    <img class="invisible" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large-thumbnail') ); ?>" style="height: 0 !important;" />
									<?php } ?> 
                                </div>
                                <link itemprop="url" href="https://www.youtube.com/watch?v=<?php echo $videoID; ?>">
                                <h1 itemprop="name" class="blog-post-title mt-4 mb-0" style="font-size: 1.7rem;"><?php the_title(); ?></h1>
                                <div  class="media mt-0 clearfix">
                                    <span class="py-2">
                                        <?php echo bangla_number((int) get_post_meta(get_the_ID(), 'post_views_count', true)) . ' দর্শন'; ?>
                                    </span>
                                    <div class="media-body">
                                        <div  class="like-button align-self-start">
                                        </div>
                                    </div>
                                    <span class="py-2 mr-4" style="cursor: pointer;">
                                        <a class="like" rel="<?php echo $post->ID; ?>"><i class="fas fa-thumbs-up"></i> <?php echo bangla_number(likeCount($post->ID)); ?></a>
                                    </span>
                                    <span class="">
                                        <?php include 'asset/hooks/share-video.php'; ?>
                                    </span>
                                </div>
                                <hr class="mt-1 mb-3" />
               
                                <div  class="media mb-4 clearfix">
                                    <div class="media-body">
                                        <h5 class="m-0" itemprop="author" itemscope itemtype="http://schema.org/Person">
                                            <?php
                                            $tags = get_the_tags();
                                            $separetor = " ";
                                            $output = '';
                                            if ($tags){
                                                foreach($tags as $tag) {
                                                    $output .= '<a itemprop="url" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' . $separetor;
                                                }
                                                echo trim($output, $separetor);
                                            }
                                            ?>
                                        </h5>
                                        <span class="text-secondary">প্রকাশকাল: <?php echo uniapps_article_published_date(); ?></span>
                                    </div>
                                </div>
                                <meta itemprop="description" content="<?php echo wp_trim_words( get_the_content(), 250, '' ); ?>" />
                                <div class="video-content blog-content">
                                    <meta itemprop="thumbnailUrl" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large-thumbnail') ); ?>" />
                                    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
                                        <link itemprop="url" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large-thumbnail') ); ?>">
                                        <?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large-thumbnail" ); ?>
                                        <meta itemprop="width" content="<?php echo $image_data[1]; ?>">
                                        <meta itemprop="height" content="<?php echo $image_data[2]; ?>">
                                    </span>
                                    <link itemprop="embedURL" href="https://www.youtube.com/embed/<?php echo $videoID; ?>">
                                    <meta itemprop="playerType" content="HTML5 Flash">
                                    <meta itemprop="width" content="1280">
                                    <meta itemprop="height" content="720">
                                    <meta itemprop="isFamilyFriendly" content="True">
                                    <meta itemprop="regionsAllowed" content="AD,AE,AF,AG,AI,AL,AM,AO,AQ,AR,AS,AT,AU,AW,AX,AZ,BA,BB,BD,BE,BF,BG,BH,BI,BJ,BL,BM,BN,BO,BQ,BR,BS,BT,BV,BW,BY,BZ,CA,CC,CD,CF,CG,CH,CI,CK,CL,CM,CN,CO,CR,CU,CV,CW,CX,CY,CZ,DE,DJ,DK,DM,DO,DZ,EC,EE,EG,EH,ER,ES,ET,FI,FJ,FK,FM,FO,FR,GA,GB,GD,GE,GF,GG,GH,GI,GL,GM,GN,GP,GQ,GR,GS,GT,GU,GW,GY,HK,HM,HN,HR,HT,HU,ID,IE,IL,IM,IN,IO,IQ,IR,IS,IT,JE,JM,JO,JP,KE,KG,KH,KI,KM,KN,KP,KR,KW,KY,KZ,LA,LB,LC,LI,LK,LR,LS,LT,LU,LV,LY,MA,MC,MD,ME,MF,MG,MH,MK,ML,MM,MN,MO,MP,MQ,MR,MS,MT,MU,MV,MW,MX,MY,MZ,NA,NC,NE,NF,NG,NI,NL,NO,NP,NR,NU,NZ,OM,PA,PE,PF,PG,PH,PK,PL,PM,PN,PR,PS,PT,PW,PY,QA,RE,RO,RS,RU,RW,SA,SB,SC,SD,SE,SG,SH,SI,SJ,SK,SL,SM,SN,SO,SR,SS,ST,SV,SX,SY,SZ,TC,TD,TF,TG,TH,TJ,TK,TL,TM,TN,TO,TR,TT,TV,TW,TZ,UA,UG,UM,US,UY,UZ,VA,VC,VE,VG,VI,VN,VU,WF,WS,YE,YT,ZA,ZM,ZW">
                                    <meta itemprop="interactionCount" content="<?php echo (int) get_post_meta(get_the_ID(), 'post_views_count', true); ?>">
                                    <meta itemprop="datePublished" content="<?php the_time('Y/m/d'); ?>">
                                    <meta itemprop="genre" content="Music">
                                    <?php $videoKeywords = get_post_meta($post->ID, 'video_keywords', true);
                                    if ($videoKeywords) { ?><meta itemprop="keywords" content="<?php echo $videoKeywords; ?>" /><?php } ?>
                    
                                    <div id="Collapsible" class="article-content">
                                        <?php the_content(); ?>
                                    </div>
                                    <div itemprop="author" itemscope itemtype="http://schema.org/Person">
                                        <meta itemprop="name" content="<?php the_author(); ?>" />
                                    </div>
                                </div><!-- /video-content -->  
                                <div id="btn-blg-ctn-open" class="py-2" style="cursor: pointer;">আরো প্রদর্শন করুন</div>
                                <footer class="article-footer clearfix">
                                    <div itemprop="interactionStatistic" itemscope itemtype="http://schema.org/InteractionCounter">
                                        <link itemprop="interactionType" href="http://schema.org/WatchAction"/>
                                        <meta itemprop="userInteractionCount" content="<?php echo (int) get_post_meta(get_the_ID(), 'post_views_count', true); ?>" />
                                    </div>
                                    <meta itemprop="uploadDate" content="<?php the_time('Y/m/d'); ?>"/>
                                    <?php comments_template('/asset/content/video-comments.php'); ?>
                                </footer><!-- /article-footer -->
                            </div><!--/blog-post-->
                        </div><!--/blog-main-->
                        <div class="col-lg-4 blog_sidebar">
                            <?php include 'asset/video/sidebar.php'; ?>
                        </div><!-- /blog-sidebar -->
                    </div><!-- /row -->
                </article>
            <?php 
            } 
        endwhile;
    else:
        echo '<p>No contant found.</p>';
    endif; ?>
</div><!--/container--> 
  
<script>
    (function($) {
        $(function() {
            $('body').delegate('#btn-blg-ctn-open', 'click', function(){
                $(".article-content").css('max-height', '100%');
                $(this).replaceWith('<div id="btn-blg-ctn-close" class="py-2" style="cursor: pointer;">কম প্রদর্শন করুন</div>');
            });
            $('body').delegate('#btn-blg-ctn-close', 'click', function(){
                $(".article-content").css('max-height', '3rem');
                $(this).replaceWith('<div id="btn-blg-ctn-open" class="py-2" style="cursor: pointer;">আরো প্রদর্শন করুন</div>');
            });
     
        });
    })(jQuery);
</script>

<?php get_footer(); ?>

