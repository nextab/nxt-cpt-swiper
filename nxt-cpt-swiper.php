<?php
/**
* Plugin Name: Swiper Slider for Custom Post Types by nexTab
* Description: This plugin adds a shortcode to display a swiper slider for custom post types.
* Version: 1.0
* Author: nexTab | Oliver Gehrmann & Benedikt Braut
* Author URI: https://nextab.de
* Text Domain: nxt_cpt_swiper
*/

function dynamic_enqueue_script() {
	// if (!is_page()) return;
	global $post;
	if (strpos($post->post_content, '[lat_projekte') === false) return;
	wp_register_script('swiper-script', plugin_dir_url(__FILE__) . 'js/swiper-bundle.min.js', '', '1.0', ['strategy' => 'defer']);
	wp_enqueue_script('swiper-script');
	wp_register_script('swiper-init', plugin_dir_url(__FILE__) . 'js/nxt-swiper-initializer.js', '', '1.0', ['strategy' => 'defer']);
	wp_enqueue_script('swiper-init');
	wp_enqueue_style('swiper-style', plugin_dir_url(__FILE__) . 'css/swiper-bundle.min.css', '', '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'dynamic_enqueue_script', 20);

function swiper_shortcode($atts) {
	// Extract shortcode attributes
	$a = shortcode_atts(
		array(
			'post_type' => 'project',
			'count' => 12,
			'imgsize' => 'medium_large',
			'category' => 'project_category',
			'class' => '',
			'navigation' => 'true',
			// Default number of entries to display
		),
		$atts,
	);
	
	$query_args = array(
		'post_type' => $a['post_type'],
		'posts_per_page' => $a['count'],
	);
	$query = new WP_Query($query_args);
	$output = '';
	// Output random entry titles
	if ($query->have_posts()) {
		$output = '<div class="swiper-container nxt-swiper ' . $a["class"] . '">';
		$output .= '<div class="swiper-wrapper">';
			while ($query->have_posts()) {
				$query->the_post();
				$id = get_the_ID();
				$title = get_the_title();
				$permalink = get_permalink();
				$post_type = $a["post_type"];
				$thumbnail_url = get_the_post_thumbnail_url($id, $a['imgsize']);
				$project_duration = get_field('project_duration');
				if($a["category"] != "") {
					$project_categories = get_the_terms($id, $a["category"]);
				}
				if(isset($project_categories) || !empty($project_categories) || $project_duration != '') {
					$meta_container = '<div class="meta_container">';
					if($project_duration != '') {
						$meta_container .= "<span class='project_duration'>$project_duration</span>";
					}
					if(isset($project_categories) || !empty($project_categories)) {
						$meta_container .= "<div class='project_categories'>";
						foreach($project_categories as $category) {
							$meta_container .= "<a href=" . get_term_link($category) . "><span>$category->name</span></a>, ";
						}
						$meta_container = rtrim($meta_container, ', ');
						$meta_container .= "</div>";
					}
					$meta_container .= '</div> <!-- .meta_container -->';
				}
				$output .= "<div class='swiper-slide $post_type'><div class='post_thumbnail'><a href='$permalink' title='$title'><img alt='$title' src='$thumbnail_url'></a></div><!-- .post_thumbnail -->";
				$output .= isset($meta_container) ? $meta_container : '';
				$output .= "<div class='post_title'><h3><a href='$permalink' title='$title'>$title</a></h3></div><!-- .post_title -->";
				$output .= "</div><!-- .swiper-slide -->";
			}
		$output .= '</div><!-- swiper-wrapper -->';
		if($a['navigation'] == 'true') {
			$output .= '<div class="swiper-button-prev"></div>';
			$output .= '<div class="swiper-button-next"></div>';
		}
		$output .= '</div><!-- swiper-container -->';
	}
	wp_reset_postdata();
	return $output;
}
add_shortcode('lat_projekte', 'swiper_shortcode');