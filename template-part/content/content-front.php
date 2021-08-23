<?php
/**
 * Template part for displaying posts.
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
$index = str_replace(substr(basename(__FILE__,".php"),0,8),'',basename(__FILE__,".php"));

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
 * 	Copy from original page template ([Parent]/template-part/content/content-page.php) and modify it.
 * 	 - Set "uk-card" and "uk-margin" to post_class() for always card grid displaying.
 * 	 - Set "uk-card-xxx" properties to each sections.
 * @reference (Uikit)
 * 	https://getuikit.com/docs/card
 * @reference
 * 	[Child]/template/singular.php
 * 	[Parent]/inc/setup/constant.php
 * 	[Parent]/model/data/css.php
 * 	[Parent]/model/data/schema.php
 * 	[Parent]/template-part/content/content-page.php
*/
?>
<!-- ====================
	<article>
 ==================== -->
<article id="post-<?php the_ID(); ?>" <?php post_class('uk-card uk-card-default uk-margin-remove-top uk-margin-medium-bottom'); ?>>

	<div class="<?php echo apply_filters("_class[front][image][front-page]",esc_attr('uk-card-media')); ?>" tabindex="0">
		<?php
		/**
			@hooked
				Closure()
			@reference
				[Child]/lib/controller.php
		*/
		do_action("windmill/content/front/image");
		?>

		<div class="<?php echo apply_filters("_class[front][header][front-page]",esc_attr('uk-card-header')); ?>">
			<?php
			/**
				@hooked
					_fragment_meta::__the_card()
					_fragment_title::__the_card()
				@reference
					[Child]/lib/controller.php
					[Parent]/controller/fragment/meta.php
					[Parent]/controller/fragment/title.php
					[Parent]/model/app/meta.php
			*/
			do_action("windmill/content/front/header");
			?>
		</div><!-- .uk-card-header -->

	</div><!-- .uk-card-media -->

	<div class="<?php echo apply_filters("_class[front][body][front-page]",esc_attr('uk-card-body')); ?>">
		<?php
		/**
			@hooked
				_fragment_excerpt::__the_card()
			@reference
				[Parent]/controller/fragment/excerpt.php
				[Parent]/model/app/excerpt.php
		*/
		do_action("windmill/content/front/body");
		?>
	</div><!-- .uk-card-body -->

	<?php if(has_action("windmill/content/front/footer")) : ?>
		<div class="<?php echo apply_filters("_class[front][footer][front-page]",esc_attr('uk-card-footer')); ?>">
			<?php do_action("windmill/content/front/footer"); ?>
		</div><!-- .uk-card-footer -->
	<?php endif; ?>

</article>
