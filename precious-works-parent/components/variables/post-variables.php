<?php $title = get_the_title($post_id); 
$date = get_the_date('M d, Y', $post_id);
$permalink = get_the_permalink($post_id); 
$thumbnail = get_the_post_thumbnail($post_id, 'large', array('class'=>'w-100 h-auto')); 





?>