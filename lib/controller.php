<?php
/**
 * Load and render required components.
 * @package Windmill Portfolio
 * @license GPL-3.0+
 * @since 1.0.1
*/

/**
 * Inspired by Beans Framework WordPress Theme
 * @link https://www.getbeans.io
 * @author Thierry Muller
 * 
 * Inspired by GK Portfolio WordPress Theme
 * @link https://www.gavick.com/wordpress-themes/portfolio,174.html
 * @author GavickPro
*/


/* Prepare
______________________________
*/

// If this file is called directly,abort.
if(!defined('WPINC')){die;}

// Set identifiers for this template.
$index = basename(__FILE__,'.php');

/**
 * @reference (WP)
 * 	Retrieves name of the current stylesheet.
 * 	https://developer.wordpress.org/reference/functions/get_stylesheet/
*/
// $theme = get_stylesheet();


/* Exec
______________________________
*/
?>
<?php
/**
 * [TOC]
 * 	the_post_thumbnail()
 * 	the_date()
 * 	the_title()
 * 	__utility_app_meta()
 * 	__utility_app_excerpt()
*/

	/**
	 * @reference (Beans)
	 * 	Set beans_add_action() using the callback argument as the action ID.
	 * 	https://www.getbeans.io/code-reference/functions/beans_add_smart_action/
	*/


	/**
	 * [CASE]
	 * 1. Apply one column template for front page.
	 * 
	 * @since 1.0.1
	 * 	Echo post thumbnail on front page of this child theme.
	 * @reference
	 * 	[Child]/template-part/content-front.php
	 * 	[Parent]/model/app/image.php
	*/
	beans_add_smart_action('windmill/content/front/image',function()
	{
		/**
		 * @since 1.0.1
		 * 	Beans API isn't available,use wp_get_attachment_image_attributes filter instead.
		 * @param (string) $size
		 * 	Image size.
		 * 	Accepts any registered image size name, or an array of width and height values in pixels (in that order).
		 * 	Default value: 'post-thumbnail'
		 * @reference (WP)
		 * 	Display the post thumbnail.
		 * 	https://developer.wordpress.org/reference/functions/the_post_thumbnail/
		*/
		the_post_thumbnail('medium');
	});


	/**
	 * [CASE]
	 * 1. Apply one column template for front page.
	 * 
	 * @since 1.0.1
	 * 	Echo post title on front page of this child theme.
	 * @reference
	 * 	[Child]/template-part/content-front.php
	*/
	beans_add_smart_action('windmill/content/front/header',function()
	{
		/**
		 * @reference (Uikit)
		 * 	https://getuikit.com/docs/article
		 * 	https://getuikit.com/docs/text
		 * 	https://getuikit.com/docs/utility
		 * @reference (WP)
		 * 	Display or Retrieve the date the current post was written (once per date)
		 * 	https://developer.wordpress.org/reference/functions/the_date/
		 * 	Display or retrieve the current post title with optional markup.
		 * 	https://developer.wordpress.org/reference/functions/the_title/
		*/
		the_date();
		the_title(sprintf('<h3 class="uk-article-title uk-text-large uk-text-nowrap uk-overflow-hidden"><a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a></h3>');
	});


	/**
	 * [CASE]
	 * 1. Apply one column template for front page.
	 * 
	 * @since 1.0.1
	 * 	Echo post meta on front page of this child theme.
	 * @reference
	 * 	[Child]/template-part/content-front.php
	 * 	[Parent]/inc/utility/theme.php
	 * 	[Parent]/model/app/meta.php
	*/
	beans_add_smart_action('windmill/content/front/header',function()
	{
		__utility_app_meta('cal-links');
	});


	/**
	 * [CASE]
	 * 1. Apply one column template for front page.
	 * 
	 * @since 1.0.1
	 * 	Echo post excerpt on front page of this child theme.
	 * @reference
	 * 	[Child]/template-part/content-front.php
	 * 	[Parent]/inc/utility/theme.php
	 * 	[Parent]/model/app/excerpt.php
	*/
	beans_add_smart_action('windmill/content/front/body',function()
	{
		// the_excerpt();
		__utility_app_excerpt();
	});
