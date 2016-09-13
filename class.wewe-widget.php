<?php

/**
 * @package Wiz-Ee-Wig Editor
 * @since 0.1.0
 */

if ( ! class_exists( 'WEWE_Widget' ) ) {
    class WEWE_Widget extends WP_Widget {
        
        public function __construct() {
            
            $widget_ops = array(
                'classname' => 'wewe_widget',
                'description' => __( 'A WYSIWYG widget using the wp_editor().', 'wewe' )
            );
            
            parent::__construct( 'wewe', 'Wiz-Ee-Wig Editor', $widget_ops );
            
        }
        
        
        public function widget( $args, $instance ) {
            
            
            
        }
        
        
        public function form( $instance ) {
            
            
                
        }
        
        
        public function update( $new_instance, $old_instance ) {
            
            
            
        }
        
    }
}
