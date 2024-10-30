<?php 
/*
Plugin Name: JumpOut
Plugin URI: http://makedreamprofits.ru/jo/
Description: Устанавливайте JumpOut попапы в один клик с нашим плагином для Вордпресс!
Version: 3.2.1
Author: MakeDreamProfits
Author URI: http://makedreamprofits.ru
*/

/*  Copyright 2012-2016  MakeDreamProfits, Евгений Бос  (email : eugene@makedreamprofits.ru) */


// Не пускаем левых
if (!defined('ABSPATH')) die("Aren't you supposed to come here via WP-Admin?");
//define('comebacker_DIR', dirname(__FILE__));


// Задаем нужные константы
if ( !defined('WP_CONTENT_URL') )
	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );

// Guess the location
define('JUMPOUT_PATH', WP_CONTENT_DIR  . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . plugin_basename(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('JUMPOUT_TEMPLATE_PATH', JUMPOUT_PATH . 'templates' . DIRECTORY_SEPARATOR);
//$addfoot_url = WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__));

// Localization files
load_plugin_textdomain('jumpout', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/');

include_once 'class.php';


// Действуем в зависимости от того в админке мы или нет
if (is_admin()) {

	$JumpOut = new JumpOut(TRUE);
	$GLOBALS['JumpOutClass'] = &$JumpOut;

	ob_start();
	add_action('admin_menu', array($JumpOut, 'createMenuItem'));
    add_action('admin_init', array($JumpOut, 'addScripts'));
} else {
	$JumpOut = new JumpOut(FALSE);
	$GLOBALS['JumpOutClass'] = &$JumpOut;
	//echo $_SERVER['REQUEST_URI'];

	$execute = TRUE;
	if (isset($_SERVER['REQUEST_URI'])) {
		$request_uri = strtok($_SERVER['REQUEST_URI'], '?');

		// if its .xml or .xsl - ignoring such files
		// https://trello.com/c/nm1A8MuN/2211-jo-xml-sitemap
		$url = explode('/', $request_uri);
		$url = $url[count($url) - 1];

		if (FALSE !== strpos($url, '.')) {
			if (in_array(substr($url, 1 + strpos($url, '.')), array('xml', 'xsl'))) {
				$execute = FALSE;
			}
		}

		// ignoring the login page
		if (strpos($request_uri, 'wp-login')) {
			$execute = FALSE;
		}
	}

	//wp-login.php


	if ($execute) {
		add_action('init', array($JumpOut, 'frontendStart'), 0);
		add_action('shutdown', array($JumpOut, 'frontendEnd'), 1000); 

		if (!empty($JumpOut->settings['code']) || (isset($JumpOut->settings['onecode']) && $JumpOut->settings['onecode'])) {
	    	add_action('wp_footer', array($JumpOut, 'frontendHeader'));
		} else {
	    	add_action('wp_head', array($JumpOut, 'frontendHeader'));
		}
	}


    //add_action('wp_footer', array($JumpOut, 'frontendFooter'));

	//add_action('init', array($JumpOut, 'frontendStart'), 0);
	//add_action('shutdown', array($JumpOut, 'frontendEnd'), 1000); 
}