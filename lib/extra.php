<?php
/**
 * functions and definitions for the child theme.
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
	 * [CASE]
	 * 1. Apply one column template for front page.
	 * 
	 * @since 1.0.1
	 * 	Override the uikit section property in this child theme.
	 * @reference (Uikit)
	 * 	https://getuikit.com/docs/section
	 * @reference (WP)
	 * 	Fires before determining which template to load.
	 * 	https://developer.wordpress.org/reference/hooks/template_redirect/
	 * @reference
	 * 	[Child]/template/tailbar.php
	 * 	[Parent]/controller/render/section.php
	 * 	[Parent]/inc/setup/constant.php
	 * 	[Parent]/inc/utility/general.php
	 * 	[Parent]/template/header/header.php
	*/
	beans_add_smart_action('template_redirect',function()
	{
		/**
		 * @reference (Beans)
		 * 	Hooks a function or method to a specific filter action.
		 * 	https://www.getbeans.io/code-reference/functions/beans_add_filter/
		 * @reference (WP)
		 * 	Removes a callback function from a filter hook.
		 * 	https://developer.wordpress.org/reference/functions/remove_filter/
		*/
		remove_filter('_property[section][colophone]',['_render_section','__the_colophone'],PRIORITY['mid-low']);
		beans_add_filter('_property[section][colophone]',function()
		{
			$html = array(
				'class' => 'uk-section-secondary uk-section-xsmall uk-margin-remove-top'
			);
			echo ' ' . __utility_markup($html);
		});
	},99);


	/**
	 * [CASE]
	 * 1. Apply one column template for front page.
	 * 
	 * @since 1.0.1
	 * 	Apply css attribute for template-part file.
	 * @hook target
	 * 	_class[front][image][front-page]
	 * 	_class[front][header][front-page]
	 * 	_class[front][body][front-page]
	 * 
	 * @reference (Beans)
	 * 	Hooks a function or method to a specific filter action.
	 * 	https://www.getbeans.io/code-reference/functions/beans_add_filter/
	 * @reference (Uikit)
	 * 	https://getuikit.com/docs/padding
	 * 	https://getuikit.com/docs/position
	 * 	https://getuikit.com/docs/overlay
	 * 	https://getuikit.com/docs/transition
	 * @reference
	 * 	[Child]/template/front-page.php
	*/
	beans_add_filter("_class[front][image][front-page]",function(){
		echo 'uk-inline-clip uk-transition-toggle uk-padding-small';
	});

	beans_add_filter("_class[front][header][front-page]",function(){
		// echo 'uk-transition-slide-bottom uk-blend-darken uk-overlay uk-overlay-primary uk-position-bottom';
		echo 'uk-transition-slide-bottom uk-overlay uk-overlay-primary uk-position-bottom uk-light';
	});

	beans_add_filter("_class[front][body][front-page]",function(){
		// echo 'uk-padding uk-padding-remove-horizonal uk-padding-remove-left uk-position-relative';
		echo 'uk-padding';
	});
