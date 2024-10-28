<?php
namespace MotleyFool\BbpressWidgets;

use \WP_Widget;
use \WP_Query;

class BBPressTopicInfoWidget extends WP_Widget {

    public function __construct() {
        $this->defaultWidgetValues = array();
        $widget_ops = array(
            'classname'   => 'widget_display_topic_info_custom',
            'description' => __( 'Display stats about the topic being viewed', 'bbpress_custom' )
        );

        parent::__construct( 'bbpresstopicinfocustom', 'bbPress Info Widget - Topic Info' , $widget_ops );
    }

    public function widget( $args = array(), $instance = array() ) {

        // Get widget settings
        $settings =  $instance ;
        global $wp_query;
        $post = $wp_query->get_queried_object();

        if($post->post_type == "topic"):

            // Typical WordPress filter
            $settings['title'] = apply_filters( 'widget_title', $settings['title'], $instance, $this->id_base );

            // bbPress filter
            $settings['title'] = apply_filters( 'bbp_topic_widget_title', $settings['title'], $instance, $this->id_base );

            echo $args['before_widget'];

            if ( !empty( $settings['title'] ) ) {
                echo $args['before_title'] . $settings['title'] . $args['after_title'];
            }

            // Get view content for the widget
            include( plugin_dir_path( __FILE__ ) . 'views/topicinfo-widget.php' );

            echo $args['after_widget'];

        endif;
    }

    public function update( $new_instance = array(), $old_instance = array() ) {
        $instance                = $old_instance;
        $newInstance             = wp_parse_args((array) $new_instance, (array) $this->defaultWidgetValues);
        $this->instance['title'] = strip_tags( $new_instance['title'] );
        return $this->instance;
    }

    public function form( $instance = array() ) {

        // Get widget settings
        $settings = wp_parse_args( $instance ); 

        // Get admin form for the widget
        include( plugin_dir_path( __FILE__ ) . 'views/topicinfo-admin.php' );

    }
}