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
            
            $title = empty( $instance['title'] ) ? '' : $instance['title'];
            $content = empty( $instance['content'] ) ? '' : $instance['content'];
            
            echo $args['before_widget'];
            echo $args['before_title'] . $title . $args['after_title'];
            echo $content;
            echo $args['after_widget'];
            
        }
        
        
        public function form( $instance ) {
            
            $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'content' => '' ) );
            $title = sanitize_text_field( $instance['title'] );
            ?>
            
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'wewe' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            
            <?php
                $settings = array(
                    'textarea_name' => $this->get_field_name( 'content' ),
                    'textarea_rows' => 10
                );
                wp_editor( $instance['content'], $this->get_field_id( 'content' ), $settings );
                
                echo '<br>';
        }
        
        
        public function update( $new_instance, $old_instance ) {
            
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['content'] = ! empty( $new_instance['content'] ) ? $new_instance['content'] : '';
            
            return $instance;
            
        }
        
    }
}
