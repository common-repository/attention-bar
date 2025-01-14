<?php
function editor_admin_init() {
	wp_enqueue_script('word-count');
	wp_enqueue_script('post');
	wp_enqueue_script( 'common' );
	wp_enqueue_script('editor');
	if (function_exists('add_thickbox')) add_thickbox();
	if (function_exists('wp_tiny_mce')) wp_tiny_mce();
	wp_admin_css();
	wp_enqueue_script('utils');
	do_action("admin_print_styles-post-php");
	do_action('admin_print_styles');
}

function editor_admin_head() {
	wp_tiny_mce();
}

function nb_admin_styles() {
	global $wp_version;
	wp_register_style('nb_admin_style', NB_URL . '/css/attention_bar_admin.css' , array(), NB_VERSION);
	wp_enqueue_style('nb_admin_style');
	wp_enqueue_style( 'nb_plugin_style' );
	wp_enqueue_script( 'jqueryui');
	wp_enqueue_script( 'jquerydatepicker' );
	wp_enqueue_script( 'jquerydatetimepicker' );
	wp_enqueue_script( 'postbox' );
	wp_enqueue_script( 'dashboard' );
	if (version_compare($wp_version,"3.1","<")){
		editor_admin_init();
	}
}

function nb_init_scripts() {
	if(!is_admin() && get_option('pd_nb_load_jquery','true') == 'true') {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', NB_URL . '/js/jquery.js', array(), '1.6.1', false );
		wp_enqueue_script( 'jquery' );
	}
	if (!is_admin()) {
		wp_deregister_script( 'jqueryattentionbar' );
		wp_register_script( 'jqueryattentionbar', NB_URL . '/js/jquery-attentionbar.js', array('jquery'), NB_VERSION, false );
		wp_enqueue_script( 'jqueryattentionbar' );
	}
	wp_deregister_script( 'jquerydatepicker' );
	wp_register_script( 'jquerydatepicker', NB_URL . '/js/jquery.ui.datepicker.js', array('jqueryui'), '1.8.13', true );
	wp_deregister_script( 'jquerydatetimepicker' );
	wp_register_script( 'jquerydatetimepicker', NB_URL . '/js/jquery-ui-timepicker-addon.js', array('jquerydatepicker'), '0.9.5', true);
	wp_deregister_script ('jqueryui');
	wp_register_script ('jqueryui', NB_URL . '/js/jquery-ui-1.8.13.custom.min.js', array('jquery'), '1.8.13', false);
}

function nb_init_stylesheets() {
	wp_register_style('nb_style', NB_URL . '/css/jquery.attentionbar.css', array() , NB_VERSION, 'screen');
	wp_enqueue_style( 'nb_style');

}

function nb_admin_init() {
	wp_register_style( 'nb_plugin_style', NB_URL . '/css/jquery-ui.css', array(), '1.8.13' );
	nb_register_settings();
}

function nb_register_settings() {
	// Settings page settings
	register_setting( 'pd_nb_settings', 'pd_nb_inserttype' );
	register_setting( 'pd_nb_settings', 'pd_nb_bartype' );
	register_setting( 'pd_nb_settings', 'pd_nb_easingtype' );
	register_setting( 'pd_nb_settings', 'pd_nb_barcolor' );
	register_setting( 'pd_nb_settings', 'pd_nb_bartext' );
	register_setting( 'pd_nb_settings', 'pd_nb_bartextsize' );
	register_setting( 'pd_nb_settings', 'pd_nb_displaytime' );
	register_setting( 'pd_nb_settings', 'pd_nb_displayspeed');
	register_setting( 'pd_nb_settings', 'pd_nb_barheight' );
	register_setting( 'pd_nb_settings', 'pd_nb_buttonheight' );
	register_setting( 'pd_nb_settings', 'pd_nb_displaytype' );
	register_setting( 'pd_nb_settings', 'pd_nb_displaydelay' );
	register_setting( 'pd_nb_settings', 'pd_nb_cookie' );
	register_setting( 'pd_nb_settings', 'pd_nb_cookiehash' );
	register_setting( 'pd_nb_settings', 'pd_nb_cookieexpire' );
	register_setting( 'pd_nb_settings', 'pd_nb_fontsize' );
	register_setting( 'pd_nb_settings', 'pd_nb_fontcolor' );
	register_setting( 'pd_nb_settings', 'pd_nb_buttonposition' );
	register_setting( 'pd_nb_settings', 'pd_nb_roles' );
	register_setting( 'pd_nb_settings', 'pd_nb_showversion' );
	register_setting( 'pd_nb_settings', 'pd_nb_debug' );
	register_setting( 'pd_nb_settings', 'pd_nb_load_jquery' );
	register_setting( 'pd_nb_settings', 'pd_nb_gui_mce' );
	// Internal settings
	register_setting( 'pd_nb_internal_settings', 'pd_nb_installnotification' );
	register_setting( 'pd_nb_internal_settings', 'pd_nb_betanotification' );
	register_setting( 'pd_nb_internal_settings', 'pd_nb_db_convertepoch' );
}

?>
