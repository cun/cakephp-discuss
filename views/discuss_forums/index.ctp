<?php foreach ($forums as $id => $forum): ?>
<div id="forum<?php echo $id; ?>" class="discussForum">
<h2><?php echo $html->link($forum, array('action'=>'view', $id), null, null, false); ?></h2>
</div>
<?php endforeach; ?>