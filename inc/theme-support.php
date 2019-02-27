<?php
/*
	
@package achilles
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/
add_editor_style();
add_theme_support( 'automatic-feed-links' );
add_theme_support( "title-tag" );
$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
	$output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output );
}

$bg = get_option( 'background_image' );
if(@$bg == 1){
	add_theme_support( 'custom-background' );
}

$header = get_option( 'header_image' );
if(@$header == 1){
	$defaults = array(
		'default-image'          => '',
		'width'                  => 1080,
		'height'                 => 300,
		'flex-height'            => false,
		'flex-width'             => false,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );
}
add_theme_support( 'post-thumbnails' );


function achilles_register_nav_menu() {
	register_nav_menu( 'primary', 'Header Navigation Menu' );
	$second_menu = get_option( 'secondary_menu' );
	if(@$second_menu == 1){
		register_nav_menu( 'below_content', 'Menu Below Content' );
	}
}
add_action( 'after_setup_theme', 'achilles_register_nav_menu' );


/*
	========================
		BLOG LOOP CUSTOM FUNCTIONS
	========================
*/

function achilles_posted_meta(){
	$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );
	
	$author = '<a href="'. get_author_posts_url(get_the_author_meta("ID")) .'">'. get_the_author() .'</a>';

	$avatar = '<span class="img-avatar">' . get_avatar(get_the_author_meta("ID"), 15) . '</span>';
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	$i = 1;
	
	if( !empty($categories) ):
		foreach( $categories as $category ):
			if( $i > 1 ): $output .= $separator; endif;
			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( 'View all posts in%s', $category->name ) .'">' . esc_html( $category->name ) .'</a>';
			$i++; 
		endforeach;
	endif;
	//check output for / at the end without anything else
	$checkFooterSlash = $author . $avatar . ' / ' . $output;
	if($output == ''){
		$slash = '';
	}else{
		$slash = ' / ';
	}

	//Check if home posts meta are enabled
	$enabled_posts_home = esc_attr( get_option( 'meta_text_posts_home') );
	$checked_home = (@$enabled_posts_home == '1' ? 'checked' : '');
	if($checked_home){
		if(is_single() || is_page()){
			return;
		}else{
			return '<span class="posted-on">Posted <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> ago by '.$author.'</span> ' . $avatar  . $slash .' <span class="posted-in">' . $output . '</span>';
		}
	}
	//Check if posts meta are enabled
	$enabled_posts = esc_attr( get_option( 'meta_text_posts') );
	$checked = (@$enabled_posts == '1' ? 'checked' : '');
	if($checked){
		return '<span class="posted-on">Posted <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> ago by '.$author.'</span> ' . $avatar . $slash .' <span class="posted-in">' . $output . '</span>';
	}else{
		return;
	}

}

function achilles_posted_footer(){
	
	$comments_num = get_comments_number();
	if( comments_open() ){
		if( $comments_num == 0 ){
			$comments = __('No Comments' , 'achilles');
		} elseif ( $comments_num > 1 ){
			$comments= $comments_num . __(' Comments' , 'achilles');
		} else {
			$comments = __('1 Comment' , 'achilles');
		}
		$comments = '<a class="comments-link" href="' . get_comments_link() . '">'. $comments .' <span class="achilles-icon achilles-comment"></span></a>';
	} else {
		$comments = __('Comments are closed' , 'achilles');
	}

	return '<div class="post-footer-container col-xs-6"><div class="row"><div class="meta-tags-class"> '. get_the_tag_list('<div class="tags-list"><span class="icon achilles-price-tag"></span>', ' ', '</div>') .'</div><div class="icon achilles-bubble2">'. $comments .'</div></div></div>';
}

function achilles_get_attachment( $num = 1){
	$output = '';

	if( has_post_thumbnail() && $num == 1 ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	/*else:
		$attachments = get_posts( array( 
			'post_status' => null,
		    'post_type' => 'attachment', 
		    'post_mime_type' => 'image',
		    'numberposts' => $num,
		    'post_parent' => get_the_ID()

		) );
		if( $attachments && $num == 1 ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		elseif( $attachments && $num > 1 ):
			$output = $attachments;
		endif;
		*/
		wp_reset_postdata();
		
	endif;
       
	return $output;
}

function achilles_get_embedded_media( $type = array() ){
	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );
	
	if( in_array( 'audio' , $type) ):
		$output = str_replace( '?visual=true', '?visual=false', $embed[0] );
	else:
		$output = $embed[0];
	endif;
	
	return $output;
}

function achilles_grab_url(){
	$regex = '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i';

	if( !preg_match($regex, get_the_content(), $links )){
		return false;
	}

	return esc_url_raw( $links[1] );
}

function achilles_get_bs_slides( $attachments ){
	$output = array();
	$count = count($attachments)-1;
	
	for( $i = 0; $i <= $count; $i++ ): 
	
		$active = ( $i == 0 ? ' active' : '' );
		
		$n = ( $i == $count ? 0 : $i+1 );
		$nextImg = wp_get_attachment_thumb_url( $attachments[$n]->ID );
		$p = ( $i == 0 ? $count : $i-1 );
		$prevImg = wp_get_attachment_thumb_url( $attachments[$p]->ID );
		
		$output[$i] = array( 
			'class'		=> $active, 
			'url'		=> wp_get_attachment_url( $attachments[$i]->ID ),
			'next_img'	=> $nextImg,
			'prev_img'	=> $prevImg,
			'caption'	=> $attachments[$i]->post_excerpt
		);
	
	endfor;
	
	return $output;
	
}

function achilles_has_shortcode(){
	$post_to_check = get_post(get_the_ID());

	$found = false;
	$pattern = '/^\[[a-z]*/i';
	if(preg_match($pattern, get_the_content() ) ){
		$found = true;
	}

	return $found;
}

//Theme share social buttons
function share_social_links(){
	?>
	<div class="sharing-posts text-left">
		<?php
			$opt = esc_attr( get_option('facebook_share') );
			$opt_twitter = esc_attr( get_option('twitter_share') );
			$opt_reddit = esc_attr( get_option('reddit_share') );
			$opt_gplus = esc_attr(get_option('google_share'));
			$opt_pinterest = esc_attr(get_option('pinterest_share'));

			if($opt || $opt_twitter || $opt_reddit || $opt_gplus || $opt_pinterest){
				echo 'Share ';
			}

			if($opt){
				?>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title();?> target="_blank"" title="Share on Facebook.">
					<span class="icon achilles-facebook2"></span>
				</a>
				<?php
			}
			if($opt_twitter){
				?>
				<a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank">
					<span class="icon achilles-twitter"></span>
				</a>
				<?php
			}
			if($opt_gplus){
				?>
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">

					<span class="icon achilles-google-plus2"></span>
				</a>
				<?php
			}
			if($opt_reddit){
				?>
				<a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Vote on Reddit" target="_blank">
					<span class="icon achilles-reddit"></span>
				</a>
				<?php
			}
			if($opt_pinterest){
				?>
				<a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Vote on Reddit" target="_blank">
					<span class="icon achilles-pinterest"></span>
				</a>
				<?php
			}
		?>
	</div><!-- Sharing posts-->
	<?php
}

function share_social_right(){
	?>
	<div class="col-xs-6 text-right sharing-posts">
		<?php
			$opt = esc_attr( get_option('facebook_share') );
			$opt_twitter = esc_attr( get_option('twitter_share') );
			$opt_reddit = esc_attr( get_option('reddit_share') );
			$opt_gplus = esc_attr(get_option('google_share'));
			$opt_pinterest = esc_attr(get_option('pinterest_share'));

			if($opt || $opt_twitter || $opt_reddit || $opt_gplus || $opt_pinterest){
				echo 'Share ';
			}

			if($opt){
				?>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title();?> target="_blank"" title="Share on Facebook.">
					<span class="icon achilles-facebook2"></span>
				</a>
				<?php
			}
			if($opt_twitter){
				?>
				<a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank">
					<span class="icon achilles-twitter"></span>
				</a>
				<?php
			}
			if($opt_gplus){
				?>
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">

					<span class="icon achilles-google-plus2"></span>
				</a>
				<?php
			}
			if($opt_reddit){
					?>
					<a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Vote on Reddit" target="_blank">
						<span class="icon achilles-reddit"></span>
					</a>
					<?php
				}
			if($opt_pinterest){
				?>
				<a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Vote on Reddit" target="_blank">
					<span class="icon achilles-pinterest"></span>
				</a>
				<?php
			}
			?>
		</div><!-- Sharing posts-->

	<?php
}

function get_site_social_links(){
	//instagram, pinterest, youtube
	$opt_facebook = esc_attr( get_option( 'facebook_link' ) );
	$opt_twitter = esc_attr( get_option( 'twitter_link' ) );
	$opt_instagram = esc_attr( get_option( 'instagram_link' ) );
	$opt_pinterest = esc_attr( get_option( 'pinterest_link' ) );
	$opt_youtube = esc_attr( get_option( 'youtube_link' ) );
	$opt_googleplus = esc_attr( get_option( 'googleplus_link' ) );
	$opt_rss = esc_attr( get_option( 'rss_link' ) );

	?>
	<?php if($opt_facebook){ ?>
		<a href="http://facebook.com/<?php echo $opt_facebook;?>" alt="fb"><span class="icon achilles-facebook2"></span></a>
	<?php } ?>
	<?php if($opt_twitter){ ?>
		<a href="http://twitter.com/<?php echo $opt_twitter;?>" alt="twitter"><span class="icon achilles-twitter"></span></a>
	<?php } ?>
	<?php if($opt_instagram){ ?>
		<a href="https://www.instagram.com/<?php echo $opt_instagram;?>" alt="ig"><span class="icon achilles-instagram"></span></a>
	<?php } ?>
	<?php if($opt_pinterest){ ?>
		<a href="https://www.pinterest.com/<?php echo $opt_pinterest;?>" alt="pinterest">
		<span class="icon achilles-pinterest"></span>
		</a>
	<?php } ?>
	<?php if($opt_youtube){ ?>
		<a href="https://www.youtube.com/channel/<?php echo $opt_youtube;?>" alt="yt">
		<span class="icon achilles-youtube2"></span>
		</a>
		<!-- Need Youtube Icon img-->
	<?php } ?>
	<?php if($opt_github){ ?>
		<a href="<?php echo $opt_github;?>" alt="github"></a>
	<?php } ?>
	<?php if($opt_googleplus){ ?>
		<a href="https://plus.google.com/<?php echo $opt_googleplus;?>/posts" alt="googleplus"><span class="icon achilles-google-plus2"></a>
	<?php } ?>
	<?php if($opt_rss){ ?>
		<a href="<?php echo $opt_rss;?>" alt="rss"><span class="icon achilles-rss2"></span></a>
	<?php } ?>

	<?php
}


add_filter( 'use_default_gallery_style', '__return_false' );
?>