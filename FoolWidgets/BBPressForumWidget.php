<?php
namespace MotleyFool\BbpressWidgets;

use \WP_Widget;
use \WP_Query;

class BBPressForumWidget extends WP_Widget {

    public function __construct() {
        $this->defaultWidgetValues = array();
        $widget_ops = array(
            'classname'   => 'widget_display_forum_custom',
            'description' => __( 'List all forums', 'bbpress_custom' )
        );

        parent::__construct( 'bbpressforumcustom', 'bbPress Info Widget - Forum Info' , $widget_ops );
    }

    public function widget( $args, $instance ) {

        // Get widget settings
        $settings = $instance;

        // Typical WordPress filter
        $settings['title'] = apply_filters( 'widget_title', $settings['title'], $instance, $this->id_base );

        // bbPress filter
        $settings['title'] = apply_filters( 'bbp_forum_widget_title', $settings['title'], $instance, $this->id_base );

        // Note: private and hidden forums will be excluded via the
        // bbp_pre_get_posts_normalize_forum_visibility action and function.
        $widget_query = new WP_Query( array(
            'post_type'           => \bbp_get_forum_post_type(),
            'post_parent'         => $settings['parent_forum'],
            'post_status'         => \bbp_get_public_status_id(),
            'posts_per_page'      => get_option( '_bbp_forums_per_page', 5 ),
            'ignore_sticky_posts' => true,
            'no_found_rows'       => true,
            'orderby'             => 'menu_order title',
            'order'               => 'ASC'
        ) );

        // Bail if no posts
        if ( ! $widget_query->have_posts() ) {
            return;
        }

        echo $args['before_widget'];

        if ( !empty( $settings['title'] ) ) {
            echo $args['before_title'] . $settings['title'] . $args['after_title'];
        } 

        include( plugin_dir_path( __FILE__ ) . 'views/forum-widget.php' );

        echo $args['after_widget'];

        // Reset the $post global
        wp_reset_postdata();
    }

    public function update( $new_instance, $old_instance ) {
        $instance                       = $old_instance;
        $newInstance                    = wp_parse_args((array) $new_instance, (array) $this->defaultWidgetValues);
        $this->instance['title']        = strip_tags( $new_instance['title'] );
        $this->instance['parent_forum'] = sanitize_text_field( $new_instance['parent_forum'] );

        // Force to any
        if ( !empty( $this->instance['parent_forum'] ) && !is_numeric( $this->instance['parent_forum'] ) ) {
            $this->instance['parent_forum'] = 'any';
        }

        return $this->instance;
    }

    public function form( $instance ) {

        // Get widget settings
        $settings = wp_parse_args( $instance ); 

        // Display the admin form
        include( plugin_dir_path(__FILE__) . 'views/forum-admin.php' );
    }
}