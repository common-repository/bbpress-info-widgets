<!-- This file is used to markup the widget for Recent Topics info -->
<table>
    <tr>
    	<th>Topic</th>
    	<th>Posts</th>
    </tr>

    <?php while ( $widget_query->have_posts() ) :
            	  $widget_query->the_post();
                  $topic_id    = bbp_get_topic_id( $widget_query->post->ID );
 	?>
    <tr>
    	<td>
            <a class="bbp-forum-title" href="<?php bbp_topic_permalink( $topic_id ); ?>"><?php bbp_topic_title( $topic_id ); ?></a>
        </td>
        <td>
        	<?php echo bbp_get_topic_post_count($topic_id, false);?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>