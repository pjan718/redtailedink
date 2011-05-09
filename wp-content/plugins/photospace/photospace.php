<?php
/*
Plugin Name: Photospace
Plugin URI: http://thriveweb.com.au/the-lab/wordpress-gallery-plugin-photospace-2/
Description: A image gallery plugin for WordPress built using Galleriffic. 
<a href="http://www.twospy.com/galleriffic/>galleriffic</a>
Author: Dean Oakley
Author URI: http://deanoakley.com/
Version: 2.1.4
*/

/*  Copyright 2010  Dean Oakley  (email : contact@deanoakley.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { 
	die('Illegal Entry');  
}

//============================== Photospace options ========================//
class photospace_plugin_options {

	function PS_getOptions() {
		$options = get_option('ps_options');
		
		if (!is_array($options)) {
			
			$options['use_paging'] = false;
			
			$options['enable_history'] = false;
			
			$options['num_thumb'] = '9';
			
			$options['use_hover'] = false;
			
			$options['show_captions'] = false;
			
			$options['show_download'] = false;
			
			$options['show_controls'] = false;
			
			$options['show_bg'] = false;
			
			$options['auto_play'] = false;			
			$options['delay'] = 3500;
			
			$options['button_size'] = 50;
			
			$options['hide_thumbs'] = false;
			
			$options['reset_css'] = false;
			
			$options['thumbnail_margin'] = 10;
			
			$options['thumbnail_width'] = 50;
			$options['thumbnail_height'] = 50;
			$options['thumbnail_crop'] = true;	
			
			$options['thumb_col_width'] = '181';	
			$options['main_col_width'] = '400';
			$options['main_col_height'] = '500';
			$options['gallery_width'] = '600';			
			
			update_option('ps_options', $options);
		}
		return $options;
	}

	function update() {
		if(isset($_POST['ps_save'])) {
			$options = photospace_plugin_options::PS_getOptions();
			
			$options['num_thumb'] = stripslashes($_POST['num_thumb']);
			$options['thumbnail_margin'] =  stripslashes($_POST['thumbnail_margin']);
			$options['thumbnail_width'] = stripslashes($_POST['thumbnail_width']);
			$options['thumbnail_height'] = stripslashes($_POST['thumbnail_height']);			
			
			
			$options['thumb_col_width'] = stripslashes($_POST['thumb_col_width']);
			$options['main_col_width'] = stripslashes($_POST['main_col_width']);
			$options['main_col_height'] = stripslashes($_POST['main_col_height']);
			
			$options['gallery_width'] = stripslashes($_POST['gallery_width']);
			
			$options['delay'] = stripslashes($_POST['delay']);
			
			$options['button_size'] = stripslashes($_POST['button_size']);

			if ($_POST['enable_history']) {
				$options['enable_history'] = (bool)true;
			} else {
				$options['enable_history'] = (bool)false;
			} 
			
			if ($_POST['use_paging']) {
				$options['use_paging'] = (bool)true;
			} else {
				$options['use_paging'] = (bool)false;
			} 
			
			if ($_POST['thumbnail_crop']) {
				$options['thumbnail_crop'] = (bool)true;
			} else {
				$options['thumbnail_crop'] = (bool)false;
			} 
			
			if ($_POST['show_controls']) {
				$options['show_controls'] = (bool)true;
			} else {
				$options['show_controls'] = (bool)false;
			} 
			
			if ($_POST['show_download']) {
				$options['show_download'] = (bool)true;
			} else {
				$options['show_download'] = (bool)false;
			} 
			
			if ($_POST['show_captions']) {
				$options['show_captions'] = (bool)true;
			} else {
				$options['show_captions'] = (bool)false;
			}
			
			if ($_POST['show_bg']) {
				$options['show_bg'] = (bool)true;
			} else {
				$options['show_bg'] = (bool)false;
			} 
					
			if ($_POST['use_hover']) {
				$options['use_hover'] = (bool)true;
			} else {
				$options['use_hover'] = (bool)false;
			}
			
			if ($_POST['auto_play']) {
				$options['auto_play'] = (bool)true;
			} else {
				$options['auto_play'] = (bool)false;
			}
			
			if ($_POST['hide_thumbs']) {
				$options['hide_thumbs'] = (bool)true;
			} else {
				$options['hide_thumbs'] = (bool)false;
			}
			
			if ($_POST['reset_css']) {
				$options['reset_css'] = (bool)true;
			} else {
				$options['reset_css'] = (bool)false;
			}			
			
			update_option('ps_options', $options);

		} else {
			photospace_plugin_options::PS_getOptions();
		}

		add_menu_page('Photospace options', 'Photospace Gallery Options', 'edit_themes', basename(__FILE__), array('photospace_plugin_options', 'display'));
	}
	

	function display() {
		
		$options = photospace_plugin_options::PS_getOptions();
		?>
		
		<div class="wrap">
		
			<h2>Photospace Options</h2>
			
			<form method="post" action="#" enctype="multipart/form-data">				

				<!-- Too buggy			
				<h3>Change photo on hover?</h3>
				<p><input name="use_hover" type="checkbox" value="checkbox" <?php if($options['use_hover']) echo "checked='checked'"; ?> /> Yes </p>
				<br />-->
				
				<div class="wp-menu-separator" style="clear:both; padding-bottom:15px; border-bottom:solid 1px #e6e6e6" ></div>
				
				<h3><label><input name="show_download" type="checkbox" value="checkbox" <?php if($options['show_download']) echo "checked='checked'"; ?> /> Show download link</label></h3>			
				
				<h3><label><input name="show_controls" type="checkbox" value="checkbox" <?php if($options['show_controls']) echo "checked='checked'"; ?> /> Show controls (play slide show / Next Prev image links)</label></h3>			
				
				<h3><label><input name="use_paging" type="checkbox" value="checkbox" <?php if($options['use_paging']) echo "checked='checked'"; ?> /> Use paging </label></h3>			
				
				<h3><label><input name="enable_history" type="checkbox" value="checkbox" <?php if($options['enable_history']) echo "checked='checked'"; ?> /> Enable history </label></h3>			
				
				
				<h3><label><input name="show_captions" type="checkbox" value="checkbox" <?php if($options['show_captions']) echo "checked='checked'"; ?> /> Show Title / Caption / Desc under image</label></h3>
				
				<h3><label><input name="reset_css" type="checkbox" value="checkbox" <?php if($options['reset_css']) echo "checked='checked'"; ?> /> Try to clear current theme image css / formating</label></h3>


				<h3><label><input name="show_bg" type="checkbox" value="checkbox" <?php if($options['show_bg']) echo "checked='checked'"; ?> /> Show background colours for layout testing</label></h3>
				
				
				
				<div style="clear:both; padding-bottom:15px; border-bottom:solid 1px #e6e6e6" ></div>
				
				<div style="width:25%;float:left;">		
					<h3><label><input name="auto_play" type="checkbox" value="checkbox" <?php if($options['auto_play']) echo "checked='checked'"; ?> /> Auto play slide show</label></h3>
				</div>
				<div style="width:25%;float:left;">		
					<h3><label><input name="hide_thumbs" type="checkbox" value="checkbox" <?php if($options['hide_thumbs']) echo "checked='checked'"; ?> /> Hide thumbnails</label></h3>
				</div>
				<div style="width:25%;float:left;">		
					<h3>Slide delay in milliseconds</h3>
					<p><input type="text" name="delay" value="<?php echo($options['delay']); ?>" /></p>
				</div>
				
				<div style="width:25%;float:left;">		
					<h3>Page button size</h3>
					<p><input type="text" name="button_size" value="<?php echo($options['button_size']); ?>" /></p>
				</div>		 			


				
				<div style="clear:both; padding-bottom:15px; border-bottom:solid 1px #e6e6e6" ></div>
				
				<h3 style="font-style:italic" >Images that are already on the server will not change size until you regenerage the thumbnails. Use <a title="http://wordpress.org/extend/plugins/ajax-thumbnail-rebuild/" href="http://wordpress.org/extend/plugins/ajax-thumbnail-rebuild/">AJAX thumbnail rebuild</a> (recommended) or <a title="http://wordpress.org/extend/plugins/regenerate-thumbnails/" href="http://wordpress.org/extend/plugins/regenerate-thumbnails/">Regenerate Thumbnails</a> (easier)</h3>

				<div style="width:25%;float:left;">				
					<h3>Thumbnail Width</h3>
					<p><input type="text" name="thumbnail_width" value="<?php echo($options['thumbnail_width']); ?>" /></p>
				</div>
				
				<div style="width:25%; float:left;">				
					<h3>Thumbnail Height</h3>
					<p><input type="text" name="thumbnail_height" value="<?php echo($options['thumbnail_height']); ?>" /></p>
				</div>
				
				<div style="width:25%; float:left">
					<h3>Main image width</h3>
					<p><input type="text" name="main_col_width" value="<?php echo($options['main_col_width']); ?>" /></p>
				</div>
				
				<div style="width:25%; float:left">
					<h3>Main image height</h3>
					<p><input type="text" name="main_col_height" value="<?php echo($options['main_col_height']); ?>" /></p>
				</div>
				
				<div style="width:25%; float:left;">
					<h3>Crop thumnails</h3>
					<h3><label><input name="thumbnail_crop" type="checkbox" value="checkbox" <?php if($options['thumbnail_crop']) echo "checked='checked'"; ?> /></label></h3>

				</div>				

				<div style="clear:both; padding-bottom:15px; border-bottom:solid 1px #e6e6e6" ></div>
				
				<div style="width:25%;float:left;">		
					<h3>Number of thumbnails</h3>
					<p><input type="text" name="num_thumb" value="<?php echo($options['num_thumb']); ?>" /></p>
				</div>
					
				
				<div style="width:25%; float:left;">				
					<h3>Thumbnail column width</h3>
					<p><input type="text" name="thumb_col_width" value="<?php echo($options['thumb_col_width']); ?>" /></p>
				</div>
				
				<div style="width:25%; float:left;">				
					<h3>Thumbnail margin</h3>
					<p><input type="text" name="thumbnail_margin" value="<?php echo($options['thumbnail_margin']); ?>" /></p>
				</div>
				
				
				<div style="clear:both; padding-bottom:15px; border-bottom:solid 1px #e6e6e6" ></div>
				
				
				
				<h3>Gallery width (at least Thumbnail column + Main image width)</h3>
				<p><input type="text" name="gallery_width" value="<?php echo($options['gallery_width']); ?>" /></p>
				<br />
			
				<p><input class="button-primary" type="submit" name="ps_save" value="Save Changes" /></p>
			
			</form>
	
		</div>
		
		<?php
	} 
} 

function PS_getOption($option) {
    global $mytheme;
    return $mytheme->option[$option];
}

// register functions
add_action('admin_menu', array('photospace_plugin_options', 'update'));

$options = get_option('ps_options');

add_theme_support( 'post-thumbnails' );
add_image_size('photospace_thumbnails', $options['thumbnail_width'], $options['thumbnail_height'], $options['thumbnail_crop']);
add_image_size('photospace_full', $options['main_col_width'], $options['main_col_height']);

//============================== insert HTML header tag ========================//

wp_enqueue_script('jquery');

$photospace_wp_plugin_path = get_option('siteurl')."/wp-content/plugins/photospace";

wp_enqueue_style( 'photospace-styles', 	$photospace_wp_plugin_path . '/gallery.css');
if ($options['enable_history']) {											  
	wp_enqueue_script( 'history', 	$photospace_wp_plugin_path . '/jquery.history.js');
}
wp_enqueue_script( 'galleriffic', 		$photospace_wp_plugin_path . '/jquery.galleriffic.js');
wp_enqueue_script( 'opacityrollover', 	$photospace_wp_plugin_path . '/jquery.opacityrollover.js');



add_action( 'wp_head', 'photospace_wp_headers', 10 );

function photospace_wp_headers() {
	
	$options = get_option('ps_options');
	
	echo "<!--	photospace [ START ] --> \n";
	
	echo '<style type="text/css">'; 
	
	if($options['reset_css']){ 
	
		echo '
			/* reset */ 
			.photospace img,
			.photospace ul.thumbs,
			.photospace ul.thumbs li,
			.photospace ul.thumbs li a{
				padding:0;
				margin:0;
				border:none !important;
				background:none !important;
				height:auto !important;
				width:auto !important;
			}
			.photospace span{
				padding:0; 
				margin:0;
				border:none !important;
				background:none !important;
			}
			';
	}
	
	if(!empty($options['button_size']))
		echo '
			.photospace .thumnail_col a.pageLink {
				width:'.$options['button_size'] .'px;
				height:'.$options['button_size'] .'px;
			}
		';		
	
	if(!empty($options['thumb_col_width']))
		echo '	.photospace .thumnail_col{
					width:'. $options['thumb_col_width'] .'px;
				}
		';	
	
	if(!empty($options['main_col_width']))
		echo '	.photospace .gal_content,
				.photospace .loader,
				.photospace .slideshow a.advance-link{
					width:'. $options['main_col_width'] .'px;
				}
		';

	if(!empty($options['gallery_width']))
		echo '	.photospace{
					width:'. $options['gallery_width'] .'px;
				}
		';
		
	if(!empty($options['main_col_height']))
		echo '	.photospace{
					height:'. $options['main_col_height'] .'px;
				}
		';
		
	if(!empty($options['thumbnail_margin']))
		echo '	.photospace ul.thumbs li {
					margin-bottom:'. $options['thumbnail_margin'] .'px !important;
					margin-right:'. $options['thumbnail_margin'] .'px !important; 
				}
		';
	
	if(!empty($options['main_col_height']))
		echo '	.photospace .loader {
					height: '. $options['main_col_height'] / 2 . 'px;
				}
		';
		
	if(!empty($options['main_col_width']))
		echo '	.photospace .loader {
					width: '. $options['main_col_width'] . 'px;
				}
		';

	if(!empty($options['main_col_height']))
		echo '	.photospace .slideshow a.advance-link,
				.photospace .slideshow span.image-wrapper {
					height:'. $options['main_col_height'] .'px;
				}
		';
		
	if(!empty($options['main_col_height']))
		echo '	.photospace .slideshow-container {
					height:'. $options['main_col_height'] .'px;
				}
		';
			
	if($options['show_bg']){ 
	
		echo '
			.photospace{
				background-color:#fbefd7;
			}
			
			.photospace .thumnail_col {
				background-color:#e7cf9f;
			}
			
			.photospace .gal_content,
			.photospace .loader,
			.photospace .slideshow a.advance-link {
				background-color:#e7cf9f;
			}'; 
	}
	
	if($options['hide_thumbs']){ 
		echo '
			.photospace .thumnail_col{
				display:none !important;
			}
		'; 
	}
	if($options['use_paging']){ 
		echo '
			.pageLink{
				display:none !important;
			}
			.photospace{
				margin-top:43px;
			}
		'; 
	}

	echo '</style>'; 
			
	echo "<!--	photospace [ END ] --> \n";
}



add_shortcode( 'photospace', 'photospace_shortcode' );
function photospace_shortcode( $atts ) {
	
	global $post;
	$options = get_option('ps_options');
	
	extract(shortcode_atts(array(
		'id' 				=> intval($post->ID),
		'num_thumb' 		=> $options['num_thumb'],
		'num_preload' 		=> $options['num_thumb'],
		'show_captions' 	=> $options['show_captions'],
		'show_download' 	=> $options['show_download'],
		'show_controls' 	=> $options['show_controls'],
		'auto_play' 		=> $options['auto_play'],
		'delay' 			=> $options['delay'],
		'hide_thumbs' 		=> $options['hide_thumbs'],
		'use_paging' 		=> $options['use_paging'],
		'horizontal_thumb' 	=> 0,
		'include'    => '',
		'exclude'    => ''
	), $atts));
	
	$post_id = intval($post->ID);

	if($hide_thumbs){
		$hide_thumb_style = 'hide_me';
	}
	
	$thumb_style_init = 'display:none';
	$thumb_style_on  = "'display', 'block'";
	$thumb_style_off  = "'display', 'none'";

	
	$photospace_wp_plugin_path = get_option('siteurl')."/wp-content/plugins/photospace";
	
	$output_buffer ='
	
		<div class="gallery_clear"></div> 
		<div id="gallery_'.$post_id.'" class="photospace"> 
	
			<!-- Start Advanced Gallery Html Containers -->
			<div class="thumbs_wrap2">
				<div class="thumbs_wrap">
					<div id="thumbs_'.$post_id.'" class="thumnail_col '. $hide_thumb_style . '" >
						';
						
						if($horizontal_thumb){ 		
								$output_buffer .='<a class="pageLink prev" style="'. $thumb_style_init . '" href="#" title="Previous Page"></a>';
						}
						
						$output_buffer .=' 
						<ul class="thumbs noscript">				
						';
													
						if ( !empty($include) ) { 
							$include = preg_replace( '/[^0-9,]+/', '', $include );
							$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'asc', 'orderby' => 'menu_order') );
					
							$attachments = array();
							foreach ( $_attachments as $key => $val ) {
								$attachments[$val->ID] = $_attachments[$key];
							}
						} elseif ( !empty($exclude) ) {
							$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
							$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'asc', 'orderby' => 'menu_order') );
						} else {
							$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'asc', 'orderby' => 'menu_order') );
						}
		
						if ( !empty($attachments) ) {
							foreach ( $attachments as $aid => $attachment ) {
								$img = wp_get_attachment_image_src( $aid , 'photospace_full');
								$thumb = wp_get_attachment_image_src( $aid , 'photospace_thumbnails');
								$full = wp_get_attachment_image_src( $aid , 'full');
								$_post = & get_post($aid); 
		
								$image_title = attribute_escape($_post->post_title);
								$image_alttext = get_post_meta($aid, '_wp_attachment_image_alt', true);
								$image_caption = $_post->post_excerpt;
								$image_description = $_post->post_content;						
															
								$output_buffer .='
									<li><a class="thumb" href="' . $img[0] . '" >								
											<img src="' . $thumb[0] . '" alt="' . $image_alttext . '" title="' . $image_title . '" />
										</a>
										';
		
										$output_buffer .='
										<div class="caption">
											';
											if($show_captions){ 	
												
												$output_buffer .='
												<div class="image-caption">' .  $image_caption . '</div>
												<div class="image-desc">' .  $image_description . '</div>
												';
											}
											
											if($show_download){ 		
												$output_buffer .='
												<div class="download"><a href="'.$full[0].'">Download Original</a></div>
												';
											}
											
										$output_buffer .='
										</div>
										';
										
										
									$output_buffer .='
									</li>
								';
								} 
							} 
							
						$output_buffer .='
						</ul>';
		
						
						if(!$horizontal_thumb){ 		
								$output_buffer .='
								<div class="gallery_clear"></div>
								<a class="pageLink prev" style="'.$thumb_style_init.'" href="#" title="Previous Page"></a>';
						}
						
						$output_buffer .='
						<a class="pageLink next" style="'.$thumb_style_init.'" href="#" title="Next Page"></a>
					</div>
				</div>
			</div>
			
			<!-- Start Advanced Gallery Html Containers -->
			<div class="gal_content">
				';
				
				if($show_controls){ 
					$output_buffer .='<div id="controls_'.$post_id.'" class="controls"></div>';
				}
				
				$output_buffer .='
				<div class="slideshow-container">
					<div id="loading_'.$post_id.'" class="loader"></div>
					<div id="slideshow_'.$post_id.'" class="slideshow"></div>
					<div id="caption_'.$post_id.'" class="caption-container"></div>
				</div>
				
			</div>
	
	</div>
	
	<div class="gallery_clear"></div>
	
	';
	
	$output_buffer .= "
	
	<script type='text/javascript'>
			
			jQuery(document).ready(function($) {
				
				// We only want these styles applied when javascript is enabled
				$('.gal_content').css('display', 'block');
		
				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs_".$post_id." ul.thumbs li, .thumnail_col a.pageLink').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});	
				
				// Initialize Advanced Galleriffic Gallery 
				var gallery = $('#thumbs_".$post_id."').galleriffic({ 
					delay:                     " . intval($delay) . ",
					numThumbs:                 " . intval($num_thumb) . ",
					preloadAhead:              " . intval($num_preload) . ",
					enableTopPager:            " . intval($use_paging) . ",
					enableBottomPager:         false,
					imageContainerSel:         '#slideshow_".$post_id."',
					controlsContainerSel:      '#controls_".$post_id."',
					captionContainerSel:       '#caption_".$post_id."',  
					loadingContainerSel:       '#loading_".$post_id."',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          '&rsaquo;',
					prevPageLinkText:          '&lsaquo;',
					enableHistory:              " . intval($options['enable_history']) . ",
					autoStart:                 	" . intval($auto_play) . ",
					enableKeyboardNavigation:	true,
					syncTransitions:           	true,
					defaultTransitionDuration: 	300,
						
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onTransitionOut:           function(slide, caption, isSync, callback) {
						slide.fadeTo(this.getDefaultTransitionDuration(isSync), 0.0, callback);
						caption.fadeTo(this.getDefaultTransitionDuration(isSync), 0.0);
					},
					onTransitionIn:            function(slide, caption, isSync) {
						var duration = this.getDefaultTransitionDuration(isSync);
						slide.fadeTo(duration, 1.0);
	
						// Position the caption at the bottom of the image and set its opacity
						var slideImage = slide.find('img');
						caption.width(slideImage.width())
							.css({
								//'bottom' : Math.floor((slide.height() - slideImage.outerHeight()) / 2 - 40),
								'top' : slideImage.outerHeight(),
								'left' : Math.floor((slide.width() - slideImage.width()) / 2) + slideImage.outerWidth() - slideImage.width()
							})
							.fadeTo(1000, 1.0);
						
					},
					onPageTransitionOut:       function(callback) {
						this.hide();
						setTimeout(callback, 100); // wait a bit
					},
					onPageTransitionIn:        function() {
						var prevPageLink = this.find('a.prev').css(".$thumb_style_off.");
						var nextPageLink = this.find('a.next').css(".$thumb_style_off.");
						
						// Show appropriate next / prev page links
						if (this.displayedPage > 0)
							prevPageLink.css(".$thumb_style_on.");
		
						var lastPage = this.getNumPages() - 1;
						if (this.displayedPage < lastPage)
							nextPageLink.css(".$thumb_style_on.");
		
						this.fadeTo('fast', 1.0);
					},
					onImageAdded: function(imageData, li) {
						_li.opacityrollover({
							mouseOutOpacity:   onMouseOutOpacity,
							mouseOverOpacity:  1.0,
							fadeSpeed:         'fast',
							exemptionSelector: '.selected'
						});
					}
					
				}); 
				
				";
				
				if ($options['enable_history']) {	
					
					$output_buffer .= "
						
						/**** Functions to support integration of galleriffic with the jquery.history plugin ****/
		 
						// PageLoad function
						// This function is called when:
						// 1. after calling $.historyInit();
						// 2. after calling $.historyLoad();
						// 3. after pushing Go Back button of a browser
						function pageload(hash) {
							// alert('pageload: ' + hash);
							// hash doesn't contain the first # character.
							if(hash) {
								$.galleriffic.gotoImage(hash);
							} else {
								gallery.gotoIndex(0);
							}
						}
		 
						// Initialize history plugin.
						// The callback is called at once by present location.hash. 
						$.historyInit(pageload, 'advanced.html');
		 
						// set onlick event for buttons using the jQuery 1.3 live method
						$('a[rel=history]').live('click', function(e) {
							if (e.button != 0) return true;
							
							var hash = this.href;
							hash = hash.replace(/^.*#/, '');
		 
							// moves to a new page. 
							// pageload is called at once.  
							$.historyLoad(hash);
		 
							return false;
						});
		 
						/****************************************************************************************/
						
						
						";
				}
				
			if($use_hover){ 		
		 
				$output_buffer .= "
					gallery.find('a.thumb').hover(function(e) {
						gallery.clickHandler(e, this);
					});
				";
		
			} 
					
				
			$output_buffer .= "
				
				/**************** Event handlers for custom next / prev page links **********************/
		
				gallery.find('a.prev').click(function(e) {
					gallery.previousPage();
					e.preventDefault();
				});
		
				gallery.find('a.next').click(function(e) {
					gallery.nextPage(); 
					e.preventDefault();
				});
		
			});
		</script>
		
		";
		
		return $output_buffer;
}