<!-- This file is used to markup the administration for Recent Topics info -->
<p>
    <label for="<?php echo $this->get_field_id( 'title'); ?>"><?php _e( 'Title:','bbpress' ); ?> 
        <input class="widefat" 
               id="<?php echo $this->get_field_id( 'title'); ?>" 
               name="<?php echo $this->get_field_name( 'title'); ?>" 
               type="text" 
               value="<?php echo esc_attr( $settings['title']); ?>" 
        />
    </label>
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'max_shown' ); ?>"><?php _e( 'Maximum topics to show:', 'bbpress' ); ?> 
        <input class="widefat" 
               id="<?php echo $this->get_field_id( 'max_shown' ); ?>" 
               name="<?php echo $this->get_field_name( 'max_shown' ); ?>" 
               type="text" 
               value="<?php echo esc_attr( $settings['max_shown'] ); ?>" 
        />
    </label>
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'parent_forum' ); ?>"><?php _e( 'Parent Forum ID:', 'bbpress' ); ?>
        <input class="widefat" 
               id="<?php echo $this->get_field_id( 'parent_forum' ); ?>" 
               name="<?php echo $this->get_field_name( 'parent_forum' ); ?>" 
               type="text" 
               value="<?php echo esc_attr( $settings['parent_forum'] ); ?>" \
        />
    </label>

    <br />

    <small>
        <?php _e( '"0" to show only root - "any" to show all', 'bbpress' ); ?>
    </small>
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'order_by' ); ?>"><?php _e( 'Order By:',        'bbpress' ); ?></label>
    <select name="<?php echo $this->get_field_name( 'order_by' ); ?>" id="<?php echo $this->get_field_name( 'order_by' ); ?>">
        <option <?php selected( $settings['order_by'], 'newness' );   ?> value="newness"><?php _e( 'Newest Topics','bbpress' ); ?></option>
        <option <?php selected( $settings['order_by'], 'popular' );   ?> value="popular"><?php _e( 'Popular Topics','bbpress' ); ?></option>
        <option <?php selected( $settings['order_by'], 'freshness' ); ?> value="freshness"><?php _e( 'Topics With Recent Replies', 'bbpress' ); ?></option>
    </select>
</p>