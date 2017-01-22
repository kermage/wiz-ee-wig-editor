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
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $content = apply_filters( 'wewe_content', $content, $instance, $this );
            
            if ( empty( $content ) ) {
                return;
            }
            
            echo $args['before_widget'];
            if ( ! empty( $title ) ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
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
            
            <p>
                <a class="button-primary wewe-edit" id="<?php echo $this->get_field_id( 'fullscreen' ); ?>" href="#"><?php _e( 'Edit Content', 'wewe' ); ?></a>
                <textarea class="widefat wewe-content" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" rows="10"><?php echo esc_textarea( $instance['content'] ); ?></textarea>
            </p>
            
            <?php
        }
        
        
        public function update( $new_instance, $old_instance ) {
            
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['content'] = ! empty( $new_instance['content'] ) ? $new_instance['content'] : '';
            
            return $instance;
            
        }
        
    }
}
