<?php
/* 
Plugin Name: Azad Toggle Nav
Description: Responsive nav
Plugin URi: gittechs.com/plugin/azad-wp-starter-plugin 
Author: Md. Abul Kalam Azad
Author URI: gittechs.com/author
Author Email: webdevazad@gmail.com
Version: 0.0.0.1
Text Domain: azad-toggle-nav
*/ 
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if(! class_exists('Azad_Toggle_Nav')){
    final class Azad_Toggle_Nav{
		public static $instance = null;
        public function __construct(){
            add_action('wp_enqueue_scripts',array($this,'azad_public_scripts'));
            add_action('wp_head',array($this,'azad_public_head'));
        }
        public function azad_public_scripts(){
			wp_register_style( 'azad-style', plugins_url( 'style.css', __FILE__ ), array(), '12', 'all');
            wp_register_style( 'azad-slicknav', plugins_url( 'slicknav.css', __FILE__ ), array(), '12', 'all' );

            wp_enqueue_style( 'azad-style');
            wp_enqueue_style( 'azad-slicknav');
            
			wp_register_script( 'azad-jquery', plugins_url( 'azad-jquery.min.js', __FILE__ ), array(), '23', false );
			wp_register_script( 'azad-modernizr', plugins_url( 'modernizr.min.js', __FILE__ ), array(), '23', false );
            wp_register_script( 'azad-slicknav', plugins_url( 'jquery.slicknav.js', __FILE__ ), array(), '23', true );
            
            wp_enqueue_script('azad-modernizr');
            wp_enqueue_script('azad-slicknav');
        }
        public function azad_public_head(){
			?>
                <script>
                    $(document).ready(function(){
                        //$('#menu').slicknav();
                        alert('asdfr');
                    });
                </script>
            <?php
        }
        public static function _get_instance(){
            if(is_null(self::$instance) && ! isset(self::$instance) && ! (self::$instance instanceof self)){
                self::$instance = new self();            
            }
            return self::$instance;
        }
        public function __destruct(){}
    }
}
if(! function_exists('load_azad_toggle_nav')){
    function load_azad_toggle_nav(){
        return Azad_Toggle_Nav::_get_instance();
    }
}
$GLOBALS['azad_toggle_nav'] = load_azad_toggle_nav();
