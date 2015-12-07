<?php 
/** DEFAULT FRAMEWORK OPTIONS */
$options = array (
array( 
	"name" => __( "basic", 'stf' ),
	"label" => __( "Basic Settings", 'stf' ),
	"type" => "section"),
	
	array(  "name" => "Google Analytics Code",
		"desc" => "Analytics code for your site is placed automatically after <code>&lt;body&gt;</code> tag",
		"id" => "analytics_code",
		"std" => "",
		"type" => "textarea"),
	
	array(  "name" => "Hide Author",
		"desc" => "Hide author on posts.",
		"id" => "hide_author",
		"std" => "off",
		"type" => "checkbox"),
		
	array(  "name" => "Hide Date",
		"desc" => "Hide date on posts.",
		"id" => "hide_date",
		"std" => "off",
		"type" => "checkbox"),
		
	array(  "name" => "Hide Post Sharing",
		"desc" => "Disable sharing buttons.",
		"id" => "hide_share",
		"std" => "off",
		"type" => "checkbox"),
		
	array(  "name" => "Hide Page Sharing",
		"desc" => "Disable sharing buttons on pages.",
		"id" => "hide_page_share",
		"std" => "off",
		"type" => "checkbox"),
		
	array(  "name" => "Disable Page Comments",
		"desc" => "Disables comments on page templates.",
		"id" => "hide_page_comments",
		"std" => "off",
		"type" => "checkbox"),
		
	array(  "name" => "Disable Post Comments",
		"desc" => "Disables comments on post templates.",
		"id" => "hide_post_comments",
		"std" => "off",
		"type" => "checkbox"),
		
	array(  "name" => "Footer Text",
		"desc" => "Footer text is displayed at the bottom of the page.",
		"id" => "footer_text",
		"std" => "Copyright &copy; " . get_bloginfo('name'),
		"type" => "textarea"),
		
array( "type" => "close"), 
array( 
	"name" => __( "ads", 'stf' ),
	"label" => __( "Ads", 'stf' ),
	"type" => "section"),
	
	array(  "name" => "Post Ads",
		"desc" => "Post ads are placed before post content.",
		"id" => "post_ads",
		"std" => "",
		"type" => "textarea"),
	
	array(  "name" => "Billboard Banner",
		"desc" => "Billboard is placed below navigation on single, page and archive templates.",
		"id" => "header_banner",
		"std" => "",
		"type" => "textarea"),
		
array( "type" => "close"), 
);
?>