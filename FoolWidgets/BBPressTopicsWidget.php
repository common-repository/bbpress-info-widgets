<?php
namespace MotleyFool\BbpressWidgets;

use \WP_Widget;
use \WP_Query;

class BBPressTopicsWidget extends WP_Widget {

    public function __construct() {
        $this->defaultWidgetValues = array();
        $widget_ops = array(
            'classname'   => 'widget_display_topics_custom',
            'description' => __( 'A list of recent topics, sorted by popularity or freshness.', 'bbpress_custom' )
        );

        parent::__construct( 'bbpresstopicscustom', 'bbPress Info Widget - Topics List' , $widget_ops );
    }

    public function widget( $args = array(), $instance = array() ) {

        // Get widget settings
        $settings =  $instance ;

        // Typical WordPress filter
        $settings['title'] = apply_filters( 'widget_title',           $settings['title'], $instance, $this->id_base );

        // bbPress filter
        $settings['title'] = apply_filters( 'bbp_topic_widget_title', $settings['title'], $instance, $this->id_base );

        // How do we want to order our results?
        switch ( $settings['order_by'] ) {

            // Order by most recent replies
            case 'freshness' :
                $topics_query = array(
                    'post_type'           => \bbp_get_topic_post_type(),
                    'post_parent'         => $settings['parent_forum'],
                    'posts_per_page'      => (int) $settings['max_shown'],
                    'post_status'         => array( \bbp_get_public_status_id(), \bbp_get_closed_status_id() ),
                    'ignore_sticky_posts' => true,
                    'no_found_rows'       => true,
                    'meta_key'            => '_bbp_last_active_time',
                    'orderby'             => 'meta_value',
                    'order'               => 'DESC',
                );
                break;

            // Order by total number of replies
            case 'popular' :
                $topics_query = array(
                    'post_type'           => \bbp_get_topic_post_type(),
                    'post_parent'         => $settings['parent_forum'],
                    'posts_per_page'      => (int) $settings['max_shown'],
                    'post_status'         => array( \bbp_get_public_status_id(), \bbp_get_closed_status_id() ),
                    'ignore_sticky_posts' => true,
                    'no_found_rows'       => true,
                    'meta_key'            => '_bbp_reply_count',
                    'orderby'             => 'meta_value',
                    'order'               => 'DESC'
                );
                break;

            // Order by which topic was created most recently
            case 'newness' :
            default :
                $topics_query = array(
                    'post_type'           => \bbp_get_topic_post_type(),
                    'post_parent'         => $settings['parent_forum'],
                    'posts_per_page'      => (int) $settings['max_shown'],
                    'post_status'         => array( \bbp_get_public_status_id(), \bbp_get_closed_status_id() ),
                    'ignore_sticky_posts' => true,
                    'no_found_rows'       => true,
                    'order'               => 'DESC'
                );
                break;
        }

        // Note: private and hidden forums will be excluded via the
        // bbp_pre_get_posts_normalize_forum_visibility action and function.
        $widget_query = new WP_Query( $topics_query );

        // Bail if no topics are found
        if ( ! $widget_query->have_posts() ) {
            return;
        }

        echo $args['before_widget'];

        if ( !empty( $settings['title'] ) ) {
            echo $args['before_title'] . $settings['title'] . $args['after_title'];
        } 

        // Get view content for the widget
        include( plugin_dir_path( __FILE__ ) . 'views/recenttopics-widget.php' );

        echo $args['after_widget'];

        // Reset the $post global
        wp_reset_postdata();
    }

    public function update( $new_instance = array(), $old_instance = array() ) {
        $instance                 = $old_instance;
        $newInstance = wp_parse_args((array) $new_instance, (array) $this->defaultWidgetValues);
        $this->instance['title']        = strip_tags( $new_instance['title'] );
        $this->instance['order_by']     = strip_tags( $new_instance['order_by'] );
        $this->instance['parent_forum'] = sanitize_text_field( $new_instance['parent_forum'] );
        $this->instance['max_shown']    = (int) $new_instance['max_shown'];

        // Force to any
        if ( !empty( $this->instance['parent_forum'] ) && !is_numeric( $this->instance['parent_forum'] ) ) {
            $this->instance['parent_forum'] = 'any';
        }

        return $this->instance;
    }

    public function form( $instance = array() ) {

        // Get widget settings
        $settings = wp_parse_args( $instance ); 

        // Get view content for the widget
        include( plugin_dir_path( __FILE__ ) . 'views/recenttopics-admin.php' );
    }
}