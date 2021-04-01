<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Kidspress
 * @since Kidspress 1.0.0
 */

// Add About section
$wp_customize->add_section( 'kidspress_about_section', array(
	'title'             => esc_html__( 'About Us','kidspress' ),
	'description'       => esc_html__( 'About Us Section options.', 'kidspress' ),
	'panel'             => 'kidspress_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'kidspress_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'kidspress_sanitize_switch_control',
) );

$wp_customize->add_control( new Kidspress_Switch_Control( $wp_customize, 'kidspress_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'kidspress' ),
	'section'           => 'kidspress_about_section',
	'on_off_label' 		=> kidspress_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'kidspress_theme_options[about_content_page]', array(
	'sanitize_callback' => 'kidspress_sanitize_page',
) );

$wp_customize->add_control( new Kidspress_Dropdown_Chooser( $wp_customize, 'kidspress_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'kidspress' ),
	'section'           => 'kidspress_about_section',
	'choices'			=> kidspress_page_choices(),
	'active_callback'	=> 'kidspress_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'kidspress_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'kidspress_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'kidspress' ),
	'section'        	=> 'kidspress_about_section',
	'active_callback' 	=> 'kidspress_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'kidspress_theme_options[about_btn_title]', array(
		'selector'            => '#about-us a.btn',
		'settings'            => 'kidspress_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'kidspress_about_btn_title_partial',
    ) );
}