<!-- html view for topic info admin -->        
<p>
	<label for="<?php echo $this->get_field_id( 'title'); ?>"><?php _e( 'Title:', 'bbpress' ); ?> 
	<input class="widefat" 
		   id="<?php echo $this->get_field_id( 'title'); ?>" 
		   name="<?php echo $this->get_field_name( 'title'); ?>" 
		   type="text" 
		   value="<?php echo esc_attr( $settings['title']); ?>" 
	/>
    </label>
</p>
