<?php
/**
 * The template for displaying archive (one column).
 * @link https://codex.wordpress.org/Template_Hierarchy
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
// $index = basename(__FILE__,".php");

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
 * 	Copy from original page template ([Parent]/template/content/singular.php) and modify it.
 * 	 - Remove get_sidebar() function call.
 * 	 - Adjust column width.
 * @reference (Uikit)
 * 	https://getuikit.com/docs/grid
 * @reference
 * 	[Child]/front-page.php
 * 	[Parent]/controller/layout.php
 * 	[Parent]/controller/render/column.php
 * 	[Parent]/controller/render/container.php
 * 	[Parent]/controller/render/grid.php
 * 	[Parent]/controller/render/section.php
 * 	[Parent]/inc/setup/constant.php
*/
?>
<!-- ====================
	<site-content>
 ==================== -->
<section<?php echo apply_filters("_property[section][content]",''); ?>>
<div id="content"<?php echo apply_filters("_property[container][content]",esc_attr('site-content')); ?><?php echo apply_filters("_attribute[container][content]",''); ?>>

	<!-- ====================
		<primary>
	 ==================== -->
	<main id="primary" class="site-main uk-width-1-1"<?php echo apply_filters("_attribute[column][primary]",''); ?>>
		<?php
		/**
		 * @reference (Uikit)
		 * 	https://getuikit.com/docs/height
		 * @reference (WP)
		 * 	Determines whether current WordPress query has posts to loop over.
		 * 	https://developer.wordpress.org/reference/functions/have_posts/
		 * 	Iterate the post index in the loop.
		 * 	https://developer.wordpress.org/reference/functions/the_post/
		 * 	Loads a template part into a template.
		 * 	https://developer.wordpress.org/reference/functions/get_template_part/
		 * 
		 * @reference
		 * 	[Child]/front-page.php
		 * 	[Child]/template-part/content-front.php
		 * 	[Parent]/template-part/content/content-none.php
		*/
		if(!have_posts()) :
			get_template_part(SLUG['content'] . 'content','none');
		endif;
		?>
		<div class="uk-grid-small uk-child-width-1-1@s uk-child-width-1-3@m uk-flex-center uk-height-match"<?php echo apply_filters("_attribute[grid]",''); ?>>
			<?php
			while(have_posts()) :	the_post();
				get_template_part('template-part/content/content','front');
			endwhile;
			?>
		</div><!-- .grid -->

		<?php
		/**
			@hooked
				_structure_archive::__the_pagination()
			@reference
				[Parent]/controller/structure/archive.php
		*/
		do_action(HOOK_POINT['primary']['append']);
		?>
	</main><!-- #primary -->

	<?php
	/**
	 * @since 1.0.1
	 * 	Unset get_sidebar() call for the one column view;
	 * 	// get_sidebar():
	*/
	?>
</div><!-- #content-->
</section>
