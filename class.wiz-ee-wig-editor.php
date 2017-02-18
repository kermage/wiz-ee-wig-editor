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
            add_action( 'widgets_admin_page', array( $this, 'output_editor' ) );
            add_action( 'load-widgets.php', array( $this, 'scripts_styles' ) );
        
        }
        
        
        public function widget_init() {
            
            register_widget( 'WEWE_Widget' );
            
        }
        
        
        public function output_editor() { ?>
        
            <div id="wewe">
                <div id="wewe-container">
                    <?php
                    
                        $settings = array(
                            'textarea_rows' => 15
                        );
                        wp_editor( '', 'wewe-editor', $settings );
                        
                    ?>
                    <div id="wewe-buttons">
                        <input type="hidden" id="wewe-id" value="">
                        <input type="hidden" id="wewe-type" value="">
                        <a href="#" id="wewe-close" class="button button-primary">Close</a>
                    </div>
                </div>
            </div>
            
        <?php }
        
        
        public function scripts_styles() {
            
            wp_enqueue_style( 'wewe-css', WEWE_URL . 'wiz-ee-wig-editor.css', array(), WEWE_VERSION, false );
            wp_enqueue_script( 'wewe-js', WEWE_URL . 'wiz-ee-wig-editor.js', array( 'jquery' ), WEWE_VERSION, true );
            
        }
        
    }
}

// Load the Wiz-Ee-Wig Editor widget
require_once WEWE_PATH . 'class.wewe-widget.php';

// Get the Wiz-Ee-Wig Editor plugin running
WizEeWig_Editor::instance();
