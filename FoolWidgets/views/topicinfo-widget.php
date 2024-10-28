<!-- This file is used to markup the administration form of the widget. -->
<table>
    <tr>
        <td>Forum</td>
        <td><?php echo get_the_title($post->post_parent);?></td>
    </tr>
    <tr>
        <td>Replies</td>
        <td><?php echo bbp_get_topic_post_count($post->ID, false);?></td>
    </tr>
    <tr>
        <td>Participants</td>
        <td><?php echo bbp_get_topic_voice_count($post->ID, false); ?></td>
    </tr>
    <tr>
        <td>Last Activity</td>
        <td><?php echo bbp_get_topic_last_active_time($post->ID, false); ?></td>
    </tr>
</table>