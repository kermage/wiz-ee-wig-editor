<?php

/**
 * @package Wiz-Ee-Wig Editor
 * @since 0.1.0
 */

if ( ! class_exists( 'WizEeWig_Editor' ) ) {
    class WizEeWig_Editor {
        
        private static $instance;
        
        
        public static function instance() {
            
            if ( ! isset( self::$instance ) ) {
                self::$instance = new self();
            }
            
            return self::$instance;
            
        }
        
        
        private function __construct() {
            
            add_action( 'widgets_init', array( $this, 'widget_init' ) );
            
        }
        
        
        public function widget_init() {
            
            register_widget( 'WEWE_Widget' );
            
        }
        
    }
}

// Load the Wiz-Ee-Wig Editor widget
require_once WEWE_PATH . 'class.wewe-widget.php';

// Get the Wiz-Ee-Wig Editor plugin running
WizEeWig_Editor::instance();
