<?php
/**
 * Custom post types: puppies, litters, parent dogs.
 *
 * @package HavenRidge
 */

defined('ABSPATH') || exit;

add_action('init', function () {
	register_post_type('puppy', array(
		'labels' => array(
			'name'          => __('Puppies', 'havenridge'),
			'singular_name' => __('Puppy', 'havenridge'),
			'add_new_item'  => __('Add puppy', 'havenridge'),
			'edit_item'     => __('Edit puppy', 'havenridge'),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array('slug' => 'puppies'),
		'menu_icon'    => 'dashicons-pets',
		'show_in_rest' => true,
		'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
	));

	register_post_type('litter', array(
		'labels' => array(
			'name'          => __('Litters', 'havenridge'),
			'singular_name' => __('Litter', 'havenridge'),
			'add_new_item'  => __('Add litter', 'havenridge'),
			'edit_item'     => __('Edit litter', 'havenridge'),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array('slug' => 'litters'),
		'menu_icon'    => 'dashicons-groups',
		'show_in_rest' => true,
		'supports'     => array('title', 'editor', 'thumbnail'),
	));

	register_post_type('parent_dog', array(
		'labels' => array(
			'name'          => __('Puppy parents', 'havenridge'),
			'singular_name' => __('Parent dog', 'havenridge'),
			'add_new_item'  => __('Add parent dog', 'havenridge'),
			'edit_item'     => __('Edit parent dog', 'havenridge'),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array('slug' => 'parents'),
		'menu_icon'    => 'dashicons-heart',
		'show_in_rest' => true,
		'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
	));

	register_taxonomy('puppy_size', array('puppy', 'litter', 'parent_dog'), array(
		'labels' => array(
			'name'          => __('Sizes', 'havenridge'),
			'singular_name' => __('Size', 'havenridge'),
		),
		'public'       => true,
		'hierarchical' => true,
		'show_in_rest' => true,
		'rewrite'      => array('slug' => 'size'),
	));

	register_taxonomy('coat_color', array('puppy', 'parent_dog'), array(
		'labels' => array(
			'name'          => __('Colors', 'havenridge'),
			'singular_name' => __('Color', 'havenridge'),
		),
		'public'       => true,
		'hierarchical' => false,
		'show_in_rest' => true,
		'rewrite'      => array('slug' => 'color'),
	));
});
