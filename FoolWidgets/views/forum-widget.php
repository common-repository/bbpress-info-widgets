<!-- This file is used to markup the public-facing widget. -->
<table>
    <tr>
    	<th>Forum</th>
    	<th>Topics</th>
    	<th>Posts</th>
    </tr>
	<?php while ( $widget_query->have_posts() ) : $widget_query->the_post(); ?>
	<tr>
	    <td><a class="bbp-forum-title" href="<?php bbp_forum_permalink( $widget_query->post->ID ); ?>"><?php bbp_forum_title( $widget_query->post->ID ); ?></a></td>
	    <td><?php echo bbp_get_forum_topic_count($widget_query->post->ID, false); ?></td>
	    <td><?php echo bbp_get_forum_post_count($widget_query->post->ID, false); ?></td>
	</tr>
    <?php endwhile; ?>
 </table>